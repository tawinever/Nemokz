webpackJsonp([1],[
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _reactDom = __webpack_require__(36);
	
	var _reactRedux = __webpack_require__(28);
	
	var _PosSearchProductContainer = __webpack_require__(119);
	
	var _PosSearchProductContainer2 = _interopRequireDefault(_PosSearchProductContainer);
	
	var _configureStore = __webpack_require__(125);
	
	var _configureStore2 = _interopRequireDefault(_configureStore);
	
	var _PosActions = __webpack_require__(106);
	
	var _PosLang = __webpack_require__(66);
	
	var PosLang = _interopRequireWildcard(_PosLang);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var store = (0, _configureStore2.default)(); /**
	                                              * RockPOS - Point of Sale for PrestaShop
	                                              *
	                                              * @author    Hamsa Technologies
	                                              * @copyright Hamsa Technologies
	                                              * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                              */
	
	store.dispatch((0, _PosActions.getTranslations)());
	
	(0, _reactDom.render)(_react2.default.createElement(
	  _reactRedux.Provider,
	  { store: store },
	  _react2.default.createElement(_PosSearchProductContainer2.default, null)
	), document.getElementById('product_search'));

/***/ },
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	var GET_TRANSLATION_KEYS = exports.GET_TRANSLATION_KEYS = 'getTranslationByKeys';
	var SEARCH_PRODUCTS = exports.SEARCH_PRODUCTS = 'searchProducts';
	
	var RECEIVE_SEARCH_PRODUCTS = exports.RECEIVE_SEARCH_PRODUCTS = 'receiveSearchProducts';
	var RECEIVE_LANG = exports.RECEIVE_LANG = 'receiveLang';
	var RECEIVE_COMBINATIONS = exports.RECEIVE_COMBINATIONS = 'receiveCombinations';
	var RECEIVE_KEYWORD = exports.RECEIVE_KEYWORD = 'receiveKeyword';
	var GET_COMBINATIONS = exports.GET_COMBINATIONS = 'getCombinations';
	var UPDATE_SELECTED_COMBINATION = exports.UPDATE_SELECTED_COMBINATION = 'updateSelectedCombination';
	var PRODUCT_SUGGESTION_ABORT_PREVIOUS_REQUEST = exports.PRODUCT_SUGGESTION_ABORT_PREVIOUS_REQUEST = 'productSuggestionAbortPreviousRequest';
	var PRODUCT_SUGGESTION_SET_CURRENT_REQUEST = exports.PRODUCT_SUGGESTION_SET_CURRENT_REQUEST = 'productSuggestionSetCurrentRequest';
	var REQUEST_POSTS = exports.REQUEST_POSTS = 'requestPost';
	var SET_SELECTED_PRODUCT = exports.SET_SELECTED_PRODUCT = 'setSelectedProduct';

/***/ },
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports.compose = exports.applyMiddleware = exports.bindActionCreators = exports.combineReducers = exports.createStore = undefined;
	
	var _createStore = __webpack_require__(102);
	
	var _createStore2 = _interopRequireDefault(_createStore);
	
	var _combineReducers = __webpack_require__(236);
	
	var _combineReducers2 = _interopRequireDefault(_combineReducers);
	
	var _bindActionCreators = __webpack_require__(235);
	
	var _bindActionCreators2 = _interopRequireDefault(_bindActionCreators);
	
	var _applyMiddleware = __webpack_require__(234);
	
	var _applyMiddleware2 = _interopRequireDefault(_applyMiddleware);
	
	var _compose = __webpack_require__(101);
	
	var _compose2 = _interopRequireDefault(_compose);
	
	var _warning = __webpack_require__(103);
	
	var _warning2 = _interopRequireDefault(_warning);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	/*
	* This is a dummy function to check if the function name has been altered by minification.
	* If the function has been minified and NODE_ENV !== 'production', warn the user.
	*/
	function isCrushed() {}
	
	if (false) {
	  (0, _warning2["default"])('You are currently using minified code outside of NODE_ENV === \'production\'. ' + 'This means that you are running a slower development build of Redux. ' + 'You can use loose-envify (https://github.com/zertosh/loose-envify) for browserify ' + 'or DefinePlugin for webpack (http://stackoverflow.com/questions/30030031) ' + 'to ensure you have the correct code for your production build.');
	}
	
	exports.createStore = _createStore2["default"];
	exports.combineReducers = _combineReducers2["default"];
	exports.bindActionCreators = _bindActionCreators2["default"];
	exports.applyMiddleware = _applyMiddleware2["default"];
	exports.compose = _compose2["default"];

/***/ },
/* 28 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports.connect = exports.Provider = undefined;
	
	var _Provider = __webpack_require__(144);
	
	var _Provider2 = _interopRequireDefault(_Provider);
	
	var _connect = __webpack_require__(145);
	
	var _connect2 = _interopRequireDefault(_connect);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	exports.Provider = _Provider2["default"];
	exports.connect = _connect2["default"];

/***/ },
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };
	
	exports.default = compareObjects;
	function compareObjects(objA, objB) {
	  var keys = arguments.length <= 2 || arguments[2] === undefined ? [] : arguments[2];
	
	  if (objA === objB) {
	    return false;
	  }
	
	  var aKeys = Object.keys(objA);
	  var bKeys = Object.keys(objB);
	
	  if (aKeys.length !== bKeys.length) {
	    return true;
	  }
	
	  var keysMap = {};
	  var i = void 0,
	      len = void 0;
	
	  for (i = 0, len = keys.length; i < len; i++) {
	    keysMap[keys[i]] = true;
	  }
	
	  for (i = 0, len = aKeys.length; i < len; i++) {
	    var key = aKeys[i];
	    var aValue = objA[key];
	    var bValue = objB[key];
	
	    if (aValue === bValue) {
	      continue;
	    }
	
	    if (!keysMap[key] || aValue === null || bValue === null || (typeof aValue === 'undefined' ? 'undefined' : _typeof(aValue)) !== 'object' || (typeof bValue === 'undefined' ? 'undefined' : _typeof(bValue)) !== 'object') {
	      return true;
	    }
	
	    var aValueKeys = Object.keys(aValue);
	    var bValueKeys = Object.keys(bValue);
	
	    if (aValueKeys.length !== bValueKeys.length) {
	      return true;
	    }
	
	    for (var n = 0, length = aValueKeys.length; n < length; n++) {
	      var aValueKey = aValueKeys[n];
	
	      if (aValue[aValueKey] !== bValue[aValueKey]) {
	        return true;
	      }
	    }
	  }
	
	  return false;
	}

/***/ },
/* 36 */,
/* 37 */,
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */,
/* 42 */,
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */,
/* 60 */,
/* 61 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Root reference for iframes.
	 */
	
	var root;
	if (typeof window !== 'undefined') { // Browser window
	  root = window;
	} else if (typeof self !== 'undefined') { // Web Worker
	  root = self;
	} else { // Other environments
	  console.warn("Using browser-only version of superagent in non-browser environment");
	  root = this;
	}
	
	var Emitter = __webpack_require__(245);
	var requestBase = __webpack_require__(243);
	var isObject = __webpack_require__(105);
	
	/**
	 * Noop.
	 */
	
	function noop(){};
	
	/**
	 * Expose `request`.
	 */
	
	var request = module.exports = __webpack_require__(244).bind(null, Request);
	
	/**
	 * Determine XHR.
	 */
	
	request.getXHR = function () {
	  if (root.XMLHttpRequest
	      && (!root.location || 'file:' != root.location.protocol
	          || !root.ActiveXObject)) {
	    return new XMLHttpRequest;
	  } else {
	    try { return new ActiveXObject('Microsoft.XMLHTTP'); } catch(e) {}
	    try { return new ActiveXObject('Msxml2.XMLHTTP.6.0'); } catch(e) {}
	    try { return new ActiveXObject('Msxml2.XMLHTTP.3.0'); } catch(e) {}
	    try { return new ActiveXObject('Msxml2.XMLHTTP'); } catch(e) {}
	  }
	  throw Error("Browser-only verison of superagent could not find XHR");
	};
	
	/**
	 * Removes leading and trailing whitespace, added to support IE.
	 *
	 * @param {String} s
	 * @return {String}
	 * @api private
	 */
	
	var trim = ''.trim
	  ? function(s) { return s.trim(); }
	  : function(s) { return s.replace(/(^\s*|\s*$)/g, ''); };
	
	/**
	 * Serialize the given `obj`.
	 *
	 * @param {Object} obj
	 * @return {String}
	 * @api private
	 */
	
	function serialize(obj) {
	  if (!isObject(obj)) return obj;
	  var pairs = [];
	  for (var key in obj) {
	    pushEncodedKeyValuePair(pairs, key, obj[key]);
	  }
	  return pairs.join('&');
	}
	
	/**
	 * Helps 'serialize' with serializing arrays.
	 * Mutates the pairs array.
	 *
	 * @param {Array} pairs
	 * @param {String} key
	 * @param {Mixed} val
	 */
	
	function pushEncodedKeyValuePair(pairs, key, val) {
	  if (val != null) {
	    if (Array.isArray(val)) {
	      val.forEach(function(v) {
	        pushEncodedKeyValuePair(pairs, key, v);
	      });
	    } else if (isObject(val)) {
	      for(var subkey in val) {
	        pushEncodedKeyValuePair(pairs, key + '[' + subkey + ']', val[subkey]);
	      }
	    } else {
	      pairs.push(encodeURIComponent(key)
	        + '=' + encodeURIComponent(val));
	    }
	  } else if (val === null) {
	    pairs.push(encodeURIComponent(key));
	  }
	}
	
	/**
	 * Expose serialization method.
	 */
	
	 request.serializeObject = serialize;
	
	 /**
	  * Parse the given x-www-form-urlencoded `str`.
	  *
	  * @param {String} str
	  * @return {Object}
	  * @api private
	  */
	
	function parseString(str) {
	  var obj = {};
	  var pairs = str.split('&');
	  var pair;
	  var pos;
	
	  for (var i = 0, len = pairs.length; i < len; ++i) {
	    pair = pairs[i];
	    pos = pair.indexOf('=');
	    if (pos == -1) {
	      obj[decodeURIComponent(pair)] = '';
	    } else {
	      obj[decodeURIComponent(pair.slice(0, pos))] =
	        decodeURIComponent(pair.slice(pos + 1));
	    }
	  }
	
	  return obj;
	}
	
	/**
	 * Expose parser.
	 */
	
	request.parseString = parseString;
	
	/**
	 * Default MIME type map.
	 *
	 *     superagent.types.xml = 'application/xml';
	 *
	 */
	
	request.types = {
	  html: 'text/html',
	  json: 'application/json',
	  xml: 'application/xml',
	  urlencoded: 'application/x-www-form-urlencoded',
	  'form': 'application/x-www-form-urlencoded',
	  'form-data': 'application/x-www-form-urlencoded'
	};
	
	/**
	 * Default serialization map.
	 *
	 *     superagent.serialize['application/xml'] = function(obj){
	 *       return 'generated xml here';
	 *     };
	 *
	 */
	
	 request.serialize = {
	   'application/x-www-form-urlencoded': serialize,
	   'application/json': JSON.stringify
	 };
	
	 /**
	  * Default parsers.
	  *
	  *     superagent.parse['application/xml'] = function(str){
	  *       return { object parsed from str };
	  *     };
	  *
	  */
	
	request.parse = {
	  'application/x-www-form-urlencoded': parseString,
	  'application/json': JSON.parse
	};
	
	/**
	 * Parse the given header `str` into
	 * an object containing the mapped fields.
	 *
	 * @param {String} str
	 * @return {Object}
	 * @api private
	 */
	
	function parseHeader(str) {
	  var lines = str.split(/\r?\n/);
	  var fields = {};
	  var index;
	  var line;
	  var field;
	  var val;
	
	  lines.pop(); // trailing CRLF
	
	  for (var i = 0, len = lines.length; i < len; ++i) {
	    line = lines[i];
	    index = line.indexOf(':');
	    field = line.slice(0, index).toLowerCase();
	    val = trim(line.slice(index + 1));
	    fields[field] = val;
	  }
	
	  return fields;
	}
	
	/**
	 * Check if `mime` is json or has +json structured syntax suffix.
	 *
	 * @param {String} mime
	 * @return {Boolean}
	 * @api private
	 */
	
	function isJSON(mime) {
	  return /[\/+]json\b/.test(mime);
	}
	
	/**
	 * Return the mime type for the given `str`.
	 *
	 * @param {String} str
	 * @return {String}
	 * @api private
	 */
	
	function type(str){
	  return str.split(/ *; */).shift();
	};
	
	/**
	 * Return header field parameters.
	 *
	 * @param {String} str
	 * @return {Object}
	 * @api private
	 */
	
	function params(str){
	  return str.split(/ *; */).reduce(function(obj, str){
	    var parts = str.split(/ *= */),
	        key = parts.shift(),
	        val = parts.shift();
	
	    if (key && val) obj[key] = val;
	    return obj;
	  }, {});
	};
	
	/**
	 * Initialize a new `Response` with the given `xhr`.
	 *
	 *  - set flags (.ok, .error, etc)
	 *  - parse header
	 *
	 * Examples:
	 *
	 *  Aliasing `superagent` as `request` is nice:
	 *
	 *      request = superagent;
	 *
	 *  We can use the promise-like API, or pass callbacks:
	 *
	 *      request.get('/').end(function(res){});
	 *      request.get('/', function(res){});
	 *
	 *  Sending data can be chained:
	 *
	 *      request
	 *        .post('/user')
	 *        .send({ name: 'tj' })
	 *        .end(function(res){});
	 *
	 *  Or passed to `.send()`:
	 *
	 *      request
	 *        .post('/user')
	 *        .send({ name: 'tj' }, function(res){});
	 *
	 *  Or passed to `.post()`:
	 *
	 *      request
	 *        .post('/user', { name: 'tj' })
	 *        .end(function(res){});
	 *
	 * Or further reduced to a single call for simple cases:
	 *
	 *      request
	 *        .post('/user', { name: 'tj' }, function(res){});
	 *
	 * @param {XMLHTTPRequest} xhr
	 * @param {Object} options
	 * @api private
	 */
	
	function Response(req, options) {
	  options = options || {};
	  this.req = req;
	  this.xhr = this.req.xhr;
	  // responseText is accessible only if responseType is '' or 'text' and on older browsers
	  this.text = ((this.req.method !='HEAD' && (this.xhr.responseType === '' || this.xhr.responseType === 'text')) || typeof this.xhr.responseType === 'undefined')
	     ? this.xhr.responseText
	     : null;
	  this.statusText = this.req.xhr.statusText;
	  this._setStatusProperties(this.xhr.status);
	  this.header = this.headers = parseHeader(this.xhr.getAllResponseHeaders());
	  // getAllResponseHeaders sometimes falsely returns "" for CORS requests, but
	  // getResponseHeader still works. so we get content-type even if getting
	  // other headers fails.
	  this.header['content-type'] = this.xhr.getResponseHeader('content-type');
	  this._setHeaderProperties(this.header);
	  this.body = this.req.method != 'HEAD'
	    ? this._parseBody(this.text ? this.text : this.xhr.response)
	    : null;
	}
	
	/**
	 * Get case-insensitive `field` value.
	 *
	 * @param {String} field
	 * @return {String}
	 * @api public
	 */
	
	Response.prototype.get = function(field){
	  return this.header[field.toLowerCase()];
	};
	
	/**
	 * Set header related properties:
	 *
	 *   - `.type` the content type without params
	 *
	 * A response of "Content-Type: text/plain; charset=utf-8"
	 * will provide you with a `.type` of "text/plain".
	 *
	 * @param {Object} header
	 * @api private
	 */
	
	Response.prototype._setHeaderProperties = function(header){
	  // content-type
	  var ct = this.header['content-type'] || '';
	  this.type = type(ct);
	
	  // params
	  var obj = params(ct);
	  for (var key in obj) this[key] = obj[key];
	};
	
	/**
	 * Parse the given body `str`.
	 *
	 * Used for auto-parsing of bodies. Parsers
	 * are defined on the `superagent.parse` object.
	 *
	 * @param {String} str
	 * @return {Mixed}
	 * @api private
	 */
	
	Response.prototype._parseBody = function(str){
	  var parse = request.parse[this.type];
	  if (!parse && isJSON(this.type)) {
	    parse = request.parse['application/json'];
	  }
	  return parse && str && (str.length || str instanceof Object)
	    ? parse(str)
	    : null;
	};
	
	/**
	 * Set flags such as `.ok` based on `status`.
	 *
	 * For example a 2xx response will give you a `.ok` of __true__
	 * whereas 5xx will be __false__ and `.error` will be __true__. The
	 * `.clientError` and `.serverError` are also available to be more
	 * specific, and `.statusType` is the class of error ranging from 1..5
	 * sometimes useful for mapping respond colors etc.
	 *
	 * "sugar" properties are also defined for common cases. Currently providing:
	 *
	 *   - .noContent
	 *   - .badRequest
	 *   - .unauthorized
	 *   - .notAcceptable
	 *   - .notFound
	 *
	 * @param {Number} status
	 * @api private
	 */
	
	Response.prototype._setStatusProperties = function(status){
	  // handle IE9 bug: http://stackoverflow.com/questions/10046972/msie-returns-status-code-of-1223-for-ajax-request
	  if (status === 1223) {
	    status = 204;
	  }
	
	  var type = status / 100 | 0;
	
	  // status / class
	  this.status = this.statusCode = status;
	  this.statusType = type;
	
	  // basics
	  this.info = 1 == type;
	  this.ok = 2 == type;
	  this.clientError = 4 == type;
	  this.serverError = 5 == type;
	  this.error = (4 == type || 5 == type)
	    ? this.toError()
	    : false;
	
	  // sugar
	  this.accepted = 202 == status;
	  this.noContent = 204 == status;
	  this.badRequest = 400 == status;
	  this.unauthorized = 401 == status;
	  this.notAcceptable = 406 == status;
	  this.notFound = 404 == status;
	  this.forbidden = 403 == status;
	};
	
	/**
	 * Return an `Error` representative of this response.
	 *
	 * @return {Error}
	 * @api public
	 */
	
	Response.prototype.toError = function(){
	  var req = this.req;
	  var method = req.method;
	  var url = req.url;
	
	  var msg = 'cannot ' + method + ' ' + url + ' (' + this.status + ')';
	  var err = new Error(msg);
	  err.status = this.status;
	  err.method = method;
	  err.url = url;
	
	  return err;
	};
	
	/**
	 * Expose `Response`.
	 */
	
	request.Response = Response;
	
	/**
	 * Initialize a new `Request` with the given `method` and `url`.
	 *
	 * @param {String} method
	 * @param {String} url
	 * @api public
	 */
	
	function Request(method, url) {
	  var self = this;
	  this._query = this._query || [];
	  this.method = method;
	  this.url = url;
	  this.header = {}; // preserves header name case
	  this._header = {}; // coerces header names to lowercase
	  this.on('end', function(){
	    var err = null;
	    var res = null;
	
	    try {
	      res = new Response(self);
	    } catch(e) {
	      err = new Error('Parser is unable to parse the response');
	      err.parse = true;
	      err.original = e;
	      // issue #675: return the raw response if the response parsing fails
	      err.rawResponse = self.xhr && self.xhr.responseText ? self.xhr.responseText : null;
	      // issue #876: return the http status code if the response parsing fails
	      err.statusCode = self.xhr && self.xhr.status ? self.xhr.status : null;
	      return self.callback(err);
	    }
	
	    self.emit('response', res);
	
	    var new_err;
	    try {
	      if (res.status < 200 || res.status >= 300) {
	        new_err = new Error(res.statusText || 'Unsuccessful HTTP response');
	        new_err.original = err;
	        new_err.response = res;
	        new_err.status = res.status;
	      }
	    } catch(e) {
	      new_err = e; // #985 touching res may cause INVALID_STATE_ERR on old Android
	    }
	
	    // #1000 don't catch errors from the callback to avoid double calling it
	    if (new_err) {
	      self.callback(new_err, res);
	    } else {
	      self.callback(null, res);
	    }
	  });
	}
	
	/**
	 * Mixin `Emitter` and `requestBase`.
	 */
	
	Emitter(Request.prototype);
	for (var key in requestBase) {
	  Request.prototype[key] = requestBase[key];
	}
	
	/**
	 * Set Content-Type to `type`, mapping values from `request.types`.
	 *
	 * Examples:
	 *
	 *      superagent.types.xml = 'application/xml';
	 *
	 *      request.post('/')
	 *        .type('xml')
	 *        .send(xmlstring)
	 *        .end(callback);
	 *
	 *      request.post('/')
	 *        .type('application/xml')
	 *        .send(xmlstring)
	 *        .end(callback);
	 *
	 * @param {String} type
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.type = function(type){
	  this.set('Content-Type', request.types[type] || type);
	  return this;
	};
	
	/**
	 * Set responseType to `val`. Presently valid responseTypes are 'blob' and
	 * 'arraybuffer'.
	 *
	 * Examples:
	 *
	 *      req.get('/')
	 *        .responseType('blob')
	 *        .end(callback);
	 *
	 * @param {String} val
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.responseType = function(val){
	  this._responseType = val;
	  return this;
	};
	
	/**
	 * Set Accept to `type`, mapping values from `request.types`.
	 *
	 * Examples:
	 *
	 *      superagent.types.json = 'application/json';
	 *
	 *      request.get('/agent')
	 *        .accept('json')
	 *        .end(callback);
	 *
	 *      request.get('/agent')
	 *        .accept('application/json')
	 *        .end(callback);
	 *
	 * @param {String} accept
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.accept = function(type){
	  this.set('Accept', request.types[type] || type);
	  return this;
	};
	
	/**
	 * Set Authorization field value with `user` and `pass`.
	 *
	 * @param {String} user
	 * @param {String} pass
	 * @param {Object} options with 'type' property 'auto' or 'basic' (default 'basic')
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.auth = function(user, pass, options){
	  if (!options) {
	    options = {
	      type: 'basic'
	    }
	  }
	
	  switch (options.type) {
	    case 'basic':
	      var str = btoa(user + ':' + pass);
	      this.set('Authorization', 'Basic ' + str);
	    break;
	
	    case 'auto':
	      this.username = user;
	      this.password = pass;
	    break;
	  }
	  return this;
	};
	
	/**
	* Add query-string `val`.
	*
	* Examples:
	*
	*   request.get('/shoes')
	*     .query('size=10')
	*     .query({ color: 'blue' })
	*
	* @param {Object|String} val
	* @return {Request} for chaining
	* @api public
	*/
	
	Request.prototype.query = function(val){
	  if ('string' != typeof val) val = serialize(val);
	  if (val) this._query.push(val);
	  return this;
	};
	
	/**
	 * Queue the given `file` as an attachment to the specified `field`,
	 * with optional `filename`.
	 *
	 * ``` js
	 * request.post('/upload')
	 *   .attach('content', new Blob(['<a id="a"><b id="b">hey!</b></a>'], { type: "text/html"}))
	 *   .end(callback);
	 * ```
	 *
	 * @param {String} field
	 * @param {Blob|File} file
	 * @param {String} filename
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.attach = function(field, file, filename){
	  this._getFormData().append(field, file, filename || file.name);
	  return this;
	};
	
	Request.prototype._getFormData = function(){
	  if (!this._formData) {
	    this._formData = new root.FormData();
	  }
	  return this._formData;
	};
	
	/**
	 * Invoke the callback with `err` and `res`
	 * and handle arity check.
	 *
	 * @param {Error} err
	 * @param {Response} res
	 * @api private
	 */
	
	Request.prototype.callback = function(err, res){
	  var fn = this._callback;
	  this.clearTimeout();
	  fn(err, res);
	};
	
	/**
	 * Invoke callback with x-domain error.
	 *
	 * @api private
	 */
	
	Request.prototype.crossDomainError = function(){
	  var err = new Error('Request has been terminated\nPossible causes: the network is offline, Origin is not allowed by Access-Control-Allow-Origin, the page is being unloaded, etc.');
	  err.crossDomain = true;
	
	  err.status = this.status;
	  err.method = this.method;
	  err.url = this.url;
	
	  this.callback(err);
	};
	
	/**
	 * Invoke callback with timeout error.
	 *
	 * @api private
	 */
	
	Request.prototype._timeoutError = function(){
	  var timeout = this._timeout;
	  var err = new Error('timeout of ' + timeout + 'ms exceeded');
	  err.timeout = timeout;
	  this.callback(err);
	};
	
	/**
	 * Compose querystring to append to req.url
	 *
	 * @api private
	 */
	
	Request.prototype._appendQueryString = function(){
	  var query = this._query.join('&');
	  if (query) {
	    this.url += ~this.url.indexOf('?')
	      ? '&' + query
	      : '?' + query;
	  }
	};
	
	/**
	 * Initiate request, invoking callback `fn(res)`
	 * with an instanceof `Response`.
	 *
	 * @param {Function} fn
	 * @return {Request} for chaining
	 * @api public
	 */
	
	Request.prototype.end = function(fn){
	  var self = this;
	  var xhr = this.xhr = request.getXHR();
	  var timeout = this._timeout;
	  var data = this._formData || this._data;
	
	  // store callback
	  this._callback = fn || noop;
	
	  // state change
	  xhr.onreadystatechange = function(){
	    if (4 != xhr.readyState) return;
	
	    // In IE9, reads to any property (e.g. status) off of an aborted XHR will
	    // result in the error "Could not complete the operation due to error c00c023f"
	    var status;
	    try { status = xhr.status } catch(e) { status = 0; }
	
	    if (0 == status) {
	      if (self.timedout) return self._timeoutError();
	      if (self._aborted) return;
	      return self.crossDomainError();
	    }
	    self.emit('end');
	  };
	
	  // progress
	  var handleProgress = function(e){
	    if (e.total > 0) {
	      e.percent = e.loaded / e.total * 100;
	    }
	    e.direction = 'download';
	    self.emit('progress', e);
	  };
	  if (this.hasListeners('progress')) {
	    xhr.onprogress = handleProgress;
	  }
	  try {
	    if (xhr.upload && this.hasListeners('progress')) {
	      xhr.upload.onprogress = handleProgress;
	    }
	  } catch(e) {
	    // Accessing xhr.upload fails in IE from a web worker, so just pretend it doesn't exist.
	    // Reported here:
	    // https://connect.microsoft.com/IE/feedback/details/837245/xmlhttprequest-upload-throws-invalid-argument-when-used-from-web-worker-context
	  }
	
	  // timeout
	  if (timeout && !this._timer) {
	    this._timer = setTimeout(function(){
	      self.timedout = true;
	      self.abort();
	    }, timeout);
	  }
	
	  // querystring
	  this._appendQueryString();
	
	  // initiate request
	  if (this.username && this.password) {
	    xhr.open(this.method, this.url, true, this.username, this.password);
	  } else {
	    xhr.open(this.method, this.url, true);
	  }
	
	  // CORS
	  if (this._withCredentials) xhr.withCredentials = true;
	
	  // body
	  if ('GET' != this.method && 'HEAD' != this.method && 'string' != typeof data && !this._isHost(data)) {
	    // serialize stuff
	    var contentType = this._header['content-type'];
	    var serialize = this._serializer || request.serialize[contentType ? contentType.split(';')[0] : ''];
	    if (!serialize && isJSON(contentType)) serialize = request.serialize['application/json'];
	    if (serialize) data = serialize(data);
	  }
	
	  // set header fields
	  for (var field in this.header) {
	    if (null == this.header[field]) continue;
	    xhr.setRequestHeader(field, this.header[field]);
	  }
	
	  if (this._responseType) {
	    xhr.responseType = this._responseType;
	  }
	
	  // send stuff
	  this.emit('request', this);
	
	  // IE11 xhr.send(undefined) sends 'undefined' string as POST payload (instead of nothing)
	  // We need null here if data is undefined
	  xhr.send(typeof data !== 'undefined' ? data : null);
	  return this;
	};
	
	
	/**
	 * Expose `Request`.
	 */
	
	request.Request = Request;
	
	/**
	 * GET `url` with optional callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed|Function} [data] or fn
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.get = function(url, data, fn){
	  var req = request('GET', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.query(data);
	  if (fn) req.end(fn);
	  return req;
	};
	
	/**
	 * HEAD `url` with optional callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed|Function} [data] or fn
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.head = function(url, data, fn){
	  var req = request('HEAD', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.send(data);
	  if (fn) req.end(fn);
	  return req;
	};
	
	/**
	 * OPTIONS query to `url` with optional callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed|Function} [data] or fn
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.options = function(url, data, fn){
	  var req = request('OPTIONS', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.send(data);
	  if (fn) req.end(fn);
	  return req;
	};
	
	/**
	 * DELETE `url` with optional callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	function del(url, fn){
	  var req = request('DELETE', url);
	  if (fn) req.end(fn);
	  return req;
	};
	
	request['del'] = del;
	request['delete'] = del;
	
	/**
	 * PATCH `url` with optional `data` and callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed} [data]
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.patch = function(url, data, fn){
	  var req = request('PATCH', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.send(data);
	  if (fn) req.end(fn);
	  return req;
	};
	
	/**
	 * POST `url` with optional `data` and callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed} [data]
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.post = function(url, data, fn){
	  var req = request('POST', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.send(data);
	  if (fn) req.end(fn);
	  return req;
	};
	
	/**
	 * PUT `url` with optional `data` and callback `fn(res)`.
	 *
	 * @param {String} url
	 * @param {Mixed|Function} [data] or fn
	 * @param {Function} [fn]
	 * @return {Request}
	 * @api public
	 */
	
	request.put = function(url, data, fn){
	  var req = request('PUT', url);
	  if ('function' == typeof data) fn = data, data = null;
	  if (data) req.send(data);
	  if (fn) req.end(fn);
	  return req;
	};


