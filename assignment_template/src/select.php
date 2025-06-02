<?php
$conn=mysqli_connect('db',
'root',
'rootpass',
'open');
session_start();
if (!isset($_SESSION['user_id'])) {
    echo '로그인이 필요합니다. <a href="login.php">로그인</a>';
    exit;
}

$sql="SELECT *FROM topic LIMIT 100";
$result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($result))
{
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];
}
?>