<SCRIPT LANGUAGE="JavaScript">
<!--
  // rform.php
  function ordercan()
  {
    if (confirm('예약을 취소하시겠습니까?') == true)
    {
      alert("저희 홈피를 방문해주셔서 감사합니다!");
      history.back(-1);
    }
  }
  
  function orderok()
  {
    document.rform.mode.value="ok";
    return true;
  }
  
  function samevalue()
  {
    if(document.rform.rtel.value=="")
    {}
    else
    {
      document.rform.rptel.value=document.rform.rtel.value;
      return true;
    }
  }

  function sameemail()
  {
    if(document.rform.remail.value=="")
    {}
    else
    {
      document.rform.remailchk.value=document.rform.remail.value;
      return true;
    }
  }
  
  function formchk()
  {
    frm=document.rform;
    document.rform.mode.value="ok";
    if(frm.rshour.value=="")
    {
      alert("시작 시간을 입력해주세요!");
      frm.rshour.focus();
      return false;
    }
    if(frm.rsmin.value=="")
    {
      alert("시작 분을 입력해주세요!");
      frm.rsmin.focus();
      return false;      
    }
    if(frm.rehour.value=="")
    {
      alert("끝 시간을 입력해주세요!");
      frm.rehour.focus();
      return false;      
    }
    if(frm.remin.value=="")
    {
      alert("끝 분을 입력해주세요!");
      frm.remin.focus();
      return false;      
    }
    if(frm.rcnt.value=="")
    {
      alert("인원수를 입력해주세요!");
      frm.rcnt.focus();
      return false;      
    }
    /*
    if(frm.rname.value=="")
    {
      alert("단체명을 입력해주세요!");
      frm.rname.focus();
      return false;      
    }
    */
    if(frm.roname.value=="")
    {
      alert("신청자 이름을 입력해주세요!");
      frm.roname.focus();
      return false;      
    }
    if(frm.rtel.value=="")
    {
      alert("전화번호를 입력해주세요!");
      frm.rtel.focus();
      return false;      
    }
    if(frm.rptel.value=="")
    {
      alert("전화번호를 입력해주세요!");
      frm.rptel.focus();
      return false;      
    }
    if(frm.rptel.value!=frm.rtel.value)
    {
      alert("전화번호를 다시 입력해주세요!");
      frm.rptel.value="";
      frm.rptel.focus();
      return false;
    }
    /*
    if(frm.remail.value=="")
    {
      alert("메일 주소를 다시 입력해주세요!");
      frm.remail.focus();
      return false;
    }
		if(frm.remail.value!='')
		{
  		var regExp = /[a-z0-9]{2,}@[a-z0-9-]{2,}\.[a-z0-9]{2,}/i;
   		if(!regExp.test(frm.remail.value))
			{
    			alert("잘못된 e-mail 형식입니다.");
  				frm.remail.value = "";
  	  			frm.remail.focus();
	    		return false;
   		}
    }
    if(frm.remailchk.value!=frm.remail.value)
    {
      alert("메일 주소를 다시 입력해주세요!");
      frm.remailchk.value="";
      frm.remailchk.focus();
      return false;
    }
		if(frm.remailchk.value!='')
		{
  		var regExp = /[a-z0-9]{2,}@[a-z0-9-]{2,}\.[a-z0-9]{2,}/i;
   		if(!regExp.test(frm.remailchk.value))
			{
    			alert("잘못된 e-mail 형식입니다.");
  				frm.remailchk.value = "";
  	  			frm.remailchk.focus();
	    		return false;
   		}
    }
    if(frm.rpost1.value=="")
    {
      alert("우편번호를 입력해주세요!");
      frm.rpost1.focus();
      return false;
    }
    if(frm.rpost2.value=="")
    {
      alert("우편번호를 입력해주세요!");
      frm.rpost2.focus();
      return false;
    }
    if(frm.rmemo.value=="")
    {
      alert("희망사항을 입력해주세요!");
      frm.rmemo.focus();
      return false;
    }
    */
    frm.submit();
  }
  // rform.php