/***/ },
/* 62 */,
/* 63 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.getErrorMessage = getErrorMessage;
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	function getErrorMessage(error, response, langs) {
	    var message = '';
	    if (typeof response != 'undefined') {
	        if (error == null) {
	            var doesResponseIsJson = /^[\],:{}\s]*$/.test(response.text.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''));
	            if (doesResponseIsJson) {
	                var jsonData = JSON.parse(response.text);
	                if (!jsonData.success) {
	                    message = jsonData.message;
	                }
	            } else {
	                message = langs.internal_server_error;
	            }
	        } else {
	            if (response.status == 500) {
	                message = langs.internal_server_error;
	            } else if (response.status == 404) {
	                message = langs.requested_page_not_found;
	            }
	        }
	    } else {
	        message = langs.there_was_a_connecting_problem;
	    }
	    return message;
	}

/***/ },
/* 64 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.fillKeyword = fillKeyword;
	exports.getCombinations = getCombinations;
	exports.searchProducts = searchProducts;
	exports.updateSelectedCombination = updateSelectedCombination;
	exports.setSelectedProduct = setSelectedProduct;
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	var _PosCatalogApi = __webpack_require__(108);
	
	var _PosCatalogApi2 = _interopRequireDefault(_PosCatalogApi);
	
	var _PosProductApi = __webpack_require__(109);
	
	var _PosProductApi2 = _interopRequireDefault(_PosProductApi);
	
	var _PosHandleErrors = __webpack_require__(63);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	function fillKeyword(keyword) {
	    return {
	        type: PosActionType.RECEIVE_KEYWORD,
	        keyword: typeof keyword != 'undefined' ? keyword : '',
	        message: ''
	    };
	}
	
	function receiveCombinations(product, json) {
	    return {
	        type: PosActionType.RECEIVE_COMBINATIONS,
	        combinations: json.data.combinations,
	        product: product
	    };
	}
	
	function shouldFetchCombination(state, idProduct) {
	    if (!state.combinations[idProduct]) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	function getCombinations(product) {
	    return function (dispatch, getState) {
	        if (shouldFetchCombination(getState(), product.id_product)) {
	            dispatch(requestGetCombinations(product));
	            var request = _PosProductApi2.default.getCombinations(product.id_product);
	            request.end(function (error, response) {
	                var errorMessage = (0, _PosHandleErrors.getErrorMessage)(error, response, getState().langs);
	                if (errorMessage != '') {
	                    alert(errorMessage);
	                } else {
	                    dispatch(receiveCombinations(product, JSON.parse(response.text)));
	                }
	            });
	        }
	    };
	}
	
	function requestGetCombinations(product) {
	    return {
	        type: PosActionType.REQUEST_POSTS,
	        isFetching: true,
	        product: product
	
	    };
	}
	
	function receiveSearchProducts(response) {
	    return {
	        type: PosActionType.RECEIVE_SEARCH_PRODUCTS,
	        products: response.data,
	        message: response.message
	    };
	}
	
	function productSuggestionAbortPreviousRequest() {
	    return {
	        type: PosActionType.PRODUCT_SUGGESTION_ABORT_PREVIOUS_REQUEST
	    };
	}
	
	function productSuggestionSetCurrentRequest(request) {
	    return {
	        type: PosActionType.PRODUCT_SUGGESTION_SET_CURRENT_REQUEST,
	        request: request
	    };
	}
	
	function searchProducts(keyword) {
	    return function (dispatch, getState) {
	        // 1. abort previous request
	        dispatch(productSuggestionAbortPreviousRequest());
	        // 2. set up a new request
	        var request = _PosCatalogApi2.default.searchProducts(keyword);
	        // 3. store the new request to store
	        dispatch(productSuggestionSetCurrentRequest(request));
	        // 4. Officially send the request
	        request.end(function (error, response) {
	            var errorMessage = (0, _PosHandleErrors.getErrorMessage)(error, response, getState().langs);
	            if (errorMessage != '') {
	                alert(errorMessage);
	            } else {
	                dispatch(receiveSearchProducts(JSON.parse(response.text)));
	            }
	        });
	    };
	}
	
	function updateSelectedCombination(combinations, selectedProduct) {
	    return {
	        type: PosActionType.UPDATE_SELECTED_COMBINATION,
	        combinations: combinations,
	        product: selectedProduct
	    };
	}
	function setSelectedProduct(product) {
	    return {
	        type: PosActionType.SET_SELECTED_PRODUCT,
	        selectedProduct: product
	    };
	}

/***/ },
/* 65 */
/***/ function(module, exports) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	var MIN_SEARCH_KEYWORD_LENGHT = exports.MIN_SEARCH_KEYWORD_LENGHT = 3;
	var ALLOW_ORDERING_OUT_OF_STOCK_PRODUCTS = exports.ALLOW_ORDERING_OUT_OF_STOCK_PRODUCTS = allowOrderingOfOutOfStockProducts;

/***/ },
/* 66 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	var LANG_KEYS = exports.LANG_KEYS = ['search_for_items', 'click_outside_to_add_items_using_a_barcode_scanner', 'done', 'cancel', 'pick_up_one', 'this_variant_does_not_exist', 'out_of_stock', 'internal_server_error', 'oops_your_session_just_expired', 'there_was_a_connecting_problem', 'requested_page_not_found'];

/***/ },
/* 67 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	exports.default = reducer;
	var INPUT_FOCUSED = 'INPUT_FOCUSED';
	var INPUT_BLURRED = 'INPUT_BLURRED';
	var INPUT_CHANGED = 'INPUT_CHANGED';
	var UPDATE_FOCUSED_SUGGESTION = 'UPDATE_FOCUSED_SUGGESTION';
	var REVEAL_SUGGESTIONS = 'REVEAL_SUGGESTIONS';
	var CLOSE_SUGGESTIONS = 'CLOSE_SUGGESTIONS';
	
	function inputFocused(shouldRenderSuggestions) {
	  return {
	    type: INPUT_FOCUSED,
	    shouldRenderSuggestions: shouldRenderSuggestions
	  };
	}
	
	function inputBlurred(shouldRenderSuggestions) {
	  return {
	    type: INPUT_BLURRED,
	    shouldRenderSuggestions: shouldRenderSuggestions
	  };
	}
	
	function inputChanged(shouldRenderSuggestions, lastAction) {
	  return {
	    type: INPUT_CHANGED,
	    shouldRenderSuggestions: shouldRenderSuggestions,
	    lastAction: lastAction
	  };
	}
	
	function updateFocusedSuggestion(sectionIndex, suggestionIndex, value) {
	  return {
	    type: UPDATE_FOCUSED_SUGGESTION,
	    sectionIndex: sectionIndex,
	    suggestionIndex: suggestionIndex,
	    value: value
	  };
	}
	
	function revealSuggestions() {
	  return {
	    type: REVEAL_SUGGESTIONS
	  };
	}
	
	function closeSuggestions(lastAction) {
	  return {
	    type: CLOSE_SUGGESTIONS,
	    lastAction: lastAction
	  };
	}
	
	var actionCreators = exports.actionCreators = {
	  inputFocused: inputFocused,
	  inputBlurred: inputBlurred,
	  inputChanged: inputChanged,
	  updateFocusedSuggestion: updateFocusedSuggestion,
	  revealSuggestions: revealSuggestions,
	  closeSuggestions: closeSuggestions
	};
	
	function reducer(state, action) {
	  switch (action.type) {
	    case INPUT_FOCUSED:
	      return _extends({}, state, {
	        isFocused: true,
	        isCollapsed: !action.shouldRenderSuggestions
	      });
	
	    case INPUT_BLURRED:
	      return _extends({}, state, {
	        isFocused: false,
	        focusedSectionIndex: null,
	        focusedSuggestionIndex: null,
	        valueBeforeUpDown: null,
	        isCollapsed: !action.shouldRenderSuggestions
	      });
	
	    case INPUT_CHANGED:
	      return _extends({}, state, {
	        focusedSectionIndex: null,
	        focusedSuggestionIndex: null,
	        valueBeforeUpDown: null,
	        isCollapsed: !action.shouldRenderSuggestions,
	        lastAction: action.lastAction
	      });
	
	    case UPDATE_FOCUSED_SUGGESTION:
	      {
	        var value = action.value;
	        var sectionIndex = action.sectionIndex;
	        var suggestionIndex = action.suggestionIndex;
	        var valueBeforeUpDown = state.valueBeforeUpDown;
	
	
	        if (suggestionIndex === null) {
	          valueBeforeUpDown = null;
	        } else if (valueBeforeUpDown === null && typeof value !== 'undefined') {
	          valueBeforeUpDown = value;
	        }
	
	        return _extends({}, state, {
	          focusedSectionIndex: sectionIndex,
	          focusedSuggestionIndex: suggestionIndex,
	          valueBeforeUpDown: valueBeforeUpDown
	        });
	      }
	
	    case REVEAL_SUGGESTIONS:
	      return _extends({}, state, {
	        isCollapsed: false
	      });
	
	    case CLOSE_SUGGESTIONS:
	      return _extends({}, state, {
	        focusedSectionIndex: null,
	        focusedSuggestionIndex: null,
	        valueBeforeUpDown: null,
	        isCollapsed: true,
	        lastAction: action.lastAction
	      });
	
	    default:
	      return state;
	  }
	}

/***/ },
/* 68 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _events = __webpack_require__(246);
	
	var _events2 = _interopRequireDefault(_events);
	
	var _Header = __webpack_require__(142);
	
	var _Header2 = _interopRequireDefault(_Header);
	
	var _Footer = __webpack_require__(141);
	
	var _Footer2 = _interopRequireDefault(_Footer);
	
	var _Input = __webpack_require__(143);
	
	var _Input2 = _interopRequireDefault(_Input);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var EventEmitter = _events2.default.EventEmitter,
	    SHOW_EVENT = 'show',
	    CLOSE_EVENT = 'close',
	    _props = {},
	    _initialState = {},
	    Manager,
	    Component;
	
	Manager = _extends({}, EventEmitter.prototype, {
	
	    id: 1,
	
	    popups: {},
	
	    queue: [],
	
	    active: null,
	
	    value: null,
	
	    getId: function getId() {
	        return 'id_' + this.id++;
	    },
	
	    activePopup: function activePopup() {
	        return this.popups[this.active];
	    },
	
	    close: function close() {
	        if (!this.active) {
	            return false;
	        }
	
	        var id = this.active;
	        this.active = null;
	
	        this.emit(CLOSE_EVENT);
	        this.dispatch();
	
	        this.value = null;
	
	        return id;
	    },
	
	    dispatch: function dispatch() {
	        if (this.active || this.queue.length < 1) {
	            return false;
	        }
	
	        var id = this.queue.shift();
	
	        /** Set active */
	        this.active = id;
	
	        this.emit(SHOW_EVENT);
	    }
	
	});
	
	Component = _react2.default.createClass({
	
	    displayName: 'Popup',
	
	    getInitialState: function getInitialState() {
	        var state = {
	            'title': null,
	            'buttons': false,
	            'content': null,
	            'visible': false,
	            'className': null,
	            'noOverlay': false,
	            'position': false,
	            'wildClasses': false
	        };
	
	        _initialState = state;
	
	        return state;
	    },
	
	    getDefaultProps: function getDefaultProps() {
	        return {
	            'className': 'mm-popup',
	            'btnClass': 'mm-popup__btn',
	            'inputClass': 'mm-popup__input',
	            'closeBtn': true,
	            'closeHtml': null,
	            'defaultOk': 'Ok',
	            'defaultCancel': 'Cancel'
	        };
	    },
	
	    statics: {
	
	        plugins: {},
	
	        addShowListener: function addShowListener(callback) {
	            Manager.on(SHOW_EVENT, callback);
	        },
	
	        removeShowListener: function removeShowListener(callback) {
	            Manager.removeListener(SHOW_EVENT, callback);
	        },
	
	        addCloseListener: function addCloseListener(callback) {
	            Manager.on(CLOSE_EVENT, callback);
	        },
	
	        removeCloseListener: function removeCloseListener(callback) {
	            Manager.removeListener(CLOSE_EVENT, callback);
	        },
	
	        register: function register(data) {
	            var id = Manager.getId();
	
	            data = _extends({}, _initialState, data);
	
	            Manager.popups[id] = data;
	
	            return id;
	        },
	
	        queue: function queue(id) {
	            if (!Manager.popups.hasOwnProperty(id)) {
	                return false;
	            }
	
	            /** Add popup to queue */
	            Manager.queue.push(id);
	
	            /** Dispatch queue */
	            Manager.dispatch();
	
	            return id;
	        },
	
	        create: function create(data) {
	            /** Register popup */
	            var id = this.register(data);
	
	            /** Queue popup */
	            this.queue(id);
	
	            return id;
	        },
	
	        alert: function alert(text, title, noQueue) {
	            var data = {
	                title: title,
	                content: text,
	                buttons: {
	                    right: ['ok']
	                }
	            };
	
	            if (noQueue) {
	                return this.register(data);
	            }
	
	            return this.create(data);
	        },
	
	        prompt: function prompt(title, text, inputAttributes, okBtn, noQueue) {
	            if (!okBtn) {
	                okBtn = 'ok';
	            }
	
	            inputAttributes || (inputAttributes = {
	                value: '',
	                placeholder: '',
	                type: 'text'
	            });
	
	            function onChange(value) {
	                Manager.value = value;
	            }
	
	            var content, data;
	
	            if (text) {
	                text = _react2.default.createElement(
	                    'p',
	                    null,
	                    text
	                );
	            }
	
	            content = _react2.default.createElement(
	                'div',
	                null,
	                text,
	                _react2.default.createElement(_Input2.default, { value: inputAttributes.value, placeholder: inputAttributes.placeholder, type: inputAttributes.type, className: _props.inputClass, onChange: onChange })
	            );
	
	            var data = {
	                title: title,
	                content: content,
	                buttons: {
	                    left: ['cancel'],
	                    right: [okBtn]
	                }
	            };
	
	            if (noQueue) {
	                return this.register(data);
	            }
	
	            return this.create(data);
	        },
	
	        close: function close() {
	            Manager.close();
	        },
	
	        getValue: function getValue() {
	            return Manager.value;
	        },
	
	        registerPlugin: function registerPlugin(name, callback) {
	            this.plugins[name] = callback.bind(this);
	        }
	
	    },
	
	    componentDidMount: function componentDidMount() {
	        var _this = this,
	            popup;
	
	        Manager.on(SHOW_EVENT, function () {
	            popup = Manager.activePopup();
	
	            _this.setState({
	                title: popup.title,
	                content: popup.content,
	                buttons: popup.buttons,
	                visible: true,
	                className: popup.className,
	                noOverlay: popup.noOverlay,
	                position: popup.position
	            });
	        });
	
	        _props = this.props;
	
	        Manager.on(CLOSE_EVENT, function () {
	            _this.setState(_this.getInitialState());
	        });
	    },
	
	    componentDidUpdate: function componentDidUpdate() {
	        var box = this.refs.box;
	
	        if (!box) {
	            return;
	        }
	
	        if (!this.state.position) {
	            box.style.opacity = 1;
	            box.style.top = null;
	            box.style.left = null;
	            box.style.margin = null;
	
	            return false;
	        }
	
	        if (typeof this.state.position === 'function') {
	            return this.state.position.call(null, box);
	        }
	
	        box.style.top = parseInt(this.state.position.y, 10) + 'px';
	        box.style.left = parseInt(this.state.position.x, 10) + 'px';
	        box.style.margin = 0;
	        box.style.opacity = 1;
	    },
	
	    hasClass: function hasClass(element, className) {
	        if (element.classList) {
	            return !!className && element.classList.contains(className);
	        }
	
	        return (' ' + element.className + ' ').indexOf(' ' + className + ' ') > -1;
	    },
	
	    className: function className(_className) {
	        return this.props.className + '__' + _className;
	    },
	
	    wildClass: function wildClass(className, base) {
	        if (!className) {
	            return null;
	        }
	
	        if (this.props.wildClasses) {
	            return className;
	        }
	
	        var finalClass = [],
	            classNames = className.split(' ');
	
	        classNames.forEach(function (className) {
	            finalClass.push(base + '--' + className);
	        });
	
	        return finalClass.join(' ');
	    },
	
	    onClose: function onClose() {
	        Manager.close();
	    },
	
	    handleButtonClick: function handleButtonClick(action) {
	        if (typeof action === 'function') {
	            return action.call(this, Manager);
	        }
	    },
	
	    containerClick: function containerClick(e) {
	        if (this.hasClass(e.target, this.props.className)) {
	            this.onClose();
	        }
	    },
	
	    render: function render() {
	        var className = this.props.className,
	            box,
	            closeBtn,
	            overlayStyle = {},
	            boxClass;
	
	        if (this.state.visible) {
	            className += ' ' + this.props.className + '--visible';
	
	            if (this.props.closeBtn) {
	                closeBtn = _react2.default.createElement(
	                    'button',
	                    { onClick: this.onClose, className: this.props.className + '__close' },
	                    this.props.closeHtml
	                );
	            }
	
	            boxClass = this.className('box');
	
	            if (this.state.className) {
	                boxClass += ' ' + this.wildClass(this.state.className, boxClass);
	            }
	
	            box = _react2.default.createElement(
	                'article',
	                { ref: 'box', style: { opacity: 0 }, className: boxClass },
	                closeBtn,
	                _react2.default.createElement(_Header2.default, { title: this.state.title, className: this.className('box__header') }),
	                _react2.default.createElement(
	                    'div',
	                    { className: this.className('box__body') },
	                    this.state.content
	                ),
	                _react2.default.createElement(_Footer2.default, {
	                    className: this.className('box__footer'),
	                    wildClasses: this.props.wildClasses,
	                    btnClass: this.props.btnClass,
	                    buttonClick: this.handleButtonClick,
	                    onClose: this.onClose,
	                    onOk: this.onClose,
	                    defaultOk: this.props.defaultOk,
	                    defaultCancel: this.props.defaultCancel,
	                    buttons: this.state.buttons })
	            );
	        }
	
	        if (this.state.noOverlay) {
	            overlayStyle.background = 'transparent';
	        }
	
	        return _react2.default.createElement(
	            'div',
	            { onClick: this.containerClick, className: className, style: overlayStyle },
	            box
	        );
	    }
	
	});
	
	exports.default = Component;

/***/ },
/* 69 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	
	var _react = __webpack_require__(4);
	
	exports["default"] = _react.PropTypes.shape({
	  subscribe: _react.PropTypes.func.isRequired,
	  dispatch: _react.PropTypes.func.isRequired,
	  getState: _react.PropTypes.func.isRequired
	});

/***/ },
/* 70 */
/***/ function(module, exports) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = warning;
	/**
	 * Prints a warning in the console if it exists.
	 *
	 * @param {String} message The warning message.
	 * @returns {void}
	 */
	function warning(message) {
	  /* eslint-disable no-console */
	  if (typeof console !== 'undefined' && typeof console.error === 'function') {
	    console.error(message);
	  }
	  /* eslint-enable no-console */
	  try {
	    // This error was thrown as a convenience so that you can use this stack
	    // to find the callsite that caused this warning to fire.
	    throw new Error(message);
	    /* eslint-disable no-empty */
	  } catch (e) {}
	  /* eslint-enable no-empty */
	}

/***/ },
/* 71 */,
/* 72 */,
/* 73 */,
/* 74 */,
/* 75 */,
/* 76 */,
/* 77 */,
/* 78 */,
/* 79 */,
/* 80 */,
/* 81 */,
/* 82 */,
/* 83 */,
/* 84 */,
/* 85 */,
/* 86 */,
/* 87 */,
/* 88 */,
/* 89 */,
/* 90 */,
/* 91 */,
/* 92 */,
/* 93 */,
/* 94 */,
/* 95 */,
/* 96 */,
/* 97 */,
/* 98 */,
/* 99 */,
/* 100 */,
/* 101 */
/***/ function(module, exports) {

	"use strict";
	
	exports.__esModule = true;
	exports["default"] = compose;
	/**
	 * Composes single-argument functions from right to left. The rightmost
	 * function can take multiple arguments as it provides the signature for
	 * the resulting composite function.
	 *
	 * @param {...Function} funcs The functions to compose.
	 * @returns {Function} A function obtained by composing the argument functions
	 * from right to left. For example, compose(f, g, h) is identical to doing
	 * (...args) => f(g(h(...args))).
	 */
	
	function compose() {
	  for (var _len = arguments.length, funcs = Array(_len), _key = 0; _key < _len; _key++) {
	    funcs[_key] = arguments[_key];
	  }
	
	  if (funcs.length === 0) {
	    return function (arg) {
	      return arg;
	    };
	  } else {
	    var _ret = function () {
	      var last = funcs[funcs.length - 1];
	      var rest = funcs.slice(0, -1);
	      return {
	        v: function v() {
	          return rest.reduceRight(function (composed, f) {
	            return f(composed);
	          }, last.apply(undefined, arguments));
	        }
	      };
	    }();
	
	    if (typeof _ret === "object") return _ret.v;
	  }
	}

/***/ },
/* 102 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports.ActionTypes = undefined;
	exports["default"] = createStore;
	
	var _isPlainObject = __webpack_require__(104);
	
	var _isPlainObject2 = _interopRequireDefault(_isPlainObject);
	
	var _symbolObservable = __webpack_require__(241);
	
	var _symbolObservable2 = _interopRequireDefault(_symbolObservable);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	/**
	 * These are private action types reserved by Redux.
	 * For any unknown actions, you must return the current state.
	 * If the current state is undefined, you must return the initial state.
	 * Do not reference these action types directly in your code.
	 */
	var ActionTypes = exports.ActionTypes = {
	  INIT: '@@redux/INIT'
	};
	
	/**
	 * Creates a Redux store that holds the state tree.
	 * The only way to change the data in the store is to call `dispatch()` on it.
	 *
	 * There should only be a single store in your app. To specify how different
	 * parts of the state tree respond to actions, you may combine several reducers
	 * into a single reducer function by using `combineReducers`.
	 *
	 * @param {Function} reducer A function that returns the next state tree, given
	 * the current state tree and the action to handle.
	 *
	 * @param {any} [initialState] The initial state. You may optionally specify it
	 * to hydrate the state from the server in universal apps, or to restore a
	 * previously serialized user session.
	 * If you use `combineReducers` to produce the root reducer function, this must be
	 * an object with the same shape as `combineReducers` keys.
	 *
	 * @param {Function} enhancer The store enhancer. You may optionally specify it
	 * to enhance the store with third-party capabilities such as middleware,
	 * time travel, persistence, etc. The only store enhancer that ships with Redux
	 * is `applyMiddleware()`.
	 *
	 * @returns {Store} A Redux store that lets you read the state, dispatch actions
	 * and subscribe to changes.
	 */
	function createStore(reducer, initialState, enhancer) {
	  var _ref2;
	
	  if (typeof initialState === 'function' && typeof enhancer === 'undefined') {
	    enhancer = initialState;
	    initialState = undefined;
	  }
	
	  if (typeof enhancer !== 'undefined') {
	    if (typeof enhancer !== 'function') {
	      throw new Error('Expected the enhancer to be a function.');
	    }
	
	    return enhancer(createStore)(reducer, initialState);
	  }
	
	  if (typeof reducer !== 'function') {
	    throw new Error('Expected the reducer to be a function.');
	  }
	
	  var currentReducer = reducer;
	  var currentState = initialState;
	  var currentListeners = [];
	  var nextListeners = currentListeners;
	  var isDispatching = false;
	
	  function ensureCanMutateNextListeners() {
	    if (nextListeners === currentListeners) {
	      nextListeners = currentListeners.slice();
	    }
	  }
	
	  /**
	   * Reads the state tree managed by the store.
	   *
	   * @returns {any} The current state tree of your application.
	   */
	  function getState() {
	    return currentState;
	  }
	
	  /**
	   * Adds a change listener. It will be called any time an action is dispatched,
	   * and some part of the state tree may potentially have changed. You may then
	   * call `getState()` to read the current state tree inside the callback.
	   *
	   * You may call `dispatch()` from a change listener, with the following
	   * caveats:
	   *
	   * 1. The subscriptions are snapshotted just before every `dispatch()` call.
	   * If you subscribe or unsubscribe while the listeners are being invoked, this
	   * will not have any effect on the `dispatch()` that is currently in progress.
	   * However, the next `dispatch()` call, whether nested or not, will use a more
	   * recent snapshot of the subscription list.
	   *
	   * 2. The listener should not expect to see all state changes, as the state
	   * might have been updated multiple times during a nested `dispatch()` before
	   * the listener is called. It is, however, guaranteed that all subscribers
	   * registered before the `dispatch()` started will be called with the latest
	   * state by the time it exits.
	   *
	   * @param {Function} listener A callback to be invoked on every dispatch.
	   * @returns {Function} A function to remove this change listener.
	   */
	  function subscribe(listener) {
	    if (typeof listener !== 'function') {
	      throw new Error('Expected listener to be a function.');
	    }
	
	    var isSubscribed = true;
	
	    ensureCanMutateNextListeners();
	    nextListeners.push(listener);
	
	    return function unsubscribe() {
	      if (!isSubscribed) {
	        return;
	      }
	
	      isSubscribed = false;
	
	      ensureCanMutateNextListeners();
	      var index = nextListeners.indexOf(listener);
	      nextListeners.splice(index, 1);
	    };
	  }
	
	  /**
	   * Dispatches an action. It is the only way to trigger a state change.
	   *
	   * The `reducer` function, used to create the store, will be called with the
	   * current state tree and the given `action`. Its return value will
	   * be considered the **next** state of the tree, and the change listeners
	   * will be notified.
	   *
	   * The base implementation only supports plain object actions. If you want to
	   * dispatch a Promise, an Observable, a thunk, or something else, you need to
	   * wrap your store creating function into the corresponding middleware. For
	   * example, see the documentation for the `redux-thunk` package. Even the
	   * middleware will eventually dispatch plain object actions using this method.
	   *
	   * @param {Object} action A plain object representing “what changed”. It is
	   * a good idea to keep actions serializable so you can record and replay user
	   * sessions, or use the time travelling `redux-devtools`. An action must have
	   * a `type` property which may not be `undefined`. It is a good idea to use
	   * string constants for action types.
	   *
	   * @returns {Object} For convenience, the same action object you dispatched.
	   *
	   * Note that, if you use a custom middleware, it may wrap `dispatch()` to
	   * return something else (for example, a Promise you can await).
	   */
	  function dispatch(action) {
	    if (!(0, _isPlainObject2["default"])(action)) {
	      throw new Error('Actions must be plain objects. ' + 'Use custom middleware for async actions.');
	    }
	
	    if (typeof action.type === 'undefined') {
	      throw new Error('Actions may not have an undefined "type" property. ' + 'Have you misspelled a constant?');
	    }
	
	    if (isDispatching) {
	      throw new Error('Reducers may not dispatch actions.');
	    }
	
	    try {
	      isDispatching = true;
	      currentState = currentReducer(currentState, action);
	    } finally {
	      isDispatching = false;
	    }
	
	    var listeners = currentListeners = nextListeners;
	    for (var i = 0; i < listeners.length; i++) {
	      listeners[i]();
	    }
	
	    return action;
	  }
	
	  /**
	   * Replaces the reducer currently used by the store to calculate the state.
	   *
	   * You might need this if your app implements code splitting and you want to
	   * load some of the reducers dynamically. You might also need this if you
	   * implement a hot reloading mechanism for Redux.
	   *
	   * @param {Function} nextReducer The reducer for the store to use instead.
	   * @returns {void}
	   */
	  function replaceReducer(nextReducer) {
	    if (typeof nextReducer !== 'function') {
	      throw new Error('Expected the nextReducer to be a function.');
	    }
	
	    currentReducer = nextReducer;
	    dispatch({ type: ActionTypes.INIT });
	  }
	
	  /**
	   * Interoperability point for observable/reactive libraries.
	   * @returns {observable} A minimal observable of state changes.
	   * For more information, see the observable proposal:
	   * https://github.com/zenparsing/es-observable
	   */
	  function observable() {
	    var _ref;
	
	    var outerSubscribe = subscribe;
	    return _ref = {
	      /**
	       * The minimal observable subscription method.
	       * @param {Object} observer Any object that can be used as an observer.
	       * The observer object should have a `next` method.
	       * @returns {subscription} An object with an `unsubscribe` method that can
	       * be used to unsubscribe the observable from the store, and prevent further
	       * emission of values from the observable.
	       */
	
	      subscribe: function subscribe(observer) {
	        if (typeof observer !== 'object') {
	          throw new TypeError('Expected the observer to be an object.');
	        }
	
	        function observeState() {
	          if (observer.next) {
	            observer.next(getState());
	          }
	        }
	
	        observeState();
	        var unsubscribe = outerSubscribe(observeState);
	        return { unsubscribe: unsubscribe };
	      }
	    }, _ref[_symbolObservable2["default"]] = function () {
	      return this;
	    }, _ref;
	  }
	
	  // When a store is created, an "INIT" action is dispatched so that every
	  // reducer returns their initial state. This effectively populates
	  // the initial state tree.
	  dispatch({ type: ActionTypes.INIT });
	
	  return _ref2 = {
	    dispatch: dispatch,
	    subscribe: subscribe,
	    getState: getState,
	    replaceReducer: replaceReducer
	  }, _ref2[_symbolObservable2["default"]] = observable, _ref2;
	}

