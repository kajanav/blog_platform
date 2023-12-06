<?php 
include "../db.php";
$postId = trim($_GET['id']);
$query = "SELECT * FROM posts JOIN users ON users.id =  posts.user_id WHERE posts.id = $postId  ORDER BY posts.id DESC";
$statement = $conn->prepare($query);

$statement->execute();
$post_data = $statement->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Great Crested Flycatcher </title>
</head>
<header>

    <div class="main">
        <nav class="navr navr-inverse1">
            <div class="navdiv1">
                <div class="logo">
                    <a href="#">BlogHub</a>
                </div>
                <ul>
                    <li><a href="../index.php"><span class=""></span><button type="button" class=""> Home</button></a></li>
                    <li><a href="../dashboard.php"><span class=""></span><button type="button" class="">Dashboard </button></a></li>
                </ul>
            </div>
        </nav>
    </div>

</header>

<body>
<div style="min-height: 550px;">
    <div class="center">
    
        <h1><?php echo $post_data['title'] ?></h1>
         <p><?php echo $post_data['content'] ?></p>
         <h4>Writing by: <?php echo $post_data['username'] ?></h4>
 </div>
</div>
</body>
<footer class="footer">
        Developed By:20APSE4878 Kajana.V
    </footer>
</html>