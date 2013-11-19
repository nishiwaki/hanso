<?php
	include "common.h"; // DB host
	
	$curdate = date("Ymd");
	$curdate = substr($curdate, 0, -2);
	//echo "curdate=".$curdate;

	/* 募集人数設定用 */
	$numRegQuery= 
				"select 
				     studydate, studystopdate, japhito, korhito, japhitom
				 from
				     setup
				 where
				     EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate;
	
	$numRegRow = mysql_query ( $numRegQuery, $cid ) or die(mysql_error());
	
	$numRegRs0;
	$numRegRs1;
	$numRegRs2;
	$numRegRs3;
	$numRegRs4;

	while($numRegRs=mysql_fetch_row($numRegRow)) {
		$numRegRs0 = $numRegRs[0];
		$numRegRs1 = $numRegRs[1];
		$numRegRs2 = $numRegRs[2];
		$numRegRs3 = $numRegRs[3];
		$numRegRs4 = $numRegRs[4];
	}

	$japLimitedQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
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
		            AND national='日本' AND (langlevel='中級' OR langlevel='高級')";
		            //AND national='日本' AND attendtype='一般'";
		            
	$japmLimitedRow = mysql_query ( $japmLimitedQuery, $cid ) or die(mysql_error());
	$japmLimitedSum=mysql_fetch_row($japmLimitedRow);

	$korLimitedQuery = 
				"select
				    count(no)
				from
    				member
    			where
		            EXTRACT(YEAR_MONTH FROM updatedt)=" . $curdate ."
		            AND national='韓国'";
		            //AND national='韓国' AND attendtype='一般'";
		            
	$korLimitedRow = mysql_query ( $korLimitedQuery, $cid ) or die(mysql_error());
	$korLimitedSum=mysql_fetch_row($korLimitedRow);
	
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml ; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta http-equiv="Content-Style-Type"  content="text/css" />
	<link type="text/css" href="css/form/regform.css" rel="stylesheet" />
    <link type="text/css" href="css/form/regform.css" rel="stylesheet" />
    <title>:::: 韓日・交流会 - ハングルサラン・ソジュサラン</title>
