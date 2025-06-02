<?php
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');
settype($_GET['id'], 'integer');

$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_GET['id'])
);

$sql = "DELETE FROM topic WHERE id = {$filtered['id']}";

$result = mysqli_query($conn, $sql);


if ($result === false) {
    echo '문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($conn));
} else {
    echo '삭제에 성공했습니다! <a href="homepage.php">돌아가기</a>';
}
?>