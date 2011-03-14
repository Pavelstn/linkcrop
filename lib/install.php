<?php
include('config.php');
include('database.php');

$query="CREATE TABLE IF NOT EXISTS `link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ref` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tinyurl` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `longurl` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  FULLTEXT KEY `ref` (`ref`),
  FULLTEXT KEY `tinyurl` (`tinyurl`),
  FULLTEXT KEY `longurl` (`longurl`)
)";
 mysql_query($query);

?>
