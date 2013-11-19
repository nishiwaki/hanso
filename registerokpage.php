<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>:::ハングルサラン・ソジュサラン:::</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script>
	// Google Analytics設定
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-xxxxx-x']);
		
	// 初期設定
	$(document).bind('mobileinit', function(){

		// 日本語化
		$.mobile.loadingMessage = '読込み中';
		$.mobile.pageLoadErrorMessage = '読込みに失敗しました';
		$.mobile.page.prototype.options.backBtnText = '戻る';
		$.mobile.dialog.prototype.options.closeBtnText = '閉じる';
		$.mobile.selectmenu.prototype.options.closeText= '閉じる';

		// 戻るボタンの自動表示
		$.mobile.page.prototype.options.addBackBtn = true;

		// ページトラッキング
		$(':jqmData(role="page")').live('pageshow', function (event, ui) {
			/* Google Analyticsを利用する場合は、UAを設定してからコメントアウトをはずしてください
			_gaq.push(['_trackPageview', $.mobile.activePage.jqmData('url')]);
			 */
		});
	});

	var JQUERY4U = {};

	JQUERY4U.UTIL =
	{
	    setupFormValidation: function()
	    {
	        //form validation rules
	        $("#register-form").validate({
	            rules: {
	                name: "required",
	                email: {
	                    required: true,
	                    email: true
	                },
	                drinkName: "required"
	            },
	            messages: {
	                name: "お名前を入力してください。",
	                email: "メールを正しく入力してください。",
	                drinkName: "飲み物をお選んでください。"
	            },
	            submitHandler: function(form) {
	                form.submit();
	            }
	        });
	    }
	}

	// 個別設定
	$(document).ready(function(){

		// 最初のページ以外の全ページにホームボタンを追加
		$(':jqmData(role=page)').live("pagebeforecreate", function(evt){
			var page = $(this),
					home = $.mobile.firstPage;
			if ( page.attr('id') != home.attr('id') ) {
				page.find(':jqmData(role="header")').append(
					$('<a href="#' + home.attr('id') + '" data-transition="slideup" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right">Home</a>')
				);
			}	
		});

        // 「会場　ACCESS」ページ
        $('#access').bind('pageshow', function(){
			var TITLE = 'BELSEEDS CAFE',
					LAT = 35.700372,
					LNG = 139.696124,
					MAP_ID = 'access-map';

			//地図作成
			var infowindow = new google.maps.InfoWindow(),
				latLng = new google.maps.LatLng(LAT, LNG),
				map = new google.maps.Map(document.getElementById(MAP_ID), {
					zoom: 15,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}),
				marker = new google.maps.Marker({
					title: TITLE,
					position: latLng,
					map: map
				});

			//地図表示
			map.setCenter(latLng);
			infowindow.open(map);
		});
		
		// Form Validation
		JQUERY4U.UTIL.setupFormValidation();

        // Language change
        $("input[name=national]").change(function() {
            var test = $(this).val();
            if(test == "韓国"){
            	$("#langKor").hide();
            	$("#langJap").show();
            }else{
            	$("#langKor").show();
            	$("#langJap").hide();
            }
        }); 

        // Language init
		var test = $(this).val();
		if(test == "韓国"){
			$("#langKor").hide();
			$("#langJap").show();
		}else{
			$("#langKor").show();
			$("#langJap").hide();
		}

		// Google Analytics読込み
		var ga = document.createElement('script'); ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	});
	function pageTop()
	{
		location.href="./smart.html";
	}
    </script>
    <script src="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.js"></script>
		<style>
			/* テキストの表示を省略せずに表示する */
			.ui-header .ui-title,			/* ヘッダー */
			.ui-footer .ui-title,			/* フッター */
			.ui-btn-inner,						/* ボタン */
			.ui-li-heading,						/* リスト見出し */
			.ui-li .ui-btn-text a.ui-link-inherit,	/* リンクリスト */
			.ui-li-desc															/* リスト詳細 */
			{
				overflow: visible;
				white-space: normal;
			}
			/* アイコン */
      .ui-icon-reg {
        background: url(images/icon-registration-min.png) 50% 50% no-repeat;
        width: 16px;
        -moz-border-radius: 0px;
        -webkit-border-radius: 0px;
        border-radius: 0px;
      }
      .ui-icon-about {
        background: url(images/icon-about-min.png) 50% 50% no-repeat;
        width: 16px;
        -moz-border-radius: 0px;
        -webkit-border-radius: 0px;
        border-radius: 0px;
      }
      .ui-icon-map {
        background: url(images/icon-map-min.png) 50% 50% no-repeat;
        width: 16px;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
      }
      .ui-icon-arrow-f {
        background: url(images/icon-arrow-f-min.png) 50% 50% no-repeat;
        width: 16px;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
      }
			/* ホーム */
      #support ul {
        padding-left: 0;
      }
      #support ul li {
        list-style:none;
        text-align : center;
        margin-bottom: 36px;
      }
      #home-title p {
        text-align: center;
      }
			/* 会場 */
      #access-map {
        width: 100%;
        height: 300px;
        border: 8px solid #ccc;
        -webkit-box-sizing: border-box; 
        box-sizing: border-box;
      }
			/* Adobe GEEKとは */
      #about table tr td:first-child {
        white-space: nowrap;
      }
      #about table tr td {
        padding: 4px;
        vertical-align: top;
      }
      
