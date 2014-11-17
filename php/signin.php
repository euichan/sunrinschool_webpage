<!doctype html>
<html>
<head>
    <title>Login</title></tile>
    <meta charset = "UTF-8">
</head>
</html>

<?php
include 'dbconnect.php';

session_start();//session start
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myid=addslashes($_POST['id']);
	$mypassword=addslashes($_POST['password']);
	$sql="SELECT id FROM user_db WHERE id='$myid' and pw='$mypassword'";
	
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count == 1)
	{
		$_SESSION["login_user"]=$myid;
       	echo "<script>alert(\"안녕하세요$myid님\");</script>";
		header("Location: ../html/main.html");
	}
	else
	{
	   echo "<script>alert('아이디나 패스워드가 잘못되었습니다.');</script>";
	}

/*
user_db 라는 데이터 베이스에, ING_Login 이라는 테이블에.
username 과 password 라는 2개의 컬럼만 존재.
로그인 성공시 login_user 세션에 아이디 저장함.

*/
}
    mysql_close($bd);
?>
