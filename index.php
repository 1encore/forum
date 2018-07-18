<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Database -->
    <?php include 'templates/db.php';?>
    <!-- Styles -->
    <?php include 'templates/styles.php';?>
    <!-- Actions -->
    <?php
    session_start();
      $page = "home";
      if(isset($_GET['act'])){
        if($_GET['act']=="addTopic"){
          $topic = $_POST['topic'];
          $connection->query("INSERT INTO topics VALUES(null,\"$topic\")");
          $page = "home";
        }else if($_GET['act']=="addQuestion"){
          $id = $_GET['id'];
          $question = $_POST['question'];
          $connection->query("INSERT INTO questions VALUES(null,1,$id,\"$question\")");
          $page = "topic&id=".$id;
        }else if($_GET['act']=="login"){
          $login = $_POST['login'];
          $pwd = $_POST['pwd'];
          $query = $connection->query("SELECT * FROM users WHERE login = \"$login\" AND pwd = \"$pwd\"");
          if($row = $query->fetch_object()){
            $temp = $row->login;
            $_SESSION['login'] = $row->login;
            $_SESSION['id'] = $row->id;
            $page = "home";
          }else{
            $page = "login";
          }
        }else if($_GET['act']=="reg"){
          $login = $_POST['login'];
          $pwd = $_POST['pwd'];
          $connection->query("INSERT INTO users VALUES(null,\"$login\",\"$pwd\")");
          $page = "login";
        }else if($_GET['act']=="addAnswer"){
          $id = $_SESSION['id'];
          $idq = $_GET['idq'];
          $ans = $_POST['answer'];
          $connection->query("INSERT INTO answers VALUES(null,$idq,$id,\"$ans\")");
          $page = "question&id=".$idq;
        }else if($_GET['act']=="logout"){
          session_destroy();
          $page = "home";
        }
        header("Location:?page=".$page);
      }
    ?>
  </head>

  <body>

    <!-- Navigation -->
    <?php include 'templates/header.php';?>

    <!-- Page Content -->
    <?php
      $page = "home";
      if(isset($_GET['page'])){
        if($_GET['page']=='home'){
          $page = "home";
        }else if($_GET['page']=='ask'){
          $page = "ask";
        }else if($_GET['page']=='question'){
          $page = "question";
        }else if($_GET['page']=='login'){
          $page = "login";
        }else if($_GET['page']=='topic'){
          $page = "topic";
        }else if($_GET['page']=='reg'){
          $page = "reg";
        }
      }
      include 'pages/'.$page.'.php';
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
