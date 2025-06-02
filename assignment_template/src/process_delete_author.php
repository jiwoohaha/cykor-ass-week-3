<?php
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');
settype($_POST['id'], 'integer');

$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "DELETE FROM topic WHERE author = {$filtered['id']}";

mysqli_query($conn, $sql);

$sql = "DELETE FROM author WHERE id = {$filtered['id']}";

$result = mysqli_query($conn, $sql);


if ($result === false) {
    echo '문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($conn));
} else {
    echo '삭제에 성공했습니다! <a href="login.php">돌아가기</a>';
}
?>