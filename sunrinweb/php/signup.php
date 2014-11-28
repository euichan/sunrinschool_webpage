<?php
include 'dbconnect.php';


if(isset($_POST['name']) && isset($_POST['id']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])&& isset($_POST['birth_year'])&& isset($_POST['birth_day'])&& isset($_POST['birth_month'])&& isset($_POST['telecom'])){
    $name = mysql_real_escape_string(trim($_POST['name']));
    $birth_year = mysql_real_escape_string(trim($_POST['birth_year']));
    $birth_month = mysql_real_escape_string(trim($_POST['birth_month']));
    $birth_day = mysql_real_escape_string(trim($_POST['birth_day']));
    $id = mysql_real_escape_string(trim($_POST['id']));
    $password = mysql_real_escape_string(trim($_POST['password']));
    $email = mysql_real_escape_string(trim($_POST['email']));
    $phone ="";
    $telecom = mysql_real_escape_string(trim($_POST['telecom']));

    $birth = $birth_year."-".$birth_month."-".$birth_day;


    foreach( $_POST['phone'] as $i ) {
        $phone .= $i;
    }

    $query = "SELECT count(*) FROM user_db WHERE id='$id'";
    $totalnum = mysql_fetch_array(mysql_query($query));
    if($totalnum[0] != 0){
        echo "<script>alert('이미 가입되어 있는 아이디 입니다!');history.back();</script>";
        die();
    }

    $query = "INSERT INTO user_db (name, id, password, email, phone,telecom, birth) VALUES ('$name','$id','$password','$email','$phone','$telecom','$birth');";    

    $result = mysql_query($query); // 회원가입

    if($result){
        echo "<script>alert('".$name."님! 선린 인터넷 고등학교에 오신것을 환영합니다');location.href='../html/index.html';</script>";
    }
    else{
        echo "<script>alert('회원가입도중 에러가 발생하였습니다.');</script>";
    }
    mysql_close();

}
else{
    echo "<script>alert('내용을 모두 작성해주세요!');history.back();</script>";
}
?>
