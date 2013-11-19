<?php
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
		       and attendtype != ''
		       AND grp != '未定'
			order by
				grp
				,no desc ";
	
	$row=mysql_query ( $query, $cid ) or die(mysql_error());
	
	$sumQuery = 
				"select
				    count(no),
				    sum(drinkPrice),
				    sum(attendFee),
				    sum(sumFee)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ." 
		            AND grp != '未定'
		            and attendtype != ''
				";
    
	$sumRow = mysql_query ( $sumQuery, $cid ) or die(mysql_error());
	
	
	$twoQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		            and attendtype != ''
		            AND grp != '未定'
		            AND absent='参加' ";
	
	$twoRow = mysql_query ( $twoQuery, $cid ) or die(mysql_error());
	
	
	$japQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		      		 and attendtype != ''
		            AND grp != '未定'
		            AND national='日本' ";
		            
	$japRow = mysql_query ( $japQuery, $cid ) or die(mysql_error());
	
	$korQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		      		 and attendtype != '' 
		            AND grp != '未定'
		            AND national='韓国' ";
		            
	$korRow = mysql_query ( $korQuery, $cid ) or die(mysql_error());
	
	
	$japTwoQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		       		and attendtype != ''
		            AND grp != '未定'
		            AND national='日本' AND absent='参加' ";
		            
	$japTwoRow = mysql_query ( $japTwoQuery, $cid ) or die(mysql_error());
	
	$korTwoQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		       		and attendtype != ''
		            AND grp != '未定'
		            AND national='韓国' AND absent='参加' ";
		            
	$korTwoRow = mysql_query ( $korTwoQuery, $cid ) or die(mysql_error());
	
	$japLimitedQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ." 
		            and attendtype != ''
		            AND grp != '未定'
		            AND national='日本' AND langlevel='初級'";
		            //AND national='日本' AND attendtype='一般'";
		            
	$japLimitedRow = mysql_query ( $japLimitedQuery, $cid ) or die(mysql_error());
	$japLimitedSum=mysql_fetch_row($japLimitedRow);
	
	$japmLimitedQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ." 
		            and attendtype != ''
		            AND grp != '未定'
		            AND national='日本' AND (langlevel='中級' OR langlevel='高級')";
		            //AND national='日本' AND attendtype='一般'";
		            
	$japmLimitedRow = mysql_query ( $japmLimitedQuery, $cid ) or die(mysql_error());
	$japmLimitedSum=mysql_fetch_row($japmLimitedRow);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />-->
		<title> :::: ハングルサラン・ソジュサラン　管理者 ::::</title>
		<link type="text/css" href="css/form/table.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/lib/ui.datepicker.css" />

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
</style><script type="text/javascript"> 
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

	</head>
<head>
	<title>Untitled</title>
	
	<SCRIPT LANGUAGE="JavaScript">
		function register(){
			if(confirm("受付内容を変更します。よろしいですか。")==false) return;
			
			var noArr = new Array();
			var grpArr = new Array();
			var absentArr = new Array();
			
        	noArr = document.getElementsByName("no");
        	grpArr = document.getElementsByName("grpSelect");
        	absentArr = document.getElementsByName("absentSelect");
        	
        	var sqlAll = "";
        	for (idx=0;idx<noArr.length;idx++){
        	var sql = " update member ";
        		sql = sql + " set ";
        		sql = sql + " grp = " + grpArr[idx].options[grpArr[idx].selectedIndex].value + " ,";
        		sql = sql + " absent = |" + absentArr[idx].options[absentArr[idx].selectedIndex].value + "|"; 
        		sql = sql + " where no = " + noArr[idx].value + " ";
        		
        	sqlAll = sqlAll + sql + "/";
        	} // for
        	document.frm.updateSql.value = sqlAll;
        	document.frm.submit();
		}// function
		
		function sendMailToStaff(){
			if(confirm("スタッフに受付完了メールを送信します。")==false) return;
			document.frm.action = "./sendMailToStaff.php";
			document.frm.submit();
		}
		
		function loaded() {
			//alert("load");
		}		jQuery(function(){
			$("#studyDate").datepicker({ changeYear: true, changeMonth: true });
		});
	</SCRIPT>
</head>