/***/ },
/* 103 */
/***/ function(module, exports) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = warning;
	/**
	 * Prints a warning in the console if it exists.
	 *
	 * @param {String} message The warning message.
	 * @returns {void}
	 */
	function warning(message) {
	  /* eslint-disable no-console */
	  if (typeof console !== 'undefined' && typeof console.error === 'function') {
	    console.error(message);
	  }
	  /* eslint-enable no-console */
	  try {
	    // This error was thrown as a convenience so that if you enable
	    // "break on all exceptions" in your console,
	    // it would pause the execution at this line.
	    throw new Error(message);
	    /* eslint-disable no-empty */
	  } catch (e) {}
	  /* eslint-enable no-empty */
	}

/***/ },
/* 104 */
[248, 237, 238, 240],
/* 105 */
/***/ function(module, exports) {

	/**
	 * Check if `obj` is an object.
	 *
	 * @param {Object} obj
	 * @return {Boolean}
	 * @api private
	 */
	
	function isObject(obj) {
	  return null !== obj && 'object' === typeof obj;
	}
	
	module.exports = isObject;


/***/ },
/* 106 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.receiveLang = receiveLang;
	exports.getTranslations = getTranslations;
	
	var _PosApi = __webpack_require__(107);
	
	var _PosApi2 = _interopRequireDefault(_PosApi);
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActions = _interopRequireWildcard(_PosActionType);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	var _PosLang = __webpack_require__(66);
	
	var _PosHandleErrors = __webpack_require__(63);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function receiveLang(json) {
	    return {
	        type: PosActions.RECEIVE_LANG,
	        langs: json.data
	    };
	} /**
	   * RockPOS - Point of Sale for PrestaShop
	   *
	   * @author    Hamsa Technologies
	   * @copyright Hamsa Technologies
	   * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	   */
	
	function getTranslations() {
	    return function (dispatch, getState) {
	        var request = _PosApi2.default.getTranslations(_PosLang.LANG_KEYS);
	        request.end(function (error, response) {
	            var errorMessage = (0, _PosHandleErrors.getErrorMessage)(error, response, getState().langs);
	            if (errorMessage != '') {
	                alert(errorMessage);
	            } else {
	                dispatch(receiveLang(JSON.parse(response.text)));
	            }
	        });
	    };
	}

/***/ },
/* 107 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	var _superagent = __webpack_require__(61);
	
	var _superagent2 = _interopRequireDefault(_superagent);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	exports.default = {
	  getTranslations: function getTranslations(keys) {
	    var data = new FormData();
	    data.append("ajax", 1);
	    data.append("action", PosActionType.GET_TRANSLATION_KEYS);
	    data.append("keys", JSON.stringify(keys));
	    return _superagent2.default.post(window.location.href).send(data);
	  }
	};

/***/ },
/* 108 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	var _superagent = __webpack_require__(61);
	
	var _superagent2 = _interopRequireDefault(_superagent);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	exports.default = {
	    searchProducts: function searchProducts(value) {
	        var data = new FormData();
	        data.append("ajax", 1);
	        data.append("keyword", value);
	        data.append("action", PosActionType.SEARCH_PRODUCTS);
	        return _superagent2.default.post(window.location.href).send(data);
	    }
	};

/***/ },
/* 109 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	var _superagent = __webpack_require__(61);
	
	var _superagent2 = _interopRequireDefault(_superagent);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	exports.default = {
	  getCombinations: function getCombinations(idProduct) {
	    var data = new FormData();
	    data.append("ajax", 1);
	    data.append("action", PosActionType.GET_COMBINATIONS);
	    data.append("id_product", parseInt(idProduct));
	    return _superagent2.default.post(window.location.href).send(data);
	  }
	};

/***/ },
/* 110 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosCombinationsCompoment = function (_Component) {
	    _inherits(PosCombinationsCompoment, _Component);
	
	    function PosCombinationsCompoment() {
	        _classCallCheck(this, PosCombinationsCompoment);
	
	        return _possibleConstructorReturn(this, Object.getPrototypeOf(PosCombinationsCompoment).apply(this, arguments));
	    }
	
	    _createClass(PosCombinationsCompoment, [{
	        key: 'onClick',
	        value: function onClick(name, attribute) {
	            var selectedAttribute = {};
	            selectedAttribute[name] = attribute;
	            this.props.onChangeAttribute(selectedAttribute);
	        }
	    }, {
	        key: 'render',
	        value: function render() {
	            var _this2 = this;
	
	            var _props = this.props;
	            var name = _props.name;
	            var attributes = _props.attributes;
	            var selectedAttribute = _props.selectedAttribute;
	            var quantity = _props.quantity;
	
	
	            var classBlock = 'attribute-list';
	            if (attributes[0]['color'] != '') {
	                classBlock = 'attribute-list color-block';
	            }
	
	            var attributeList = attributes.map(function (attribute) {
	                var selectedClass = '';
	                if (selectedAttribute == attribute.id_attribute) {
	                    selectedClass = 'selected';
	                }
	                if (attribute.image != '') {
	                    return _react2.default.createElement(
	                        'li',
	                        {
	                            className: selectedClass,
	                            alt: attribute.value },
	                        _react2.default.createElement('img', { src: attribute.image,
	                            onClick: _this2.onClick.bind(_this2, name, attribute)
	                        })
	                    );
	                } else if (attribute.color != '') {
	                    var style = {
	                        'backgroundColor': attribute.color
	                    };
	                    return _react2.default.createElement(
	                        'li',
	                        {
	                            className: selectedClass,
	                            alt: attribute.value,
	                            key: attribute.id_attribute,
	                            onClick: _this2.onClick.bind(_this2, name, attribute)
	                        },
	                        _react2.default.createElement(
	                            'div',
	                            { style: style },
	                            attribute.value
	                        )
	                    );
	                } else {
	                    return _react2.default.createElement(
	                        'li',
	                        {
	                            className: selectedClass,
	                            alt: attribute.value,
	                            key: attribute.id_attribute,
	                            onClick: _this2.onClick.bind(_this2, name, attribute)
	                        },
	                        _react2.default.createElement(
	                            'span',
	                            null,
	                            attribute.value
	                        )
	                    );
	                }
	            });
	
	            return _react2.default.createElement(
	                'div',
	                { className: classBlock },
	                _react2.default.createElement(
	                    'div',
	                    { className: 'attribute-title' },
	                    name
	                ),
	                _react2.default.createElement(
	                    'ul',
	                    null,
	                    attributeList
	                )
	            );
	        }
	    }]);
	
	    return PosCombinationsCompoment;
	}(_react.Component);
	
	exports.default = PosCombinationsCompoment;

/***/ },
/* 111 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _PosAttributeGroupComponent = __webpack_require__(110);
	
	var _PosAttributeGroupComponent2 = _interopRequireDefault(_PosAttributeGroupComponent);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosAttributeGroupListComponent = function (_Component) {
	    _inherits(PosAttributeGroupListComponent, _Component);
	
	    function PosAttributeGroupListComponent() {
	        _classCallCheck(this, PosAttributeGroupListComponent);
	
	        return _possibleConstructorReturn(this, Object.getPrototypeOf(PosAttributeGroupListComponent).apply(this, arguments));
	    }
	
	    _createClass(PosAttributeGroupListComponent, [{
	        key: 'render',
	        value: function render() {
	            var PosAttributeGroupList = [];
	            var _props = this.props;
	            var attributeGroupList = _props.attributeGroupList;
	            var onChangeAttribute = _props.onChangeAttribute;
	            var selectedCombination = _props.selectedCombination;
	
	            for (var groupName in attributeGroupList) {
	                if (this.props.attributeGroupList.hasOwnProperty(groupName)) {
	                    var group = {
	                        name: groupName,
	                        attributes: attributeGroupList[groupName],
	                        position: attributeGroupList[groupName][0]['position']
	                    };
	                    PosAttributeGroupList.push(group);
	                }
	            };
	
	            var defaultAttributes = [];
	            for (var i in selectedCombination['attribute_groups']) {
	                defaultAttributes.push(selectedCombination['attribute_groups'][i]['id_attribute']);
	            }
	            PosAttributeGroupList.sort(function (a, b) {
	                return parseFloat(a.position) - parseFloat(b.position);
	            });
	            var PosAttributeGroupListContent = PosAttributeGroupList.map(function (PosAttributeGroup) {
	                var selectedAttribute = '';
	                for (var j in PosAttributeGroup.attributes) {
	                    if (defaultAttributes.indexOf(PosAttributeGroup.attributes[j]['id_attribute']) >= 0) {
	                        selectedAttribute = PosAttributeGroup.attributes[j]['id_attribute'];
	                    }
	                }
	
	                return _react2.default.createElement(_PosAttributeGroupComponent2.default, {
	                    selectedAttribute: selectedAttribute,
	                    name: PosAttributeGroup.name,
	                    attributes: PosAttributeGroup.attributes,
	                    onChangeAttribute: onChangeAttribute
	                });
	            });
	
	            return _react2.default.createElement(
	                'div',
	                { id: 'combination_selection' },
	                PosAttributeGroupListContent
	            );
	        }
	    }]);
	
	    return PosAttributeGroupListComponent;
	}(_react.Component);
	
	exports.default = PosAttributeGroupListComponent;

/***/ },
/* 112 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosButtonComponent = function (_Component) {
	  _inherits(PosButtonComponent, _Component);
	
	  function PosButtonComponent() {
	    _classCallCheck(this, PosButtonComponent);
	
	    return _possibleConstructorReturn(this, Object.getPrototypeOf(PosButtonComponent).apply(this, arguments));
	  }
	
	  _createClass(PosButtonComponent, [{
	    key: 'render',
	    value: function render() {
	      var _props = this.props;
	      var title = _props.title;
	      var btnClass = _props.btnClass;
	      var addToCart = _props.addToCart;
	
	      return _react2.default.createElement(
	        'button',
	        { disabled: typeof addToCart == 'undefined' ? false : addToCart ? false : true, onClick: this.props.onClick, className: btnClass },
	        title
	      );
	    }
	  }]);
	
	  return PosButtonComponent;
	}(_react.Component);
	
	exports.default = PosButtonComponent;

/***/ },
/* 113 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _PosAttributeGroupListComponent = __webpack_require__(111);
	
	var _PosAttributeGroupListComponent2 = _interopRequireDefault(_PosAttributeGroupListComponent);
	
	var _reactPopup = __webpack_require__(68);
	
	var _reactPopup2 = _interopRequireDefault(_reactPopup);
	
	var _PosButtonComponent = __webpack_require__(112);
	
	var _PosButtonComponent2 = _interopRequireDefault(_PosButtonComponent);
	
	var _PosCombinationsHeadComponent = __webpack_require__(114);
	
	var _PosCombinationsHeadComponent2 = _interopRequireDefault(_PosCombinationsHeadComponent);
	
	var _PosMessage = __webpack_require__(116);
	
	var _PosMessage2 = _interopRequireDefault(_PosMessage);
	
	var _PosLoadingComponent = __webpack_require__(115);
	
	var _PosLoadingComponent2 = _interopRequireDefault(_PosLoadingComponent);
	
	var _PosContants = __webpack_require__(65);
	
	var _PosProductActions = __webpack_require__(64);
	
	var _jsonStableStringify = __webpack_require__(126);
	
	var _jsonStableStringify2 = _interopRequireDefault(_jsonStableStringify);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosCombinationsComponent = function (_Component) {
	    _inherits(PosCombinationsComponent, _Component);
	
	    function PosCombinationsComponent() {
	        _classCallCheck(this, PosCombinationsComponent);
	
	        var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(PosCombinationsComponent).apply(this, arguments));
	
	        _this.onChangeAttribute = _this.onChangeAttribute.bind(_this);
	        return _this;
	    }
	
	    _createClass(PosCombinationsComponent, [{
	        key: 'formatCombinations',
	        value: function formatCombinations(combinations) {
	            var attributeGroupList = {};
	            for (var idProductAttribute in combinations) {
	                for (var groupName in combinations[idProductAttribute]['attribute_groups']) {
	                    if (!attributeGroupList.hasOwnProperty(groupName)) {
	                        attributeGroupList[groupName] = [];
	                    }
	                }
	            }
	
	            var addedAttributes = [];
	            for (var _idProductAttribute in combinations) {
	                for (var _groupName in attributeGroupList) {
	                    if (combinations[_idProductAttribute]['attribute_groups'].hasOwnProperty(_groupName)) {
	                        if (addedAttributes.indexOf(combinations[_idProductAttribute]['attribute_groups'][_groupName]['id_attribute']) == -1) {
	                            attributeGroupList[_groupName].push(combinations[_idProductAttribute]['attribute_groups'][_groupName]);
	                            addedAttributes.push(combinations[_idProductAttribute]['attribute_groups'][_groupName]['id_attribute']);
	                        }
	                    }
	                }
	            }
	            return attributeGroupList;
	        }
	    }, {
	        key: 'onClickCancel',
	        value: function onClickCancel() {
	            _reactPopup2.default.close();
	        }
	    }, {
	        key: 'onChangeAttribute',
	        value: function onChangeAttribute(attribute) {
	            var _props = this.props;
	            var selectedCombination = _props.selectedCombination;
	            var selectedProduct = _props.selectedProduct;
	            var combinations = _props.combinations;
	            var combinationContainer = _props.combinationContainer;
	            // remove attribute if double click on that
	
	            for (var groupName in selectedCombination['attribute_groups']) {
	                if ((0, _jsonStableStringify2.default)(selectedCombination['attribute_groups'][groupName]) == (0, _jsonStableStringify2.default)(attribute[groupName])) {
	                    delete selectedCombination['attribute_groups'][groupName];
	                    delete attribute[groupName];
	                }
	            }
	
	            var tempAttr = {};
	            for (var _groupName2 in selectedCombination['attribute_groups']) {
	                if (attribute[_groupName2] != 'undefined') {
	                    tempAttr = Object.assign({}, selectedCombination['attribute_groups'], attribute);
	                }
	            }
	
	            var quantity = 0;
	            for (var idCombination in combinations) {
	                if ((0, _jsonStableStringify2.default)(combinations[idCombination]['attribute_groups']) == (0, _jsonStableStringify2.default)(tempAttr)) {
	                    quantity = combinations[idCombination]['quantity'];
	                }
	            }
	
	            var newSelectedCombination = Object.assign({}, selectedCombination, { attribute_groups: tempAttr, quantity: quantity });
	            var newCombinationContainer = Object.assign({}, combinationContainer, { selectedCombination: newSelectedCombination });
	            this.props.dispatch((0, _PosProductActions.updateSelectedCombination)(newCombinationContainer, selectedProduct.product));
	        }
	    }, {
	        key: 'addToCart',
	        value: function addToCart() {
	            var idProduct = this.props.product.id_product;
	            var idProductAttribute = 0;
	            for (var idCombation in this.props.combinations) {
	                if ((0, _jsonStableStringify2.default)(this.props.combinations[idCombation]) == (0, _jsonStableStringify2.default)(this.props.selectedCombination)) {
	                    idProductAttribute = idCombation;
	                }
	            }
	            new PosHooks().hookPosAddToCart(idProduct, idProductAttribute);
	            _reactPopup2.default.close();
	        }
	    }, {
	        key: 'render',
	        value: function render() {
	            var _props2 = this.props;
	            var product = _props2.product;
	            var combinations = _props2.combinations;
	            var orderOutOfStock = _props2.orderOutOfStock;
	            var langs = _props2.langs;
	            var quantity = _props2.quantity;
	            var selectedCombination = _props2.selectedCombination;
	            var isFetching = _props2.isFetching;
	
	            if (isFetching) {
	                return _react2.default.createElement(
	                    'div',
	                    { id: 'combination_popup_container' },
	                    _react2.default.createElement(
	                        'div',
	                        { id: 'actions_wrap' },
	                        _react2.default.createElement(_PosLoadingComponent2.default, null)
	                    )
	                );
	            } else {
	                var attributeGroupList = this.formatCombinations(combinations);
	                var addToCart = false;
	                var warningMessage = '';
	                for (var idCombation in combinations) {
	                    if ((0, _jsonStableStringify2.default)(combinations[idCombation]) == (0, _jsonStableStringify2.default)(selectedCombination)) {
	                        if (_PosContants.ALLOW_ORDERING_OUT_OF_STOCK_PRODUCTS == 0 && selectedCombination['quantity'] <= 0) {
	                            addToCart = false;
	                            warningMessage = langs.out_of_stock;
	                        } else {
	                            addToCart = true;
	                        }
	                    }
	                }
	
	                if (!addToCart && warningMessage == '') {
	                    warningMessage = langs.this_variant_does_not_exist;
	                }
	
	                return _react2.default.createElement(
	                    'div',
	                    { id: 'combination_popup_container' },
	                    _react2.default.createElement(
	                        'div',
	                        { id: 'actions_wrap' },
	                        _react2.default.createElement(_PosButtonComponent2.default, {
	                            btnClass: 'pp-button cancel-link',
	                            onClick: this.onClickCancel.bind(this),
	                            title: langs.cancel
	                        }),
	                        _react2.default.createElement(_PosButtonComponent2.default, {
	                            addToCart: addToCart,
	                            btnClass: addToCart ? 'pp-button btn-process' : 'pp-button btn-process disabled',
	                            onClick: this.addToCart.bind(this),
	                            title: langs.done
	                        })
	                    ),
	                    _react2.default.createElement(_PosCombinationsHeadComponent2.default, {
	                        product: product,
	                        title: langs.pick_up_one
	                    }),
	                    _react2.default.createElement(_PosMessage2.default, {
	                        message: warningMessage
	                    }),
	                    _react2.default.createElement(_PosAttributeGroupListComponent2.default, {
	                        combinations: combinations,
	                        product: product,
	                        attributeGroupList: attributeGroupList,
	                        onChangeAttribute: this.onChangeAttribute,
	                        selectedCombination: selectedCombination
	                    })
	                );
	            }
	        }
	    }]);
	
	    return PosCombinationsComponent;
	}(_react.Component);
	
	exports.default = PosCombinationsComponent;

/***/ },
/* 114 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosCombinationsCompoment = function (_Component) {
	  _inherits(PosCombinationsCompoment, _Component);
	
	  function PosCombinationsCompoment() {
	    _classCallCheck(this, PosCombinationsCompoment);
	
	    return _possibleConstructorReturn(this, Object.getPrototypeOf(PosCombinationsCompoment).apply(this, arguments));
	  }
	
	  _createClass(PosCombinationsCompoment, [{
	    key: "render",
	    value: function render() {
	      return _react2.default.createElement(
	        "div",
	        { className: "product-info has-image" },
	        _react2.default.createElement(
	          "div",
	          { className: "product-info-inner" },
	          _react2.default.createElement(
	            "h3",
	            null,
	            this.props.title
	          ),
	          _react2.default.createElement(
	            "h4",
	            { className: "product-name" },
	            "(",
	            this.props.product.pname,
	            ")"
	          )
	        )
	      );
	    }
	  }]);
	
	  return PosCombinationsCompoment;
	}(_react.Component);
	
	exports.default = PosCombinationsCompoment;

/***/ },
/* 115 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosLoadingCompoment = function (_Component) {
	    _inherits(PosLoadingCompoment, _Component);
	
	    function PosLoadingCompoment() {
	        _classCallCheck(this, PosLoadingCompoment);
	
	        return _possibleConstructorReturn(this, Object.getPrototypeOf(PosLoadingCompoment).apply(this, arguments));
	    }
	
	    _createClass(PosLoadingCompoment, [{
	        key: "render",
	        value: function render() {
	            return _react2.default.createElement("i", { className: "process-icon-loading" });
	        }
	    }]);
	
	    return PosLoadingCompoment;
	}(_react.Component);
	
	exports.default = PosLoadingCompoment;

/***/ },
/* 116 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var PosCombinationsCompoment = function (_Component) {
	    _inherits(PosCombinationsCompoment, _Component);
	
	    function PosCombinationsCompoment() {
	        _classCallCheck(this, PosCombinationsCompoment);
	
	        return _possibleConstructorReturn(this, Object.getPrototypeOf(PosCombinationsCompoment).apply(this, arguments));
	    }
	
	    _createClass(PosCombinationsCompoment, [{
	        key: 'render',
	        value: function render() {
	            var message = this.props.message;
	
	            return _react2.default.createElement(
	                'div',
	                { className: 'message' },
	                message
	            );
	        }
	    }]);
	
	    return PosCombinationsCompoment;
	}(_react.Component);
	
	exports.default = PosCombinationsCompoment;

/***/ },
/* 117 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _PosProductActions = __webpack_require__(64);
	
	var _PosCombinationContainer = __webpack_require__(118);
	
	var _PosCombinationContainer2 = _interopRequireDefault(_PosCombinationContainer);
	
	var _PosContants = __webpack_require__(65);
	
	var _reactAutosuggest = __webpack_require__(132);
	
	var _reactAutosuggest2 = _interopRequireDefault(_reactAutosuggest);
	
	var _reactPopup = __webpack_require__(68);
	
	var _reactPopup2 = _interopRequireDefault(_reactPopup);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @author    Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @copyright Hamsa Technologies
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */
	
	var PosSearchProductComponent = function (_Component) {
	    _inherits(PosSearchProductComponent, _Component);
	
	    function PosSearchProductComponent() {
	        _classCallCheck(this, PosSearchProductComponent);
	
	        var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(PosSearchProductComponent).apply(this, arguments));
	
	        _this.onChange = _this.onChange.bind(_this);
	        _this.onSuggestionSelected = _this.onSuggestionSelected.bind(_this);
	        _this.getSuggestionValue = _this.getSuggestionValue.bind(_this);
	        _this.renderSuggestion = _this.renderSuggestion.bind(_this);
	        _this.onKeyDown = _this.onKeyDown.bind(_this);
	        return _this;
	    }
	
	    _createClass(PosSearchProductComponent, [{
	        key: 'onKeyDown',
	        value: function onKeyDown(evt) {
	            if (evt.keyCode === 13) {
	                // always return false in order to stop the event, otherwise, it submits the form and reloads the page        
	                evt.preventDefault();
	                evt.stopPropagation();
	            }
	        }
	    }, {
	        key: 'onChange',
	        value: function onChange(event) {
	            var value = event.target.value;
	            this.props.dispatch((0, _PosProductActions.fillKeyword)(value));
	            if (typeof value != 'undefined' && value.length >= _PosContants.MIN_SEARCH_KEYWORD_LENGHT) {
	                this.props.dispatch((0, _PosProductActions.searchProducts)(value));
	            }
	        }
	    }, {
	        key: 'onSuggestionSelected',
	        value: function onSuggestionSelected(event, _ref) {
	            var suggestion = _ref.suggestion;
	
	            this.props.dispatch((0, _PosProductActions.setSelectedProduct)(suggestion));
	            this.props.dispatch((0, _PosProductActions.fillKeyword)(suggestion.pname));
	            if (suggestion.id_product_attribute == 0) {
	                new PosHooks().hookPosAddToCart(suggestion.id_product);
	                return;
	            }
	            this.props.dispatch((0, _PosProductActions.getCombinations)(suggestion));
	            _reactPopup2.default.registerPlugin('popover', function (content, target) {
	                this.create({
	                    content: content,
	                    className: 'popover',
	                    noOverlay: false,
	                    position: function position(box) {
	                        var boxReact = box.getBoundingClientRect();
	                        var bodyRect = document.body.getBoundingClientRect();
	                        var top = (bodyRect.height - boxReact.height) / 4;
	                        var left = (bodyRect.width - boxReact.width) / 2;
	                        box.style.top = boxReact.top + 'px';
	                        box.style.left = left + 'px';
	                        box.style.margin = 0;
	                        box.style.opacity = 1;
	                    }
	                });
	            });
	            _reactPopup2.default.plugins.popover(_react2.default.createElement(_PosCombinationContainer2.default, null), document.getElementById('barcode'));
	        }
	    }, {
	        key: 'getSuggestionValue',
	        value: function getSuggestionValue(suggestion) {
	            return suggestion.pname;
	        }
	    }, {
	        key: 'renderSuggestion',
	        value: function renderSuggestion(suggestion) {
	            return _react2.default.createElement(
	                'span',
	                null,
	                suggestion.pname
	            );
	        }
	    }, {
	        key: 'render',
	        value: function render() {
	            var _props = this.props;
	            var keyword = _props.keyword;
	            var langs = _props.langs;
	            var products = _props.products;
	            var message = _props.message;
	
	            if (Object.keys(langs).length == 0) {
	                return null;
	            } else {
	                var placeHolder = langs.search_for_items + '(' + langs.click_outside_to_add_items_using_a_barcode_scanner + ')';
	                var inputProps = {
	                    placeholder: placeHolder,
	                    value: keyword,
	                    onChange: this.onChange,
	                    onKeyDown: this.onKeyDown,
	                    id: "barcode"
	                };
	                var suggestions = this.props.products;
	                return _react2.default.createElement(
	                    'div',
	                    { className: 'product_search', method: 'post', action: '#' },
	                    _react2.default.createElement(
	                        'div',
	                        { className: 'message_error' },
	                        message
	                    ),
	                    _react2.default.createElement(_reactAutosuggest2.default, {
	                        suggestions: suggestions,
	                        getSuggestionValue: this.getSuggestionValue,
	                        renderSuggestion: this.renderSuggestion,
	                        onSuggestionSelected: this.onSuggestionSelected,
	                        inputProps: inputProps
	                    }),
	                    _react2.default.createElement(_reactPopup2.default, { defaultOk: null,
	                        defaultCancel: null,
	                        closeBtn: false
	                    })
	                );
	            }
	        }
	    }]);
	
	    return PosSearchProductComponent;
	}(_react.Component);
	
	exports.default = PosSearchProductComponent;

/***/ },
/* 118 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _reactRedux = __webpack_require__(28);
	
	var _PosCombinationsCompoment = __webpack_require__(113);
	
	var _PosCombinationsCompoment2 = _interopRequireDefault(_PosCombinationsCompoment);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function mapStateToProps(state) {
	    var selectedProduct = state.selectedProduct;
	    var combinations = state.combinations;
	    var langs = state.langs;
	
	    var idProduct = selectedProduct.product.id_product;
	    return {
	        combinations: combinations[idProduct]['combinations'],
	        langs: langs,
	        product: combinations[idProduct]['product'],
	        selectedCombination: combinations[idProduct]['selectedCombination'],
	        isFetching: combinations[idProduct]['isFetching'],
	        selectedProduct: selectedProduct,
	        combinationContainer: combinations[idProduct]
	
	    };
	} /**
	   * RockPOS - Point of Sale for PrestaShop
	   *
	   * @author    Hamsa Technologies
	   * @copyright Hamsa Technologies
	   * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	   */
	
	exports.default = (0, _reactRedux.connect)(mapStateToProps)(_PosCombinationsCompoment2.default);

/***/ },
/* 119 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _PosSearchProductComponent = __webpack_require__(117);
	
	var _PosSearchProductComponent2 = _interopRequireDefault(_PosSearchProductComponent);
	
	var _reactRedux = __webpack_require__(28);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function mapStateToProps(state) {
	    return {
	        keyword: state.searchProducts.keyword,
	        products: state.searchProducts.products,
	        message: state.searchProducts.message,
	        langs: state.langs
	    };
	} /**
	   * RockPOS - Point of Sale for PrestaShop
	   *
	   * @author    Hamsa Technologies
	   * @copyright Hamsa Technologies
	   * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	   */
	
	exports.default = (0, _reactRedux.connect)(mapStateToProps)(_PosSearchProductComponent2.default);

