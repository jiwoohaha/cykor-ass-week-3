<?php
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');
settype($_POST['id'], 'integer');

$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
UPDATE author
SET 
    name = '{$filtered['name']}', 
    profile = '{$filtered['profile']}'
WHERE 
    id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo '문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다! <a href="homepage.php">돌아가기</a>';
}
?>