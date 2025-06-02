<?php
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');

$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO author (name, password) VALUES ('$name', '$password')";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo '회원가입 실패. 관리자에게 문의하세요.';
} else {
    echo '회원가입 성공! <a href="login.php">로그인하러 가기</a>';
}
?>
