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
			attendtype, -- �敪 				0
			no, 		-- �L�[					1
			name, 		-- ���O					2
			national, 	-- ����					3
			sex, 		-- ����					4
			email, 		-- ���[���A�h���X		5
			langlevel, 	-- ��w���x��			6
			drink, 		-- ����					7
			drinkPrice, -- ������				8
			absent, 	-- 2���Q��				9
			attend, 	-- ���Q��				10
			attendFee,	 -- �Q����				11
			sumFee, 	-- ���v					12
			grp 		-- �O���[�v				13
		from 
			member
		where
	       EXTRACT(YEAR_MONTH FROM updatedt)=". $curdate  ." 
	       AND attendtype != ''
           AND grp = '����'
		order by
			grp
			,no asc ";

$result=mysql_query ( $query, $cid ) or die(mysql_error());  
// table header
$yy = substr($curdate , 0, 4);
$mm = substr($curdate , 4, 2);
$EXCEL_STR = $yy . "�N " . $mm . "���ɎQ���o���Ȃ������l\r\n";
  $body = "NO,���O,����,����,���[��,\r\n";
  $maillist = "";
  $no = 1;
while($row = mysql_fetch_array($result)) {   
   $body .= $no . "," . $row['name'] . "," . $row['national'] . "," . $row['sex'] . "," . $row['email'] . ",\r\n";
   $maillist .= "'" . $row['name'] . "'<" . $row['email'] . ">,";
   $no++;
}   
$maillisttag = "���Q���҂̃��[�����X�g\r\n".$maillist;
  
//echo $EXCEL_STR;
echo $EXCEL_STR . $body . "\r\n" . $maillisttag;
?>  