/***/ },
/* 120 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.default = combinations;
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; } /**
	                                                                                                                                                                                                                   * RockPOS - Point of Sale for PrestaShop
	                                                                                                                                                                                                                   *
	                                                                                                                                                                                                                   * @author    Hamsa Technologies
	                                                                                                                                                                                                                   * @copyright Hamsa Technologies
	                                                                                                                                                                                                                   * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	                                                                                                                                                                                                                   */
	
	var initialState = { combinations: {}, isFetching: false, product: {}, selectedCombination: {} };
	function combinations() {
	  var state = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
	  var action = arguments[1];
	
	  switch (action.type) {
	    case PosActionType.RECEIVE_COMBINATIONS:
	    case PosActionType.UPDATE_SELECTED_COMBINATION:
	    case PosActionType.REQUEST_POSTS:
	      return Object.assign({}, state, _defineProperty({}, action.product['id_product'], combination(initialState, action)));
	    default:
	      return state;
	  }
	}
	
	function combination() {
	  var state = arguments.length <= 0 || arguments[0] === undefined ? initialState : arguments[0];
	  var action = arguments[1];
	
	  switch (action.type) {
	    case PosActionType.RECEIVE_COMBINATIONS:
	      return Object.assign({}, state, {
	        combinations: action.combinations,
	        product: action.product,
	        isFetching: false,
	        selectedCombination: action.combinations[action.product['id_product_attribute']]
	      });
	
	    case PosActionType.UPDATE_SELECTED_COMBINATION:
	      return Object.assign({}, state, {
	        combinations: action.combinations.combinations,
	        product: action.combinations.product,
	        isFetching: false,
	        selectedCombination: action.combinations.selectedCombination
	      });
	
	    case PosActionType.REQUEST_POSTS:
	      return Object.assign({}, state, {
	        isFetching: true
	      });
	    default:
	      return state;
	  }
	}

/***/ },
/* 121 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _redux = __webpack_require__(27);
	
	var _searchProducts = __webpack_require__(123);
	
	var _searchProducts2 = _interopRequireDefault(_searchProducts);
	
	var _langs = __webpack_require__(122);
	
	var _langs2 = _interopRequireDefault(_langs);
	
	var _combinations = __webpack_require__(120);
	
	var _combinations2 = _interopRequireDefault(_combinations);
	
	var _selectedProduct = __webpack_require__(124);
	
	var _selectedProduct2 = _interopRequireDefault(_selectedProduct);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	exports.default = (0, _redux.combineReducers)({
	  searchProducts: _searchProducts2.default,
	  selectedProduct: _selectedProduct2.default,
	  langs: _langs2.default,
	  combinations: _combinations2.default
	}); /**
	     * RockPOS - Point of Sale for PrestaShop
	     *
	     * @author    Hamsa Technologies
	     * @copyright Hamsa Technologies
	     * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	     */

/***/ },
/* 122 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.default = langs;
	
	var _redux = __webpack_require__(27);
	
	var _PosActionType = __webpack_require__(12);
	
	var posAction = _interopRequireWildcard(_PosActionType);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	function langs() {
	  var state = arguments.length <= 0 || arguments[0] === undefined ? '' : arguments[0];
	  var action = arguments[1];
	
	  switch (action.type) {
	    case posAction.RECEIVE_LANG:
	      return action.langs;
	    default:
	      return state;
	  }
	}

/***/ },
/* 123 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = products;
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	var initialState = {
	    products: [],
	    message: '',
	    keyword: '',
	    request: null
	}; /**
	    * RockPOS - Point of Sale for PrestaShop
	    *
	    * @author    Hamsa Technologies
	    * @copyright Hamsa Technologies
	    * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	    */
	
	function products() {
	    var state = arguments.length <= 0 || arguments[0] === undefined ? initialState : arguments[0];
	    var action = arguments[1];
	
	    switch (action.type) {
	        case PosActionType.RECEIVE_SEARCH_PRODUCTS:
	            return Object.assign({}, state, {
	                products: action.products,
	                message: action.message
	            });
	
	        case PosActionType.RECEIVE_KEYWORD:
	            return Object.assign({}, state, {
	                keyword: action.keyword,
	                message: action.message
	            });
	
	        case PosActionType.PRODUCT_SUGGESTION_ABORT_PREVIOUS_REQUEST:
	            if (state.request !== null) {
	                return Object.assign({}, state, {
	                    request: state.request.abort()
	                });
	            }
	
	        case PosActionType.PRODUCT_SUGGESTION_SET_CURRENT_REQUEST:
	            return Object.assign({}, state, {
	                request: action.request
	            });
	
	        default:
	            return state;
	    }
	}

/***/ },
/* 124 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = selectedProduct;
	
	var _PosActionType = __webpack_require__(12);
	
	var PosActionType = _interopRequireWildcard(_PosActionType);
	
	function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }
	
	var initialState = {
	    product: {}
	}; /**
	    * RockPOS - Point of Sale for PrestaShop
	    *
	    * @author    Hamsa Technologies
	    * @copyright Hamsa Technologies
	    * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	    */
	
	function selectedProduct() {
	    var state = arguments.length <= 0 || arguments[0] === undefined ? initialState : arguments[0];
	    var action = arguments[1];
	
	
	    switch (action.type) {
	        case PosActionType.SET_SELECTED_PRODUCT:
	            return Object.assign({}, state, {
	                product: action.selectedProduct
	            });
	        default:
	            return state;
	    }
	}

/***/ },
/* 125 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.default = configureStore;
	
	var _redux = __webpack_require__(27);
	
	var _reducers = __webpack_require__(121);
	
	var _reducers2 = _interopRequireDefault(_reducers);
	
	var _reduxThunk = __webpack_require__(233);
	
	var _reduxThunk2 = _interopRequireDefault(_reduxThunk);
	
	var _reduxLogger = __webpack_require__(232);
	
	var _reduxLogger2 = _interopRequireDefault(_reduxLogger);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	/**
	 * RockPOS - Point of Sale for PrestaShop
	 *
	 * @author    Hamsa Technologies
	 * @copyright Hamsa Technologies
	 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
	 */
	
	function configureStore() {
	  var store = (0, _redux.createStore)(_reducers2.default, (0, _redux.applyMiddleware)(_reduxThunk2.default, (0, _reduxLogger2.default)()));
	  return store;
	}

/***/ },
/* 126 */
/***/ function(module, exports, __webpack_require__) {

	var json = typeof JSON !== 'undefined' ? JSON : __webpack_require__(127);
	
	module.exports = function (obj, opts) {
	    if (!opts) opts = {};
	    if (typeof opts === 'function') opts = { cmp: opts };
	    var space = opts.space || '';
	    if (typeof space === 'number') space = Array(space+1).join(' ');
	    var cycles = (typeof opts.cycles === 'boolean') ? opts.cycles : false;
	    var replacer = opts.replacer || function(key, value) { return value; };
	
	    var cmp = opts.cmp && (function (f) {
	        return function (node) {
	            return function (a, b) {
	                var aobj = { key: a, value: node[a] };
	                var bobj = { key: b, value: node[b] };
	                return f(aobj, bobj);
	            };
	        };
	    })(opts.cmp);
	
	    var seen = [];
	    return (function stringify (parent, key, node, level) {
	        var indent = space ? ('\n' + new Array(level + 1).join(space)) : '';
	        var colonSeparator = space ? ': ' : ':';
	
	        if (node && node.toJSON && typeof node.toJSON === 'function') {
	            node = node.toJSON();
	        }
	
	        node = replacer.call(parent, key, node);
	
	        if (node === undefined) {
	            return;
	        }
	        if (typeof node !== 'object' || node === null) {
	            return json.stringify(node);
	        }
	        if (isArray(node)) {
	            var out = [];
	            for (var i = 0; i < node.length; i++) {
	                var item = stringify(node, i, node[i], level+1) || json.stringify(null);
	                out.push(indent + space + item);
	            }
	            return '[' + out.join(',') + indent + ']';
	        }
	        else {
	            if (seen.indexOf(node) !== -1) {
	                if (cycles) return json.stringify('__cycle__');
	                throw new TypeError('Converting circular structure to JSON');
	            }
	            else seen.push(node);
	
	            var keys = objectKeys(node).sort(cmp && cmp(node));
	            var out = [];
	            for (var i = 0; i < keys.length; i++) {
	                var key = keys[i];
	                var value = stringify(node, key, node[key], level+1);
	
	                if(!value) continue;
	
	                var keyValue = json.stringify(key)
	                    + colonSeparator
	                    + value;
	                ;
	                out.push(indent + space + keyValue);
	            }
	            seen.splice(seen.indexOf(node), 1);
	            return '{' + out.join(',') + indent + '}';
	        }
	    })({ '': obj }, '', obj, 0);
	};
	
	var isArray = Array.isArray || function (x) {
	    return {}.toString.call(x) === '[object Array]';
	};
	
	var objectKeys = Object.keys || function (obj) {
	    var has = Object.prototype.hasOwnProperty || function () { return true };
	    var keys = [];
	    for (var key in obj) {
	        if (has.call(obj, key)) keys.push(key);
	    }
	    return keys;
	};


/***/ },
/* 127 */
/***/ function(module, exports, __webpack_require__) {

	exports.parse = __webpack_require__(128);
	exports.stringify = __webpack_require__(129);


/***/ },
/* 128 */
/***/ function(module, exports) {

	var at, // The index of the current character
	    ch, // The current character
	    escapee = {
	        '"':  '"',
	        '\\': '\\',
	        '/':  '/',
	        b:    '\b',
	        f:    '\f',
	        n:    '\n',
	        r:    '\r',
	        t:    '\t'
	    },
	    text,
	
	    error = function (m) {
	        // Call error when something is wrong.
	        throw {
	            name:    'SyntaxError',
	            message: m,
	            at:      at,
	            text:    text
	        };
	    },
	    
	    next = function (c) {
	        // If a c parameter is provided, verify that it matches the current character.
	        if (c && c !== ch) {
	            error("Expected '" + c + "' instead of '" + ch + "'");
	        }
	        
	        // Get the next character. When there are no more characters,
	        // return the empty string.
	        
	        ch = text.charAt(at);
	        at += 1;
	        return ch;
	    },
	    
	    number = function () {
	        // Parse a number value.
	        var number,
	            string = '';
	        
	        if (ch === '-') {
	            string = '-';
	            next('-');
	        }
	        while (ch >= '0' && ch <= '9') {
	            string += ch;
	            next();
	        }
	        if (ch === '.') {
	            string += '.';
	            while (next() && ch >= '0' && ch <= '9') {
	                string += ch;
	            }
	        }
	        if (ch === 'e' || ch === 'E') {
	            string += ch;
	            next();
	            if (ch === '-' || ch === '+') {
	                string += ch;
	                next();
	            }
	            while (ch >= '0' && ch <= '9') {
	                string += ch;
	                next();
	            }
	        }
	        number = +string;
	        if (!isFinite(number)) {
	            error("Bad number");
	        } else {
	            return number;
	        }
	    },
	    
	    string = function () {
	        // Parse a string value.
	        var hex,
	            i,
	            string = '',
	            uffff;
	        
	        // When parsing for string values, we must look for " and \ characters.
	        if (ch === '"') {
	            while (next()) {
	                if (ch === '"') {
	                    next();
	                    return string;
	                } else if (ch === '\\') {
	                    next();
	                    if (ch === 'u') {
	                        uffff = 0;
	                        for (i = 0; i < 4; i += 1) {
	                            hex = parseInt(next(), 16);
	                            if (!isFinite(hex)) {
	                                break;
	                            }
	                            uffff = uffff * 16 + hex;
	                        }
	                        string += String.fromCharCode(uffff);
	                    } else if (typeof escapee[ch] === 'string') {
	                        string += escapee[ch];
	                    } else {
	                        break;
	                    }
	                } else {
	                    string += ch;
	                }
	            }
	        }
	        error("Bad string");
	    },
	
	    white = function () {
	
	// Skip whitespace.
	
	        while (ch && ch <= ' ') {
	            next();
	        }
	    },
	
	    word = function () {
	
	// true, false, or null.
	
	        switch (ch) {
	        case 't':
	            next('t');
	            next('r');
	            next('u');
	            next('e');
	            return true;
	        case 'f':
	            next('f');
	            next('a');
	            next('l');
	            next('s');
	            next('e');
	            return false;
	        case 'n':
	            next('n');
	            next('u');
	            next('l');
	            next('l');
	            return null;
	        }
	        error("Unexpected '" + ch + "'");
	    },
	
	    value,  // Place holder for the value function.
	
	    array = function () {
	
	// Parse an array value.
	
	        var array = [];
	
	        if (ch === '[') {
	            next('[');
	            white();
	            if (ch === ']') {
	                next(']');
	                return array;   // empty array
	            }
	            while (ch) {
	                array.push(value());
	                white();
	                if (ch === ']') {
	                    next(']');
	                    return array;
	                }
	                next(',');
	                white();
	            }
	        }
	        error("Bad array");
	    },
	
	    object = function () {
	
	// Parse an object value.
	
	        var key,
	            object = {};
	
	        if (ch === '{') {
	            next('{');
	            white();
	            if (ch === '}') {
	                next('}');
	                return object;   // empty object
	            }
	            while (ch) {
	                key = string();
	                white();
	                next(':');
	                if (Object.hasOwnProperty.call(object, key)) {
	                    error('Duplicate key "' + key + '"');
	                }
	                object[key] = value();
	                white();
	                if (ch === '}') {
	                    next('}');
	                    return object;
	                }
	                next(',');
	                white();
	            }
	        }
	        error("Bad object");
	    };
	
	value = function () {
	
	// Parse a JSON value. It could be an object, an array, a string, a number,
	// or a word.
	
	    white();
	    switch (ch) {
	    case '{':
	        return object();
	    case '[':
	        return array();
	    case '"':
	        return string();
	    case '-':
	        return number();
	    default:
	        return ch >= '0' && ch <= '9' ? number() : word();
	    }
	};
	
	// Return the json_parse function. It will have access to all of the above
	// functions and variables.
	
	module.exports = function (source, reviver) {
	    var result;
	    
	    text = source;
	    at = 0;
	    ch = ' ';
	    result = value();
	    white();
	    if (ch) {
	        error("Syntax error");
	    }
	
	    // If there is a reviver function, we recursively walk the new structure,
	    // passing each name/value pair to the reviver function for possible
	    // transformation, starting with a temporary root object that holds the result
	    // in an empty key. If there is not a reviver function, we simply return the
	    // result.
	
	    return typeof reviver === 'function' ? (function walk(holder, key) {
	        var k, v, value = holder[key];
	        if (value && typeof value === 'object') {
	            for (k in value) {
	                if (Object.prototype.hasOwnProperty.call(value, k)) {
	                    v = walk(value, k);
	                    if (v !== undefined) {
	                        value[k] = v;
	                    } else {
	                        delete value[k];
	                    }
	                }
	            }
	        }
	        return reviver.call(holder, key, value);
	    }({'': result}, '')) : result;
	};


/***/ },
/* 129 */
/***/ function(module, exports) {

	var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
	    escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
	    gap,
	    indent,
	    meta = {    // table of character substitutions
	        '\b': '\\b',
	        '\t': '\\t',
	        '\n': '\\n',
	        '\f': '\\f',
	        '\r': '\\r',
	        '"' : '\\"',
	        '\\': '\\\\'
	    },
	    rep;
	
	function quote(string) {
	    // If the string contains no control characters, no quote characters, and no
	    // backslash characters, then we can safely slap some quotes around it.
	    // Otherwise we must also replace the offending characters with safe escape
	    // sequences.
	    
	    escapable.lastIndex = 0;
	    return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
	        var c = meta[a];
	        return typeof c === 'string' ? c :
	            '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
	    }) + '"' : '"' + string + '"';
	}
	
	function str(key, holder) {
	    // Produce a string from holder[key].
	    var i,          // The loop counter.
	        k,          // The member key.
	        v,          // The member value.
	        length,
	        mind = gap,
	        partial,
	        value = holder[key];
	    
	    // If the value has a toJSON method, call it to obtain a replacement value.
	    if (value && typeof value === 'object' &&
	            typeof value.toJSON === 'function') {
	        value = value.toJSON(key);
	    }
	    
	    // If we were called with a replacer function, then call the replacer to
	    // obtain a replacement value.
	    if (typeof rep === 'function') {
	        value = rep.call(holder, key, value);
	    }
	    
	    // What happens next depends on the value's type.
	    switch (typeof value) {
	        case 'string':
	            return quote(value);
	        
	        case 'number':
	            // JSON numbers must be finite. Encode non-finite numbers as null.
	            return isFinite(value) ? String(value) : 'null';
	        
	        case 'boolean':
	        case 'null':
	            // If the value is a boolean or null, convert it to a string. Note:
	            // typeof null does not produce 'null'. The case is included here in
	            // the remote chance that this gets fixed someday.
	            return String(value);
	            
	        case 'object':
	            if (!value) return 'null';
	            gap += indent;
	            partial = [];
	            
	            // Array.isArray
	            if (Object.prototype.toString.apply(value) === '[object Array]') {
	                length = value.length;
	                for (i = 0; i < length; i += 1) {
	                    partial[i] = str(i, value) || 'null';
	                }
	                
	                // Join all of the elements together, separated with commas, and
	                // wrap them in brackets.
	                v = partial.length === 0 ? '[]' : gap ?
	                    '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']' :
	                    '[' + partial.join(',') + ']';
	                gap = mind;
	                return v;
	            }
	            
	            // If the replacer is an array, use it to select the members to be
	            // stringified.
	            if (rep && typeof rep === 'object') {
	                length = rep.length;
	                for (i = 0; i < length; i += 1) {
	                    k = rep[i];
	                    if (typeof k === 'string') {
	                        v = str(k, value);
	                        if (v) {
	                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
	                        }
	                    }
	                }
	            }
	            else {
	                // Otherwise, iterate through all of the keys in the object.
	                for (k in value) {
	                    if (Object.prototype.hasOwnProperty.call(value, k)) {
	                        v = str(k, value);
	                        if (v) {
	                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
	                        }
	                    }
	                }
	            }
	            
	        // Join all of the member texts together, separated with commas,
	        // and wrap them in braces.
	
	        v = partial.length === 0 ? '{}' : gap ?
	            '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}' :
	            '{' + partial.join(',') + '}';
	        gap = mind;
	        return v;
	    }
	}
	
	module.exports = function (value, replacer, space) {
	    var i;
	    gap = '';
	    indent = '';
	    
	    // If the space parameter is a number, make an indent string containing that
	    // many spaces.
	    if (typeof space === 'number') {
	        for (i = 0; i < space; i += 1) {
	            indent += ' ';
	        }
	    }
	    // If the space parameter is a string, it will be used as the indent string.
	    else if (typeof space === 'string') {
	        indent = space;
	    }
	
	    // If there is a replacer, it must be a function or an array.
	    // Otherwise, throw an error.
	    rep = replacer;
	    if (replacer && typeof replacer !== 'function'
	    && (typeof replacer !== 'object' || typeof replacer.length !== 'number')) {
	        throw new Error('JSON.stringify');
	    }
	    
	    // Make a fake root object containing our value under the key of ''.
	    // Return the result of stringifying the value.
	    return str('', {'': value});
	};


