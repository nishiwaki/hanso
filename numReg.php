<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
		<title> :::: +O+s+0+k+5+i+s&#12539;+=+8+e+5+i+s!!N7Wbm: ::::</title>
		<link type="text/css" href="css/form/table.css" rel="stylesheet" />
	</head>
	<?php
		include "common.h"; // DB host

		$studyDate = $_POST["studyDate"];
		$studyStopDate = $_POST["studyStopDate"];
		$japhito = $_POST["japhito"];
		$japhitom = $_POST["japhitom"];
		$korhito = $_POST["korhito"];
		
		$studyDate = str_replace("/","", $studyDate);
		$studyStopDate = str_replace("/","", $studyStopDate);
		
		$query = " insert into setup (studydate, studystopdate, korhito, japhito,japhitom) 
				  values ('". $studyDate ."', " 
				           . $studyStopDate .", "  
				           . $korhito .", " 
				           . $japhito .", "
				           . $japhitom ." ) ";
		echo $query;
		
		$row=mysql_query ($query, $cid ) or die(mysql_error());
		
		echo "<SCRIPT LANGUAGE='JavaScript'> parent.location.reload(); </SCRIPT>";
	?>
	<body>
	</body>
</html>