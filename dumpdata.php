<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
<?php
	/* 1.データベースから今月の参加者を取り込む */
	include "common.h"; // DB host
	echo $curdate;
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
				grp, 		-- グループ				13
		        yobi1,       --                      14
		        yobi2,
		        yobi3,yobi4,yobi5,memo,updatedt
			from 
				member
			where
                attendtype != ''
			order by
				grp
				,no desc ";
	
	$result=mysql_query ( $query, $cid ) or die(mysql_error());
	
	echo "insert into member (attendtype,no,name,national,sex,email,langlevel,drink,drinkPrice,absent,attend,attendFee,sumFee,level,grp,yobi1,yobi2,yobi3,yobi4,yobi5,memo,updatedt) values";
	while($row=mysql_fetch_object($result)){
        echo "('".$row->attendtype."','".$row->no."','".$row->name."','".$row->national."','".$row->sex."','".$row->email."','";
		echo $row->langlevel."','".$row->drink."','".$row->drinkPrice."','".$row->absent."','".$row->attend."','".$row->attendFee."','";
		echo $row->sumFee."','".$row->level."','".$row->grp."','".$row->yobi1."','".$row->yobi2."','".$row->yobi3."','".$row->yobi4."','".$yobi5."','".$memo."','".$updatedt."'),<BR>";
		
		
	}
?>
</body>
</html>