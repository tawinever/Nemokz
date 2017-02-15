SET NAMES "utf8";

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_ship_to_pay` (
`id_ship` int(10) NOT NULL AUTO_INCREMENT,
`id_carrier` INT(10) NOT NULL ,
`id_payment_module` varchar(1024) NOT NULL,
`active` tinyint(1) NOT NULL,
PRIMARY KEY (`id_ship`)
)
ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_custom` (
`id_custom` int(10) NOT NULL AUTO_INCREMENT,
`id_order` INT(10) NOT NULL ,
`id_cart` INT(10) NOT NULL ,
`id_pickup` INT(10) NOT NULL ,
`value` varchar(5000),
`message` TEXT NULL,
PRIMARY KEY (`id_custom`)
)
ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout` (
  `id_field` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `validate` varchar(50) NOT NULL,
  `group` varchar(20) NOT NULL,
  `position` int(10) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `is_custom` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_field`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22;

INSERT INTO `PREFIX_advcheckout` (`id_field`, `name`, `type`, `validate`, `group`, `position`, `required`, `is_custom`, `active`) VALUES
(1, 'firstname', 'input', 'isName', 'customer', 2, 1, 0, 1),
(2, 'lastname', 'input', 'isName', 'customer', 3, 1, 0, 1),
(3, 'company', 'input', 'isName', 'address', 8, 0, 0, 0),
(4, 'passwd', 'input', 'isPasswd', 'customer', 1, 0, 0, 1),
(5, 'address1', 'textarea', 'isAddress', 'address', 10, 1, 0, 1),
(6, 'address2', 'textarea', 'isAddress', 'address', 11, 0, 0, 0),
(7, 'email', 'input', 'isEmail', 'customer', 0, 1, 0, 1),
(8, 'postcode', 'input', 'isPostCode', 'address', 12, 1, 0, 1),
(9, 'city', 'input', 'isCityName', 'address', 13, 1, 0, 1),
(10, 'id_country', 'select', 'none', 'address', 14, 1, 0, 1),
(11, 'id_state', 'select', 'none', 'address', 15, 0, 0, 0),
(12, 'other', 'textarea', 'isMessage', 'address', 16, 0, 0, 0),
(13, 'alias', 'input', 'isMessage', 'address', 17, 0, 0, 0),
(14, 'phone', 'input', 'isPhoneNumber', 'address', 18, 1, 0, 1),
(15, 'phone_mobile', 'input', 'isPhoneNumber', 'address', 19, 1, 0, 1),
(16, 'dni', 'input', 'none', 'address', 20, 0, 0, 0),
(17, 'vat_number', 'input', 'none', 'address', 9, 0, 0, 0),
(18, 'newsletter', 'checkbox', 'none', 'customer', 6, 0, 0, 1),
(19, 'optin', 'checkbox', 'none', 'customer', 7, 0, 0, 1),
(20, 'birthday', 'select', 'none', 'customer', 4, 0, 0, 1),
(21, 'gender', 'radio', 'none', 'customer', 5, 0, 0, 1);


CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_lang` (
  `id_field` int(10) NOT NULL,
  `id_lang` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tooltip` VARCHAR( 1024 ) NULL DEFAULT '',
  PRIMARY KEY (`id_field`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `PREFIX_orders` ADD `custom_field` VARCHAR( 5000 ) NULL DEFAULT "";

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_unpay` (
	`id_unpay` INT(10) NOT NULL AUTO_INCREMENT,
	`id_order_state` INT( 10 ) NOT NULL DEFAULT  '1',
	`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`position` INT(10) UNSIGNED NOT NULL DEFAULT '0',
	`date_add` DATETIME NOT NULL,
	`date_upd` DATETIME NOT NULL,
	PRIMARY KEY (`id_unpay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		
CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_unpay_lang` (
	`id_unpay` INT(10) UNSIGNED NOT NULL,
	`id_lang` INT(10) UNSIGNED NOT NULL,
	`name` VARCHAR(1024) NOT NULL,
	`description_short` VARCHAR(1024) NOT NULL,
	`description` TEXT NULL,
	`description_success` TEXT NULL,
	UNIQUE INDEX `advcheckout_unpay_lang_index` (`id_unpay`, `id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_pickup_lang` (
	`id_pickup` int(11) NOT NULL,
	`name` varchar(1024) NOT NULL,
	`description` varchar(2048) NOT NULL,
	`id_lang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PREFIX_advcheckout_pickup` (
	`id_pickup` int(11) NOT NULL AUTO_INCREMENT,
	`latitude` varchar(128) NOT NULL,
	`longitude` varchar(128) NOT NULL,
	`number` varchar(128) NOT NULL,
	`address` varchar(1024) NOT NULL,
	`email` varchar(128) NOT NULL,
	`times` varchar(2048) NOT NULL,
	`active` tinyint(1) NOT NULL,
	`postcode` varchar(16) NOT NULL,
	`fax` varchar(128) NOT NULL,
	`city` varchar(128) NOT NULL,
	PRIMARY KEY (`id_pickup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;