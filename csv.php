<?
include "common.h"; // DB host
$curdate="";
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

header( "Content-type: application/vnd.ms-excel; charset=Shift_JIS");   
header( "Content-Disposition: attachment; filename = study" . $curdate . ".csv" );    
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
$EXCEL_STR = $yy . "年 " . $mm . "月に参加出来なかった人\r\n";
  $body = "NO,名前,国籍,性別,メール,\r\n";
  $maillist = "";
  $no = 1;
while($row = mysql_fetch_array($result)) {   
   $body .= $no . "," . $row['name'] . "," . $row['national'] . "," . $row['sex'] . "," . $row['email'] . ",\r\n";
   $maillist .= "'" . $row['name'] . "'<" . $row['email'] . ">,";
   $no++;
}   
$maillisttag = "未参加者のメールリスト\r\n".$maillist;
  
//echo $EXCEL_STR;
echo $EXCEL_STR . $body . "\r\n" . $maillisttag;
?>  
