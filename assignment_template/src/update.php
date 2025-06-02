<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "로그인이 필요합니다. <a href='login.php'>로그인</a>";
    exit;
}

$conn=mysqli_connect('db',
'root',
'rootpass',
'open');


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
</head>
<body>
    <h1><a href="homepage.php">WEB</a></h1>
    <ol>
        <?php
        $sql="SELECT *FROM topic";
        
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
    //<a href=\"index.php?id=19\"
echo "<b><li><a href=\"homepage.php?id={$row['id']}\">{$row['title']}</a></li></b>";

}
$title=array(
    'title' => 'Welcome', 
    'description' => 'Hello, Web.');
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT title, description ,author FROM topic WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
  if ($row['author'] != $_SESSION['user_id']) {
            echo "본인 글만 수정할 수 있습니다.";
            exit;
        }
        $title['title'] = $row['title'];
        $title['description'] = $row['description'];
    }
}


?>
</ol>
<form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <p><input type="text" name="title" placeholder="제목을 입력하세요." value="<?=$title['title']?>"></p>
    <p><textarea name="description" placeholder ="내용을 입력하세요."><?=$title['description']?></textarea></p>
    <p><input type="submit"></p>
</body>
</html>
