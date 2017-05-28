<?php 
$usertable = "CREATE TABLE `users` (
`user_id` INT NOT NULL auto_increment,
`email` VARCHAR( 200 ) NOT NULL ,
`password` VARCHAR( 50 ) NOT NULL ,
`firstname` VARCHAR( 200 ) NOT NULL ,
`lastname` VARCHAR( 200 ) NOT NULL ,
`affiliation` VARCHAR( 200 ) NOT NULL ,
`showemail` BOOL DEFAULT 0 NOT NULL ,
`privilege` ENUM( 'admin', 'user' ) NOT NULL DEFAULT 'user' ,
PRIMARY KEY ( `user_id` )
) ;";
$papertable = "CREATE TABLE `papers` (
`paper_id` INT NOT NULL AUTO_INCREMENT ,
`title` VARCHAR( 200 ) NOT NULL ,
`abstract` TEXT NOT NULL ,
`pdf` LONGBLOB NOT NULL ,
`pdfname` VARCHAR( 200 ) NOT NULL ,
`session_id` INT NOT NULL ,
`order` INT NOT NULL ,
PRIMARY KEY ( `paper_id` )
) ;";
$sessiontable = "CREATE TABLE `sessions` (
`session_id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 200 ) NOT NULL ,
`user_id` INT NOT NULL ,
`starttime` DATETIME NOT NULL ,
`duration` INT NOT NULL ,
PRIMARY KEY ( `session_id` )
) ;";
$authortable = "CREATE TABLE `authors` (
`paper_id` INT NOT NULL ,
`user_id` INT NOT NULL ,
`order` INT NOT NULL ,
PRIMARY KEY ( `paper_id`, `order` )
) ;";
$commenttable = "CREATE TABLE `comments` (
`comment_id` INT NOT NULL AUTO_INCREMENT ,
`user_id` INT NOT NULL ,
`paper_id` INT NOT NULL ,
`comment` TEXT NOT NULL ,
`date` DATETIME NOT NULL ,
`approved` BOOL DEFAULT 0 NOT NULL ,
PRIMARY KEY ( `comment_id` )
) ;";
$optiontable = "CREATE TABLE `options` (
`name` VARCHAR( 200 ) NOT NULL ,
`type` ENUM( 'text', 'file', 'boolean' ) NOT NULL ,
`value` TEXT NOT NULL ,
PRIMARY KEY ( `name` )
) ;";
$filetable = "CREATE TABLE `files` (
`paper_id` INT NOT NULL ,
`name` VARCHAR( 200 ) NOT NULL ,
`ext` VARCHAR( 200 ) NOT NULL ,
`type` VARCHAR( 200 ) NOT NULL ,
`data` LONGBLOB NOT NULL ,
PRIMARY KEY ( `paper_id` , `name` )
)";

$optionquery = "INSERT INTO `options` ( `name` , `type` , `value` )
VALUES (
'Conference Name', 'text', 'SCARF - Stanford Conference And Research Forum'
), (
'Banner Image', 'file', 'images/logo.jpg'
), (
'Background Image', 'file', 'images/container.jpg'
), (
'Style File (CSS)', 'file', 'style.css'
), (
'Is Forum Moderated (emails the admins on every post)', 'boolean', '0'
);";

// Submitted the information already
$dbname = "scarf";
$user = "scarf";
$pass = "Jk8R5ahU8FfpMZUT";
$hostname = "localhost";

$link = mysql_connect($hostname, $user, $pass) or die ("Could not connect as newly created user: " . mysql_error());
mysql_select_db($dbname) or die("Could not select DB as new user: " . mysql_error());

mysql_query($usertable) or die(mysql_error());
mysql_query($papertable) or die(mysql_error());
mysql_query($sessiontable) or die(mysql_error());
mysql_query($authortable) or die(mysql_error());
mysql_query($commenttable) or die(mysql_error());
mysql_query($optiontable) or die(mysql_error());
mysql_query($filetable) or die(mysql_error());

// OPTIONS

mysql_query($optionquery) or die(mysql_error());

?>