/***/ },
/* 130 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _reactRedux = __webpack_require__(28);
	
	var _redux = __webpack_require__(67);
	
	var _reactAutowhatever = __webpack_require__(133);
	
	var _reactAutowhatever2 = _interopRequireDefault(_reactAutowhatever);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	function mapStateToProps(state) {
	  return {
	    isFocused: state.isFocused,
	    isCollapsed: state.isCollapsed,
	    focusedSectionIndex: state.focusedSectionIndex,
	    focusedSuggestionIndex: state.focusedSuggestionIndex,
	    valueBeforeUpDown: state.valueBeforeUpDown,
	    lastAction: state.lastAction
	  };
	}
	
	var Autosuggest = function (_Component) {
	  _inherits(Autosuggest, _Component);
	
	  function Autosuggest() {
	    _classCallCheck(this, Autosuggest);
	
	    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(Autosuggest).call(this));
	
	    _this.storeInputReference = _this.storeInputReference.bind(_this);
	    _this.onSuggestionMouseEnter = _this.onSuggestionMouseEnter.bind(_this);
	    _this.onSuggestionMouseLeave = _this.onSuggestionMouseLeave.bind(_this);
	    _this.onSuggestionMouseDown = _this.onSuggestionMouseDown.bind(_this);
	    _this.onSuggestionClick = _this.onSuggestionClick.bind(_this);
	    _this.itemProps = _this.itemProps.bind(_this);
	    return _this;
	  }
	
	  _createClass(Autosuggest, [{
	    key: 'componentWillReceiveProps',
	    value: function componentWillReceiveProps(nextProps) {
	      if (nextProps.suggestions !== this.props.suggestions) {
	        var suggestions = nextProps.suggestions;
	        var inputProps = nextProps.inputProps;
	        var shouldRenderSuggestions = nextProps.shouldRenderSuggestions;
	        var isCollapsed = nextProps.isCollapsed;
	        var revealSuggestions = nextProps.revealSuggestions;
	        var lastAction = nextProps.lastAction;
	        var value = inputProps.value;
	
	
	        if (suggestions.length > 0 && shouldRenderSuggestions(value)) {
	          this.maybeFocusFirstSuggestion();
	
	          if (isCollapsed && lastAction !== 'click' && lastAction !== 'enter') {
	            revealSuggestions();
	          }
	        }
	      }
	    }
	  }, {
	    key: 'getSuggestion',
	    value: function getSuggestion(sectionIndex, suggestionIndex) {
	      var _props = this.props;
	      var suggestions = _props.suggestions;
	      var multiSection = _props.multiSection;
	      var getSectionSuggestions = _props.getSectionSuggestions;
	
	
	      if (multiSection) {
	        return getSectionSuggestions(suggestions[sectionIndex])[suggestionIndex];
	      }
	
	      return suggestions[suggestionIndex];
	    }
	  }, {
	    key: 'getFocusedSuggestion',
	    value: function getFocusedSuggestion() {
	      var _props2 = this.props;
	      var focusedSectionIndex = _props2.focusedSectionIndex;
	      var focusedSuggestionIndex = _props2.focusedSuggestionIndex;
	
	
	      if (focusedSuggestionIndex === null) {
	        return null;
	      }
	
	      return this.getSuggestion(focusedSectionIndex, focusedSuggestionIndex);
	    }
	  }, {
	    key: 'getSuggestionValueByIndex',
	    value: function getSuggestionValueByIndex(sectionIndex, suggestionIndex) {
	      var getSuggestionValue = this.props.getSuggestionValue;
	
	
	      return getSuggestionValue(this.getSuggestion(sectionIndex, suggestionIndex));
	    }
	  }, {
	    key: 'getSuggestionIndices',
	    value: function getSuggestionIndices(suggestionElement) {
	      var sectionIndex = suggestionElement.getAttribute('data-section-index');
	      var suggestionIndex = suggestionElement.getAttribute('data-suggestion-index');
	
	      return {
	        sectionIndex: typeof sectionIndex === 'string' ? parseInt(sectionIndex, 10) : null,
	        suggestionIndex: parseInt(suggestionIndex, 10)
	      };
	    }
	  }, {
	    key: 'findSuggestionElement',
	    value: function findSuggestionElement(startNode) {
	      var node = startNode;
	
	      do {
	        if (node.getAttribute('data-suggestion-index') !== null) {
	          return node;
	        }
	
	        node = node.parentNode;
	      } while (node !== null);
	
	      console.error('Clicked element:', startNode); // eslint-disable-line no-console
	      throw new Error('Couldn\'t find suggestion element');
	    }
	  }, {
	    key: 'maybeCallOnChange',
	    value: function maybeCallOnChange(event, newValue, method) {
	      var _props$inputProps = this.props.inputProps;
	      var value = _props$inputProps.value;
	      var onChange = _props$inputProps.onChange;
	
	
	      if (newValue !== value) {
	        onChange && onChange(event, { newValue: newValue, method: method });
	      }
	    }
	  }, {
	    key: 'maybeCallOnSuggestionsUpdateRequested',
	    value: function maybeCallOnSuggestionsUpdateRequested(data) {
	      var _props3 = this.props;
	      var onSuggestionsUpdateRequested = _props3.onSuggestionsUpdateRequested;
	      var shouldRenderSuggestions = _props3.shouldRenderSuggestions;
	
	
	      if (shouldRenderSuggestions(data.value)) {
	        onSuggestionsUpdateRequested(data);
	      }
	    }
	  }, {
	    key: 'maybeFocusFirstSuggestion',
	    value: function maybeFocusFirstSuggestion() {
	      var _props4 = this.props;
	      var focusFirstSuggestion = _props4.focusFirstSuggestion;
	      var multiSection = _props4.multiSection;
	      var updateFocusedSuggestion = _props4.updateFocusedSuggestion;
	
	
	      if (focusFirstSuggestion) {
	        updateFocusedSuggestion(multiSection ? 0 : null, 0);
	      }
	    }
	  }, {
	    key: 'willRenderSuggestions',
	    value: function willRenderSuggestions() {
	      var _props5 = this.props;
	      var suggestions = _props5.suggestions;
	      var inputProps = _props5.inputProps;
	      var shouldRenderSuggestions = _props5.shouldRenderSuggestions;
	      var value = inputProps.value;
	
	
	      return suggestions.length > 0 && shouldRenderSuggestions(value);
	    }
	  }, {
	    key: 'storeInputReference',
	    value: function storeInputReference(autowhatever) {
	      if (autowhatever !== null) {
	        var input = autowhatever.input;
	
	        this.input = input;
	        this.props.inputRef(input);
	      }
	    }
	  }, {
	    key: 'onSuggestionMouseEnter',
	    value: function onSuggestionMouseEnter(event, _ref) {
	      var sectionIndex = _ref.sectionIndex;
	      var itemIndex = _ref.itemIndex;
	
	      this.props.updateFocusedSuggestion(sectionIndex, itemIndex);
	    }
	  }, {
	    key: 'onSuggestionMouseLeave',
	    value: function onSuggestionMouseLeave() {
	      this.props.updateFocusedSuggestion(null, null);
	    }
	  }, {
	    key: 'onSuggestionMouseDown',
	    value: function onSuggestionMouseDown() {
	      this.justClickedOnSuggestion = true;
	    }
	  }, {
	    key: 'onSuggestionClick',
	    value: function onSuggestionClick(event) {
	      var _this2 = this;
	
	      var _props6 = this.props;
	      var inputProps = _props6.inputProps;
	      var shouldRenderSuggestions = _props6.shouldRenderSuggestions;
	      var onSuggestionSelected = _props6.onSuggestionSelected;
	      var focusInputOnSuggestionClick = _props6.focusInputOnSuggestionClick;
	      var inputBlurred = _props6.inputBlurred;
	      var closeSuggestions = _props6.closeSuggestions;
	      var value = inputProps.value;
	      var onBlur = inputProps.onBlur;
	
	      var _getSuggestionIndices = this.getSuggestionIndices(this.findSuggestionElement(event.target));
	
	      var sectionIndex = _getSuggestionIndices.sectionIndex;
	      var suggestionIndex = _getSuggestionIndices.suggestionIndex;
	
	      var clickedSuggestion = this.getSuggestion(sectionIndex, suggestionIndex);
	      var clickedSuggestionValue = this.props.getSuggestionValue(clickedSuggestion);
	
	      this.maybeCallOnChange(event, clickedSuggestionValue, 'click');
	      onSuggestionSelected(event, {
	        suggestion: clickedSuggestion,
	        suggestionValue: clickedSuggestionValue,
	        sectionIndex: sectionIndex,
	        method: 'click'
	      });
	      closeSuggestions('click');
	
	      if (focusInputOnSuggestionClick === true) {
	        this.input.focus();
	      } else {
	        inputBlurred(shouldRenderSuggestions(value));
	        onBlur && onBlur(this.onBlurEvent);
	      }
	
	      this.maybeCallOnSuggestionsUpdateRequested({ value: clickedSuggestionValue, reason: 'click' });
	
	      setTimeout(function () {
	        _this2.justClickedOnSuggestion = false;
	      });
	    }
	  }, {
	    key: 'itemProps',
	    value: function itemProps(_ref2) {
	      var sectionIndex = _ref2.sectionIndex;
	      var itemIndex = _ref2.itemIndex;
	
	      return {
	        'data-section-index': sectionIndex,
	        'data-suggestion-index': itemIndex,
	        onMouseEnter: this.onSuggestionMouseEnter,
	        onMouseLeave: this.onSuggestionMouseLeave,
	        onMouseDown: this.onSuggestionMouseDown,
	        onTouchStart: this.onSuggestionMouseDown, // Because on iOS `onMouseDown` is not triggered
	        onClick: this.onSuggestionClick
	      };
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var _this3 = this;
	
	      var _props7 = this.props;
	      var suggestions = _props7.suggestions;
	      var renderSuggestion = _props7.renderSuggestion;
	      var inputProps = _props7.inputProps;
	      var shouldRenderSuggestions = _props7.shouldRenderSuggestions;
	      var onSuggestionSelected = _props7.onSuggestionSelected;
	      var multiSection = _props7.multiSection;
	      var renderSectionTitle = _props7.renderSectionTitle;
	      var id = _props7.id;
	      var getSectionSuggestions = _props7.getSectionSuggestions;
	      var theme = _props7.theme;
	      var isFocused = _props7.isFocused;
	      var isCollapsed = _props7.isCollapsed;
	      var focusedSectionIndex = _props7.focusedSectionIndex;
	      var focusedSuggestionIndex = _props7.focusedSuggestionIndex;
	      var valueBeforeUpDown = _props7.valueBeforeUpDown;
	      var inputFocused = _props7.inputFocused;
	      var inputBlurred = _props7.inputBlurred;
	      var inputChanged = _props7.inputChanged;
	      var updateFocusedSuggestion = _props7.updateFocusedSuggestion;
	      var revealSuggestions = _props7.revealSuggestions;
	      var closeSuggestions = _props7.closeSuggestions;
	      var getSuggestionValue = _props7.getSuggestionValue;
	      var alwaysRenderSuggestions = _props7.alwaysRenderSuggestions;
	      var value = inputProps.value;
	      var _onBlur = inputProps.onBlur;
	      var _onFocus = inputProps.onFocus;
	      var _onKeyDown = inputProps.onKeyDown;
	
	      var isOpen = alwaysRenderSuggestions || isFocused && !isCollapsed && this.willRenderSuggestions();
	      var items = isOpen ? suggestions : [];
	      var autowhateverInputProps = _extends({}, inputProps, {
	        onFocus: function onFocus(event) {
	          if (!_this3.justClickedOnSuggestion) {
	            inputFocused(shouldRenderSuggestions(value));
	            _onFocus && _onFocus(event);
	
	            if (suggestions.length > 0) {
	              _this3.maybeFocusFirstSuggestion();
	            }
	          }
	        },
	        onBlur: function onBlur(event) {
	          _this3.onBlurEvent = event;
	
	          if (!_this3.justClickedOnSuggestion) {
	            inputBlurred(shouldRenderSuggestions(value));
	            _onBlur && _onBlur(event);
	
	            if (valueBeforeUpDown !== null && value !== valueBeforeUpDown) {
	              _this3.maybeCallOnSuggestionsUpdateRequested({ value: value, reason: 'blur' });
	            }
	          }
	        },
	        onChange: function onChange(event) {
	          var value = event.target.value;
	          var shouldRenderSuggestions = _this3.props.shouldRenderSuggestions;
	
	
	          _this3.maybeCallOnChange(event, value, 'type');
	          inputChanged(shouldRenderSuggestions(value), 'type');
	          _this3.maybeCallOnSuggestionsUpdateRequested({ value: value, reason: 'type' });
	        },
	        onKeyDown: function onKeyDown(event, data) {
	          switch (event.key) {
	            case 'ArrowDown':
	            case 'ArrowUp':
	              if (isCollapsed) {
	                if (_this3.willRenderSuggestions()) {
	                  revealSuggestions();
	                }
	              } else if (suggestions.length > 0) {
	                var newFocusedSectionIndex = data.newFocusedSectionIndex;
	                var newFocusedItemIndex = data.newFocusedItemIndex;
	
	
	                var newValue = void 0;
	
	                if (newFocusedItemIndex === null) {
	                  // valueBeforeUpDown can be null if, for example, user
	                  // hovers on the first suggestion and then pressed Up.
	                  // If that happens, use the original input value.
	                  newValue = valueBeforeUpDown === null ? value : valueBeforeUpDown;
	                } else {
	                  newValue = _this3.getSuggestionValueByIndex(newFocusedSectionIndex, newFocusedItemIndex);
	                }
	
	                updateFocusedSuggestion(newFocusedSectionIndex, newFocusedItemIndex, value);
	                _this3.maybeCallOnChange(event, newValue, event.key === 'ArrowDown' ? 'down' : 'up');
	              }
	              event.preventDefault();
	              break;
	
	            case 'Enter':
	              {
	                var focusedSuggestion = _this3.getFocusedSuggestion();
	
	                if (isOpen && !alwaysRenderSuggestions) {
	                  closeSuggestions('enter');
	                }
	
	                if (focusedSuggestion !== null) {
	                  var _newValue = getSuggestionValue(focusedSuggestion);
	
	                  onSuggestionSelected(event, {
	                    suggestion: focusedSuggestion,
	                    suggestionValue: _newValue,
	                    sectionIndex: focusedSectionIndex,
	                    method: 'enter'
	                  });
	
	                  _this3.maybeCallOnChange(event, _newValue, 'enter');
	                  _this3.maybeCallOnSuggestionsUpdateRequested({ value: _newValue, reason: 'enter' });
	                }
	                break;
	              }
	
	            case 'Escape':
	              if (isOpen) {
	                // If input.type === 'search', the browser clears the input
	                // when Escape is pressed. We want to disable this default
	                // behaviour so that, when suggestions are shown, we just hide
	                // them, without clearing the input.
	                event.preventDefault();
	              }
	
	              if (valueBeforeUpDown === null) {
	                // Didn't interact with Up/Down
	                if (alwaysRenderSuggestions || !isOpen) {
	                  _this3.maybeCallOnChange(event, '', 'escape');
	                  _this3.maybeCallOnSuggestionsUpdateRequested({ value: '', reason: 'escape' });
	                }
	              } else {
	                // Interacted with Up/Down
	                _this3.maybeCallOnChange(event, valueBeforeUpDown, 'escape');
	              }
	
	              if (isOpen && !alwaysRenderSuggestions) {
	                closeSuggestions('escape');
	              } else {
	                updateFocusedSuggestion(null, null);
	              }
	
	              break;
	          }
	
	          _onKeyDown && _onKeyDown(event);
	        }
	      });
	      var renderSuggestionData = {
	        query: (valueBeforeUpDown || value).trim()
	      };
	
	      return _react2.default.createElement(_reactAutowhatever2.default, {
	        multiSection: multiSection,
	        items: items,
	        renderItem: renderSuggestion,
	        renderItemData: renderSuggestionData,
	        renderSectionTitle: renderSectionTitle,
	        getSectionItems: getSectionSuggestions,
	        focusedSectionIndex: focusedSectionIndex,
	        focusedItemIndex: focusedSuggestionIndex,
	        inputProps: autowhateverInputProps,
	        itemProps: this.itemProps,
	        theme: theme,
	        id: id,
	        ref: this.storeInputReference });
	    }
	  }]);
	
	  return Autosuggest;
	}(_react.Component);
	
	Autosuggest.propTypes = {
	  suggestions: _react.PropTypes.array.isRequired,
	  onSuggestionsUpdateRequested: _react.PropTypes.func.isRequired,
	  getSuggestionValue: _react.PropTypes.func.isRequired,
	  renderSuggestion: _react.PropTypes.func.isRequired,
	  inputProps: _react.PropTypes.object.isRequired,
	  shouldRenderSuggestions: _react.PropTypes.func.isRequired,
	  alwaysRenderSuggestions: _react.PropTypes.bool.isRequired,
	  onSuggestionSelected: _react.PropTypes.func.isRequired,
	  multiSection: _react.PropTypes.bool.isRequired,
	  renderSectionTitle: _react.PropTypes.func.isRequired,
	  getSectionSuggestions: _react.PropTypes.func.isRequired,
	  focusInputOnSuggestionClick: _react.PropTypes.bool.isRequired,
	  focusFirstSuggestion: _react.PropTypes.bool.isRequired,
	  theme: _react.PropTypes.object.isRequired,
	  id: _react.PropTypes.string.isRequired,
	  inputRef: _react.PropTypes.func.isRequired,
	
	  isFocused: _react.PropTypes.bool.isRequired,
	  isCollapsed: _react.PropTypes.bool.isRequired,
	  focusedSectionIndex: _react.PropTypes.number,
	  focusedSuggestionIndex: _react.PropTypes.number,
	  valueBeforeUpDown: _react.PropTypes.string,
	  lastAction: _react.PropTypes.string,
	
	  inputFocused: _react.PropTypes.func.isRequired,
	  inputBlurred: _react.PropTypes.func.isRequired,
	  inputChanged: _react.PropTypes.func.isRequired,
	  updateFocusedSuggestion: _react.PropTypes.func.isRequired,
	  revealSuggestions: _react.PropTypes.func.isRequired,
	  closeSuggestions: _react.PropTypes.func.isRequired
	};
	exports.default = (0, _reactRedux.connect)(mapStateToProps, _redux.actionCreators)(Autosuggest);

/***/ },
/* 131 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _redux = __webpack_require__(27);
	
	var _redux2 = __webpack_require__(67);
	
	var _redux3 = _interopRequireDefault(_redux2);
	
	var _Autosuggest = __webpack_require__(130);
	
	var _Autosuggest2 = _interopRequireDefault(_Autosuggest);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var noop = function noop() {};
	var alwaysTrue = function alwaysTrue() {
	  return true;
	};
	
	var defaultTheme = {
	  container: 'react-autosuggest__container',
	  containerOpen: 'react-autosuggest__container--open',
	  input: 'react-autosuggest__input',
	  suggestionsContainer: 'react-autosuggest__suggestions-container',
	  suggestion: 'react-autosuggest__suggestion',
	  suggestionFocused: 'react-autosuggest__suggestion--focused',
	  sectionContainer: 'react-autosuggest__section-container',
	  sectionTitle: 'react-autosuggest__section-title',
	  sectionSuggestionsContainer: 'react-autosuggest__section-suggestions-container'
	};
	
	function mapToAutowhateverTheme(theme) {
	  var result = {};
	
	  for (var key in theme) {
	    switch (key) {
	      case 'suggestionsContainer':
	        result['itemsContainer'] = theme[key];
	        break;
	
	      case 'suggestion':
	        result['item'] = theme[key];
	        break;
	
	      case 'suggestionFocused':
	        result['itemFocused'] = theme[key];
	        break;
	
	      case 'sectionSuggestionsContainer':
	        result['sectionItemsContainer'] = theme[key];
	        break;
	
	      default:
	        result[key] = theme[key];
	    }
	  }
	
	  return result;
	}
	
	var AutosuggestContainer = function (_Component) {
	  _inherits(AutosuggestContainer, _Component);
	
	  function AutosuggestContainer(_ref) {
	    var alwaysRenderSuggestions = _ref.alwaysRenderSuggestions;
	
	    _classCallCheck(this, AutosuggestContainer);
	
	    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(AutosuggestContainer).call(this));
	
	    var initialState = {
	      isFocused: false,
	      isCollapsed: !alwaysRenderSuggestions,
	      focusedSectionIndex: null,
	      focusedSuggestionIndex: null,
	      valueBeforeUpDown: null,
	      lastAction: null
	    };
	
	    _this.store = (0, _redux.createStore)(_redux3.default, initialState);
	
	    _this.storeInputReference = _this.storeInputReference.bind(_this);
	    return _this;
	  }
	
	  _createClass(AutosuggestContainer, [{
	    key: 'storeInputReference',
	    value: function storeInputReference(input) {
	      this.input = input;
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var _props = this.props;
	      var multiSection = _props.multiSection;
	      var shouldRenderSuggestions = _props.shouldRenderSuggestions;
	      var suggestions = _props.suggestions;
	      var onSuggestionsUpdateRequested = _props.onSuggestionsUpdateRequested;
	      var getSuggestionValue = _props.getSuggestionValue;
	      var renderSuggestion = _props.renderSuggestion;
	      var renderSectionTitle = _props.renderSectionTitle;
	      var getSectionSuggestions = _props.getSectionSuggestions;
	      var inputProps = _props.inputProps;
	      var onSuggestionSelected = _props.onSuggestionSelected;
	      var focusInputOnSuggestionClick = _props.focusInputOnSuggestionClick;
	      var focusFirstSuggestion = _props.focusFirstSuggestion;
	      var alwaysRenderSuggestions = _props.alwaysRenderSuggestions;
	      var theme = _props.theme;
	      var id = _props.id;
	
	
	      return _react2.default.createElement(_Autosuggest2.default, {
	        multiSection: multiSection,
	        shouldRenderSuggestions: alwaysRenderSuggestions ? alwaysTrue : shouldRenderSuggestions,
	        alwaysRenderSuggestions: alwaysRenderSuggestions,
	        suggestions: suggestions,
	        onSuggestionsUpdateRequested: onSuggestionsUpdateRequested,
	        getSuggestionValue: getSuggestionValue,
	        renderSuggestion: renderSuggestion,
	        renderSectionTitle: renderSectionTitle,
	        getSectionSuggestions: getSectionSuggestions,
	        inputProps: inputProps,
	        onSuggestionSelected: onSuggestionSelected,
	        focusInputOnSuggestionClick: focusInputOnSuggestionClick,
	        focusFirstSuggestion: focusFirstSuggestion,
	        theme: mapToAutowhateverTheme(theme),
	        id: id,
	        inputRef: this.storeInputReference,
	        store: this.store });
	    }
	  }]);
	
	  return AutosuggestContainer;
	}(_react.Component);
	
	AutosuggestContainer.propTypes = {
	  suggestions: _react.PropTypes.array.isRequired,
	  onSuggestionsUpdateRequested: _react.PropTypes.func,
	  getSuggestionValue: _react.PropTypes.func.isRequired,
	  renderSuggestion: _react.PropTypes.func.isRequired,
	  inputProps: function inputProps(props, propName) {
	    var inputProps = props[propName];
	
	    if (!inputProps.hasOwnProperty('value')) {
	      throw new Error('\'inputProps\' must have \'value\'.');
	    }
	
	    if (!inputProps.hasOwnProperty('onChange')) {
	      throw new Error('\'inputProps\' must have \'onChange\'.');
	    }
	  },
	  shouldRenderSuggestions: _react.PropTypes.func,
	  alwaysRenderSuggestions: _react.PropTypes.bool,
	  onSuggestionSelected: _react.PropTypes.func,
	  multiSection: _react.PropTypes.bool,
	  renderSectionTitle: _react.PropTypes.func,
	  getSectionSuggestions: _react.PropTypes.func,
	  focusInputOnSuggestionClick: _react.PropTypes.bool,
	  focusFirstSuggestion: _react.PropTypes.bool,
	  theme: _react.PropTypes.object,
	  id: _react.PropTypes.string
	};
	AutosuggestContainer.defaultProps = {
	  onSuggestionsUpdateRequested: noop,
	  shouldRenderSuggestions: function shouldRenderSuggestions(value) {
	    return value.trim().length > 0;
	  },
	  alwaysRenderSuggestions: false,
	  onSuggestionSelected: noop,
	  multiSection: false,
	  renderSectionTitle: function renderSectionTitle() {
	    throw new Error('`renderSectionTitle` must be provided');
	  },
	  getSectionSuggestions: function getSectionSuggestions() {
	    throw new Error('`getSectionSuggestions` must be provided');
	  },
	
	  focusInputOnSuggestionClick: true,
	  focusFirstSuggestion: false,
	  theme: defaultTheme,
	  id: '1'
	};
	exports.default = AutosuggestContainer;

/***/ },
/* 132 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	module.exports = __webpack_require__(131).default;

/***/ },
/* 133 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _sectionIterator = __webpack_require__(139);
	
	var _sectionIterator2 = _interopRequireDefault(_sectionIterator);
	
	var _reactThemeable = __webpack_require__(137);
	
	var _reactThemeable2 = _interopRequireDefault(_reactThemeable);
	
	var _SectionTitle = __webpack_require__(136);
	
	var _SectionTitle2 = _interopRequireDefault(_SectionTitle);
	
	var _ItemsList = __webpack_require__(135);
	
	var _ItemsList2 = _interopRequireDefault(_ItemsList);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var alwaysTrue = function alwaysTrue() {
	  return true;
	};
	var emptyObject = {};
	var defaultTheme = {
	  container: 'react-autowhatever__container',
	  containerOpen: 'react-autowhatever__container--open',
	  input: 'react-autowhatever__input',
	  itemsContainer: 'react-autowhatever__items-container',
	  item: 'react-autowhatever__item',
	  itemFocused: 'react-autowhatever__item--focused',
	  sectionContainer: 'react-autowhatever__section-container',
	  sectionTitle: 'react-autowhatever__section-title',
	  sectionItemsContainer: 'react-autowhatever__section-items-container'
	};
	
	var Autowhatever = function (_Component) {
	  _inherits(Autowhatever, _Component);
	
	  function Autowhatever(props) {
	    _classCallCheck(this, Autowhatever);
	
	    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(Autowhatever).call(this, props));
	
	    _this.setSectionsItems(props);
	    _this.setSectionIterator(props);
	    _this.setTheme(props);
	
	    _this.onKeyDown = _this.onKeyDown.bind(_this);
	    _this.storeInputReference = _this.storeInputReference.bind(_this);
	    _this.storeItemsListReference = _this.storeItemsListReference.bind(_this);
	    _this.getItemId = _this.getItemId.bind(_this);
	    return _this;
	  }
	
	  _createClass(Autowhatever, [{
	    key: 'componentWillReceiveProps',
	    value: function componentWillReceiveProps(nextProps) {
	      if (nextProps.items !== this.props.items) {
	        this.setSectionsItems(nextProps);
	      }
	
	      if (nextProps.items !== this.props.items || nextProps.multiSection !== this.props.multiSection) {
	        this.setSectionIterator(nextProps);
	      }
	
	      if (nextProps.theme !== this.props.theme) {
	        this.setTheme(nextProps);
	      }
	    }
	  }, {
	    key: 'setSectionsItems',
	    value: function setSectionsItems(props) {
	      if (props.multiSection) {
	        this.sectionsItems = props.items.map(function (section) {
	          return props.getSectionItems(section);
	        });
	        this.sectionsLengths = this.sectionsItems.map(function (items) {
	          return items.length;
	        });
	        this.allSectionsAreEmpty = this.sectionsLengths.every(function (itemsCount) {
	          return itemsCount === 0;
	        });
	      }
	    }
	  }, {
	    key: 'setSectionIterator',
	    value: function setSectionIterator(props) {
	      this.sectionIterator = (0, _sectionIterator2.default)({
	        multiSection: props.multiSection,
	        data: props.multiSection ? this.sectionsLengths : props.items.length
	      });
	    }
	  }, {
	    key: 'setTheme',
	    value: function setTheme(props) {
	      this.theme = (0, _reactThemeable2.default)(props.theme);
	    }
	  }, {
	    key: 'storeInputReference',
	    value: function storeInputReference(input) {
	      if (input !== null) {
	        this.input = input;
	      }
	    }
	
	    // Needed only for testing
	
	  }, {
	    key: 'storeItemsListReference',
	    value: function storeItemsListReference(itemsList) {
	      if (itemsList !== null) {
	        this.itemsList = itemsList;
	      }
	    }
	  }, {
	    key: 'getItemId',
	    value: function getItemId(sectionIndex, itemIndex) {
	      if (itemIndex === null) {
	        return null;
	      }
	
	      var id = this.props.id;
	
	      var section = sectionIndex === null ? '' : 'section-' + sectionIndex;
	
	      return 'react-autowhatever-' + id + '-' + section + '-item-' + itemIndex;
	    }
	  }, {
	    key: 'getItemsContainerId',
	    value: function getItemsContainerId() {
	      var id = this.props.id;
	
	
	      return 'react-autowhatever-' + id;
	    }
	  }, {
	    key: 'renderSections',
	    value: function renderSections() {
	      var _this2 = this;
	
	      if (this.allSectionsAreEmpty) {
	        return null;
	      }
	
	      var theme = this.theme;
	      var _props = this.props;
	      var id = _props.id;
	      var items = _props.items;
	      var renderItem = _props.renderItem;
	      var renderItemData = _props.renderItemData;
	      var shouldRenderSection = _props.shouldRenderSection;
	      var renderSectionTitle = _props.renderSectionTitle;
	      var focusedSectionIndex = _props.focusedSectionIndex;
	      var focusedItemIndex = _props.focusedItemIndex;
	      var itemProps = _props.itemProps;
	
	
	      return _react2.default.createElement(
	        'div',
	        theme('react-autowhatever-' + id + '-items-container', 'itemsContainer'),
	        items.map(function (section, sectionIndex) {
	          if (!shouldRenderSection(section)) {
	            return null;
	          }
	
	          var keyPrefix = 'react-autowhatever-' + id + '-';
	          var sectionKeyPrefix = keyPrefix + 'section-' + sectionIndex + '-';
	
	          // `key` is provided by theme()
	          /* eslint-disable react/jsx-key */
	          return _react2.default.createElement(
	            'div',
	            theme(sectionKeyPrefix + 'container', 'sectionContainer'),
	            _react2.default.createElement(_SectionTitle2.default, {
	              section: section,
	              renderSectionTitle: renderSectionTitle,
	              theme: theme,
	              sectionKeyPrefix: sectionKeyPrefix }),
	            _react2.default.createElement(_ItemsList2.default, {
	              id: _this2.getItemsContainerId(),
	              items: _this2.sectionsItems[sectionIndex],
	              itemProps: itemProps,
	              renderItem: renderItem,
	              renderItemData: renderItemData,
	              sectionIndex: sectionIndex,
	              focusedItemIndex: focusedSectionIndex === sectionIndex ? focusedItemIndex : null,
	              getItemId: _this2.getItemId,
	              theme: theme,
	              keyPrefix: keyPrefix,
	              ref: _this2.storeItemsListReference })
	          );
	          /* eslint-enable react/jsx-key */
	        })
	      );
	    }
	  }, {
	    key: 'renderItems',
	    value: function renderItems() {
	      var items = this.props.items;
	
	
	      if (items.length === 0) {
	        return null;
	      }
	
	      var theme = this.theme;
	      var _props2 = this.props;
	      var id = _props2.id;
	      var renderItem = _props2.renderItem;
	      var renderItemData = _props2.renderItemData;
	      var focusedSectionIndex = _props2.focusedSectionIndex;
	      var focusedItemIndex = _props2.focusedItemIndex;
	      var itemProps = _props2.itemProps;
	
	
	      return _react2.default.createElement(_ItemsList2.default, {
	        id: this.getItemsContainerId(),
	        items: items,
	        itemProps: itemProps,
	        renderItem: renderItem,
	        renderItemData: renderItemData,
	        focusedItemIndex: focusedSectionIndex === null ? focusedItemIndex : null,
	        getItemId: this.getItemId,
	        theme: theme,
	        keyPrefix: 'react-autowhatever-' + id + '-',
	        ref: this.storeItemsListReference });
	    }
	  }, {
	    key: 'onKeyDown',
	    value: function onKeyDown(event) {
	      var _props3 = this.props;
	      var inputProps = _props3.inputProps;
	      var focusedSectionIndex = _props3.focusedSectionIndex;
	      var focusedItemIndex = _props3.focusedItemIndex;
	
	
	      switch (event.key) {
	        case 'ArrowDown':
	        case 'ArrowUp':
	          {
	            var nextPrev = event.key === 'ArrowDown' ? 'next' : 'prev';
	
	            var _sectionIterator$next = this.sectionIterator[nextPrev]([focusedSectionIndex, focusedItemIndex]);
	
	            var _sectionIterator$next2 = _slicedToArray(_sectionIterator$next, 2);
	
	            var newFocusedSectionIndex = _sectionIterator$next2[0];
	            var newFocusedItemIndex = _sectionIterator$next2[1];
	
	
	            inputProps.onKeyDown(event, { newFocusedSectionIndex: newFocusedSectionIndex, newFocusedItemIndex: newFocusedItemIndex });
	            break;
	          }
	
	        default:
	          inputProps.onKeyDown(event, { focusedSectionIndex: focusedSectionIndex, focusedItemIndex: focusedItemIndex });
	      }
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var theme = this.theme;
	      var _props4 = this.props;
	      var id = _props4.id;
	      var multiSection = _props4.multiSection;
	      var focusedSectionIndex = _props4.focusedSectionIndex;
	      var focusedItemIndex = _props4.focusedItemIndex;
	
	      var renderedItems = multiSection ? this.renderSections() : this.renderItems();
	      var isOpen = renderedItems !== null;
	      var ariaActivedescendant = this.getItemId(focusedSectionIndex, focusedItemIndex);
	      var inputProps = _extends({
	        type: 'text',
	        value: '',
	        autoComplete: 'off',
	        role: 'combobox',
	        'aria-autocomplete': 'list',
	        'aria-owns': this.getItemsContainerId(),
	        'aria-expanded': isOpen,
	        'aria-activedescendant': ariaActivedescendant
	      }, theme('react-autowhatever-' + id + '-input', 'input'), this.props.inputProps, {
	        onKeyDown: this.props.inputProps.onKeyDown && this.onKeyDown,
	        ref: this.storeInputReference
	      });
	
	      return _react2.default.createElement(
	        'div',
	        theme('react-autowhatever-' + id + '-container', 'container', isOpen && 'containerOpen'),
	        _react2.default.createElement('input', inputProps),
	        renderedItems
	      );
	    }
	  }]);
	
	  return Autowhatever;
	}(_react.Component);
	
	Autowhatever.propTypes = {
	  id: _react.PropTypes.string, // Used in aria-* attributes. If multiple Autowhatever's are rendered on a page, they must have unique ids.
	  multiSection: _react.PropTypes.bool, // Indicates whether a multi section layout should be rendered.
	  items: _react.PropTypes.array.isRequired, // Array of items or sections to render.
	  renderItem: _react.PropTypes.func, // This function renders a single item.
	  renderItemData: _react.PropTypes.object, // Arbitrary data that will be passed to renderItem()
	  shouldRenderSection: _react.PropTypes.func, // This function gets a section and returns whether it should be rendered, or not.
	  renderSectionTitle: _react.PropTypes.func, // This function gets a section and renders its title.
	  getSectionItems: _react.PropTypes.func, // This function gets a section and returns its items, which will be passed into `renderItem` for rendering.
	  inputProps: _react.PropTypes.object, // Arbitrary input props
	  itemProps: _react.PropTypes.oneOfType([// Arbitrary item props
	  _react.PropTypes.object, _react.PropTypes.func]),
	  focusedSectionIndex: _react.PropTypes.number, // Section index of the focused item
	  focusedItemIndex: _react.PropTypes.number, // Focused item index (within a section)
	  theme: _react.PropTypes.object // Styles. See: https://github.com/markdalgleish/react-themeable
	};
	Autowhatever.defaultProps = {
	  id: '1',
	  multiSection: false,
	  shouldRenderSection: alwaysTrue,
	  renderItem: function renderItem() {
	    throw new Error('`renderItem` must be provided');
	  },
	  renderItemData: emptyObject,
	  renderSectionTitle: function renderSectionTitle() {
	    throw new Error('`renderSectionTitle` must be provided');
	  },
	  getSectionItems: function getSectionItems() {
	    throw new Error('`getSectionItems` must be provided');
	  },
	  inputProps: emptyObject,
	  itemProps: emptyObject,
	  focusedSectionIndex: null,
	  focusedItemIndex: null,
	  theme: defaultTheme
	};
	exports.default = Autowhatever;

