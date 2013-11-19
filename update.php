<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />

		<title> :::: ハングルサラン・ソジュサラン　管理者 ::::</title>

		<link type="text/css" href="css/form/table.css" rel="stylesheet" />

	</head>

	<?php

	include "common.h"; // DB host



	$updateSqlArr = explode("/",$_POST["updateSql"]);

	for($idx = 0; $idx < count($updateSqlArr); $idx++) {

		$updateSql = str_replace("|", "'", $updateSqlArr[$idx]);

		echo $updateSql;

		$row=mysql_query ($updateSql, $cid ) or die(mysql_error());

		echo "<br>";

		echo "<SCRIPT LANGUAGE='JavaScript'> parent.location.reload(); </SCRIPT>";

	}

?>

	<body>

	</body>

</html>