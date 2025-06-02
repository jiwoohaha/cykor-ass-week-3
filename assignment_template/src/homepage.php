<?php
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

if(isset($_GET['id']))
{

$filtered_id=mysqli_real_escape_string($conn,$_GET['id']);
$sql="SELECT*FROM topic WHERE id={$filtered_id}";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$title['title']=$row['title'];
$title['description']=$row['description'];

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
</body>
</html>
