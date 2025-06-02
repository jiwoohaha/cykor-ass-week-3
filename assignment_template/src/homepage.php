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


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
<?php if (isset($_SESSION['user_id'])) { ?>
    <p>안녕하세요  <?= $_SESSION['user_name'] ?> 님 <br>
    <a href="logout.php">로그아웃 하기</a></p>
<?php } ?>
</head>
<body>
    <h1><a href="homepage.php">WEB</a></h1>
    <a href="author.php">아이디 수정</a>
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

if(isset($_GET['id']))
{

$filtered_id=mysqli_real_escape_string($conn,$_GET['id']);
$sql = "SELECT * FROM topic LEFT JOIN author ON topic.author = author.id WHERE topic.id = {$filtered_id}";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$title['title']=$row['title'];
$title['description']=$row['description'];
$title['name']=$row['name'];

}
?>
</ol>
<a href="create.php">create</a>
<?php
if (isset($_GET['id'])) { 
    echo '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
    
      echo ' <a href="delete.php?id=' . $_GET['id'] . '"> delete</a>';
}
?>

<h2> <?=$title['title']?> </h2>
<?=$title['description']?>
<?php
if (isset($_GET['id'])) {
    echo "<p>by {$title['name']}</p>";
}
?>

</body>
</html>