<SCRIPT LANGUAGE="JavaScript">
function frmValidation(){
	//初期化
	frm.nameErr.value ="";
	frm.sexErr.value="";
	frm.emailErr.value="";
	frm.langlevelErr.value="";
	frm.drinkPriceErr.value="";
	frm.absentErr.value="";
	frm.attendErr.value="";

	if(frm.name.value == ""){
		frm.nameErr.value ="※お名前を入力してください";
		frm.name.focus();
		return false;
	}else{
		frm.nameErr.value ="";
	}
	var nat = 0;
	for(var i=0;i<frm.national.length;i++){
	    if(frm.national[i].checked){
			nat=1;
    	}
	}
	if(nat == 0){
		frm.nationalErr.value="※国籍をお選びください";
		return false;
	}else{
		frm.nationalErr.value="";
	}
	var sex = 0;
	for(var i=0;i<frm.sex.length;i++){
	    if(frm.sex[i].checked){
			sex=1;
    	}
	}
	if(sex == 0){
		frm.sexErr.value="※性別をお選びください";
		return false;
	}else{
		frm.sexErr.value="";
	}
	if(frm.email.value==""){
		frm.emailErr.value="※メールアドレスを入力してください";
		frm.email.focus();
		return false;
	}else{
	    if(CheckMail(frm.email.value)==false){
	        return false;
	    }else{
			frm.emailErr.value="";
	    }
	}
	function CheckMail(strMail) { 
    	var check1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/;  
	    var check2 = /^[a-zA-Z0-9\-\.\_]+\@[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4})$/; 

	    if ( !check1.test(strMail) && check2.test(strMail) ) { 
	    	frm.emailErr.value="";
    	    return true;
    	} else {
    		frm.emailErr.value="※メールアドレスを正しく入力してください";
    		frm.email.focus();
        	return false;
    	}
	}
	if(frm.langlevel.value=="-1"){
		frm.langlevelErr.value="※語学レベルをお選びください";
		return false;
	}else{
		frm.langlevelErr.value="";
	}
	if(frm.drink.value==-1){
		frm.drinkPriceErr.value="※飲み物をお選びください";
		return false;
	}else{
		frm.drinkPriceErr.value="";
	}
	var var_normalize = /[^0-9]/gi; //飲み物文字列かれ金額数字取得
	var varvalue = frm.drink.value;
	frm.drinkPrice.value = varvalue.replace(var_normalize,"");

	var abs = 0;
	for(var i=0;i<frm.absent.length;i++){
	    if(frm.absent[i].checked){
			abs=1;
    	}
	}
	if(abs == 0){
		frm.absentErr.value="※二次会の参加可否をお選びください";
		return false;
	}else{
		frm.absentErr.value="";
	}
	var att = 0;
	for(var i=0;i<frm.attend.length;i++){
	    if(frm.attend[i].checked){
			att=1;
    	}
	}
	if(att == 0){
		frm.attendErr.value="※初めての参加者でしょうか？お選びください";
		return false;
	}else{
		frm.attendErr.value="";
	}

	doIt=confirm('※上記の申し込み情報で宜しいでしょうか?');
	if(doIt){
    	frm.submit();
  	}
  	else{
    	alert("※もう一度申し込み内容をご確認お願い致します。");
    	return false
	}
	
}
/* End フォームのValidation Check。*/
function replaceByButton(target) {
	var obj = document.createElement("INPUT");
	obj.setAttribute("type", "hidden")
	obj.setAttribute("value", "申込");
	obj.onclick = new Function("alert(1);");
	target.parentNode.replaceChild(obj, target);
	return obj;
}
/* Start 国籍をお選ぶことによって語学レベルが変わる。 */
function addOption(selectbox,text,value )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	selectbox.options.add(optn);
}

function addOptionJap(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
	addOption(document.frm.langlevel, "語学レベルをお選びください","-1");
	addOption(document.frm.langlevel, "初級","初級");
	addOption(document.frm.langlevel, "中級","中級");
	addOption(document.frm.langlevel, "高級","高級");
	if(document.frm.japPeople.value==0 && document.frm.japhito.value>0 && document.frm.japhitom.value>0){
		alert("日本の方は既に満席で申し込みは終了しました。");
		document.frm.btnLeft.disabled=true;
	}else{
		document.frm.btnLeft.disabled=false;
	}
}