/***/ },
/* 134 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _compareObjects = __webpack_require__(35);
	
	var _compareObjects2 = _interopRequireDefault(_compareObjects);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _objectWithoutProperties(obj, keys) { var target = {}; for (var i in obj) { if (keys.indexOf(i) >= 0) continue; if (!Object.prototype.hasOwnProperty.call(obj, i)) continue; target[i] = obj[i]; } return target; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var Item = function (_Component) {
	  _inherits(Item, _Component);
	
	  function Item() {
	    _classCallCheck(this, Item);
	
	    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(Item).call(this));
	
	    _this.storeItemReference = _this.storeItemReference.bind(_this);
	    _this.onMouseEnter = _this.onMouseEnter.bind(_this);
	    _this.onMouseLeave = _this.onMouseLeave.bind(_this);
	    _this.onMouseDown = _this.onMouseDown.bind(_this);
	    _this.onClick = _this.onClick.bind(_this);
	    return _this;
	  }
	
	  _createClass(Item, [{
	    key: 'shouldComponentUpdate',
	    value: function shouldComponentUpdate(nextProps) {
	      return (0, _compareObjects2.default)(nextProps, this.props, ['renderItemData']);
	    }
	  }, {
	    key: 'storeItemReference',
	    value: function storeItemReference(item) {
	      if (item !== null) {
	        this.item = item;
	      }
	    }
	  }, {
	    key: 'onMouseEnter',
	    value: function onMouseEnter(event) {
	      var _props = this.props;
	      var sectionIndex = _props.sectionIndex;
	      var itemIndex = _props.itemIndex;
	
	
	      this.props.onMouseEnter(event, { sectionIndex: sectionIndex, itemIndex: itemIndex });
	    }
	  }, {
	    key: 'onMouseLeave',
	    value: function onMouseLeave(event) {
	      var _props2 = this.props;
	      var sectionIndex = _props2.sectionIndex;
	      var itemIndex = _props2.itemIndex;
	
	
	      this.props.onMouseLeave(event, { sectionIndex: sectionIndex, itemIndex: itemIndex });
	    }
	  }, {
	    key: 'onMouseDown',
	    value: function onMouseDown(event) {
	      var _props3 = this.props;
	      var sectionIndex = _props3.sectionIndex;
	      var itemIndex = _props3.itemIndex;
	
	
	      this.props.onMouseDown(event, { sectionIndex: sectionIndex, itemIndex: itemIndex });
	    }
	  }, {
	    key: 'onClick',
	    value: function onClick(event) {
	      var _props4 = this.props;
	      var sectionIndex = _props4.sectionIndex;
	      var itemIndex = _props4.itemIndex;
	
	
	      this.props.onClick(event, { sectionIndex: sectionIndex, itemIndex: itemIndex });
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var _props5 = this.props;
	      var item = _props5.item;
	      var renderItem = _props5.renderItem;
	      var renderItemData = _props5.renderItemData;
	
	      var restProps = _objectWithoutProperties(_props5, ['item', 'renderItem', 'renderItemData']);
	
	      delete restProps.sectionIndex;
	      delete restProps.itemIndex;
	
	      if (typeof restProps.onMouseEnter === 'function') {
	        restProps.onMouseEnter = this.onMouseEnter;
	      }
	
	      if (typeof restProps.onMouseLeave === 'function') {
	        restProps.onMouseLeave = this.onMouseLeave;
	      }
	
	      if (typeof restProps.onMouseDown === 'function') {
	        restProps.onMouseDown = this.onMouseDown;
	      }
	
	      if (typeof restProps.onClick === 'function') {
	        restProps.onClick = this.onClick;
	      }
	
	      return _react2.default.createElement(
	        'li',
	        _extends({ role: 'option' }, restProps, { ref: this.storeItemReference }),
	        renderItem(item, renderItemData)
	      );
	    }
	  }]);
	
	  return Item;
	}(_react.Component);
	
	Item.propTypes = {
	  sectionIndex: _react.PropTypes.number,
	  itemIndex: _react.PropTypes.number.isRequired,
	  item: _react.PropTypes.any.isRequired,
	  renderItem: _react.PropTypes.func.isRequired,
	  renderItemData: _react.PropTypes.object.isRequired,
	  onMouseEnter: _react.PropTypes.func,
	  onMouseLeave: _react.PropTypes.func,
	  onMouseDown: _react.PropTypes.func,
	  onClick: _react.PropTypes.func
	};
	exports.default = Item;

/***/ },
/* 135 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _Item = __webpack_require__(134);
	
	var _Item2 = _interopRequireDefault(_Item);
	
	var _compareObjects = __webpack_require__(35);
	
	var _compareObjects2 = _interopRequireDefault(_compareObjects);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var ItemsList = function (_Component) {
	  _inherits(ItemsList, _Component);
	
	  function ItemsList() {
	    _classCallCheck(this, ItemsList);
	
	    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(ItemsList).call(this));
	
	    _this.storeItemsContainerReference = _this.storeItemsContainerReference.bind(_this);
	    _this.storeFocusedItemReference = _this.storeFocusedItemReference.bind(_this);
	    return _this;
	  }
	
	  _createClass(ItemsList, [{
	    key: 'componentDidMount',
	    value: function componentDidMount() {
	      this.ensureFocusedItemIsVisible();
	    }
	  }, {
	    key: 'shouldComponentUpdate',
	    value: function shouldComponentUpdate(nextProps) {
	      return (0, _compareObjects2.default)(nextProps, this.props, ['itemProps']);
	    }
	  }, {
	    key: 'componentDidUpdate',
	    value: function componentDidUpdate() {
	      this.ensureFocusedItemIsVisible();
	    }
	  }, {
	    key: 'storeItemsContainerReference',
	    value: function storeItemsContainerReference(itemsContainer) {
	      if (itemsContainer !== null) {
	        this.itemsContainer = itemsContainer;
	      }
	    }
	  }, {
	    key: 'storeFocusedItemReference',
	    value: function storeFocusedItemReference(focusedItem) {
	      if (focusedItem !== null) {
	        this.focusedItem = focusedItem.item;
	      }
	    }
	  }, {
	    key: 'ensureFocusedItemIsVisible',
	    value: function ensureFocusedItemIsVisible() {
	      if (!this.focusedItem) {
	        return;
	      }
	
	      var focusedItem = this.focusedItem;
	      var itemsContainer = this.itemsContainer;
	
	      var itemOffsetRelativeToContainer = focusedItem.offsetParent === itemsContainer ? focusedItem.offsetTop : focusedItem.offsetTop - itemsContainer.offsetTop;
	
	      var scrollTop = itemsContainer.scrollTop; // Top of the visible area
	
	      if (itemOffsetRelativeToContainer < scrollTop) {
	        // Item is off the top of the visible area
	        scrollTop = itemOffsetRelativeToContainer;
	      } else if (itemOffsetRelativeToContainer + focusedItem.offsetHeight > scrollTop + itemsContainer.offsetHeight) {
	        // Item is off the bottom of the visible area
	        scrollTop = itemOffsetRelativeToContainer + focusedItem.offsetHeight - itemsContainer.offsetHeight;
	      }
	
	      if (scrollTop !== itemsContainer.scrollTop) {
	        itemsContainer.scrollTop = scrollTop;
	      }
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var _this2 = this;
	
	      var _props = this.props;
	      var id = _props.id;
	      var items = _props.items;
	      var itemProps = _props.itemProps;
	      var renderItem = _props.renderItem;
	      var renderItemData = _props.renderItemData;
	      var sectionIndex = _props.sectionIndex;
	      var focusedItemIndex = _props.focusedItemIndex;
	      var getItemId = _props.getItemId;
	      var theme = _props.theme;
	      var keyPrefix = _props.keyPrefix;
	
	      var sectionPrefix = sectionIndex === null ? keyPrefix : keyPrefix + 'section-' + sectionIndex + '-';
	      var itemsContainerClass = sectionIndex === null ? 'itemsContainer' : 'sectionItemsContainer';
	      var isItemPropsFunction = typeof itemProps === 'function';
	
	      return _react2.default.createElement(
	        'ul',
	        _extends({
	          id: id,
	          ref: this.storeItemsContainerReference,
	          role: 'listbox'
	        }, theme(sectionPrefix + 'items-container', itemsContainerClass)),
	        items.map(function (item, itemIndex) {
	          var isFocused = itemIndex === focusedItemIndex;
	          var itemKey = sectionPrefix + 'item-' + itemIndex;
	          var itemPropsObj = isItemPropsFunction ? itemProps({ sectionIndex: sectionIndex, itemIndex: itemIndex }) : itemProps;
	          var allItemProps = _extends({
	            id: getItemId(sectionIndex, itemIndex)
	          }, theme(itemKey, 'item', isFocused && 'itemFocused'), itemPropsObj);
	
	          if (isFocused) {
	            allItemProps.ref = _this2.storeFocusedItemReference;
	          }
	
	          // `key` is provided by theme()
	          /* eslint-disable react/jsx-key */
	          return _react2.default.createElement(_Item2.default, _extends({}, allItemProps, {
	            sectionIndex: sectionIndex,
	            itemIndex: itemIndex,
	            item: item,
	            renderItem: renderItem,
	            renderItemData: renderItemData }));
	          /* eslint-enable react/jsx-key */
	        })
	      );
	    }
	  }]);
	
	  return ItemsList;
	}(_react.Component);
	
	ItemsList.propTypes = {
	  id: _react.PropTypes.string.isRequired,
	  items: _react.PropTypes.array.isRequired,
	  itemProps: _react.PropTypes.oneOfType([_react.PropTypes.object, _react.PropTypes.func]),
	  renderItem: _react.PropTypes.func.isRequired,
	  renderItemData: _react.PropTypes.object.isRequired,
	  sectionIndex: _react.PropTypes.number,
	  focusedItemIndex: _react.PropTypes.number,
	  getItemId: _react.PropTypes.func.isRequired,
	  theme: _react.PropTypes.func.isRequired,
	  keyPrefix: _react.PropTypes.string.isRequired
	};
	ItemsList.defaultProps = {
	  sectionIndex: null
	};
	exports.default = ItemsList;

/***/ },
/* 136 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _compareObjects = __webpack_require__(35);
	
	var _compareObjects2 = _interopRequireDefault(_compareObjects);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var SectionTitle = function (_Component) {
	  _inherits(SectionTitle, _Component);
	
	  function SectionTitle() {
	    _classCallCheck(this, SectionTitle);
	
	    return _possibleConstructorReturn(this, Object.getPrototypeOf(SectionTitle).apply(this, arguments));
	  }
	
	  _createClass(SectionTitle, [{
	    key: 'shouldComponentUpdate',
	    value: function shouldComponentUpdate(nextProps) {
	      return (0, _compareObjects2.default)(nextProps, this.props);
	    }
	  }, {
	    key: 'render',
	    value: function render() {
	      var _props = this.props;
	      var section = _props.section;
	      var renderSectionTitle = _props.renderSectionTitle;
	      var theme = _props.theme;
	      var sectionKeyPrefix = _props.sectionKeyPrefix;
	
	      var sectionTitle = renderSectionTitle(section);
	
	      if (!sectionTitle) {
	        return null;
	      }
	
	      return _react2.default.createElement(
	        'div',
	        theme(sectionKeyPrefix + 'title', 'sectionTitle'),
	        sectionTitle
	      );
	    }
	  }]);
	
	  return SectionTitle;
	}(_react.Component);
	
	SectionTitle.propTypes = {
	  section: _react.PropTypes.any.isRequired,
	  renderSectionTitle: _react.PropTypes.func.isRequired,
	  theme: _react.PropTypes.func.isRequired,
	  sectionKeyPrefix: _react.PropTypes.string.isRequired
	};
	exports.default = SectionTitle;

/***/ },
/* 137 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, '__esModule', {
	  value: true
	});
	
	var _slicedToArray = (function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i['return']) _i['return'](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError('Invalid attempt to destructure non-iterable instance'); } }; })();
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }
	
	function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i]; return arr2; } else { return Array.from(arr); } }
	
	var _objectAssign = __webpack_require__(138);
	
	var _objectAssign2 = _interopRequireDefault(_objectAssign);
	
	var truthy = function truthy(x) {
	  return x;
	};
	
	exports['default'] = function (input) {
	  var _ref = Array.isArray(input) && input.length === 2 ? input : [input, null];
	
	  var _ref2 = _slicedToArray(_ref, 2);
	
	  var theme = _ref2[0];
	  var classNameDecorator = _ref2[1];
	
	  return function (key) {
	    for (var _len = arguments.length, names = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
	      names[_key - 1] = arguments[_key];
	    }
	
	    var styles = names.map(function (name) {
	      return theme[name];
	    }).filter(truthy);
	
	    return typeof styles[0] === 'string' || typeof classNameDecorator === 'function' ? { key: key, className: classNameDecorator ? classNameDecorator.apply(undefined, _toConsumableArray(styles)) : styles.join(' ') } : { key: key, style: _objectAssign2['default'].apply(undefined, [{}].concat(_toConsumableArray(styles))) };
	  };
	};
	
	module.exports = exports['default'];

/***/ },
/* 138 */
/***/ function(module, exports) {

	'use strict';
	var propIsEnumerable = Object.prototype.propertyIsEnumerable;
	
	function ToObject(val) {
		if (val == null) {
			throw new TypeError('Object.assign cannot be called with null or undefined');
		}
	
		return Object(val);
	}
	
	function ownEnumerableKeys(obj) {
		var keys = Object.getOwnPropertyNames(obj);
	
		if (Object.getOwnPropertySymbols) {
			keys = keys.concat(Object.getOwnPropertySymbols(obj));
		}
	
		return keys.filter(function (key) {
			return propIsEnumerable.call(obj, key);
		});
	}
	
	module.exports = Object.assign || function (target, source) {
		var from;
		var keys;
		var to = ToObject(target);
	
		for (var s = 1; s < arguments.length; s++) {
			from = arguments[s];
			keys = ownEnumerableKeys(Object(from));
	
			for (var i = 0; i < keys.length; i++) {
				to[keys[i]] = from[keys[i]];
			}
		}
	
		return to;
	};


/***/ },
/* 139 */
/***/ function(module, exports) {

	"use strict";
	
	var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();
	
	module.exports = function (_ref) {
	  var data = _ref.data;
	  var multiSection = _ref.multiSection;
	
	  function nextNonEmptySectionIndex(sectionIndex) {
	    if (sectionIndex === null) {
	      sectionIndex = 0;
	    } else {
	      sectionIndex++;
	    }
	
	    while (sectionIndex < data.length && data[sectionIndex] === 0) {
	      sectionIndex++;
	    }
	
	    return sectionIndex === data.length ? null : sectionIndex;
	  }
	
	  function prevNonEmptySectionIndex(sectionIndex) {
	    if (sectionIndex === null) {
	      sectionIndex = data.length - 1;
	    } else {
	      sectionIndex--;
	    }
	
	    while (sectionIndex >= 0 && data[sectionIndex] === 0) {
	      sectionIndex--;
	    }
	
	    return sectionIndex === -1 ? null : sectionIndex;
	  }
	
	  function next(position) {
	    var _position = _slicedToArray(position, 2);
	
	    var sectionIndex = _position[0];
	    var itemIndex = _position[1];
	
	
	    if (multiSection) {
	      if (itemIndex === null || itemIndex === data[sectionIndex] - 1) {
	        sectionIndex = nextNonEmptySectionIndex(sectionIndex);
	
	        if (sectionIndex === null) {
	          return [null, null];
	        }
	
	        return [sectionIndex, 0];
	      }
	
	      return [sectionIndex, itemIndex + 1];
	    }
	
	    if (data === 0 || itemIndex === data - 1) {
	      return [null, null];
	    }
	
	    if (itemIndex === null) {
	      return [null, 0];
	    }
	
	    return [null, itemIndex + 1];
	  }
	
	  function prev(position) {
	    var _position2 = _slicedToArray(position, 2);
	
	    var sectionIndex = _position2[0];
	    var itemIndex = _position2[1];
	
	
	    if (multiSection) {
	      if (itemIndex === null || itemIndex === 0) {
	        sectionIndex = prevNonEmptySectionIndex(sectionIndex);
	
	        if (sectionIndex === null) {
	          return [null, null];
	        }
	
	        return [sectionIndex, data[sectionIndex] - 1];
	      }
	
	      return [sectionIndex, itemIndex - 1];
	    }
	
	    if (data === 0 || itemIndex === 0) {
	      return [null, null];
	    }
	
	    if (itemIndex === null) {
	      return [null, data - 1];
	    }
	
	    return [null, itemIndex - 1];
	  }
	
	  function isLast(position) {
	    return next(position)[1] === null;
	  }
	
	  return {
	    next: next,
	    prev: prev,
	    isLast: isLast
	  };
	};


/***/ },
/* 140 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Component = _react2.default.createClass({
	
		displayName: 'PopupAction',
	
		propTypes: {
			children: _react2.default.PropTypes.node.isRequired
		},
	
		getInitialProps: function getInitialProps() {
			return {
				onClick: function onClick() {},
				className: 'btn',
				url: null
			};
		},
	
		handleClick: function handleClick() {
			return this.props.onClick();
		},
	
		render: function render() {
			var className = this.props.className,
			    url = false;
	
			if (this.props.url) {
				if (this.props.url !== '#') {
					url = true;
				}
	
				if (!url) {
					return _react2.default.createElement(
						'a',
						{ target: '_blank', className: className },
						this.props.children
					);
				}
	
				return _react2.default.createElement(
					'a',
					{ href: this.props.url, target: '_blank', className: className },
					this.props.children
				);
			}
	
			return _react2.default.createElement(
				'button',
				{ onClick: this.handleClick, className: className },
				this.props.children
			);
		}
	
	});
	
	exports.default = Component;

/***/ },
/* 141 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _ActionButton = __webpack_require__(140);
	
	var _ActionButton2 = _interopRequireDefault(_ActionButton);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var ButtonsSpace = void 0,
	    Component = void 0;
	
	ButtonsSpace = _react2.default.createClass({
	
		displayName: 'PopupFooterButtons',
	
		getInitialProps: function getInitialProps() {
			return {
				buttons: null,
				className: null,
				onOk: null,
				onClose: null,
				buttonClick: null,
				btnClass: null,
				href: null
			};
		},
	
		onOk: function onOk() {
			if (this.props.onOk) {
				return this.props.onOk();
			}
		},
	
		onClose: function onClose() {
			if (this.props.onClose) {
				return this.props.onClose();
			}
		},
	
		buttonClick: function buttonClick(action) {
			if (this.props.buttonClick) {
				return this.props.buttonClick(action);
			}
		},
	
		wildClass: function wildClass(className, base) {
			if (!className) {
				return null;
			}
	
			if (this.props.wildClasses) {
				return className;
			}
	
			var finalClass = [],
			    classNames = className.split(' ');
	
			classNames.forEach(function (className) {
				finalClass.push(base + '--' + className);
			});
	
			return finalClass.join(' ');
		},
	
		render: function render() {
			if (!this.props.buttons) {
				return null;
			}
	
			var i,
			    btns = [],
			    btn,
			    className,
			    url;
	
			for (i = 0; i < this.props.buttons.length; i++) {
				btn = this.props.buttons[i];
				url = btn.url ? btn.url : null;
	
				if (typeof btn === 'string') {
					if (btn === 'ok') {
						btns.push(_react2.default.createElement(
							_ActionButton2.default,
							{ className: this.props.btnClass + ' ' + this.props.btnClass + '--ok', key: i, onClick: this.onOk },
							this.props.defaultOk
						));
					} else if (btn === 'cancel') {
						btns.push(_react2.default.createElement(
							_ActionButton2.default,
							{ className: this.props.btnClass + ' ' + this.props.btnClass + '--cancel', key: i, onClick: this.onClose },
							this.props.defaultCancel
						));
					}
				} else {
					className = this.props.btnClass + ' ' + this.wildClass(btn.className, this.props.btnClass);
					btns.push(_react2.default.createElement(
						_ActionButton2.default,
						{ className: className, key: i, url: url, onClick: this.buttonClick.bind(this, btn.action) },
						btn.text
					));
				}
			}
	
			return _react2.default.createElement(
				'div',
				{ className: this.props.className },
				btns
			);
		}
	
	});
	
	Component = _react2.default.createClass({
	
		displayName: 'PopupFooter',
	
		getInitialProps: function getInitialProps() {
			return {
				buttons: null,
				className: null,
				wildClasses: false,
				btnClass: null,
				defaultOk: null,
				defaultCancel: null,
				buttonClick: null,
				onOk: null,
				onClose: null
			};
		},
	
		render: function render() {
			if (this.props.buttons) {
				return _react2.default.createElement(
					'footer',
					{ className: this.props.className },
					_react2.default.createElement(ButtonsSpace, {
						buttonClick: this.props.buttonClick,
						onOk: this.props.onOk,
						onClose: this.props.onClose,
						className: this.props.className + '__left-space',
						wildClasses: this.props.wildClasses,
						btnClass: this.props.btnClass,
						defaultOk: this.props.defaultOk,
						defaultCancel: this.props.defaultCancel,
						buttons: this.props.buttons.left }),
					_react2.default.createElement(ButtonsSpace, {
						buttonClick: this.props.buttonClick,
						onOk: this.props.onOk,
						onClose: this.props.onClose,
						className: this.props.className + '__right-space',
						wildClasses: this.props.wildClasses,
						btnClass: this.props.btnClass,
						defaultOk: this.props.defaultOk,
						defaultCancel: this.props.defaultCancel,
						buttons: this.props.buttons.right })
				);
			}
	
			return null;
		}
	
	});
	
	exports.default = Component;

/***/ },
/* 142 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Component = _react2.default.createClass({
	
		displayName: 'PopupHeader',
	
		getInitialProps: function getInitialProps() {
			return {
				title: null,
				className: null
			};
		},
	
		render: function render() {
			if (this.props.title) {
				return _react2.default.createElement(
					'header',
					{ className: this.props.className },
					_react2.default.createElement(
						'h1',
						{ className: this.props.className + '__title' },
						this.props.title
					)
				);
			}
	
			return null;
		}
	
	});
	
	exports.default = Component;

/***/ },
/* 143 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _react = __webpack_require__(4);
	
	var _react2 = _interopRequireDefault(_react);
	
	var _reactDom = __webpack_require__(36);
	
	var _reactDom2 = _interopRequireDefault(_reactDom);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var Component = _react2.default.createClass({
	
		displayName: 'PopupInput',
	
		getInitialState: function getInitialState() {
			return {
				value: this.props.value
			};
		},
	
		getInitialProps: function getInitialProps() {
			return {
				className: 'input',
				value: '',
				placeholder: '',
				type: 'text',
				onChange: function onChange() {}
			};
		},
	
		componentDidMount: function componentDidMount() {
			_reactDom2.default.findDOMNode(this).focus();
		},
	
		handleChange: function handleChange(event) {
			this.setState({ value: event.target.value });
			this.props.onChange(event.target.value);
		},
	
		render: function render() {
			var className = this.props.className;
	
			return _react2.default.createElement('input', { value: this.state.value, className: className, placeholder: this.props.placeholder, type: this.props.type, onChange: this.handleChange });
		}
	
	});
	
	exports.default = Component;

/***/ },
/* 144 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = undefined;
	
	var _react = __webpack_require__(4);
	
	var _storeShape = __webpack_require__(69);
	
	var _storeShape2 = _interopRequireDefault(_storeShape);
	
	var _warning = __webpack_require__(70);
	
	var _warning2 = _interopRequireDefault(_warning);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var didWarnAboutReceivingStore = false;
	function warnAboutReceivingStore() {
	  if (didWarnAboutReceivingStore) {
	    return;
	  }
	  didWarnAboutReceivingStore = true;
	
	  (0, _warning2["default"])('<Provider> does not support changing `store` on the fly. ' + 'It is most likely that you see this error because you updated to ' + 'Redux 2.x and React Redux 2.x which no longer hot reload reducers ' + 'automatically. See https://github.com/reactjs/react-redux/releases/' + 'tag/v2.0.0 for the migration instructions.');
	}
	
	var Provider = function (_Component) {
	  _inherits(Provider, _Component);
	
	  Provider.prototype.getChildContext = function getChildContext() {
	    return { store: this.store };
	  };
	
	  function Provider(props, context) {
	    _classCallCheck(this, Provider);
	
	    var _this = _possibleConstructorReturn(this, _Component.call(this, props, context));
	
	    _this.store = props.store;
	    return _this;
	  }
	
	  Provider.prototype.render = function render() {
	    var children = this.props.children;
	
	    return _react.Children.only(children);
	  };
	
	  return Provider;
	}(_react.Component);
	
	exports["default"] = Provider;
	
	if (false) {
	  Provider.prototype.componentWillReceiveProps = function (nextProps) {
	    var store = this.store;
	    var nextStore = nextProps.store;
	
	    if (store !== nextStore) {
	      warnAboutReceivingStore();
	    }
	  };
	}
	
	Provider.propTypes = {
	  store: _storeShape2["default"].isRequired,
	  children: _react.PropTypes.element.isRequired
	};
	Provider.childContextTypes = {
	  store: _storeShape2["default"].isRequired
	};

/***/ },
/* 145 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	exports.__esModule = true;
	exports["default"] = connect;
	
	var _react = __webpack_require__(4);
	
	var _storeShape = __webpack_require__(69);
	
	var _storeShape2 = _interopRequireDefault(_storeShape);
	
	var _shallowEqual = __webpack_require__(146);
	
	var _shallowEqual2 = _interopRequireDefault(_shallowEqual);
	
	var _wrapActionCreators = __webpack_require__(147);
	
	var _wrapActionCreators2 = _interopRequireDefault(_wrapActionCreators);
	
	var _warning = __webpack_require__(70);
	
	var _warning2 = _interopRequireDefault(_warning);
	
	var _isPlainObject = __webpack_require__(154);
	
	var _isPlainObject2 = _interopRequireDefault(_isPlainObject);
	
	var _hoistNonReactStatics = __webpack_require__(148);
	
	var _hoistNonReactStatics2 = _interopRequireDefault(_hoistNonReactStatics);
	
	var _invariant = __webpack_require__(149);
	
	var _invariant2 = _interopRequireDefault(_invariant);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }
	
	function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }
	
	var defaultMapStateToProps = function defaultMapStateToProps(state) {
	  return {};
	}; // eslint-disable-line no-unused-vars
	var defaultMapDispatchToProps = function defaultMapDispatchToProps(dispatch) {
	  return { dispatch: dispatch };
	};
	var defaultMergeProps = function defaultMergeProps(stateProps, dispatchProps, parentProps) {
	  return _extends({}, parentProps, stateProps, dispatchProps);
	};
	
	function getDisplayName(WrappedComponent) {
	  return WrappedComponent.displayName || WrappedComponent.name || 'Component';
	}
	
	var errorObject = { value: null };
	function tryCatch(fn, ctx) {
	  try {
	    return fn.apply(ctx);
	  } catch (e) {
	    errorObject.value = e;
	    return errorObject;
	  }
	}
	
	// Helps track hot reloading.
	var nextVersion = 0;
	
	function connect(mapStateToProps, mapDispatchToProps, mergeProps) {
	  var options = arguments.length <= 3 || arguments[3] === undefined ? {} : arguments[3];
	
	  var shouldSubscribe = Boolean(mapStateToProps);
	  var mapState = mapStateToProps || defaultMapStateToProps;
	
	  var mapDispatch = undefined;
	  if (typeof mapDispatchToProps === 'function') {
	    mapDispatch = mapDispatchToProps;
	  } else if (!mapDispatchToProps) {
	    mapDispatch = defaultMapDispatchToProps;
	  } else {
	    mapDispatch = (0, _wrapActionCreators2["default"])(mapDispatchToProps);
	  }
	
	  var finalMergeProps = mergeProps || defaultMergeProps;
	  var _options$pure = options.pure;
	  var pure = _options$pure === undefined ? true : _options$pure;
	  var _options$withRef = options.withRef;
	  var withRef = _options$withRef === undefined ? false : _options$withRef;
	
	  var checkMergedEquals = pure && finalMergeProps !== defaultMergeProps;
	
	  // Helps track hot reloading.
	  var version = nextVersion++;
	
	  return function wrapWithConnect(WrappedComponent) {
	    var connectDisplayName = 'Connect(' + getDisplayName(WrappedComponent) + ')';
	
	    function checkStateShape(props, methodName) {
	      if (!(0, _isPlainObject2["default"])(props)) {
	        (0, _warning2["default"])(methodName + '() in ' + connectDisplayName + ' must return a plain object. ' + ('Instead received ' + props + '.'));
	      }
	    }
	
	    function computeMergedProps(stateProps, dispatchProps, parentProps) {
	      var mergedProps = finalMergeProps(stateProps, dispatchProps, parentProps);
	      if (false) {
	        checkStateShape(mergedProps, 'mergeProps');
	      }
	      return mergedProps;
	    }
	
	    var Connect = function (_Component) {
	      _inherits(Connect, _Component);
	
	      Connect.prototype.shouldComponentUpdate = function shouldComponentUpdate() {
	        return !pure || this.haveOwnPropsChanged || this.hasStoreStateChanged;
	      };
	
	      function Connect(props, context) {
	        _classCallCheck(this, Connect);
	
	        var _this = _possibleConstructorReturn(this, _Component.call(this, props, context));
	
	        _this.version = version;
	        _this.store = props.store || context.store;
	
	        (0, _invariant2["default"])(_this.store, 'Could not find "store" in either the context or ' + ('props of "' + connectDisplayName + '". ') + 'Either wrap the root component in a <Provider>, ' + ('or explicitly pass "store" as a prop to "' + connectDisplayName + '".'));
	
	        var storeState = _this.store.getState();
	        _this.state = { storeState: storeState };
	        _this.clearCache();
	        return _this;
	      }
	
	      Connect.prototype.computeStateProps = function computeStateProps(store, props) {
	        if (!this.finalMapStateToProps) {
	          return this.configureFinalMapState(store, props);
	        }
	
	        var state = store.getState();
	        var stateProps = this.doStatePropsDependOnOwnProps ? this.finalMapStateToProps(state, props) : this.finalMapStateToProps(state);
	
	        if (false) {
	          checkStateShape(stateProps, 'mapStateToProps');
	        }
	        return stateProps;
	      };
	
	      Connect.prototype.configureFinalMapState = function configureFinalMapState(store, props) {
	        var mappedState = mapState(store.getState(), props);
	        var isFactory = typeof mappedState === 'function';
	
	        this.finalMapStateToProps = isFactory ? mappedState : mapState;
	        this.doStatePropsDependOnOwnProps = this.finalMapStateToProps.length !== 1;
	
	        if (isFactory) {
	          return this.computeStateProps(store, props);
	        }
	
	        if (false) {
	          checkStateShape(mappedState, 'mapStateToProps');
	        }
	        return mappedState;
	      };
	
	      Connect.prototype.computeDispatchProps = function computeDispatchProps(store, props) {
	        if (!this.finalMapDispatchToProps) {
	          return this.configureFinalMapDispatch(store, props);
	        }
	
	        var dispatch = store.dispatch;
	
	        var dispatchProps = this.doDispatchPropsDependOnOwnProps ? this.finalMapDispatchToProps(dispatch, props) : this.finalMapDispatchToProps(dispatch);
	
	        if (false) {
	          checkStateShape(dispatchProps, 'mapDispatchToProps');
	        }
	        return dispatchProps;
	      };
	
	      Connect.prototype.configureFinalMapDispatch = function configureFinalMapDispatch(store, props) {
	        var mappedDispatch = mapDispatch(store.dispatch, props);
	        var isFactory = typeof mappedDispatch === 'function';
	
	        this.finalMapDispatchToProps = isFactory ? mappedDispatch : mapDispatch;
	        this.doDispatchPropsDependOnOwnProps = this.finalMapDispatchToProps.length !== 1;
	
	        if (isFactory) {
	          return this.computeDispatchProps(store, props);
	        }
	
	        if (false) {
	          checkStateShape(mappedDispatch, 'mapDispatchToProps');
	        }
	        return mappedDispatch;
	      };
	
	      Connect.prototype.updateStatePropsIfNeeded = function updateStatePropsIfNeeded() {
	        var nextStateProps = this.computeStateProps(this.store, this.props);
	        if (this.stateProps && (0, _shallowEqual2["default"])(nextStateProps, this.stateProps)) {
	          return false;
	        }
	
	        this.stateProps = nextStateProps;
	        return true;
	      };
	
	      Connect.prototype.updateDispatchPropsIfNeeded = function updateDispatchPropsIfNeeded() {
	        var nextDispatchProps = this.computeDispatchProps(this.store, this.props);
	        if (this.dispatchProps && (0, _shallowEqual2["default"])(nextDispatchProps, this.dispatchProps)) {
	          return false;
	        }
	
	        this.dispatchProps = nextDispatchProps;
	        return true;
	      };
	
	      Connect.prototype.updateMergedPropsIfNeeded = function updateMergedPropsIfNeeded() {
	        var nextMergedProps = computeMergedProps(this.stateProps, this.dispatchProps, this.props);
	        if (this.mergedProps && checkMergedEquals && (0, _shallowEqual2["default"])(nextMergedProps, this.mergedProps)) {
	          return false;
	        }
	
	        this.mergedProps = nextMergedProps;
	        return true;
	      };
	
	      Connect.prototype.isSubscribed = function isSubscribed() {
	        return typeof this.unsubscribe === 'function';
	      };
	
	      Connect.prototype.trySubscribe = function trySubscribe() {
	        if (shouldSubscribe && !this.unsubscribe) {
	          this.unsubscribe = this.store.subscribe(this.handleChange.bind(this));
	          this.handleChange();
	        }
	      };
	
	      Connect.prototype.tryUnsubscribe = function tryUnsubscribe() {
	        if (this.unsubscribe) {
	          this.unsubscribe();
	          this.unsubscribe = null;
	        }
	      };
	
	      Connect.prototype.componentDidMount = function componentDidMount() {
	        this.trySubscribe();
	      };
	
	      Connect.prototype.componentWillReceiveProps = function componentWillReceiveProps(nextProps) {
	        if (!pure || !(0, _shallowEqual2["default"])(nextProps, this.props)) {
	          this.haveOwnPropsChanged = true;
	        }
	      };
	
	      Connect.prototype.componentWillUnmount = function componentWillUnmount() {
	        this.tryUnsubscribe();
	        this.clearCache();
	      };
	
	      Connect.prototype.clearCache = function clearCache() {
	        this.dispatchProps = null;
	        this.stateProps = null;
	        this.mergedProps = null;
	        this.haveOwnPropsChanged = true;
	        this.hasStoreStateChanged = true;
	        this.haveStatePropsBeenPrecalculated = false;
	        this.statePropsPrecalculationError = null;
	        this.renderedElement = null;
	        this.finalMapDispatchToProps = null;
	        this.finalMapStateToProps = null;
	      };
	
	      Connect.prototype.handleChange = function handleChange() {
	        if (!this.unsubscribe) {
	          return;
	        }
	
	        var storeState = this.store.getState();
	        var prevStoreState = this.state.storeState;
	        if (pure && prevStoreState === storeState) {
	          return;
	        }
	
	        if (pure && !this.doStatePropsDependOnOwnProps) {
	          var haveStatePropsChanged = tryCatch(this.updateStatePropsIfNeeded, this);
	          if (!haveStatePropsChanged) {
	            return;
	          }
	          if (haveStatePropsChanged === errorObject) {
	            this.statePropsPrecalculationError = errorObject.value;
	          }
	          this.haveStatePropsBeenPrecalculated = true;
	        }
	
	        this.hasStoreStateChanged = true;
	        this.setState({ storeState: storeState });
	      };
	
	      Connect.prototype.getWrappedInstance = function getWrappedInstance() {
	        (0, _invariant2["default"])(withRef, 'To access the wrapped instance, you need to specify ' + '{ withRef: true } as the fourth argument of the connect() call.');
	
	        return this.refs.wrappedInstance;
	      };
	
	      Connect.prototype.render = function render() {
	        var haveOwnPropsChanged = this.haveOwnPropsChanged;
	        var hasStoreStateChanged = this.hasStoreStateChanged;
	        var haveStatePropsBeenPrecalculated = this.haveStatePropsBeenPrecalculated;
	        var statePropsPrecalculationError = this.statePropsPrecalculationError;
	        var renderedElement = this.renderedElement;
	
	        this.haveOwnPropsChanged = false;
	        this.hasStoreStateChanged = false;
	        this.haveStatePropsBeenPrecalculated = false;
	        this.statePropsPrecalculationError = null;
	
	        if (statePropsPrecalculationError) {
	          throw statePropsPrecalculationError;
	        }
	
	        var shouldUpdateStateProps = true;
	        var shouldUpdateDispatchProps = true;
	        if (pure && renderedElement) {
	          shouldUpdateStateProps = hasStoreStateChanged || haveOwnPropsChanged && this.doStatePropsDependOnOwnProps;
	          shouldUpdateDispatchProps = haveOwnPropsChanged && this.doDispatchPropsDependOnOwnProps;
	        }
	
	        var haveStatePropsChanged = false;
	        var haveDispatchPropsChanged = false;
	        if (haveStatePropsBeenPrecalculated) {
	          haveStatePropsChanged = true;
	        } else if (shouldUpdateStateProps) {
	          haveStatePropsChanged = this.updateStatePropsIfNeeded();
	        }
	        if (shouldUpdateDispatchProps) {
	          haveDispatchPropsChanged = this.updateDispatchPropsIfNeeded();
	        }
	
	        var haveMergedPropsChanged = true;
	        if (haveStatePropsChanged || haveDispatchPropsChanged || haveOwnPropsChanged) {
	          haveMergedPropsChanged = this.updateMergedPropsIfNeeded();
	        } else {
	          haveMergedPropsChanged = false;
	        }
	
	        if (!haveMergedPropsChanged && renderedElement) {
	          return renderedElement;
	        }
	
	        if (withRef) {
	          this.renderedElement = (0, _react.createElement)(WrappedComponent, _extends({}, this.mergedProps, {
	            ref: 'wrappedInstance'
	          }));
	        } else {
	          this.renderedElement = (0, _react.createElement)(WrappedComponent, this.mergedProps);
	        }
	
	        return this.renderedElement;
	      };
	
	      return Connect;
	    }(_react.Component);
	
	    Connect.displayName = connectDisplayName;
	    Connect.WrappedComponent = WrappedComponent;
	    Connect.contextTypes = {
	      store: _storeShape2["default"]
	    };
	    Connect.propTypes = {
	      store: _storeShape2["default"]
	    };
	
	    if (false) {
	      Connect.prototype.componentWillUpdate = function componentWillUpdate() {
	        if (this.version === version) {
	          return;
	        }
	
	        // We are hot reloading!
	        this.version = version;
	        this.trySubscribe();
	        this.clearCache();
	      };
	    }
	
	    return (0, _hoistNonReactStatics2["default"])(Connect, WrappedComponent);
	  };
	}

/***/ },
/* 146 */
/***/ function(module, exports) {

	"use strict";
	
	exports.__esModule = true;
	exports["default"] = shallowEqual;
	function shallowEqual(objA, objB) {
	  if (objA === objB) {
	    return true;
	  }
	
	  var keysA = Object.keys(objA);
	  var keysB = Object.keys(objB);
	
	  if (keysA.length !== keysB.length) {
	    return false;
	  }
	
	  // Test for A's keys different from B.
	  var hasOwn = Object.prototype.hasOwnProperty;
	  for (var i = 0; i < keysA.length; i++) {
	    if (!hasOwn.call(objB, keysA[i]) || objA[keysA[i]] !== objB[keysA[i]]) {
	      return false;
	    }
	  }
	
	  return true;
	}

/***/ },
/* 147 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = wrapActionCreators;
	
	var _redux = __webpack_require__(27);
	
	function wrapActionCreators(actionCreators) {
	  return function (dispatch) {
	    return (0, _redux.bindActionCreators)(actionCreators, dispatch);
	  };
	}

/***/ },
/* 148 */
/***/ function(module, exports) {

	/**
	 * Copyright 2015, Yahoo! Inc.
	 * Copyrights licensed under the New BSD License. See the accompanying LICENSE file for terms.
	 */
	'use strict';
	
	var REACT_STATICS = {
	    childContextTypes: true,
	    contextTypes: true,
	    defaultProps: true,
	    displayName: true,
	    getDefaultProps: true,
	    mixins: true,
	    propTypes: true,
	    type: true
	};
	
	var KNOWN_STATICS = {
	    name: true,
	    length: true,
	    prototype: true,
	    caller: true,
	    arguments: true,
	    arity: true
	};
	
	var isGetOwnPropertySymbolsAvailable = typeof Object.getOwnPropertySymbols === 'function';
	
	module.exports = function hoistNonReactStatics(targetComponent, sourceComponent, customStatics) {
	    if (typeof sourceComponent !== 'string') { // don't hoist over string (html) components
	        var keys = Object.getOwnPropertyNames(sourceComponent);
	
	        /* istanbul ignore else */
	        if (isGetOwnPropertySymbolsAvailable) {
	            keys = keys.concat(Object.getOwnPropertySymbols(sourceComponent));
	        }
	
	        for (var i = 0; i < keys.length; ++i) {
	            if (!REACT_STATICS[keys[i]] && !KNOWN_STATICS[keys[i]] && (!customStatics || !customStatics[keys[i]])) {
	                try {
	                    targetComponent[keys[i]] = sourceComponent[keys[i]];
	                } catch (error) {
	
	                }
	            }
	        }
	    }
	
	    return targetComponent;
	};


/***/ },
/* 149 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Copyright 2013-2015, Facebook, Inc.
	 * All rights reserved.
	 *
	 * This source code is licensed under the BSD-style license found in the
	 * LICENSE file in the root directory of this source tree. An additional grant
	 * of patent rights can be found in the PATENTS file in the same directory.
	 */
	
	'use strict';
	
	/**
	 * Use invariant() to assert state which your program assumes to be true.
	 *
	 * Provide sprintf-style format (only %s is supported) and arguments
	 * to provide information about what broke and what you were
	 * expecting.
	 *
	 * The invariant message will be stripped in production, but the invariant
	 * will remain to ensure logic does not differ in production.
	 */
	
	var invariant = function(condition, format, a, b, c, d, e, f) {
	  if (false) {
	    if (format === undefined) {
	      throw new Error('invariant requires an error message argument');
	    }
	  }
	
	  if (!condition) {
	    var error;
	    if (format === undefined) {
	      error = new Error(
	        'Minified exception occurred; use the non-minified dev environment ' +
	        'for the full error message and additional helpful warnings.'
	      );
	    } else {
	      var args = [a, b, c, d, e, f];
	      var argIndex = 0;
	      error = new Error(
	        format.replace(/%s/g, function() { return args[argIndex++]; })
	      );
	      error.name = 'Invariant Violation';
	    }
	
	    error.framesToPop = 1; // we don't care about invariant's own frame
	    throw error;
	  }
	};
	
	module.exports = invariant;


