<?php
session_start();
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');

$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM author WHERE name='$name' AND password='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    echo '로그인 성공! <a href="homepage.php">홈으로</a>';
} else {
    echo '로그인 실패! 아이디 또는 비밀번호를 확인하세요.  ';
    echo '<a href="login.php">뒤로 가기</a>';
}
?>