function checkPeople(){
	if(document.frm.langlevel.value=="初級"){
	    if(document.frm.japsPeople.value==0 && document.frm.japhito.value>0){
            alert("※該当初級の方は既に満席で申し込みは終了しました。");
		    document.frm.btnLeft.disabled=true;
	    }else{
		    document.frm.btnLeft.disabled=false;
	    }
	}
	if(document.frm.langlevel.value=="中級"||document.frm.langlevel.value=="高級"){
	    if(document.frm.japmPeople.value==0 && document.frm.japhitom.value>0){
            alert("※該当中・高級の方は既に満席で申し込みは終了しました。");
		    document.frm.btnLeft.disabled=true;
	    }else{
		    document.frm.btnLeft.disabled=false;
	    }
	}
}
function addOptionKor(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
	addOption(document.frm.langlevel, "語学レベルをお選びください","-1");
	addOption(document.frm.langlevel, "日本の生活１年以上","日本の生活１年以上");
	addOption(document.frm.langlevel, "日本の生活３年以上","日本の生活３年以上");
	addOption(document.frm.langlevel, "日本の生活５年以上","日本の生活５年以上");
	if(document.frm.korPeople.value==0 && document.frm.korhito.value>0){
		alert("※韓国の方は既に満席で申し込みは終了しました。");
		document.frm.btnLeft.disabled=true;
	}else{
		document.frm.btnLeft.disabled=false;
	}
}
function addDrinkOption(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
	
	addOption(document.frm.drink, "必ずお選びください。","-1");
	addOption(document.frm.drink, "[ICE]フレッシュジュース（オレンジ）…380円","[ICE]フレッシュジュース（オレンジ）…380円");
	addOption(document.frm.drink, "[ICE]フレッシュジュース（アップル）…380円","[ICE]フレッシュジュース（アップル）…380円");
	addOption(document.frm.drink, "[ICE]フレッシュジュース（パイン）…380円","[ICE]フレッシュジュース（パイン）…380円");
	addOption(document.frm.drink, "[ICE]アイスコーヒー…450円","[ICE]アイスコーヒー…450円");
	addOption(document.frm.drink, "[ICE]アイスカフェラテ…500円","[ICE]アイスカフェラテ…500円");
	addOption(document.frm.drink, "[ICE]アイスカプチーノ…520円","[ICE]アイスカプチーノ…520円");
	addOption(document.frm.drink, "[ICE]アイスキャラメルマキアート…560円","[ICE]アイスキャラメルマキアート…560円");
	addOption(document.frm.drink, "[ICE]アイスヘーゼルナッツマキアート…560円","[ICE]アイスヘーゼルナッツマキアート…560円");
	addOption(document.frm.drink, "[ICE]アイスヴァニラマキアート…560円","[ICE]アイスヴァニラマキアート…560円");
	addOption(document.frm.drink, "[ICE]アイスチャイティー…530円","[ICE]アイスチャイティー…530円");
	addOption(document.frm.drink, "[ICE]アイスティー…470円","[ICE]アイスティー…470円");
	addOption(document.frm.drink, "[ICE]アイスココア…530円","[ICE]アイスココア…530円");
	addOption(document.frm.drink, "[ICE]アイスカフェモカ…530円","[ICE]アイスカフェモカ…530円");
	addOption(document.frm.drink, "[HOT]フブレンドコーヒー…380円","[HOT]フブレンドコーヒー…380円");
	addOption(document.frm.drink, "[HOT]アメリカンコーヒー…380円","[HOT]アメリカンコーヒー…380円");
	addOption(document.frm.drink, "[HOT]カフェラテ…450円","[HOT]カフェラテ…450円");
	addOption(document.frm.drink, "[HOT]カプチーノ…470円","[HOT]カプチーノ…470円");
	addOption(document.frm.drink, "[HOT]ティー…370円","[HOT]ティー…370円");
	addOption(document.frm.drink, "[HOT]カフェモカ…530円","[HOT]カフェモカ…530円");
	addOption(document.frm.drink, "[HOT]スィートキャラメルラテ…530円","[HOT]スィートキャラメルラテ…530円");
	addOption(document.frm.drink, "[HOT]フレンチバニララテ…530円","[HOT]フレンチバニララテ…530円");
	addOption(document.frm.drink, "[HOT]ティラミスラテ…530円","[HOT]ティラミスラテ…530円");
	addOption(document.frm.drink, "[HOT]チャイティー…470円","[HOT]チャイティー…470円");
	addOption(document.frm.drink, "[HOT]チャイラテ…530円","[HOT]チャイラテ…530円");
	addOption(document.frm.drink, "[HOT]ココア…480円","[HOT]ココア…480円");
	addOption(document.frm.drink, "[HOT]キャラメルマキアート…520円","[HOT]キャラメルマキアート…520円");
	addOption(document.frm.drink, "[HOT]ヘーゼルナッツマキアート…520円","[HOT]ヘーゼルナッツマキアート…520円");
	addOption(document.frm.drink, "[HOT]ヴァニラマキアート…520円","[HOT]ヴァニラマキアート…520円");
	addOption(document.frm.drink, "[HOT]エスプレッソ…350円","[HOT]エスプレッソ…350円");
	
	//addOptionJap(frm.langlevel);
}

