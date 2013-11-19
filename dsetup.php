<?
include "common.h"; // DB host
$query="CREATE TABLE setup (
    no int(10) unsigned NOT NULL auto_increment,
    studydate varchar(8) NOT NULL default '00000000',
    studystopdate varchar(8) NOT NULL default '00000000',
    korhito int(2) NOT NULL default 0,
    japhito int(2) NOT NULL default 0,
    japhitom int(2) NOT NULL default 0,
    yobi1 varchar(255) NOT NULL default '',
    yobi2 varchar(255) NOT NULL default '',
    yobi3 varchar(255) NOT NULL default '',
    yobi4 varchar(255) NOT NULL default '',
    yobi5 varchar(255) NOT NULL default '',
    memo text,
    updatedt timestamp NOT NULL default CURRENT_TIMESTAMP,
    PRIMARY KEY  (no)
  )";

$query="drop table setup";
echo $query;
mysql_query ( $query, $cid ) or die(mysql_error())
?>