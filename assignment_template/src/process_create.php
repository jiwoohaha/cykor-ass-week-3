<?php
session_start();
$conn=mysqli_connect('db',
'root',
'rootpass',
'open');
if (!isset($_SESSION['user_id'])) {
    echo "로그인이 필요합니다. <a href='login.php'>로그인</a>";
    exit;
}
$filtered = array(
'title'=>mysqli_real_escape_string($conn,$_POST['title']),
'description'=>mysqli_real_escape_string($conn,$_POST['description']),
);
$author_id = $_SESSION['user_id'];
$sql="INSERT INTO topic
(title,description,created, author)
values(
'{$_POST['title']}','{$_POST['description']}',NOW(), '$author_id'
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