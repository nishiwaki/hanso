<?
include "common.h"; // DB host
$cid= mysql_connect($DB_SERVER,$USERID,$PASSWD) or die(mysql_error()) ;
mysql_select_db($USERID,$cid) or die(mysql_error()); 


$query="CREATE TABLE member (
  attendtype varchar(10) NOT NULL default '',
  no int(10) unsigned NOT NULL auto_increment,
  name varchar(20) NOT NULL default '',
  national varchar(10) NOT NULL default '',
  sex varchar(10) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  langlevel varchar(255) NOT NULL default '',
  drink varchar(50) NOT NULL default '',
  drinkPrice int(3) NOT NULL default 0,
  absent varchar(10) NOT NULL default '',
  attend varchar(10) NOT NULL default '',
  attendFee int(3) NOT NULL default 0,
  sumFee int(3) NOT NULL default 0,
  level int(2) NOT NULL default 9,
  grp int(1) NOT NULL default 0,
  yobi1 varchar(255) NOT NULL default '',
  yobi2 varchar(255) NOT NULL default '',
  yobi3 varchar(255) NOT NULL default '',
  yobi4 varchar(255) NOT NULL default '',
  yobi5 varchar(255) NOT NULL default '',
  memo text,
  updatedt timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (no)
)";
//$query="drop table member";
echo $query;
mysql_query ( $query, $cid ) or die(mysql_error())
?>