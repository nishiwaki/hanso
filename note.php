<?php
	session_start(); 

///////////////////////////////
// YOUR PASSWORD HERE //
///////////////////////////////

$pw = "artis";

///////////////////////////////
?><!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title>Webhard</title>
<style>
.directory { background-color:#fcf; }
.file {}
.remove { font-weight:bold; color:#f66; }
.upload input[type="file"] { border:1px solid #000;}
a { text-decoration:none; }
h2 { color:red; }
.login { position:absolute; width:300px; left:40%; top:40%; border:2px dotted #fcc; }
.logout { border:1px solid #000; width:100px; }
</style>
<!-- MD5 encrypt function -->
<script>var hexcase=0;var b64pad="";var chrsz=8;function hex_md5(s){return binl2hex(core_md5(str2binl(s),s.length*chrsz))}function b64_md5(s){return binl2b64(core_md5(str2binl(s),s.length*chrsz))}function str_md5(s){return binl2str(core_md5(str2binl(s),s.length*chrsz))}function hex_hmac_md5(key,data){return binl2hex(core_hmac_md5(key,data))}function b64_hmac_md5(key,data){return binl2b64(core_hmac_md5(key,data))}function str_hmac_md5(key,data){return binl2str(core_hmac_md5(key,data))}function md5_vm_test(){return hex_md5("abc")=="900150983cd24fb0d6963f7d28e17f72"}function core_md5(x,len){x[len>>5]|=0x80<<((len)%32);x[(((len+64)>>>9)<<4)+14]=len;var a=1732584193;var b=-271733879;var c=-1732584194;var d=271733878;for(var i=0;i<x.length;i+=16){var olda=a;var oldb=b;var oldc=c;var oldd=d;a=md5_ff(a,b,c,d,x[i+0],7,-680876936);d=md5_ff(d,a,b,c,x[i+1],12,-389564586);c=md5_ff(c,d,a,b,x[i+2],17,606105819);b=md5_ff(b,c,d,a,x[i+3],22,-1044525330);a=md5_ff(a,b,c,d,x[i+4],7,-176418897);d=md5_ff(d,a,b,c,x[i+5],12,1200080426);c=md5_ff(c,d,a,b,x[i+6],17,-1473231341);b=md5_ff(b,c,d,a,x[i+7],22,-45705983);a=md5_ff(a,b,c,d,x[i+8],7,1770035416);d=md5_ff(d,a,b,c,x[i+9],12,-1958414417);c=md5_ff(c,d,a,b,x[i+10],17,-42063);b=md5_ff(b,c,d,a,x[i+11],22,-1990404162);a=md5_ff(a,b,c,d,x[i+12],7,1804603682);d=md5_ff(d,a,b,c,x[i+13],12,-40341101);c=md5_ff(c,d,a,b,x[i+14],17,-1502002290);b=md5_ff(b,c,d,a,x[i+15],22,1236535329);a=md5_gg(a,b,c,d,x[i+1],5,-165796510);d=md5_gg(d,a,b,c,x[i+6],9,-1069501632);c=md5_gg(c,d,a,b,x[i+11],14,643717713);b=md5_gg(b,c,d,a,x[i+0],20,-373897302);a=md5_gg(a,b,c,d,x[i+5],5,-701558691);d=md5_gg(d,a,b,c,x[i+10],9,38016083);c=md5_gg(c,d,a,b,x[i+15],14,-660478335);b=md5_gg(b,c,d,a,x[i+4],20,-405537848);a=md5_gg(a,b,c,d,x[i+9],5,568446438);d=md5_gg(d,a,b,c,x[i+14],9,-1019803690);c=md5_gg(c,d,a,b,x[i+3],14,-187363961);b=md5_gg(b,c,d,a,x[i+8],20,1163531501);a=md5_gg(a,b,c,d,x[i+13],5,-1444681467);d=md5_gg(d,a,b,c,x[i+2],9,-51403784);c=md5_gg(c,d,a,b,x[i+7],14,1735328473);b=md5_gg(b,c,d,a,x[i+12],20,-1926607734);a=md5_hh(a,b,c,d,x[i+5],4,-378558);d=md5_hh(d,a,b,c,x[i+8],11,-2022574463);c=md5_hh(c,d,a,b,x[i+11],16,1839030562);b=md5_hh(b,c,d,a,x[i+14],23,-35309556);a=md5_hh(a,b,c,d,x[i+1],4,-1530992060);d=md5_hh(d,a,b,c,x[i+4],11,1272893353);c=md5_hh(c,d,a,b,x[i+7],16,-155497632);b=md5_hh(b,c,d,a,x[i+10],23,-1094730640);a=md5_hh(a,b,c,d,x[i+13],4,681279174);d=md5_hh(d,a,b,c,x[i+0],11,-358537222);c=md5_hh(c,d,a,b,x[i+3],16,-722521979);b=md5_hh(b,c,d,a,x[i+6],23,76029189);a=md5_hh(a,b,c,d,x[i+9],4,-640364487);d=md5_hh(d,a,b,c,x[i+12],11,-421815835);c=md5_hh(c,d,a,b,x[i+15],16,530742520);b=md5_hh(b,c,d,a,x[i+2],23,-995338651);a=md5_ii(a,b,c,d,x[i+0],6,-198630844);d=md5_ii(d,a,b,c,x[i+7],10,1126891415);c=md5_ii(c,d,a,b,x[i+14],15,-1416354905);b=md5_ii(b,c,d,a,x[i+5],21,-57434055);a=md5_ii(a,b,c,d,x[i+12],6,1700485571);d=md5_ii(d,a,b,c,x[i+3],10,-1894986606);c=md5_ii(c,d,a,b,x[i+10],15,-1051523);b=md5_ii(b,c,d,a,x[i+1],21,-2054922799);a=md5_ii(a,b,c,d,x[i+8],6,1873313359);d=md5_ii(d,a,b,c,x[i+15],10,-30611744);c=md5_ii(c,d,a,b,x[i+6],15,-1560198380);b=md5_ii(b,c,d,a,x[i+13],21,1309151649);a=md5_ii(a,b,c,d,x[i+4],6,-145523070);d=md5_ii(d,a,b,c,x[i+11],10,-1120210379);c=md5_ii(c,d,a,b,x[i+2],15,718787259);b=md5_ii(b,c,d,a,x[i+9],21,-343485551);a=safe_add(a,olda);b=safe_add(b,oldb);c=safe_add(c,oldc);d=safe_add(d,oldd)}return Array(a,b,c,d)}function md5_cmn(q,a,b,x,s,t){return safe_add(bit_rol(safe_add(safe_add(a,q),safe_add(x,t)),s),b)}function md5_ff(a,b,c,d,x,s,t){return md5_cmn((b&c)|((~b)&d),a,b,x,s,t)}function md5_gg(a,b,c,d,x,s,t){return md5_cmn((b&d)|(c&(~d)),a,b,x,s,t)}function md5_hh(a,b,c,d,x,s,t){return md5_cmn(b^c^d,a,b,x,s,t)}function md5_ii(a,b,c,d,x,s,t){return md5_cmn(c^(b|(~d)),a,b,x,s,t)}function core_hmac_md5(key,data){var bkey=str2binl(key);if(bkey.length>16)bkey=core_md5(bkey,key.length*chrsz);var ipad=Array(16),opad=Array(16);for(var i=0;i<16;i++){ipad[i]=bkey[i]^0x36363636;opad[i]=bkey[i]^0x5C5C5C5C}var hash=core_md5(ipad.concat(str2binl(data)),512+data.length*chrsz);return core_md5(opad.concat(hash),512+128)}function safe_add(x,y){var lsw=(x&0xFFFF)+(y&0xFFFF);var msw=(x>>16)+(y>>16)+(lsw>>16);return(msw<<16)|(lsw&0xFFFF)}function bit_rol(num,cnt){return(num<<cnt)|(num>>>(32-cnt))}function str2binl(str){var bin=Array();var mask=(1<<chrsz)-1;for(var i=0;i<str.length*chrsz;i+=chrsz)bin[i>>5]|=(str.charCodeAt(i/chrsz)&mask)<<(i%32);return bin}function binl2str(bin){var str="";var mask=(1<<chrsz)-1;for(var i=0;i<bin.length*32;i+=chrsz)str+=String.fromCharCode((bin[i>>5]>>>(i%32))&mask);return str}function binl2hex(binarray){var hex_tab=hexcase?"0123456789ABCDEF":"0123456789abcdef";var str="";for(var i=0;i<binarray.length*4;i++){str+=hex_tab.charAt((binarray[i>>2]>>((i%4)*8+4))&0xF)+hex_tab.charAt((binarray[i>>2]>>((i%4)*8))&0xF)}return str}function binl2b64(binarray){var tab="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";var str="";for(var i=0;i<binarray.length*4;i+=3){var triplet=(((binarray[i>>2]>>8*(i%4))&0xFF)<<16)|(((binarray[i+1>>2]>>8*((i+1)%4))&0xFF)<<8)|((binarray[i+2>>2]>>8*((i+2)%4))&0xFF);for(var j=0;j<4;j++){if(i*8+j*6>binarray.length*32)str+=b64pad;else str+=tab.charAt((triplet>>6*(3-j))&0x3F)}}return str}</script>
<!-- Logout [ --------------------------------------------------------------------------------- -->
<script>
function logout()
{
	location.replace("./note.php?mode=logout");
	return false;
}
</script>
<?php
if($_GET["mode"] == "logout")
{
	session_destroy();
?>
<script>location.replace("./note.php");</script>
<?php
	exit();
}
?> <!-- ] Logout End ==================================================================== --> <?php
if(!$_SESSION["session_id"]) // Session not exist
{
	$_SESSION['session_id'] = session_id();
}

$pw = md5($_SESSION['session_id'].$pw);
if($_GET['token']) $_SESSION['password'] = $_GET['token'];

if($_SESSION["password"] != $pw)
{
// Wrong Password [ -------------------------------------------------------------------------------
?>
<script>
function login()
{
	var expect = hex_md5("<?=$_SESSION['session_id']?>"+document.getElementById('pw').value);
	location.replace("./note.php?dir=/&token="+expect);
}

function is_enter(self, e)
{
	var keycode;
	if(window.event) keycode = window.event.keyCode;
	else if(e) keycode = e.which;
	else return true;
	
	if(keycode == 13) // Enter key
	{
		login();
		return false;
	}
	
	return true;
}
</script>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
</head>
<body onload="document.getElementById('pw').focus()">
<div class="login">
	<label>Password</label><input type="password" id="pw" onkeypress="is_enter(this,event)"/><input type="button" onclick="login()" value="Login"/>
</div>
</body>
</html>
<?php
// ] Wrong Password End ===========================================================================
 } else{
	/* 1.データベースから今月の参加者を取り込む */
	include "common.h"; // DB host
	if(isset($_POST["cyear"]) && isset($_POST["cmonth"])){
		if(strlen($_POST["cmonth"])==1){
			$mm="0".$_POST["cmonth"];
		}else{
			$mm=$_POST["cmonth"];
		}
		$curdate=$_POST["cyear"].$mm;
    }else{
	    $curdate = date("Ymd");
	    $curdate = substr($curdate, 0, -2);
	}

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

if($_REQUEST["month"]!="" && $_REQUEST["attendm"]!="" && $_REQUEST["copym"]!="" &&
   $_REQUEST["drinkm"]!="" && $_REQUEST["potetom"]!="" && $_REQUEST["nokorim"]!="" &&
   $_REQUEST["nokorim"]!=""){
	$query="insert into note
		       (month, attendm, copym, drinkm, potetom, nokorim, getm, yobi1, yobi2, yobi3)
                  values ('".$_REQUEST["month"]."','".$_REQUEST["attendm"]."','".$_REQUEST["copym"]."','".$_REQUEST["drinkm"]."',
                             '".$_REQUEST["potetom"]."','".$_REQUEST["nokorim"]."','".$_REQUEST["getm"]."',
                             '".$_SERVER['HTTP_USER_AGENT']."','".$ip."','".$_REQUEST["memo"]."')";
    $_REQUEST["month"]="";
	$row=mysql_query ( $query, $cid ) or die(mysql_error());
}

if($_REQUEST["inpQuery"]!=""){
      $inpQuery = $_REQUEST["inpQuery"];
	mysql_query ( $inpQuery, $cid ) or die(mysql_error());
}
/*
	$query="select
				month,   -- 月 			0
				attendm, -- 参加費		1
				copym, 	  -- コピー代	2
				drinkm,   -- ドリンク代	3
				potetom, -- ポテト代	4
				nokorim, -- 繰越金		5
				getm  	  -- 収支		6
			from 
				note
			where
		       EXTRACT(YEAR_MONTH FROM regDate)=". $curdate  ." 
			group by month
			order by
				regDate desc ";
	*/
	$query="select
		        no,
				month,   
				attendm, 
				copym, 	 
				drinkm,  
				potetom, 
				nokorim, 
				getm,  	 
		        yobi3    
 			from 
				note 
			order by 
				regDate desc ";
	
	$row=mysql_query ( $query, $cid ) or die(mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> :::: ハングルサラン・ソジュサラン　管理者 ::::</title>
		<link type="text/css" href="css/form/table.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.14.custom.css" />
		<script src="js/lib/jquery-1.5.1.min.js" type="text/javascript"></script>
		<script src="js/lib/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
		<script src="js/lib/jquery.ui.datepicker-ja.min.js" type="text/javascript"></script>
		<script src="js/lib/gcalendar-holidays.js" type="text/javascript"></script>
<style> 
/* カレンダーのstyleを整える */
.ui-datepicker td span, .ui-datepicker td a {
    text-align: center;
}
.ui-datepicker select.ui-datepicker-year, .ui-datepicker select.ui-datepicker-month {
    width: auto;
}
.ui-datepicker select.ui-datepicker-month {
    margin-left: 1em;
}
</style>
<script type="text/javascript"> 
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-1127671-4']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
	<SCRIPT LANGUAGE="JavaScript">
		function register(){
	        	document.frm.submit();
		}// function
		
		function sendMailToStaff(){
			if(confirm("スタッフに受付完了メールを送信します。")==false) return;
			document.frm.action = "./sendMailToStaff.php";
			document.frm.submit();
		}
		
		function numReg(){
			document.frm2.action = "numReg.php";
			document.frm2.submit();
		}
		
		function numRegDelete(){
			document.frm2.action = "numRegDelete.php";
			document.frm2.submit();
		}
		
		function downloadExcel(){
			document.excel.ccyear.value =document.test.cyear.value;
			document.excel.ccmonth.value=document.test.cmonth.value;
			document.excel.action="excel.php";
			document.excel.submit();
		}
		function downloadCSV(){
			document.excel.ccyear.value =document.test.cyear.value;
			document.excel.ccmonth.value=document.test.cmonth.value;
			document.excel.action="csv.php";
			document.excel.submit();
		}
		jQuery(function(){
			$("#studyDate").datepicker({ changeYear: true, changeMonth: true });
			$("#studyStopDate").datepicker({ changeYear: true, changeMonth: true });
		});
	</SCRIPT>
</head>

<body>
    <!--照会メント -->
	<div class="comment">
		ハングルサラン・ソジュサランの受付管理システムです。
	</div>
	
	<!--　日付表示、勉強会開催日 -->
	<div class="body">
		<form name="test" id="test" method="post">
		<table  border="0" width="680" cellspacing="0" cellpadding="1" bordercolor="#333333">
		<tr><td width="280">
	  <?php echo "＜＜".substr($curdate,0,4)."年".substr($curdate,4,2)."月の受付＞＞"; ?>
	    </td><td width="400">
		<?php 
		    $yy=substr($curdate,0,4);
	        $cur_date = date("Ymd");
	        $cur_yy = substr($cur_date, 0, 4);
	        $cur_mm = substr($cur_date, 4, 2);
		?><!--前回勉強会
		<select name="cyear" id="cyear">
			<? for($i=$yy-1;$i<=$cur_yy;$i++){?>
		    <option value="<? echo $i;?>" <?if($i==$yy) echo "selected";?>><? echo $i;?></option>
		    <? }?>
		</select>年
	    <select name="cmonth" id="cmonth">
			<? for($i=1;$i<13;$i++){?>
		    <option value="<? echo $i;?>" <?if(($i==$_POST["cmonth"] && isset($_POST["cmonth"])) || substr($curdate,4,2) == $i) echo "selected";?>><? echo $i;?></option>
		    <? }?>
		</select>月
		<input type="submit" name="btnSubmit" value="検索" style="width:110px">
			-->
			</td>
			</tr>
			</table>
		</form>
	</div>
	<form action="./note.php" name="frm" id="frm" method="post">
	<div>
		<table border="1"  cellspacing="0" cellpadding="1" bordercolor="#333333" width="800px">
			<tr>
			    <th>No</th>
				<th>月</th>
				<th>参加費</th>
				<th>コピー代</th>
				<th>ドリンク代</th>
				<th>ポテト代</th>
				<th>繰越金</th>
				<th>収支</th>
				<th>繰越金＋収支</th>
			</tr>
			<?php
				  while($rs=mysql_fetch_row($row)) {
			?>
				<tr>
				    <td align="center"><?=$rs[0]?></td>
					<td align="center"><?=$rs[1]?></td>
					<td align="right"><?=number_format($rs[2])?>円</td>
					<td align="right"><?=number_format($rs[3])?>円</td>
					<td align="right"><?=number_format($rs[4])?>円</td>
					<td align="right"><?=number_format($rs[5])?>円</td>
					<td align="right"><?=number_format($rs[6])?>円</td>
					<td align="right"><?=number_format($rs[7])?>円</td>
					<td align="right"><?=number_format($rs[6] + $rs[7])?>円</td>
				</tr>
				<tr>
					<td align="center">Memo</td>
				    <td colspan="8"><?=nl2br($rs[8])?></td>
				</tr>
			<?php
				// end roof
				}
			?>	
		</table>
	</div>
	<br>
	<div>
		<table  border="1" cellspacing="0" cellpadding="1" bordercolor="#333333" width="663px">
			<tr>
				<th>月</th>
				<th>参加費</th>
				<th>コピー代</th>
				<th>ドリンク代</th>
				<th>ポテト代</th>
				<th>繰越金</th>
				<th>収支</th>
			</tr>
			<tr>
				<td align='center' style="background-color:#FFFFFF;" width="63px"><input type="text" name="month" id="month" value="<?=$cur_mm?>" style="align:center;border:0;width:63px;text-align:center;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="attendm" id="attendm" value="" style="align:center;width:100px;border:0;text-align:right;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="copym" id="copym" value="" style="align:center;border:0;width:100px;text-align:right;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="drinkm" id="drinkm" value="" style="align:center;border:0;width:100px;text-align:right;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="potetom" id="potetom" value="" style="align:center;border:0;width:100px;text-align:right;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="nokorim" id="nokorim" value="" style="align:center;border:0;width:100px;text-align:right;"></td>
				<td align='right' style="background-color:#FFFFFF;" width="100px"><input type="text" name="getm" id="getm" value="" style="align:center;border:0;width:100px;text-align:right;"></td>
				</td>
			</tr>
			<tr>
				<td>Memo</td>
				<td colspan = "6">
					<textarea name="memo" id="memo" rows="10" cols="75"></textarea>
				</td>
			</tr>
		</table>
	</div>
	<input type="text" width="500px" size="60" value="" name="inpQuery" id="inpQuery">
	</form>
		<!--button -->
	<br>
	<div>
		<input type="submit" name="register" id="register" value="登録" onClick="javascript:register()" style="width:110px">
	</div>
	<iframe name="ifra" width=0 height=0></iframe>
</body>
</html>
 <?}?>
			 
