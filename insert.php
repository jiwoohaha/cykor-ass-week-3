<?php
$conn=mysqli_connect("localhost", "root","","open");
$sql="INSERT INTO topic
(title, description, created)
VALUES
(
'MySQL',
'MySQL is ...',
NOW()
)";
mysqli_query($conn,$sql);
echo mysqli_error($conn);
?>