/* End 国籍をお選ぶことによって語学レベルが変わる。 */
</SCRIPT>
</head>
<body onload="javascript:addDrinkOption(frm.drink);addOptionJap(frm.langlevel);">
<form action="./resform.php" method="post" name="frm" id="frm">
<div style="display:-wap-marquee; background-color:#cc0000; color:white;">
勉強会の申し込み
</div>
<div style="font-size:smaller; text-align:center; color:#cc0080;">
<?php
$now_year = date("Y"); //現在の年を取得
$now_month = date("m"); //現在の月を取得
$now_day = date("d"); //現在の日を取得
$countdate = date("t"); //今月の日数を取得
$weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成

//見出し部分出力
//echo $now_year.'年'.$now_month."月のカレンダー<br>\n";

//一覧表示
for( $day=1; $day <= $countdate; $day++ ){ //今月の日数分ループする

    //各日付の曜日を数値で取得
//曜日用の配列$weekdayとあわせ、$weekday[$w]で日本語の曜日が取得できる
    $w = date("w", mktime( 0, 0, 0, $now_month, $day, $now_year ) );

//スタイルシートの値設定ここから-------------------------------------------

switch( $w ){
    case 0: //日曜日の文字色
        $style = "color:#C30;";
        break;
    case 6: //土曜日の文字色
        $style = "color:#03C;";
        $lastSaturday = $day;
        break;
    default: //月～金曜日の文字色
        $style = "color:#333;";
}
}
?>
<?if($numRegRs0==""){?>
日程：<?=$now_year?>年&nbsp;<?=$now_month?>月&nbsp;<?=$lastSaturday?>日（土）
<?}else{
$nyy = substr($numRegRs0,0,4);
$nmm = substr($numRegRs0,4,2);
$ndd = substr($numRegRs0,6,2);
$w = date("w", mktime( 0, 0, 0, $nmm, $ndd, $nyy ) );
?>
日程：<?=$nyy?>年&nbsp;<?=$nmm?>月&nbsp;<?=$ndd?>日（<?=$weekday[$w]?>）
<?}?>
<input type="hidden" name="korhito" id="korhito" value="<?=$numRegRs3?>">
<input type="hidden" name="japhito" id="japhito" value="<?=$numRegRs2?>">
<input type="hidden" name="japhitom" id="japhitom" value="<?=$numRegRs4?>">
<input type="hidden" name="korPeople" id="korPeople" value="<?=($numRegRs3-$korLimitedSum[0])?>">
<input type="hidden" name="japPeople" id="japPeople" value="<?=($numRegRs2-$japLimitedSum[0] + $numRegRs4-$japmLimitedSum[0])?>">
<input type="hidden" name="japsPeople" id="japsPeople" value="<?=($numRegRs2-$japLimitedSum[0])?>">
<input type="hidden" name="japmPeople" id="japmPeople" value="<?=($numRegRs4-$japmLimitedSum[0])?>">
</div>
<div style="font-size:smaller; text-align:center; color:#cc0080;">
受付開始：13時45分<BR>
勉強時間：14時～17時<BR>
退出時間：17時以後
</div>
<div style="font-size:smaller; text-align:center; color:#cc0080;">
場所：BELSEEDS　CAFE<BR>
（新大久保駅から徒歩5分、大久保駅から徒歩1分）
</div>
<div class="LabelFont">
	<< 募集現況 >><BR>
	韓国の方：<?=$korLimitedSum[0]?>人<BR>
	日本の方(初級)：<?=$japLimitedSum[0]?>人<BR>
	日本の方(中・高級)：<?=$japmLimitedSum[0]?>人<BR>
</div>
	<BR>
<div class="LabelFont">
	<< 申し込み可能な人数 >><BR>
    韓国の方：<?=($numRegRs3-$korLimitedSum[0])?>人<BR>
	日本の方(初級)：<?=($numRegRs2-$japLimitedSum[0])?>人<BR>
	日本の方(中・高級)：<?=($numRegRs4-$japmLimitedSum[0])?>人<BR>