<body onload="javascript:loaded()">
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
	    <!--
		<?php 
		    $yy=substr($curdate,0,4);
	        $cur_date = date("Ymd");
	        $cur_yy = substr($cur_date, 0, 4);
	        $cur_mm = substr($cur_date, 4, 2);
		?>前回勉強会
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
	<div>
		<form action="./update.php" name="frm" id="frm" method="post" target="ifra">
		<input type="hidden" name="updateSql" id="updateSql" value="first">
		<table border="1" width="1200" cellspacing="0" cellpadding="1" bordercolor="#333333">
			<tr>
				<th>区分</th>
				<th>名前</th>
				<th>国籍</th>
				<th>性別</th>
				<th>参加経験</th>
				<th>語学レベル</th>
				<th>グループ</th>
				<th>飲物</th>
				<th>ドリンク代</th>
				<th>参加費</th>
				<th>合計金額</th>
				<th>二次会参加</th>
			<?php
				  while($rs=mysql_fetch_row($row)) {
			?>
				<tr >
					<td id="attendtype" align="center">
						<?=$rs[0]?>
						<input type="hidden" name="no" id="no" value=<?=$rs[1]?>>
					</td>
					<td id="name"><?=$rs[2]?>				</td>
					<td id="national" align="center"><?=$rs[3]?>			</td>
					<td id="sex" align="center"><?=$rs[4]?>				</td>
					<td id="attend" align="center"><?=$rs[10]?>			</td>
					<td id="langlevel"><?=$rs[6]?>			</td>
					<td id="grp" name="grp" align="center">
						<select name="grpSelect" id="langlevel" style="width:7	0px">
							<option <?php if($rs[13]==0) echo "selected"?> value="0">未定</option>
							<option <?php if($rs[13]==1) echo "selected"?> value="1">1</option>
							<option <?php if($rs[13]==2) echo "selected"?> value="2">2</option>
							<option <?php if($rs[13]==3) echo "selected"?> value="3">3</option>
							<option <?php if($rs[13]==4) echo "selected"?> value="4">4</option>
							<option <?php if($rs[13]==5) echo "selected"?> value="5">5</option>
							<option <?php if($rs[13]==6) echo "selected"?> value="6">6</option>
							<option <?php if($rs[13]==7) echo "selected"?> value="7">7</option>
							<option <?php if($rs[13]==8) echo "selected"?> value="8">8</option>
						</select>
					</td>
					<td id="drink"><?=$rs[7]?>				</td>
					<td id="drinkPrice" align="right"><?=number_format($rs[8])?>円</td>
					<td id="attendFee" align="right"><?=number_format($rs[11])?>円</td>
					<td id="sumFee" align="right"><?=number_format($rs[12])?>円</td>
					<td id="absent" name="absent" align="center">
						<select name="absentSelect" id="absentSelect" style="width:80px">
							<option <?php if($rs[9]=='保留') echo "selected"?> value="保留">保留</option>
							<option <?php if($rs[9]=='参加') echo "selected"?> value="参加">参加</option>
							<option <?php if($rs[9]=='不参加') echo "selected"?> value="不参加">不参加</option>
						</select>
					</td>
				</tr>
			<?php
				// end roof
				}
			?>	
		</table>
		</form>
	</div>
	<br>
	<div>
		<table  border="1" width="1000" cellspacing="0" cellpadding="1" bordercolor="#333333">
			<tr>
				<th width='200'>参加者数</th>
				<th width='200'>合計＿ドリンク代</th>
				<th width='200'>合計＿参加費</th>
				<th width='200'>総計</th>
			</tr>
			
			<?php
				  while($rsSum=mysql_fetch_row($sumRow)) {
			?>
				<tr>
					<td align='right'><?=$rsSum[0]?>&nbsp;人	&nbsp;</td>
					<td align='right'><?=number_format($rsSum[1])?>&nbsp;円	&nbsp;</td>
					<td align='right'><?=number_format($rsSum[2])?>&nbsp;円	&nbsp;</td>
					<td align='right'><?=number_format($rsSum[3])?>&nbsp;円	&nbsp;</td>
				</tr>
			<?php
				// end roof
				}
			?>	
		</table>
	</div>
	<br>
	<div>
		<table  border="1" width="1000" cellspacing="0" cellpadding="1" bordercolor="#333333">
			<tr>
				<th width='200'>日本人(初級)</th>
				<th width='200'>日本人(中級・高級)</th>
				<th width='200'>韓国人</th>
				<th width='200'>2次　日本人</th>
				<th width='200'>2次　韓国人</th>
				<th width='200'>２次会参加</th>
			</tr>
			<tr>
				<td align='right'>
                    <?=$japLimitedSum[0]?>
					&nbsp;人&nbsp;
				</td>
				<td align='right'>
                    <?=$japmLimitedSum[0]?>
					&nbsp;人&nbsp;
				</td>
				<td align='right'>
					<?php
						  while($korSum=mysql_fetch_row($korRow)) {
						  echo $korSum[0];
						?>
					<?php } ?>
					&nbsp;人&nbsp;
				</td>
				<td align='right'>
					<?php
						  while($japTwoSum=mysql_fetch_row($japTwoRow)) {
						  echo $japTwoSum[0];
						?>
					<?php } ?>
					&nbsp;人&nbsp;
				</td>
				<td align='right'>
					<?php
						  while($korTwoSum=mysql_fetch_row($korTwoRow)) {
						  echo $korTwoSum[0];
						?>
					<?php } ?>
					&nbsp;人&nbsp;
				</td>
				<td align='right'>
					<?php
						  while($twoSum=mysql_fetch_row($twoRow)) {
						  echo $twoSum[0];
						?>
					<?php } ?>
					&nbsp;人&nbsp;
				</td>
			</tr>
		</table>
	</div>
		<!--button -->
	<br>
	<div style="display:none">
		<input type="submit" name="register" id="register" value="登録" onClick="javascript:register()">
		<input type="button" name="sendToStaff" id="sendToStaff" value="スタッフにメール送信" onClick="javascript:sendMailToStaff()">
		<input type="button" name="sentToAttendee" id="sentToAttendee" value="参加者にメール送信" onClick="javascript:sentToAttendee()">
	</div>
	
	
	<iframe name="ifra" width=0 height=0></iframe>
</body>
</html>
			 
