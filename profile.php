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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-7">
                <div class="nav_text">Info about me</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                    <li>
                        Born in Vologda, received a bachelor's degree in Yaroslavl, 
                        and now studies and lives in Saint-Petersburg
                    </li>
                    <li>
                        Studies Information Security at the ITMO University
                    </li>
                    <li>
                        Successfully completed stage 1 of the PT START 2024.1
                    </li>
                    <li>
                        Interested in Mobile App Security
                    </li>
                    <li>
                        iOS Developer Intern at Yandex
                    </li>
                    <li>
                        On the photo is me :)
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <div class="row my_photo"></div>
                <div class="row"><p class="title_photo">Danil Ryumin</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cat_button col-12">
                <button id="my_cat_button" class="orange_button">Click to see my cat</button>
                <p id="place_for_cat"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="Hello">
                    Hello, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-4">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form_post" name="title" placeholder="Post title">
                    <textarea name="text" class="form_post" cols="30" rows="5" placeholder="Your text here ..."></textarea>
                    <input type="file" name="file" class="form_post" />
                    <button type="submit" class="orange_button continue_button" name="submit">Continue</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/buttonToSeeCat.js"></script>
</body>
</html>

<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', '123', 'web_profile_db');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ('Please fill in all the values!');


    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 1024000))
        {
            $upload_path = "/var/www/html/upload/" . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];

            $img_path = "/upload/" . $_FILES["file"]["name"];

            $sql = "INSERT INTO posts (title, main_text, img_path) VALUES ('$title', '$main_text', '$img_path')";
            if (!mysqli_query($link, $sql)) die ("Failed to add post");
        }
        else
        {
            echo "File upload error";

            $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
            if (!mysqli_query($link, $sql)) die ("Failed to add post");
        }
    } else {
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        if (!mysqli_query($link, $sql)) die ("Failed to add post");
    }
}
?>

