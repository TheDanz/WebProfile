<?php
$link = mysqli_connect('127.0.0.1', 'root', '123', 'web_profile_db');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$img_path = $rows['img_path'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danil Ryumin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel ="stylesheet" href="css/style.css">
</head>

<body>
<?php
    echo "<h1>$title</h1>";
    echo "<p>$main_text</p>";
    if (!is_null($img_path)) {
        echo "<img src='$img_path' alt='Image'>";
    }
?>
</body>

</html>