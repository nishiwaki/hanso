<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=shift-jis" />
	</head>
<body>
<?
include "common.h"; // DB host

if(isset($_POST["ccyear"]) && isset($_POST["ccmonth"])){
	if(strlen($_POST["ccmonth"])==1){
		$mm="0".$_POST["ccmonth"];
	}else{
		$mm=$_POST["ccmonth"];
	}
	$curdate=$_POST["ccyear"].$mm;
}else{
    $curdate = date("Ymd");
    $curdate = substr($curdate, 0, -2);
}

header( "Content-type: application/vnd.ms-excel" );    
header( "Content-type: application/vnd.ms-excel; charset=Shift_JIS");   
header( "Content-Disposition: attachment; filename = study" . $curdate . ".xls" );    
header( "Content-Description: PHP4 Generated Data" );    

$query="select
			attendtype, -- 区分 				0
			no, 		-- キー					1
			name, 		-- 名前					2
			national, 	-- 国籍					3
			sex, 		-- 性別					4
			email, 		-- メールアドレス		5
			langlevel, 	-- 語学レベル			6
			drink, 		-- 飲物					7
			drinkPrice, -- 飲物代				8
			absent, 	-- 2次参加				9
			attend, 	-- 初参加				10
			attendFee,	 -- 参加費				11
			sumFee, 	-- 合計					12
			grp 		-- グループ				13
		from 
			member
		where
	       EXTRACT(YEAR_MONTH FROM updatedt)=". $curdate  ." 
	       AND attendtype != ''
           AND grp = '未定'
		order by
			grp
			,no asc ";

$result=mysql_query ( $query, $cid ) or die(mysql_error());  
// table header
$yy = substr($curdate , 0, 4);
$mm = substr($curdate , 4, 2);
$EXCEL_STR = $yy . "年 " . $mm . "月に参加出来なかった人<BR>
<table border='1'>
<tr>
   <td>NO</td>
   <td>名前</td>
   <td>国籍</td>
   <td>性別</td>
   <td>メール</td>
</tr>";   
  $maillist = "";
  $no = 1;
while($row = mysql_fetch_array($result)) {   
   $EXCEL_STR .= "   
   <tr>   
       <td>".$no."</td>   
       <td>".$row['name']."</td>   
       <td>".$row['national']."</td>   
       <td>".$row['sex']."</td>   
       <td>".$row['email']."</td>   
   </tr>   
   ";
   $maillist .= "'" . $row['name'] . "'&lt;" . $row['email'] . "&gt;,";
   $no++;
}   
$maillisttag = "<BR><table><tr><td colspan=30>未参加者のメールリスト</td></tr><tr><td colspan=30>".$maillist."</td></tr></table>";
$EXCEL_STR .= "</table>".$maillisttag;   
  
echo "<meta content=\"application/vnd.ms-excel; charset=Shift_JIS\" name=\"Content-type\"> ";   
echo $EXCEL_STR;   
?>  
</body>
</html>