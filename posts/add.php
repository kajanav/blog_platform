<?php
session_start();
include "../db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $title = trim($_POST['title']);
  
   $content = trim($_POST['content']);
   $userId = $_SESSION['id'];
   
   $isValid = true;

   // Check fields are empty or not
   if($content == '' ||  $title == ''){
      $isValid = false;
     $_SESSION['messages'][]='Please fill all required fields!';

exit;
   }

// Insert records
   if($isValid){
     $insertSQL = "INSERT INTO posts (title,content,user_id) values(:ti,:ca,:ui)";
     $stmt = $conn->prepare($insertSQL);
     $stmt->bindParam(':ti',$title); 
     $stmt->bindParam(':ca',$content);
     $stmt->bindParam(':ui',$userId);
     $stmt->execute();
     
     $_SESSION['messages'][]='Thank you for your registration.!';
     header('Location:../dashboard.php');
exit;
   }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>post upload</title>
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
                    <li><a href="../dashboard.php"><span class=""></span><button type="button" class="active-btn">Dashboard </button></a></li>
                    <li><a href="../logout.php"><span class=""></span><button type="button" class="">Logout </button></a></li>
                </ul>
            </div>
        </nav>
    </div>

</header>

<body>
<div style="min-height: 400px;">
    <div class="container">
      <form id="postForm" action="add.php" method="POST" onsubmit="return validateForm()">
            <h1>Create a New Post</h1>
            <div class="input-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter post title">
                <span id="titleError" class="error-message"></span>
              </div>

            <div class="input-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="5" placeholder="Enter post content"></textarea>
                <span id="contentError" class="error-message"></span>
              </div>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
</body>
<footer class="footer">
      Developed By:20APSE4878 Kajana.V
    </footer>
    <script src="../js/script2.js"></script>
</html>