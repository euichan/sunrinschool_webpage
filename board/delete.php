<?
//데이터 베이스 연결하기
include "db_info.php";

if(!isset($_GET['id'])) die('ERROR : 어떤 글을 삭제할지 알 수 없습니다.');
$id = $_GET['id'];

$result=$mysqli->query("SELECT pass FROM board WHERE id=$id");
$row = $result->fetch_array();

if (sha1($_POST['pass'])==$row['pass'] )
{
	$query = "DELETE FROM board WHERE id=$id ";
	$result=$mysqli->query($query);
}
else
{
	echo ("
	<script>
	alert('비밀번호가 틀립니다.');
	history.go(-1);
	</script>
	");
	exit;
}
?>
<center>
<meta http-equiv='Refresh' content='1; URL=list.php'>
<FONT size=2 >삭제되었습니다.</font>