#register-form label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 0px;
    padding: 0;
    text-align: left;
    width: 100%;
}
    </style>
        <meta name = "viewport" content = "width = device-width, initial-scale">
  </head>
  <body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
		<title> :::: 韓日・交流会 - ハングルサラン・ソジュサラン ::::</title>
	</head>
<body>
    <!-- お申し込み完了 -->
    <div data-role="page" id="regist" data-theme="a">
      <div data-role="header">
        <h1>お申し込み</h1>
      </div>
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

	$langLevel = "";
	if($flag == 0){
	    //DBに申し込みデータを更新
		//日本人の方の場合、参加費５００円
		if($_POST["national"]=="日本"){
			if($_POST["attendtype"] == "スタッフ"){
				$attendFee = 0;
			}
			else{
				$attendFee = 500;
			}
			$langLevel = $_POST["langLevelKor"];
		}else{
			$langLevel = $_POST["langLevelJap"];
		}
		
		//drink 価格計算
		preg_match_all("/[0-9]+/",$_POST["drink"],$matches);
		$drink = $matches[0];

	    $sumFee = $attendFee + $drink[0];
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
		$query.= " level) values(";
		$query.= "'"   . $_POST["attendtype"];
		$query.= "','" . $_POST["name"];
		$query.= "','" . $_POST["national"];
		$query.= "','" . $_POST["gender"];
		$query.= "','" . $_POST["email"];
		$query.= "','" . $langLevel;
		$query.= "','" . $_POST["drink"];
		$query.= "','" . $drink[0];
		$query.= "','" . $_POST["absent"];
		$query.= "','" . $_POST["attend"];
		$query.= "','" . $attendFee;
		$query.= "','" . $sumFee;
		$query.= "','9')";
?>
        <h1>下記の情報で申し込み完了致しました。</h1>
      <div data-role="content">
        <div data-role="fieldcontain">
          <fieldset data-role="controlgroup" data-type="horizontal">
            <legend>参加区分:</legend>
	    <label for="radio-choice-c"><?=$_POST["attendtype"]?></label> 
          </fieldset>
        </div>
        <div data-role="fieldcontain">
			<fieldset data-role="controlgroup" data-type="horizontal"> 
	          <legend>お名前</legend> 
	  		  <label for="radio-choice-e"><?=$_POST["name"]?></label> 
			</fieldset>
        </div>
		<div data-role="fieldcontain"> 
			<fieldset data-role="controlgroup" data-type="horizontal"> 
				<legend>国籍</legend> 
				<label for="radio-choice-e"><?=$_POST["national"]?></label> 
			</fieldset>
		</div> 
		<div data-role="fieldcontain"> 
			<fieldset data-role="controlgroup" data-type="horizontal"> 
				<legend>性別</legend> 
				<label for="radio-choice-g"><?=$_POST["gender"]?></label> 
			</fieldset> 
		</div> 
        <div data-role="fieldcontain">
			<fieldset data-role="controlgroup"> 
				<legend>メールアドレス </legend> 
	  			<label for="radio-choice-1"><?=$_POST["email"]?></label> 
			</fieldset> 
        </div>
		<div data-role="fieldcontain" id="langKor"> 
			<fieldset data-role="controlgroup"> 
				<legend>語学レベル</legend> 
				<label for="radio-choice-1"><?=$langLevel?></label> 
			</fieldset> 
		</div>
		<div data-role="fieldcontain"> 
			<fieldset data-role="controlgroup"> 
				<legend>飲み物</legend> 
				<label for="radio-choice-i"><?=$_POST["drink"]?></label> 
			</fieldset> 
		</div>

		<div data-role="fieldcontain"> 
			<fieldset data-role="controlgroup" data-type="horizontal"> 
				<legend>２次会参加</legend> 
				<label for="radio-choice-i"><?=$_POST["absent"]?></label> 
			</fieldset> 
		</div> 

		<div data-role="fieldcontain"> 
			<fieldset data-role="controlgroup" data-type="horizontal"> 
				<legend>参加経験の有無</legend> 
				<label for="radio-choice-k"><?=$_POST["attend"]?></label> 
			</fieldset> 
		</div> 
		
        <div class="fieldcontain">
          <p><input type="button" value="トップへ戻る" data-theme="b" data-role="button" onclick="pageTop()"></p>
        </div>
<?php
		//echo $query;
		mysql_query($query, $cid) or die(mysql_error());
	}else{
?>
      <div data-role="header">
        <h1>既に申込が完了されている方です。</h1>
	  </div>
      <div data-role="content">
        <div data-role="fieldcontain">
		<p><input type='button' onclick='javascript:history.back();' value='申込フォームへ戻る'></p>
		</div>
      </div>
<?php
		$query = "delete from member where name=''";
		mysql_query($query, $cid) or die(mysql_error());
	}
?>
    </div>
</body>

</html>
