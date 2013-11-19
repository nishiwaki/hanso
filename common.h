<?

/*
 * variable definitions which are commonly used in many files
*/

$DB_SERVER = 'localhost';
$USERID = 'artis';
$PASSWD = '1234';
$DB='artis';
$cid= mysql_connect($DB_SERVER,$USERID,$PASSWD) or die(mysql_error()) ;
mysql_select_db($DB,$cid) or die(mysql_error()); // 데이타베이스테이블
/*
$LinesPerPage = 15;
*/
$LinesPerPage = 10;

?>
