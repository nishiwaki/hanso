<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
		<title> :::: 韓日・交流会 - ハングルサラン・ソジュサラン ::::</title>
	</head>
<body>
	<?
	include "common.h";
    //
    $curdate = date("Ymd");
    $curdate = substr($curdate,0,-2);
    //echo $curdate;
	$query = "select * from member where name='".$_POST["name"]."' and EXTRACT(YEAR_MONTH FROM updatedt) = ".$curdate;
	//echo $query;
	$row = mysql_query($query, $cid) or die(mysql_error());
	$flag=0;
	while($rs=mysql_fetch_row($row)){
		if($rs[2] == $_POST["name"]){
			$flag=1;
		}
	}

	if($flag == 0){
	    //DBに申し込みデータを更新
		//日本人の方の場合、参加費５００円
		if($_POST["national"]=="日本"){
			if($_POST["attendtype"] == "スタッフ"){
			}
			else{
			$attendFee = 500;
			}
		}
?>
	<p>下記の情報で申し込み完了致しました。</p>
	<p></p>
	<p>参加区分は [<?= $_POST["attendtype"]?>] です。</p>
	<p>お名前は [<?= $_POST["name"]?>] です。</p>
	<p>国籍は [<?= $_POST["national"]?>] です。</p>
	<p>性別は [<?= $_POST["sex"]?>] です。</p>
	<p>メールは [<?= $_POST["email"]?>] です。</p>
	<p>語学レベルは [<?= $_POST["langlevel"]?>] です。</p>
	<p>飲み物は [<?= $_POST["drink"]?>] です。</p>
	<p>２次会参加は [<?= $_POST["absent"]?>] です。</p>
	<p>参加経験の有無は [<?= $_POST["attend"]?>] です。</p>
	<p></p>
	<p></p>
	<p>ありがとうございました。</p>
<?

   if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }

	    $sumFee = $attendFee + $_POST["drinkPrice"];
		$query = "insert into member ";
		$query.= "(attendtype,";
		$query.= " name,national,";
		$query.= " sex,";
		$query.= " email,";
		$query.= " langlevel,";
		$query.= " drink,";
		$query.= " drinkPrice,";
		$query.= " absent,";
		$query.= " attend,";
		$query.= " attendFee,";
		$query.= " sumFee,";
		$query.= " level,";
		$query.= " yobi1,";
		$query.= " yobi2)";
		$query.= " values(";
		$query.= "'"   . $_POST["attendtype"];
		$query.= "','" . $_POST["name"];
		$query.= "','" . $_POST["national"];
		$query.= "','" . $_POST["sex"];
		$query.= "','" . $_POST["email"];
		$query.= "','" . $_POST["langlevel"];
		$query.= "','" . $_POST["drink"];
		$query.= "','" . $_POST["drinkPrice"];
		$query.= "','" . $_POST["absent"];
		$query.= "','" . $_POST["attend"];
		$query.= "','" . $attendFee;
		$query.= "','" . $sumFee;
		$query.= "','9','".$_SERVER['HTTP_USER_AGENT']."','".$ip."')";

		//echo $query;
		//$str = mb_convert_encoding($query, "UTF-8", "shift-jis");

		mysql_query($query, $cid) or die(mysql_error());
	}else{
		echo "<p>既に申込が完了されている方です。</p>";
		echo "<p><input type='button' onclick='javascript:history.back();' value='申込フォームへ戻る'></p>";
	}
	?>
</body>

</html>
