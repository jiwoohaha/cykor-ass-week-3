<?php
session_start();
$conn = mysqli_connect('db', 'root', 'rootpass', 'open');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>
<body>
    <h1><a href="homepage.php">WEB</a></h1>
    <h2><a href="homepage.php">Topic</a></h2>

    <table border="2">
        <tr>
            <td>id</td><td>name</td><td>profile</td><td></td><td></td>
        </tr>
        <?php
        $sql = "SELECT * FROM author";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['profile'] ?></td>
            <?php if ($row['id'] == $_SESSION['user_id']) { ?>
                <td><a href="author.php?id=<?= $row['id'] ?>">update</a></td>
                <td>
                    <form action="process_delete_author.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" value="delete">
                    </form>
                </td>
            <?php } else { ?>
                <td></td><td></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>

    <?php
    if (isset($_SESSION['user_id'])) {
        $escaped = array('name' => '', 'profile' => '');
        $label_submit = '아이디 수정';
        $form_act = 'process_update_author.php';
        $form_id = '<input type="hidden" name="id" value="' . $_SESSION['user_id'] . '">';

        $sql = "SELECT * FROM author WHERE id = " . $_SESSION['user_id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = $row['name'];
        $escaped['profile'] = $row['profile'];
    ?>
        <form action="<?= $form_act ?>" method="post">
            <?= $form_id ?>
            <p><input type="text" name="name" placeholder="이름을 입력하세요" value="<?= $escaped['name'] ?>"></p>
            <p><textarea name="profile" placeholder="프로필"><?= $escaped['profile'] ?></textarea></p>
            <p><input type="submit" value="<?= $label_submit ?>"></p>
        </form>
    <?php } ?>
</body>
</html>
