<?php
$conn=mysqli_connect('localhost',
'root',
'',
'open');
$sql="SELECT *FROM topic LIMIT 100";
$result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($result))
{
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];
}
?>