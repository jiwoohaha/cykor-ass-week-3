<?php
$conn=mysqli_connect('db',
'root',
'rootpass',
'open');
$filtered = array(
'title'=>mysqli_real_escape_string($conn,$_POST['title']),
'description'=>mysqli_real_escape_string($conn,$_POST['description'])
);
$sql="INSERT INTO topic
(title,description,created)
values(
'{$_POST['title']}','{$_POST['description']}',NOW()
)";
$result=mysqli_query($conn,$sql);
if($result ===false)
{
    echo '문제가 발생했습니다. 관리자에게 문의';
    error_log(mysqli_error($conn));
}
else{
    echo '성공했습니다. <a href="homepage.php">돌아가기</a>';
}
?>