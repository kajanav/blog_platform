<?php 
include "db.php";
session_start();
$userId = $_SESSION['id'];
$query = "SELECT  posts.id,posts.title,posts.content,users.username  FROM posts JOIN users ON users.id =  posts.user_id WHERE posts.user_id = $userId  ORDER BY posts.id DESC";
$statement = $conn->prepare($query);
$statement->execute();
$post_data = $statement->fetchAll();
$blogs = [
  
];
  

if (empty($_SESSION['username'])) {
  return;
}
  $name = $_SESSION['username'];
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<header>
    <div class="main">
        <nav class="navr navr-inverse1">
            <div class="navdiv1">
                <div class="logo">
                    <a href="#">BlogHub</a>
                </div>
                <ul>

                    <li><a href="index.php"><span class=""></span><button type="button" class=""> Home</button></a></li>
                    <li><a href="dashboard.php"><span class=""></span><button type="button" class="active-btn">Dashboard </button></a></li>
                    <li><a href="logout.php"><span class=""></span><button type="button" class="">Logout </button></a></li>
                </ul>
            </div>
        </nav>
    </div>

</header>

<body>
<h1>WELCOME TO <?php echo $name; ?>!</h1>
    <div class="user-card">
        <div class="user-info">
            <h2><?php echo $name; ?> </h2>

        </div>
      <a href="posts/add.php"> <button class="create-post-btn">Create Post</button></a> 
    </div>
    <div style="min-height: 400px;">
  
    <div class="cards">
      <?php foreach ($post_data as $blog) : ?>
        <article class="card">
          <header>
            <h2> <?php echo $blog['title'] ?></h2>
          </header>
         
          <div class="content">
          <p> <?php echo implode(' ', array_slice(explode(' ',  $blog['content']), 0, 8)) ?>.. <span>
                <a href="posts/view.php?id=<?php echo $blog['id'] ?>">view more</a>
              </span></p>
            <footer>Writing by: <?php echo $blog['username'] ?></footer>
          </div>
</article>

      <?php endforeach; ?>
    </div>
    </div>
    <footer class="footer">
        Developed By:20APSE4878 Kajana.V
    </footer>
</body>


</html>