//-->
</SCRIPT>
<script>
  // rlist.php
  function test(doid)
  {
    if (confirm('좌석예약을 취소하시겠습니까?') == true)
    {
      alert("저희 홈피를 방문해주셔서 감사합니다!\n예약이 취소되었습니다.");
      location.href="./rdel.php?oid="+doid;
    }
  }
  // rlist.php
</script>

<script>
  // rview.php
  function moveurl()
  {
    location.href="./rlist.php";
    return true;
  }
  // rview.php
</script>
<script>
  // redit.php
  function saveurl()
  {
    document.rform.mode.value=2;
    document.rform.submit();
    return true;
  }
  // redit.php
</script>
<STYLE>
BODY
{
    SCROLLBAR-FACE-COLOR: #cccccc;
    SCROLLBAR-HIGHLIGHT-COLOR: #ffffff;
    SCROLLBAR-SHADOW-COLOR: #ffffff;
    SCROLLBAR-3DLIGHT-COLOR: #ffffff;
    SCROLLBAR-ARROW-COLOR: #ffffff;
    SCROLLBAR-TRACK-COLOR: #ffffff;
    SCROLLBAR-DARKSHADOW-COLOR: #ffffff
}
A:link
{
    FONT-SIZE: 9pt;
    COLOR: #666666;
    FONT-FAMILY: 굴림;
    TEXT-DECORATION: none
}
A:visited
{
    FONT-SIZE: 9pt;
    COLOR: #666666;
    FONT-FAMILY: 굴림;
    TEXT-DECORATION: none
}
A:hover
{
    FONT-SIZE: 9pt;
    COLOR: #3399ff;
    FONT-FAMILY: 굴림;
    TEXT-DECORATION: underline
}
A:active
{
    FONT-SIZE: 9pt;
    COLOR: #3399ff;
    FONT-FAMILY: 굴림;
    TEXT-DECORATION: underline
}
INPUT
{
    BORDER-RIGHT: #cccccc 1px solid;
    BORDER-TOP: #cccccc 1px solid;
    FONT-SIZE: 9pt;
    BORDER-LEFT: #cccccc 1px solid;
    COLOR: #555555;
    BORDER-BOTTOM: #cccccc 1px solid
}
SELECT
{
    BORDER-RIGHT: #cccccc 1px solid;
    BORDER-TOP: #cccccc 1px solid;
    FONT-SIZE: 11px;
    BORDER-LEFT: #cccccc 1px solid;
    COLOR: #555555;
    BORDER-BOTTOM: #cccccc 1px solid
}
TEXTAREA
{
    BORDER-RIGHT: #cccccc 1px solid;
    BORDER-TOP: #cccccc 1px solid;
    FONT-SIZE: 9pt;
    BORDER-LEFT: #cccccc 1px solid;
    COLOR: #555555;
    BORDER-BOTTOM: #cccccc 1px solid
}
.box1
{
    BORDER-RIGHT: 0px;
    BORDER-TOP: 0px;
    FONT-SIZE: 9pt;
    BORDER-LEFT: 0px;
    COLOR: #555555;
    BORDER-BOTTOM: 0px
}
.box2
{
    BORDER-RIGHT: #ededed 1px solid;
    BORDER-TOP: #ededed 1px solid;
    FONT-SIZE: 9pt;
    BORDER-LEFT: #ededed 1px solid;
    COLOR: #555555;
    BORDER-BOTTOM: #ededed 1px solid
}
.f13
{
    FONT-SIZE: 13pt
}
.f8
{
    FONT-SIZE: 8pt
}
TD
{
    FONT-SIZE: 9pt;
    COLOR: #000000
}
FONT
{
    FONT-SIZE: 9pt
}
</STYLE>
