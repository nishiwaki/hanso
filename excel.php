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
$EXCEL_STR = $yy . "�N " . $mm . "���ɎQ���o���Ȃ������l<BR>
<table border='1'>
<tr>
   <td>NO</td>
   <td>���O</td>
   <td>����</td>
   <td>����</td>
   <td>���[��</td>
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
$maillisttag = "<BR><table><tr><td colspan=30>���Q���҂̃��[�����X�g</td></tr><tr><td colspan=30>".$maillist."</td></tr></table>";
$EXCEL_STR .= "</table>".$maillisttag;   
  
echo "<meta content=\"application/vnd.ms-excel; charset=Shift_JIS\" name=\"Content-type\"> ";   
echo $EXCEL_STR;   
?>  
</body>
</html>