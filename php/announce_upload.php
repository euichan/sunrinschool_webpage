<html>
<head>
    <meta charset="UTF-8">
</head>
</html>
<?
//업로드한 파일을 저장할 디렉토리
$save_dir = "/sunrindrive/sunriner/가정통신문";
 
//파일이 HTTP POST 방식을 통해 정상적으로 업로드되었는지 확인한다.
if(is_uploaded_file($_FILES["myFile"]["tmp_name"]))
{
   echo "업로드한 파일명 : ".$_FILES["myFile"]["name"] ."<br />";
   echo "업로드한 파일의 크기 : ".$_FILES["myFile"]["size"] ."<br />";
   echo "업로드한 파일의 MIME Type : ".$_FILES["myFile"]["type"] ."<br />";
   echo "임시 디렉토리에 저장된 파일명 : ".$_FILES["myFile"]["tmp_name"]."<br />";
 
   //파일을 저장할 디렉토리 및 파일명
   $dest = $save_dir . $_FILES["myFile"]["name"];
 
   //파일을 지정한 디렉토리에 저장
   if(!move_uploaded_file($_FILES["myFile"]["tmp_name"], $dest))
   {
      die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");
   }
}
?>
