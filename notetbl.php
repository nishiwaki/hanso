<?
include "common.h"; // DB host
$query="CREATE TABLE note (
  no int(10) unsigned NOT NULL auto_increment,
  month varchar(6) NOT NULL default '',
  attendm varchar(20) NOT NULL default '',
  copym varchar(20) NOT NULL default '',
  drinkm varchar(20) NOT NULL default '',
  potetom varchar(20) NOT NULL default '',
  nokorim varchar(20) NOT NULL default '',
  getm varchar(20) NOT NULL default '',
  total int(3) NOT NULL default 0,
  yobi1 varchar(255) NOT NULL default '',
  yobi2 varchar(255) NOT NULL default '',
  yobi3 varchar(255) NOT NULL default '',
  yobi4 varchar(255) NOT NULL default '',
  yobi5 varchar(255) NOT NULL default '',
  regDate timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (no)
)";

//$query ="drop table note";
//$query="drop table member";
echo $query;
mysql_query ( $query, $cid ) or die(mysql_error())
?>