/***/ },
/* 150 */
[247, 152],
/* 151 */
/***/ function(module, exports) {

	/**
	 * Checks if `value` is a host object in IE < 9.
	 *
	 * @private
	 * @param {*} value The value to check.
	 * @returns {boolean} Returns `true` if `value` is a host object, else `false`.
	 */
	function isHostObject(value) {
	  // Many host objects are `Object` objects that can coerce to strings
	  // despite having improperly defined `toString` methods.
	  var result = false;
	  if (value != null && typeof value.toString != 'function') {
	    try {
	      result = !!(value + '');
	    } catch (e) {}
	  }
	  return result;
	}
	
	module.exports = isHostObject;


/***/ },
/* 152 */
/***/ function(module, exports) {

	/**
	 * Creates a unary function that invokes `func` with its argument transformed.
	 *
	 * @private
	 * @param {Function} func The function to wrap.
	 * @param {Function} transform The argument transform.
	 * @returns {Function} Returns the new function.
	 */
	function overArg(func, transform) {
	  return function(arg) {
	    return func(transform(arg));
	  };
	}
	
	module.exports = overArg;


/***/ },
/* 153 */
/***/ function(module, exports) {

	/**
	 * Checks if `value` is object-like. A value is object-like if it's not `null`
	 * and has a `typeof` result of "object".
	 *
	 * @static
	 * @memberOf _
	 * @since 4.0.0
	 * @category Lang
	 * @param {*} value The value to check.
	 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
	 * @example
	 *
	 * _.isObjectLike({});
	 * // => true
	 *
	 * _.isObjectLike([1, 2, 3]);
	 * // => true
	 *
	 * _.isObjectLike(_.noop);
	 * // => false
	 *
	 * _.isObjectLike(null);
	 * // => false
	 */
	function isObjectLike(value) {
	  return !!value && typeof value == 'object';
	}
	
	module.exports = isObjectLike;


/***/ },
/* 154 */
[248, 150, 151, 153],
/* 155 */,
/* 156 */,
/* 157 */,
/* 158 */,
/* 159 */,
/* 160 */,
/* 161 */,
/* 162 */,
/* 163 */,
/* 164 */,
/* 165 */,
/* 166 */,
/* 167 */,
/* 168 */,
/* 169 */,
/* 170 */,
/* 171 */,
/* 172 */,
/* 173 */,
/* 174 */,
/* 175 */,
/* 176 */,
/* 177 */,
/* 178 */,
/* 179 */,
/* 180 */,
/* 181 */,
/* 182 */,
/* 183 */,
/* 184 */,
/* 185 */,
/* 186 */,
/* 187 */,
/* 188 */,
/* 189 */,
/* 190 */,
/* 191 */,
/* 192 */,
/* 193 */,
/* 194 */,
/* 195 */,
/* 196 */,
/* 197 */,
/* 198 */,
/* 199 */,
/* 200 */,
/* 201 */,
/* 202 */,
/* 203 */,
/* 204 */,
/* 205 */,
/* 206 */,
/* 207 */,
/* 208 */,
/* 209 */,
/* 210 */,
/* 211 */,
/* 212 */,
/* 213 */,
/* 214 */,
/* 215 */,
/* 216 */,
/* 217 */,
/* 218 */,
/* 219 */,
/* 220 */,
/* 221 */,
/* 222 */,
/* 223 */,
/* 224 */,
/* 225 */,
/* 226 */,
/* 227 */,
/* 228 */,
/* 229 */,
/* 230 */,
/* 231 */,
/* 232 */
/***/ function(module, exports) {

	"use strict";
	
	function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }
	
	function _typeof(obj) { return obj && typeof Symbol !== "undefined" && obj.constructor === Symbol ? "symbol" : typeof obj; }
	
	var repeat = function repeat(str, times) {
	  return new Array(times + 1).join(str);
	};
	var pad = function pad(num, maxLength) {
	  return repeat("0", maxLength - num.toString().length) + num;
	};
	var formatTime = function formatTime(time) {
	  return "@ " + pad(time.getHours(), 2) + ":" + pad(time.getMinutes(), 2) + ":" + pad(time.getSeconds(), 2) + "." + pad(time.getMilliseconds(), 3);
	};
	
	// Use the new performance api to get better precision if available
	var timer = typeof performance !== "undefined" && typeof performance.now === "function" ? performance : Date;
	
	/**
	 * parse the level option of createLogger
	 *
	 * @property {string | function | object} level - console[level]
	 * @property {object} action
	 * @property {array} payload
	 * @property {string} type
	 */
	
	function getLogLevel(level, action, payload, type) {
	  switch (typeof level === "undefined" ? "undefined" : _typeof(level)) {
	    case "object":
	      return typeof level[type] === "function" ? level[type].apply(level, _toConsumableArray(payload)) : level[type];
	    case "function":
	      return level(action);
	    default:
	      return level;
	  }
	}
	
	/**
	 * Creates logger with followed options
	 *
	 * @namespace
	 * @property {object} options - options for logger
	 * @property {string | function | object} options.level - console[level]
	 * @property {boolean} options.duration - print duration of each action?
	 * @property {boolean} options.timestamp - print timestamp with each action?
	 * @property {object} options.colors - custom colors
	 * @property {object} options.logger - implementation of the `console` API
	 * @property {boolean} options.logErrors - should errors in action execution be caught, logged, and re-thrown?
	 * @property {boolean} options.collapsed - is group collapsed?
	 * @property {boolean} options.predicate - condition which resolves logger behavior
	 * @property {function} options.stateTransformer - transform state before print
	 * @property {function} options.actionTransformer - transform action before print
	 * @property {function} options.errorTransformer - transform error before print
	 */
	
	function createLogger() {
	  var options = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
	  var _options$level = options.level;
	  var level = _options$level === undefined ? "log" : _options$level;
	  var _options$logger = options.logger;
	  var logger = _options$logger === undefined ? console : _options$logger;
	  var _options$logErrors = options.logErrors;
	  var logErrors = _options$logErrors === undefined ? true : _options$logErrors;
	  var collapsed = options.collapsed;
	  var predicate = options.predicate;
	  var _options$duration = options.duration;
	  var duration = _options$duration === undefined ? false : _options$duration;
	  var _options$timestamp = options.timestamp;
	  var timestamp = _options$timestamp === undefined ? true : _options$timestamp;
	  var transformer = options.transformer;
	  var _options$stateTransfo = options.stateTransformer;
	  var // deprecated
	  stateTransformer = _options$stateTransfo === undefined ? function (state) {
	    return state;
	  } : _options$stateTransfo;
	  var _options$actionTransf = options.actionTransformer;
	  var actionTransformer = _options$actionTransf === undefined ? function (actn) {
	    return actn;
	  } : _options$actionTransf;
	  var _options$errorTransfo = options.errorTransformer;
	  var errorTransformer = _options$errorTransfo === undefined ? function (error) {
	    return error;
	  } : _options$errorTransfo;
	  var _options$colors = options.colors;
	  var colors = _options$colors === undefined ? {
	    title: function title() {
	      return "#000000";
	    },
	    prevState: function prevState() {
	      return "#9E9E9E";
	    },
	    action: function action() {
	      return "#03A9F4";
	    },
	    nextState: function nextState() {
	      return "#4CAF50";
	    },
	    error: function error() {
	      return "#F20404";
	    }
	  } : _options$colors;
	
	  // exit if console undefined
	
	  if (typeof logger === "undefined") {
	    return function () {
	      return function (next) {
	        return function (action) {
	          return next(action);
	        };
	      };
	    };
	  }
	
	  if (transformer) {
	    console.error("Option 'transformer' is deprecated, use stateTransformer instead");
	  }
	
	  var logBuffer = [];
	  function printBuffer() {
	    logBuffer.forEach(function (logEntry, key) {
	      var started = logEntry.started;
	      var startedTime = logEntry.startedTime;
	      var action = logEntry.action;
	      var prevState = logEntry.prevState;
	      var error = logEntry.error;
	      var took = logEntry.took;
	      var nextState = logEntry.nextState;
	
	      var nextEntry = logBuffer[key + 1];
	      if (nextEntry) {
	        nextState = nextEntry.prevState;
	        took = nextEntry.started - started;
	      }
	      // message
	      var formattedAction = actionTransformer(action);
	      var isCollapsed = typeof collapsed === "function" ? collapsed(function () {
	        return nextState;
	      }, action) : collapsed;
	
	      var formattedTime = formatTime(startedTime);
	      var titleCSS = colors.title ? "color: " + colors.title(formattedAction) + ";" : null;
	      var title = "action " + (timestamp ? formattedTime : "") + " " + formattedAction.type + " " + (duration ? "(in " + took.toFixed(2) + " ms)" : "");
	
	      // render
	      try {
	        if (isCollapsed) {
	          if (colors.title) logger.groupCollapsed("%c " + title, titleCSS);else logger.groupCollapsed(title);
	        } else {
	          if (colors.title) logger.group("%c " + title, titleCSS);else logger.group(title);
	        }
	      } catch (e) {
	        logger.log(title);
	      }
	
	      var prevStateLevel = getLogLevel(level, formattedAction, [prevState], "prevState");
	      var actionLevel = getLogLevel(level, formattedAction, [formattedAction], "action");
	      var errorLevel = getLogLevel(level, formattedAction, [error, prevState], "error");
	      var nextStateLevel = getLogLevel(level, formattedAction, [nextState], "nextState");
	
	      if (prevStateLevel) {
	        if (colors.prevState) logger[prevStateLevel]("%c prev state", "color: " + colors.prevState(prevState) + "; font-weight: bold", prevState);else logger[prevStateLevel]("prev state", prevState);
	      }
	
	      if (actionLevel) {
	        if (colors.action) logger[actionLevel]("%c action", "color: " + colors.action(formattedAction) + "; font-weight: bold", formattedAction);else logger[actionLevel]("action", formattedAction);
	      }
	
	      if (error && errorLevel) {
	        if (colors.error) logger[errorLevel]("%c error", "color: " + colors.error(error, prevState) + "; font-weight: bold", error);else logger[errorLevel]("error", error);
	      }
	
	      if (nextStateLevel) {
	        if (colors.nextState) logger[nextStateLevel]("%c next state", "color: " + colors.nextState(nextState) + "; font-weight: bold", nextState);else logger[nextStateLevel]("next state", nextState);
	      }
	
	      try {
	        logger.groupEnd();
	      } catch (e) {
	        logger.log("—— log end ——");
	      }
	    });
	    logBuffer.length = 0;
	  }
	
	  return function (_ref) {
	    var getState = _ref.getState;
	    return function (next) {
	      return function (action) {
	        // exit early if predicate function returns false
	        if (typeof predicate === "function" && !predicate(getState, action)) {
	          return next(action);
	        }
	
	        var logEntry = {};
	        logBuffer.push(logEntry);
	
	        logEntry.started = timer.now();
	        logEntry.startedTime = new Date();
	        logEntry.prevState = stateTransformer(getState());
	        logEntry.action = action;
	
	        var returnedValue = undefined;
	        if (logErrors) {
	          try {
	            returnedValue = next(action);
	          } catch (e) {
	            logEntry.error = errorTransformer(e);
	          }
	        } else {
	          returnedValue = next(action);
	        }
	
	        logEntry.took = timer.now() - logEntry.started;
	        logEntry.nextState = stateTransformer(getState());
	
	        printBuffer();
	
	        if (logEntry.error) throw logEntry.error;
	        return returnedValue;
	      };
	    };
	  };
	}
	
	module.exports = createLogger;

/***/ },
/* 233 */
/***/ function(module, exports) {

	'use strict';
	
	exports.__esModule = true;
	function createThunkMiddleware(extraArgument) {
	  return function (_ref) {
	    var dispatch = _ref.dispatch;
	    var getState = _ref.getState;
	    return function (next) {
	      return function (action) {
	        if (typeof action === 'function') {
	          return action(dispatch, getState, extraArgument);
	        }
	
	        return next(action);
	      };
	    };
	  };
	}
	
	var thunk = createThunkMiddleware();
	thunk.withExtraArgument = createThunkMiddleware;
	
	exports['default'] = thunk;

/***/ },
/* 234 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	exports["default"] = applyMiddleware;
	
	var _compose = __webpack_require__(101);
	
	var _compose2 = _interopRequireDefault(_compose);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	/**
	 * Creates a store enhancer that applies middleware to the dispatch method
	 * of the Redux store. This is handy for a variety of tasks, such as expressing
	 * asynchronous actions in a concise manner, or logging every action payload.
	 *
	 * See `redux-thunk` package as an example of the Redux middleware.
	 *
	 * Because middleware is potentially asynchronous, this should be the first
	 * store enhancer in the composition chain.
	 *
	 * Note that each middleware will be given the `dispatch` and `getState` functions
	 * as named arguments.
	 *
	 * @param {...Function} middlewares The middleware chain to be applied.
	 * @returns {Function} A store enhancer applying the middleware.
	 */
	function applyMiddleware() {
	  for (var _len = arguments.length, middlewares = Array(_len), _key = 0; _key < _len; _key++) {
	    middlewares[_key] = arguments[_key];
	  }
	
	  return function (createStore) {
	    return function (reducer, initialState, enhancer) {
	      var store = createStore(reducer, initialState, enhancer);
	      var _dispatch = store.dispatch;
	      var chain = [];
	
	      var middlewareAPI = {
	        getState: store.getState,
	        dispatch: function dispatch(action) {
	          return _dispatch(action);
	        }
	      };
	      chain = middlewares.map(function (middleware) {
	        return middleware(middlewareAPI);
	      });
	      _dispatch = _compose2["default"].apply(undefined, chain)(store.dispatch);
	
	      return _extends({}, store, {
	        dispatch: _dispatch
	      });
	    };
	  };
	}

/***/ },
/* 235 */
/***/ function(module, exports) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = bindActionCreators;
	function bindActionCreator(actionCreator, dispatch) {
	  return function () {
	    return dispatch(actionCreator.apply(undefined, arguments));
	  };
	}
	
	/**
	 * Turns an object whose values are action creators, into an object with the
	 * same keys, but with every function wrapped into a `dispatch` call so they
	 * may be invoked directly. This is just a convenience method, as you can call
	 * `store.dispatch(MyActionCreators.doSomething())` yourself just fine.
	 *
	 * For convenience, you can also pass a single function as the first argument,
	 * and get a function in return.
	 *
	 * @param {Function|Object} actionCreators An object whose values are action
	 * creator functions. One handy way to obtain it is to use ES6 `import * as`
	 * syntax. You may also pass a single function.
	 *
	 * @param {Function} dispatch The `dispatch` function available on your Redux
	 * store.
	 *
	 * @returns {Function|Object} The object mimicking the original object, but with
	 * every action creator wrapped into the `dispatch` call. If you passed a
	 * function as `actionCreators`, the return value will also be a single
	 * function.
	 */
	function bindActionCreators(actionCreators, dispatch) {
	  if (typeof actionCreators === 'function') {
	    return bindActionCreator(actionCreators, dispatch);
	  }
	
	  if (typeof actionCreators !== 'object' || actionCreators === null) {
	    throw new Error('bindActionCreators expected an object or a function, instead received ' + (actionCreators === null ? 'null' : typeof actionCreators) + '. ' + 'Did you write "import ActionCreators from" instead of "import * as ActionCreators from"?');
	  }
	
	  var keys = Object.keys(actionCreators);
	  var boundActionCreators = {};
	  for (var i = 0; i < keys.length; i++) {
	    var key = keys[i];
	    var actionCreator = actionCreators[key];
	    if (typeof actionCreator === 'function') {
	      boundActionCreators[key] = bindActionCreator(actionCreator, dispatch);
	    }
	  }
	  return boundActionCreators;
	}

