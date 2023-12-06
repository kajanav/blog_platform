<?php
include "db.php";
session_start();

if (isset($_SESSION['username'])) {
  $login = 1;
} else $login = 0;
$query = "SELECT posts.id,posts.title,posts.content,users.username FROM posts  JOIN users ON users.id =  posts.user_id ORDER BY posts.id DESC";
$statement = $conn->prepare($query);
$statement->execute();
$post_data = $statement->fetchAll();
$blogs = [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

  <title>Home</title>
</head>
<header>

  <div class="main">
    <nav class="navr navr-inverse1">
      <div class="navdiv1">
        <div class="logo">
          <a href="#">BlogHub</a>
        </div>
        <ul>
          <li><a href="index.php"><span class=""></span><button type="button" class="active-btn"> Home</button></a></li>
          <li id="login"><a href="login.php"><span class=""></span><button type="button" class="">Log In</button></a></li>
          <li id="register"><a href="register.php"><span class=""></span><button type="button" class="">Register </button></a></li>
          <li id="dashboard"><a href="dashboard.php"><span class=""></span><button type="button" class="">Dashboard </button></a></li>
          <li id="logout"><a href="logout.php"><span class=""></span><button type="button" class="">Logout </button></a></li>
        </ul>
      </div>
    </nav>
  </div>

</header>

<body>
  <div class="head">
    <h1>WLCOME TO BlogHub!</h1>
    <h2>Publish your passions,your way </h2>
    <p> Create a unique and beautful blog easily</p>

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
<script type="text/javascript">
  var login = "<?php echo $login ?>";
  

  if (login == 1) {
    document.getElementById("login").style.display = "none"
    document.getElementById("register").style.display = "none";
    document.getElementById("dashboard").style.display = "block"
    document.getElementById("logout").style.display = "block"


  } else {
    document.getElementById("login").style.display = "block"
    document.getElementById("register").style.display = "block";
    document.getElementById("dashboard").style.display = "none"
    document.getElementById("logout").style.display = "none"
  }

  
</script>

</html>