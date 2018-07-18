<?php
  $id = $_GET['id'];
  $queryTopic = $connection->query("SELECT * FROM topics WHERE id = $id");
  if($rowTopic = $queryTopic->fetch_object()){
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <table class="table table-hover table-bordered" style="margin-top: 15%">
        <tr>
          <th><?php echo $rowTopic->name; ?></th>
        </tr>
        <?php
          $query = $connection->query("SELECT * FROM questions WHERE topic_id = $rowTopic->id");
          while ($row = $query->fetch_object()) {
        ?>
        <tr>
          <td><a href="?page=question&id=<?php echo $row->id;?>"><?php echo $row->content;?></a></td>
        </tr>
        <?php
          }
        ?>
        <tr>
          <td>
            <form class="form-group" action="?act=addQuestion&id=<?php echo $rowTopic->id;?>" method="post">
              <input type="text" class="form-control" name="question">
              <button type="submit" class="btn btn-success form-control" style="margin-top: 1%">add a question</button>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php
  }
?>
