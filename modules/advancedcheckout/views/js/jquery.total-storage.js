/**
 * TotalStorage
 *
 * Copyright (c) 2012 Jared Novack & Upstatement (upstatement.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Total Storage is the conceptual the love child of jStorage by Andris Reinman, 
 * and Cookie by Klaus Hartl -- though this is not connected to either project.
 */

/**
 * Create a local storage parameter
 *
 == What makes it TOTAL Storage? ==
 
 * The browser doesn't support local storage it will fall-back to cookies! (Using the
   wonderful $.cookie plugin).
 * Send it strings, numbers even complex object arrays! TotalStorage does not care.
   Your efforts to defeat it will prove futile. 
 * Simple as shit. jStorage and some other very well-written plugins provide a bevy of
   options for expiration, security and so forth. Frequently this is more power than you
   need and vulnerable to confusion if you're just want it to work (JWITW)
   
 * @desc Set the value of a key to a string
 * @example $.totalStorage('the_key', 'the_value');
 * @desc Set the value of a key to a number
 * @example $.totalStorage('the_key', 800.2);
 * @desc Set the value of a key to a complex Array
 * @example	var myArray = new Array();
 *			myArray.push({name:'Jared', company:'Upstatement', zip:63124});
			myArray.push({name:'McGruff', company:'Police', zip:60652};
			$.totalStorage('people', myArray);
			//to return:
			$.totalStorage('people');
 *
 * @name $.totalStorage
 * @cat Plugins/Cookie
 * @author Jared Novack/jared@upstatement.com
 * @version 1.1.2
 * @url http://upstatement.com/blog/2012/01/jquery-local-storage-done-right-and-easy/
 */

;(function($, undefined){

	/* Variables I'll need throghout */

	var supported, ls, mod = 'test';
	if ('localStorage' in window){
		try {
			ls = (typeof window.localStorage === 'undefined') ? undefined : window.localStorage;
			if (typeof ls == 'undefined' || typeof window.JSON == 'undefined'){
				supported = false;
			} else {
				supported = true;
			}
			
			window.localStorage.setItem(mod, '1');
			window.localStorage.removeItem(mod);
		}
		catch (err){
			supported = false;
		}
	}


	/* Make the methods public */

	$.totalStorage = function(key, value, options){
		return $.totalStorage.impl.init(key, value);
	};

	$.totalStorage.setItem = function(key, value){
		return $.totalStorage.impl.setItem(key, value);
	};

	$.totalStorage.getItem = function(key){
		return $.totalStorage.impl.getItem(key);
	};

	$.totalStorage.getAll = function(){
		return $.totalStorage.impl.getAll();
	};

	$.totalStorage.deleteItem = function(key){
		return $.totalStorage.impl.deleteItem(key);
	};

	/* Object to hold all methods: public and private */

	$.totalStorage.impl = {

		init: function(key, value){
			if (typeof value != 'undefined') {
				return this.setItem(key, value);
			} else {
				return this.getItem(key);
			}
		},

		setItem: function(key, value){
			if (!supported){
				try {
					$.cookie(key, value);
					return value;
				} catch(e){
					console.log('Local Storage not supported by this browser. Install the cookie plugin on your site to take advantage of the same functionality. You can get it at https://github.com/carhartl/jquery-cookie');
				}
			}
			var saver = JSON.stringify(value);
			ls.setItem(key, saver);
			return this.parseResult(saver);
		},
		getItem: function(key){
			if (!supported){
				try {
					return this.parseResult($.cookie(key));
				} catch(e){
					return null;
				}
			}
			var item = ls.getItem(key);
			return this.parseResult(item);
		},
		deleteItem: function(key){
			if (!supported){
				try {
					$.cookie(key, null);
					return true;
				} catch(e){
					return false;
				}
			}
			ls.removeItem(key);
			return true;
		},
		getAll: function(){
			var items = [];
			if (!supported){
				try {
					var pairs = document.cookie.split(";");
					for (var i = 0; i<pairs.length; i++){
						var pair = pairs[i].split('=');
						var key = pair[0];
						items.push({key:key, value:this.parseResult($.cookie(key))});
					}
				} catch(e){
					return null;
				}
			} else {
				for (var j in ls){
					if (j.length){
						items.push({key:j, value:this.parseResult(ls.getItem(j))});
					}
				}
			}
			return items;
		},
		parseResult: function(res){
			var ret;
			try {
				ret = JSON.parse(res);
				if (typeof ret == 'undefined'){
					ret = res;
				}
				if (ret == 'true'){
					ret = true;
				}
				if (ret == 'false'){
					ret = false;
				}
				if (parseFloat(ret) == ret && typeof ret != "object"){
					ret = parseFloat(ret);
				}
			} catch(e){
				ret = res;
			}
			return ret;
		}
	};
})(jQuery);

/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));
