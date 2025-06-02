<?php
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');
session_start();
if (!isset($_SESSION['user_id'])) {
    echo '로그인이 필요합니다. <a href="login.php">로그인</a>';
    exit;
}

settype($_GET['id'], 'integer');

$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_GET['id'])
);
$sql = "SELECT author FROM topic WHERE id = {$filtered['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row['author'] != $_SESSION['user_id'])
 {
    echo "본인 글만 삭제할 수 있습니다.";
    exit;
}

$sql = "DELETE FROM topic WHERE id = {$filtered['id']}";

$result = mysqli_query($conn, $sql);


if ($result === false) {
    echo '문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($conn));
} else {
    echo '삭제에 성공했습니다! <a href="homepage.php">돌아가기</a>';
}
?>