</div>
	<BR>
<div class="LabelFont">
<?
if($numRegRs3 > 0 && ($numRegRs3 - $korLimitedSum[0]) == 0){
    echo "<B><font color='BLUE'>韓国の方募集<BR>→既に満席で申し込みは終了しました。</font><B><BR>";
}
if($numRegRs2 > 0 && ($numRegRs2 - $japLimitedSum[0]) == 0){
    echo "<B><font color='BLUE'>日本の方募集(初級)<BR>→既に満席で申し込みは終了しました。</font><B><BR>";
}
if($numRegRs4 > 0 && ($numRegRs4 - $japmLimitedSum[0]) == 0){
    echo "<B><font color='BLUE'>日本の方募集(中・高級)<BR>→既に満席で申し込みは終了しました。</font><B><BR>";
}
?>
<BR>
</div>
<div class="LabelFont">
参加区分
</div>
<div class="inpDiv">
<input type="radio" name="attendtype" class="radioclass" value="一般" onclick="javascript:addOptionKor(frm.langlevel);" checked><span>一般</span><input type="radio" name="attendtype"  class="radioclass"  value="スタッフ" onclick="javascript:addOptionJap(frm.langlevel);"><span>スタッフ</span>
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="attendtypeErr" id="attendtypeErr"  class="ErrMsgInp" onclick:"javascript:frm.attendtype.focus();">
</div>
<div class="LabelFont">
お名前
</div>
<div class="inpDiv">
<input type="text" name="name" id="name" class="inputAtr" width="300px">
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="nameErr" id="nameErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
国籍
</div>
<div class="inpDiv">
<input type="radio" name="national" id="national" class="radioclass"  value="日本" onclick="javascript:addOptionJap(frm.langlevel);" checked><span>日本</span><input type="radio" name="national" id="national" class="radioclass" value="韓国" onclick="javascript:addOptionKor(frm.langlevel);"><span>韓国</span>
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="nationalErr" id="nationalErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
性別
</div>
<div class="inpDiv">
<input type="radio" name="sex" id="sex" class="radioclass" value="男性">男性<input type="radio" name="sex" id="sex" class="radioclass" value="女性">女性
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="sexErr" id="sexErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
メール
</div>
<div class="inpDiv">
<input type="text" name="email" id="email" class="inputAtr" width="240px">
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="emailErr" id="emailErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
語学レベル
</div>
<div class="inpDiv">
<select name="langlevel" id="langlevel" style="width:240px" onChange="checkPeople()">
</se・v>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="langlevelErr" id="langlevelErr" class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
飲み物
</div>
<div class="inpDiv">
<select name="drink" id="drink" style="width:240px">
</select>
<input type="hidden" name="drinkPrice" id="drinkPrice">
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="drinkPriceErr" id="drinkPriceErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
２次会参加
</div>
<div class="inpDiv">
<input type="radio" name="absent" id="absent" class="radioclass" value="参加">参加<input type="radio" name="absent" id="absent" class="radioclass" value="不参加">不参加
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="absentErr" id="absentErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="LabelFont">
参加経験の有無
</div>
<div class="inpDiv">
<input type="radio" name="attend" id="attend" class="radioclass" value="あり">あり<input type="radio" name="attend" id="attend" class="radioclass" value="なし">なし
</div>
<div style="font-size:smaller; text-align:left;">
<input type="text" name="attendErr" id="attendErr"  class="ErrMsgInp" onclick:"javascript:frm.name.focus();">
</div>
<div class="InpDiv">
<input type="button" id="btnLeft" onclick="javascript:frmValidation(this)" value="申し込む" style="width:100px"><input type="button" id="btnRight" value="キャンセル" style="width:100px">
</div>
</form>
</body>
</html>