CREATE TABLE `orders` (
  `id` int(11)  NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `paid_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_ip` varchar(15) NOT NULL,

  PRIMARY KEY (`id`)
 )ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE `purchase` (
  `id` int(11)  NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL ,
  `product_id` int(11) NOT NULL ,
  `price` float  NOT NULL ,
  `amount` float  NOT NULL ,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,

  PRIMARY KEY (`id`)
 )ENGINE=MyISAM  DEFAULT CHARSET=utf8;

