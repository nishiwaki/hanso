function onsubmit(){
    //名前の長さチェック
	if($("#name").val().length<=0){
		alert("名前を入力してください。必須です。");
		return false;
	}
	/*
	$("radio:checked").each(function(){
		var nationalnm="";
		var sexnm="";
		var absentnm="";
		var attendnm="";
		alert($(this).attr("class"));
		if($(this).attr("class") == "national"){
			if($(this).val() == "kor"){
				alert("kor");
				nationalnm="韓国";
			}else{
				alert("kor");
				nationalnm="日本";
			}
			$("#nationalNm").attr("value",nationalnm);
		}
		if($(this).attr("class") == "sex"){
			if($(this).val() == "man"){
				sexnm="男性";
			}else{
				sexnm="女性";
			}
			$("#sexNm").attr("value",sexnm);
		}
		if($(this).attr("class") == "absent"){
			if($(this).val() == "iku"){
				absentnm="参加";
			}else{
				absentnm="不参加";
			}
			$("#absentNm").attr("value",absentnm);
		}
		if($(this).attr("class") == "attend"){
			if($(this).val() == "0"){
				attendnm="初めて";
			}else{
				attendnm="２回以上";
			}
			$("#attendNm").attr("value",attendnm);
		}
	});
	if($("#nationalNm").val().length <= 0){
		alert("国籍を選んでください。必須です。");
		return false;
	}
	if($("#sexNm").val().length <= 0){
		alert("性別を選んでください。必須です。");
		return false;
	}
	if($("#email").val().length <= 0){
		alert("メールアドレスを入力してください。必須です。");
		return false;
	}
	if($("#langlevel").html().length <= 0){
		alert("語学のレベルを選んでください。必須です。");
		return false;
	}
	if($("#drink").html().length <= 0){
		alert("飲み物を選んでください。必須です。");
		return false;
	}
	if($("#absentNm").val().length <= 0){
		alert("２次会の参加可否を選んでください。必須です。");
		return false;
	}
	if($("#attendm").val().length <= 0){
		alert("この勉強会に何回目か選んでください。必須です。");
		return false;
	}
	*/
	document.frm.mode="insert";
	//document.frm.submit();
	return true;
}