<?
	//데이터 베이스 연결하기
	include "db_info.php";

	//패스워드 암호화 작업
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$title = strip_tags($_POST['title']);
	$content = strip_tags($_POST['content']);

	$pass = sha1($_POST['pass']);
	

	$query = "INSERT INTO board 
	(id, name, email, pass, title, content,	wdate, ip, view)
	VALUES ('', '$name', '$email', '$pass', '$title', 
	'$content',	now(), '{$_SERVER['REMOTE_ADDR']}', 0)";
	$result=$mysqli->query($query);

	//데이터베이스와의 연결 종료
	$mysqli->close();

	// 새 글 쓰기인 경우 리스트로..
	echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>