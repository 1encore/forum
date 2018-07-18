<?php
  $id = $_GET['id'];
  $queryQues = $connection->query("SELECT * FROM questions WHERE id = $id");
  if($rowQues = $queryQues->fetch_object()){
?>
<div class="container">
  <div class="row">
    <h2 style="margin-top: 15%;"><?php echo $rowQues->content;?></h2>
    <table class="table table-hover">
      <?php
        $query = $connection->query("SELECT * FROM answers WHERE question_id = $id");
        while($row = $query->fetch_object()){
          $queryUser = $connection->query("SELECT * FROM users WHERE id = $row->user_id");
          if($rowUser = $queryUser->fetch_object()){
      ?>
      <tr>
        <td><?php echo $rowUser->login; ?></td>
        <td><?php echo $row->content; ?></td>
      </tr>
      <?php
          }
        }
      ?>
    </table>
    <div class="col-lg-12 text-center">
      <form class="form-group" action="?act=addAnswer&idq=<?php echo $rowQues->id;?>" method="post">
        <input type="text" class="form-control" name="answer">
        <button type="submit" class="btn btn-success form-control" style="margin-top: 1%">add an answer</button>
      </form>
    </div>
  </div>
</div>
<?php
  }
?>
