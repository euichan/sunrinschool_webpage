<html>
<head>
    <meta charset="UTF-8">
<title>일반 게시판</title>
<style>
<!--
td {font-size : 9pt; color:#333333}
A:link {font : 9pt; color : black; text-decoration : none;
font-family : 굴림; font-size : 9pt;}
A:visited {text-decoration : none; color : #333333; font-size : 9pt;}
A:hover {text-decoration : underline; color : #333333; 
font-size : 9pt;}
-->
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br />
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<? 
	if(!isset($_GET['id'])) die('ERROR : 어떤 글을 삭제할지 알 수 없습니다.');
	$id = $_GET['id'];
?>
<form action=delete.php?id=<?=$id?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
<tr>
	<td height=20 align=center bgcolor=#eeeeee>
		<font color=white><B>비 밀 번 호 확 인</B></font>
	</td>
</tr>
<tr>
	<td align=center >
		<font color=white><B>비밀번호 : </b>
		<INPUT type=password name=pass size=8>
		<INPUT type=submit value="확 인">
		<INPUT type=button value="취 소" onclick="history.back(-1)">
	</td>
</tr>
</table>