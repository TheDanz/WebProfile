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
<div class="container">
    <div class="row">
        <div class="col-12 index">
            <h1>Posts Page</h1>
        <?php
        if (!isset($_COOKIE['User'])) {
	    ?>
	        <a href="WebProfile/registration.php">Sign up</a> or <a href="/WebProfile/login.php">Sign in</a>!
        <?php
        } else {
            $link = mysqli_connect('127.0.0.1', 'root', '123', 'web_profile_db');
            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);

            if (mysqli_num_rows($res) >  0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                }
            } else {
                    echo "There are no posts yet";
            }
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>