/***/ },
/* 236 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	exports.__esModule = true;
	exports["default"] = combineReducers;
	
	var _createStore = __webpack_require__(102);
	
	var _isPlainObject = __webpack_require__(104);
	
	var _isPlainObject2 = _interopRequireDefault(_isPlainObject);
	
	var _warning = __webpack_require__(103);
	
	var _warning2 = _interopRequireDefault(_warning);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
	
	function getUndefinedStateErrorMessage(key, action) {
	  var actionType = action && action.type;
	  var actionName = actionType && '"' + actionType.toString() + '"' || 'an action';
	
	  return 'Given action ' + actionName + ', reducer "' + key + '" returned undefined. ' + 'To ignore an action, you must explicitly return the previous state.';
	}
	
	function getUnexpectedStateShapeWarningMessage(inputState, reducers, action) {
	  var reducerKeys = Object.keys(reducers);
	  var argumentName = action && action.type === _createStore.ActionTypes.INIT ? 'initialState argument passed to createStore' : 'previous state received by the reducer';
	
	  if (reducerKeys.length === 0) {
	    return 'Store does not have a valid reducer. Make sure the argument passed ' + 'to combineReducers is an object whose values are reducers.';
	  }
	
	  if (!(0, _isPlainObject2["default"])(inputState)) {
	    return 'The ' + argumentName + ' has unexpected type of "' + {}.toString.call(inputState).match(/\s([a-z|A-Z]+)/)[1] + '". Expected argument to be an object with the following ' + ('keys: "' + reducerKeys.join('", "') + '"');
	  }
	
	  var unexpectedKeys = Object.keys(inputState).filter(function (key) {
	    return !reducers.hasOwnProperty(key);
	  });
	
	  if (unexpectedKeys.length > 0) {
	    return 'Unexpected ' + (unexpectedKeys.length > 1 ? 'keys' : 'key') + ' ' + ('"' + unexpectedKeys.join('", "') + '" found in ' + argumentName + '. ') + 'Expected to find one of the known reducer keys instead: ' + ('"' + reducerKeys.join('", "') + '". Unexpected keys will be ignored.');
	  }
	}
	
	function assertReducerSanity(reducers) {
	  Object.keys(reducers).forEach(function (key) {
	    var reducer = reducers[key];
	    var initialState = reducer(undefined, { type: _createStore.ActionTypes.INIT });
	
	    if (typeof initialState === 'undefined') {
	      throw new Error('Reducer "' + key + '" returned undefined during initialization. ' + 'If the state passed to the reducer is undefined, you must ' + 'explicitly return the initial state. The initial state may ' + 'not be undefined.');
	    }
	
	    var type = '@@redux/PROBE_UNKNOWN_ACTION_' + Math.random().toString(36).substring(7).split('').join('.');
	    if (typeof reducer(undefined, { type: type }) === 'undefined') {
	      throw new Error('Reducer "' + key + '" returned undefined when probed with a random type. ' + ('Don\'t try to handle ' + _createStore.ActionTypes.INIT + ' or other actions in "redux/*" ') + 'namespace. They are considered private. Instead, you must return the ' + 'current state for any unknown actions, unless it is undefined, ' + 'in which case you must return the initial state, regardless of the ' + 'action type. The initial state may not be undefined.');
	    }
	  });
	}
	
	/**
	 * Turns an object whose values are different reducer functions, into a single
	 * reducer function. It will call every child reducer, and gather their results
	 * into a single state object, whose keys correspond to the keys of the passed
	 * reducer functions.
	 *
	 * @param {Object} reducers An object whose values correspond to different
	 * reducer functions that need to be combined into one. One handy way to obtain
	 * it is to use ES6 `import * as reducers` syntax. The reducers may never return
	 * undefined for any action. Instead, they should return their initial state
	 * if the state passed to them was undefined, and the current state for any
	 * unrecognized action.
	 *
	 * @returns {Function} A reducer function that invokes every reducer inside the
	 * passed object, and builds a state object with the same shape.
	 */
	function combineReducers(reducers) {
	  var reducerKeys = Object.keys(reducers);
	  var finalReducers = {};
	  for (var i = 0; i < reducerKeys.length; i++) {
	    var key = reducerKeys[i];
	    if (typeof reducers[key] === 'function') {
	      finalReducers[key] = reducers[key];
	    }
	  }
	  var finalReducerKeys = Object.keys(finalReducers);
	
	  var sanityError;
	  try {
	    assertReducerSanity(finalReducers);
	  } catch (e) {
	    sanityError = e;
	  }
	
	  return function combination() {
	    var state = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
	    var action = arguments[1];
	
	    if (sanityError) {
	      throw sanityError;
	    }
	
	    if (false) {
	      var warningMessage = getUnexpectedStateShapeWarningMessage(state, finalReducers, action);
	      if (warningMessage) {
	        (0, _warning2["default"])(warningMessage);
	      }
	    }
	
	    var hasChanged = false;
	    var nextState = {};
	    for (var i = 0; i < finalReducerKeys.length; i++) {
	      var key = finalReducerKeys[i];
	      var reducer = finalReducers[key];
	      var previousStateForKey = state[key];
	      var nextStateForKey = reducer(previousStateForKey, action);
	      if (typeof nextStateForKey === 'undefined') {
	        var errorMessage = getUndefinedStateErrorMessage(key, action);
	        throw new Error(errorMessage);
	      }
	      nextState[key] = nextStateForKey;
	      hasChanged = hasChanged || nextStateForKey !== previousStateForKey;
	    }
	    return hasChanged ? nextState : state;
	  };
	}

/***/ },
/* 237 */
[247, 239],
/* 238 */
151,
/* 239 */
152,
/* 240 */
153,
/* 241 */
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function(global) {/* global window */
	'use strict';
	
	module.exports = __webpack_require__(242)(global || window || this);
	
	/* WEBPACK VAR INJECTION */}.call(exports, (function() { return this; }())))

/***/ },
/* 242 */
/***/ function(module, exports) {

	'use strict';
	
	module.exports = function symbolObservablePonyfill(root) {
		var result;
		var Symbol = root.Symbol;
	
		if (typeof Symbol === 'function') {
			if (Symbol.observable) {
				result = Symbol.observable;
			} else {
				result = Symbol('observable');
				Symbol.observable = result;
			}
		} else {
			result = '@@observable';
		}
	
		return result;
	};


/***/ },
/* 243 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Module of mixed-in functions shared between node and client code
	 */
	var isObject = __webpack_require__(105);
	
	/**
	 * Clear previous timeout.
	 *
	 * @return {Request} for chaining
	 * @api public
	 */
	
	exports.clearTimeout = function _clearTimeout(){
	  this._timeout = 0;
	  clearTimeout(this._timer);
	  return this;
	};
	
	/**
	 * Override default response body parser
	 *
	 * This function will be called to convert incoming data into request.body
	 *
	 * @param {Function}
	 * @api public
	 */
	
	exports.parse = function parse(fn){
	  this._parser = fn;
	  return this;
	};
	
	/**
	 * Override default request body serializer
	 *
	 * This function will be called to convert data set via .send or .attach into payload to send
	 *
	 * @param {Function}
	 * @api public
	 */
	
	exports.serialize = function serialize(fn){
	  this._serializer = fn;
	  return this;
	};
	
	/**
	 * Set timeout to `ms`.
	 *
	 * @param {Number} ms
	 * @return {Request} for chaining
	 * @api public
	 */
	
	exports.timeout = function timeout(ms){
	  this._timeout = ms;
	  return this;
	};
	
	/**
	 * Promise support
	 *
	 * @param {Function} resolve
	 * @param {Function} reject
	 * @return {Request}
	 */
	
	exports.then = function then(resolve, reject) {
	  if (!this._fullfilledPromise) {
	    var self = this;
	    this._fullfilledPromise = new Promise(function(innerResolve, innerReject){
	      self.end(function(err, res){
	        if (err) innerReject(err); else innerResolve(res);
	      });
	    });
	  }
	  return this._fullfilledPromise.then(resolve, reject);
	}
	
	/**
	 * Allow for extension
	 */
	
	exports.use = function use(fn) {
	  fn(this);
	  return this;
	}
	
	
	/**
	 * Get request header `field`.
	 * Case-insensitive.
	 *
	 * @param {String} field
	 * @return {String}
	 * @api public
	 */
	
	exports.get = function(field){
	  return this._header[field.toLowerCase()];
	};
	
	/**
	 * Get case-insensitive header `field` value.
	 * This is a deprecated internal API. Use `.get(field)` instead.
	 *
	 * (getHeader is no longer used internally by the superagent code base)
	 *
	 * @param {String} field
	 * @return {String}
	 * @api private
	 * @deprecated
	 */
	
	exports.getHeader = exports.get;
	
	/**
	 * Set header `field` to `val`, or multiple fields with one object.
	 * Case-insensitive.
	 *
	 * Examples:
	 *
	 *      req.get('/')
	 *        .set('Accept', 'application/json')
	 *        .set('X-API-Key', 'foobar')
	 *        .end(callback);
	 *
	 *      req.get('/')
	 *        .set({ Accept: 'application/json', 'X-API-Key': 'foobar' })
	 *        .end(callback);
	 *
	 * @param {String|Object} field
	 * @param {String} val
	 * @return {Request} for chaining
	 * @api public
	 */
	
	exports.set = function(field, val){
	  if (isObject(field)) {
	    for (var key in field) {
	      this.set(key, field[key]);
	    }
	    return this;
	  }
	  this._header[field.toLowerCase()] = val;
	  this.header[field] = val;
	  return this;
	};
	
	/**
	 * Remove header `field`.
	 * Case-insensitive.
	 *
	 * Example:
	 *
	 *      req.get('/')
	 *        .unset('User-Agent')
	 *        .end(callback);
	 *
	 * @param {String} field
	 */
	exports.unset = function(field){
	  delete this._header[field.toLowerCase()];
	  delete this.header[field];
	  return this;
	};
	
	/**
	 * Write the field `name` and `val` for "multipart/form-data"
	 * request bodies.
	 *
	 * ``` js
	 * request.post('/upload')
	 *   .field('foo', 'bar')
	 *   .end(callback);
	 * ```
	 *
	 * @param {String} name
	 * @param {String|Blob|File|Buffer|fs.ReadStream} val
	 * @return {Request} for chaining
	 * @api public
	 */
	exports.field = function(name, val) {
	  this._getFormData().append(name, val);
	  return this;
	};
	
	/**
	 * Abort the request, and clear potential timeout.
	 *
	 * @return {Request}
	 * @api public
	 */
	exports.abort = function(){
	  if (this._aborted) {
	    return this;
	  }
	  this._aborted = true;
	  this.xhr && this.xhr.abort(); // browser
	  this.req && this.req.abort(); // node
	  this.clearTimeout();
	  this.emit('abort');
	  return this;
	};
	
	/**
	 * Enable transmission of cookies with x-domain requests.
	 *
	 * Note that for this to work the origin must not be
	 * using "Access-Control-Allow-Origin" with a wildcard,
	 * and also must set "Access-Control-Allow-Credentials"
	 * to "true".
	 *
	 * @api public
	 */
	
	exports.withCredentials = function(){
	  // This is browser-only functionality. Node side is no-op.
	  this._withCredentials = true;
	  return this;
	};
	
	/**
	 * Set the max redirects to `n`. Does noting in browser XHR implementation.
	 *
	 * @param {Number} n
	 * @return {Request} for chaining
	 * @api public
	 */
	
	exports.redirects = function(n){
	  this._maxRedirects = n;
	  return this;
	};
	
	/**
	 * Convert to a plain javascript object (not JSON string) of scalar properties.
	 * Note as this method is designed to return a useful non-this value,
	 * it cannot be chained.
	 *
	 * @return {Object} describing method, url, and data of this request
	 * @api public
	 */
	
	exports.toJSON = function(){
	  return {
	    method: this.method,
	    url: this.url,
	    data: this._data,
	    headers: this._header
	  };
	};
	
	/**
	 * Check if `obj` is a host object,
	 * we don't want to serialize these :)
	 *
	 * TODO: future proof, move to compoent land
	 *
	 * @param {Object} obj
	 * @return {Boolean}
	 * @api private
	 */
	
	exports._isHost = function _isHost(obj) {
	  var str = {}.toString.call(obj);
	
	  switch (str) {
	    case '[object File]':
	    case '[object Blob]':
	    case '[object FormData]':
	      return true;
	    default:
	      return false;
	  }
	}
	
	/**
	 * Send `data` as the request body, defaulting the `.type()` to "json" when
	 * an object is given.
	 *
	 * Examples:
	 *
	 *       // manual json
	 *       request.post('/user')
	 *         .type('json')
	 *         .send('{"name":"tj"}')
	 *         .end(callback)
	 *
	 *       // auto json
	 *       request.post('/user')
	 *         .send({ name: 'tj' })
	 *         .end(callback)
	 *
	 *       // manual x-www-form-urlencoded
	 *       request.post('/user')
	 *         .type('form')
	 *         .send('name=tj')
	 *         .end(callback)
	 *
	 *       // auto x-www-form-urlencoded
	 *       request.post('/user')
	 *         .type('form')
	 *         .send({ name: 'tj' })
	 *         .end(callback)
	 *
	 *       // defaults to x-www-form-urlencoded
	 *      request.post('/user')
	 *        .send('name=tobi')
	 *        .send('species=ferret')
	 *        .end(callback)
	 *
	 * @param {String|Object} data
	 * @return {Request} for chaining
	 * @api public
	 */
	
	exports.send = function(data){
	  var obj = isObject(data);
	  var type = this._header['content-type'];
	
	  // merge
	  if (obj && isObject(this._data)) {
	    for (var key in data) {
	      this._data[key] = data[key];
	    }
	  } else if ('string' == typeof data) {
	    // default to x-www-form-urlencoded
	    if (!type) this.type('form');
	    type = this._header['content-type'];
	    if ('application/x-www-form-urlencoded' == type) {
	      this._data = this._data
	        ? this._data + '&' + data
	        : data;
	    } else {
	      this._data = (this._data || '') + data;
	    }
	  } else {
	    this._data = data;
	  }
	
	  if (!obj || this._isHost(data)) return this;
	
	  // default to json
	  if (!type) this.type('json');
	  return this;
	};


/***/ },
/* 244 */
/***/ function(module, exports) {

	// The node and browser modules expose versions of this with the
	// appropriate constructor function bound as first argument
	/**
	 * Issue a request:
	 *
	 * Examples:
	 *
	 *    request('GET', '/users').end(callback)
	 *    request('/users').end(callback)
	 *    request('/users', callback)
	 *
	 * @param {String} method
	 * @param {String|Function} url or callback
	 * @return {Request}
	 * @api public
	 */
	
	function request(RequestConstructor, method, url) {
	  // callback
	  if ('function' == typeof url) {
	    return new RequestConstructor('GET', method).end(url);
	  }
	
	  // url first
	  if (2 == arguments.length) {
	    return new RequestConstructor('GET', method);
	  }
	
	  return new RequestConstructor(method, url);
	}
	
	module.exports = request;


/***/ },
/* 245 */
/***/ function(module, exports, __webpack_require__) {

	
	/**
	 * Expose `Emitter`.
	 */
	
	if (true) {
	  module.exports = Emitter;
	}
	
	/**
	 * Initialize a new `Emitter`.
	 *
	 * @api public
	 */
	
	function Emitter(obj) {
	  if (obj) return mixin(obj);
	};
	
	/**
	 * Mixin the emitter properties.
	 *
	 * @param {Object} obj
	 * @return {Object}
	 * @api private
	 */
	
	function mixin(obj) {
	  for (var key in Emitter.prototype) {
	    obj[key] = Emitter.prototype[key];
	  }
	  return obj;
	}
	
	/**
	 * Listen on the given `event` with `fn`.
	 *
	 * @param {String} event
	 * @param {Function} fn
	 * @return {Emitter}
	 * @api public
	 */
	
	Emitter.prototype.on =
	Emitter.prototype.addEventListener = function(event, fn){
	  this._callbacks = this._callbacks || {};
	  (this._callbacks['$' + event] = this._callbacks['$' + event] || [])
	    .push(fn);
	  return this;
	};
	
	/**
	 * Adds an `event` listener that will be invoked a single
	 * time then automatically removed.
	 *
	 * @param {String} event
	 * @param {Function} fn
	 * @return {Emitter}
	 * @api public
	 */
	
	Emitter.prototype.once = function(event, fn){
	  function on() {
	    this.off(event, on);
	    fn.apply(this, arguments);
	  }
	
	  on.fn = fn;
	  this.on(event, on);
	  return this;
	};
	
	/**
	 * Remove the given callback for `event` or all
	 * registered callbacks.
	 *
	 * @param {String} event
	 * @param {Function} fn
	 * @return {Emitter}
	 * @api public
	 */
	
	Emitter.prototype.off =
	Emitter.prototype.removeListener =
	Emitter.prototype.removeAllListeners =
	Emitter.prototype.removeEventListener = function(event, fn){
	  this._callbacks = this._callbacks || {};
	
	  // all
	  if (0 == arguments.length) {
	    this._callbacks = {};
	    return this;
	  }
	
	  // specific event
	  var callbacks = this._callbacks['$' + event];
	  if (!callbacks) return this;
	
	  // remove all handlers
	  if (1 == arguments.length) {
	    delete this._callbacks['$' + event];
	    return this;
	  }
	
	  // remove specific handler
	  var cb;
	  for (var i = 0; i < callbacks.length; i++) {
	    cb = callbacks[i];
	    if (cb === fn || cb.fn === fn) {
	      callbacks.splice(i, 1);
	      break;
	    }
	  }
	  return this;
	};
	
	/**
	 * Emit `event` with the given args.
	 *
	 * @param {String} event
	 * @param {Mixed} ...
	 * @return {Emitter}
	 */
	
	Emitter.prototype.emit = function(event){
	  this._callbacks = this._callbacks || {};
	  var args = [].slice.call(arguments, 1)
	    , callbacks = this._callbacks['$' + event];
	
	  if (callbacks) {
	    callbacks = callbacks.slice(0);
	    for (var i = 0, len = callbacks.length; i < len; ++i) {
	      callbacks[i].apply(this, args);
	    }
	  }
	
	  return this;
	};
	
	/**
	 * Return array of callbacks for `event`.
	 *
	 * @param {String} event
	 * @return {Array}
	 * @api public
	 */
	
	Emitter.prototype.listeners = function(event){
	  this._callbacks = this._callbacks || {};
	  return this._callbacks['$' + event] || [];
	};
	
	/**
	 * Check if this emitter has `event` handlers.
	 *
	 * @param {String} event
	 * @return {Boolean}
	 * @api public
	 */
	
	Emitter.prototype.hasListeners = function(event){
	  return !! this.listeners(event).length;
	};


/***/ },
/* 246 */
/***/ function(module, exports) {

	// Copyright Joyent, Inc. and other Node contributors.
	//
	// Permission is hereby granted, free of charge, to any person obtaining a
	// copy of this software and associated documentation files (the
	// "Software"), to deal in the Software without restriction, including
	// without limitation the rights to use, copy, modify, merge, publish,
	// distribute, sublicense, and/or sell copies of the Software, and to permit
	// persons to whom the Software is furnished to do so, subject to the
	// following conditions:
	//
	// The above copyright notice and this permission notice shall be included
	// in all copies or substantial portions of the Software.
	//
	// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
	// OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
	// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
	// NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
	// DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
	// OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
	// USE OR OTHER DEALINGS IN THE SOFTWARE.
	
	function EventEmitter() {
	  this._events = this._events || {};
	  this._maxListeners = this._maxListeners || undefined;
	}
	module.exports = EventEmitter;
	
	// Backwards-compat with node 0.10.x
	EventEmitter.EventEmitter = EventEmitter;
	
	EventEmitter.prototype._events = undefined;
	EventEmitter.prototype._maxListeners = undefined;
	
	// By default EventEmitters will print a warning if more than 10 listeners are
	// added to it. This is a useful default which helps finding memory leaks.
	EventEmitter.defaultMaxListeners = 10;
	
	// Obviously not all Emitters should be limited to 10. This function allows
	// that to be increased. Set to zero for unlimited.
	EventEmitter.prototype.setMaxListeners = function(n) {
	  if (!isNumber(n) || n < 0 || isNaN(n))
	    throw TypeError('n must be a positive number');
	  this._maxListeners = n;
	  return this;
	};
	
	EventEmitter.prototype.emit = function(type) {
	  var er, handler, len, args, i, listeners;
	
	  if (!this._events)
	    this._events = {};
	
	  // If there is no 'error' event listener then throw.
	  if (type === 'error') {
	    if (!this._events.error ||
	        (isObject(this._events.error) && !this._events.error.length)) {
	      er = arguments[1];
	      if (er instanceof Error) {
	        throw er; // Unhandled 'error' event
	      } else {
	        // At least give some kind of context to the user
	        var err = new Error('Uncaught, unspecified "error" event. (' + er + ')');
	        err.context = er;
	        throw err;
	      }
	    }
	  }
	
	  handler = this._events[type];
	
	  if (isUndefined(handler))
	    return false;
	
	  if (isFunction(handler)) {
	    switch (arguments.length) {
	      // fast cases
	      case 1:
	        handler.call(this);
	        break;
	      case 2:
	        handler.call(this, arguments[1]);
	        break;
	      case 3:
	        handler.call(this, arguments[1], arguments[2]);
	        break;
	      // slower
	      default:
	        args = Array.prototype.slice.call(arguments, 1);
	        handler.apply(this, args);
	    }
	  } else if (isObject(handler)) {
	    args = Array.prototype.slice.call(arguments, 1);
	    listeners = handler.slice();
	    len = listeners.length;
	    for (i = 0; i < len; i++)
	      listeners[i].apply(this, args);
	  }
	
	  return true;
	};
	
	EventEmitter.prototype.addListener = function(type, listener) {
	  var m;
	
	  if (!isFunction(listener))
	    throw TypeError('listener must be a function');
	
	  if (!this._events)
	    this._events = {};
	
	  // To avoid recursion in the case that type === "newListener"! Before
	  // adding it to the listeners, first emit "newListener".
	  if (this._events.newListener)
	    this.emit('newListener', type,
	              isFunction(listener.listener) ?
	              listener.listener : listener);
	
	  if (!this._events[type])
	    // Optimize the case of one listener. Don't need the extra array object.
	    this._events[type] = listener;
	  else if (isObject(this._events[type]))
	    // If we've already got an array, just append.
	    this._events[type].push(listener);
	  else
	    // Adding the second element, need to change to array.
	    this._events[type] = [this._events[type], listener];
	
	  // Check for listener leak
	  if (isObject(this._events[type]) && !this._events[type].warned) {
	    if (!isUndefined(this._maxListeners)) {
	      m = this._maxListeners;
	    } else {
	      m = EventEmitter.defaultMaxListeners;
	    }
	
	    if (m && m > 0 && this._events[type].length > m) {
	      this._events[type].warned = true;
	      console.error('(node) warning: possible EventEmitter memory ' +
	                    'leak detected. %d listeners added. ' +
	                    'Use emitter.setMaxListeners() to increase limit.',
	                    this._events[type].length);
	      if (typeof console.trace === 'function') {
	        // not supported in IE 10
	        console.trace();
	      }
	    }
	  }
	
	  return this;
	};
	
	EventEmitter.prototype.on = EventEmitter.prototype.addListener;
	
	EventEmitter.prototype.once = function(type, listener) {
	  if (!isFunction(listener))
	    throw TypeError('listener must be a function');
	
	  var fired = false;
	
	  function g() {
	    this.removeListener(type, g);
	
	    if (!fired) {
	      fired = true;
	      listener.apply(this, arguments);
	    }
	  }
	
	  g.listener = listener;
	  this.on(type, g);
	
	  return this;
	};
	
	// emits a 'removeListener' event iff the listener was removed
	EventEmitter.prototype.removeListener = function(type, listener) {
	  var list, position, length, i;
	
	  if (!isFunction(listener))
	    throw TypeError('listener must be a function');
	
	  if (!this._events || !this._events[type])
	    return this;
	
	  list = this._events[type];
	  length = list.length;
	  position = -1;
	
	  if (list === listener ||
	      (isFunction(list.listener) && list.listener === listener)) {
	    delete this._events[type];
	    if (this._events.removeListener)
	      this.emit('removeListener', type, listener);
	
	  } else if (isObject(list)) {
	    for (i = length; i-- > 0;) {
	      if (list[i] === listener ||
	          (list[i].listener && list[i].listener === listener)) {
	        position = i;
	        break;
	      }
	    }
	
	    if (position < 0)
	      return this;
	
	    if (list.length === 1) {
	      list.length = 0;
	      delete this._events[type];
	    } else {
	      list.splice(position, 1);
	    }
	
	    if (this._events.removeListener)
	      this.emit('removeListener', type, listener);
	  }
	
	  return this;
	};
	
	EventEmitter.prototype.removeAllListeners = function(type) {
	  var key, listeners;
	
	  if (!this._events)
	    return this;
	
	  // not listening for removeListener, no need to emit
	  if (!this._events.removeListener) {
	    if (arguments.length === 0)
	      this._events = {};
	    else if (this._events[type])
	      delete this._events[type];
	    return this;
	  }
	
	  // emit removeListener for all listeners on all events
	  if (arguments.length === 0) {
	    for (key in this._events) {
	      if (key === 'removeListener') continue;
	      this.removeAllListeners(key);
	    }
	    this.removeAllListeners('removeListener');
	    this._events = {};
	    return this;
	  }
	
	  listeners = this._events[type];
	
	  if (isFunction(listeners)) {
	    this.removeListener(type, listeners);
	  } else if (listeners) {
	    // LIFO order
	    while (listeners.length)
	      this.removeListener(type, listeners[listeners.length - 1]);
	  }
	  delete this._events[type];
	
	  return this;
	};
	
	EventEmitter.prototype.listeners = function(type) {
	  var ret;
	  if (!this._events || !this._events[type])
	    ret = [];
	  else if (isFunction(this._events[type]))
	    ret = [this._events[type]];
	  else
	    ret = this._events[type].slice();
	  return ret;
	};
	
	EventEmitter.prototype.listenerCount = function(type) {
	  if (this._events) {
	    var evlistener = this._events[type];
	
	    if (isFunction(evlistener))
	      return 1;
	    else if (evlistener)
	      return evlistener.length;
	  }
	  return 0;
	};
	
	EventEmitter.listenerCount = function(emitter, type) {
	  return emitter.listenerCount(type);
	};
	
	function isFunction(arg) {
	  return typeof arg === 'function';
	}
	
	function isNumber(arg) {
	  return typeof arg === 'number';
	}
	
	function isObject(arg) {
	  return typeof arg === 'object' && arg !== null;
	}
	
	function isUndefined(arg) {
	  return arg === void 0;
	}


/***/ },
/* 247 */
/***/ function(module, exports, __webpack_require__, __webpack_module_template_argument_0__) {

	var overArg = __webpack_require__(__webpack_module_template_argument_0__);
	
	/** Built-in value references. */
	var getPrototype = overArg(Object.getPrototypeOf, Object);
	
	module.exports = getPrototype;


/***/ },
/* 248 */
/***/ function(module, exports, __webpack_require__, __webpack_module_template_argument_0__, __webpack_module_template_argument_1__, __webpack_module_template_argument_2__) {

	var getPrototype = __webpack_require__(__webpack_module_template_argument_0__),
	    isHostObject = __webpack_require__(__webpack_module_template_argument_1__),
	    isObjectLike = __webpack_require__(__webpack_module_template_argument_2__);
	
	/** `Object#toString` result references. */
	var objectTag = '[object Object]';
	
	/** Used for built-in method references. */
	var funcProto = Function.prototype,
	    objectProto = Object.prototype;
	
	/** Used to resolve the decompiled source of functions. */
	var funcToString = funcProto.toString;
	
	/** Used to check objects for own properties. */
	var hasOwnProperty = objectProto.hasOwnProperty;
	
	/** Used to infer the `Object` constructor. */
	var objectCtorString = funcToString.call(Object);
	
	/**
	 * Used to resolve the
	 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
	 * of values.
	 */
	var objectToString = objectProto.toString;
	
	/**
	 * Checks if `value` is a plain object, that is, an object created by the
	 * `Object` constructor or one with a `[[Prototype]]` of `null`.
	 *
	 * @static
	 * @memberOf _
	 * @since 0.8.0
	 * @category Lang
	 * @param {*} value The value to check.
	 * @returns {boolean} Returns `true` if `value` is a plain object, else `false`.
	 * @example
	 *
	 * function Foo() {
	 *   this.a = 1;
	 * }
	 *
	 * _.isPlainObject(new Foo);
	 * // => false
	 *
	 * _.isPlainObject([1, 2, 3]);
	 * // => false
	 *
	 * _.isPlainObject({ 'x': 0, 'y': 0 });
	 * // => true
	 *
	 * _.isPlainObject(Object.create(null));
	 * // => true
	 */
	function isPlainObject(value) {
	  if (!isObjectLike(value) ||
	      objectToString.call(value) != objectTag || isHostObject(value)) {
	    return false;
	  }
	  var proto = getPrototype(value);
	  if (proto === null) {
	    return true;
	  }
	  var Ctor = hasOwnProperty.call(proto, 'constructor') && proto.constructor;
	  return (typeof Ctor == 'function' &&
	    Ctor instanceof Ctor && funcToString.call(Ctor) == objectCtorString);
	}
	
	module.exports = isPlainObject;


/***/ }
]);