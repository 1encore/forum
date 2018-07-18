<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <table class="table table-hover table-bordered" style="margin-top: 15%">
        <tr>
          <th>Topics</th>
        </tr>
        <?php
          $query = $connection->query('SELECT * FROM topics');
          while ($row = $query->fetch_object()) {
        ?>
        <tr>
          <td><a href="?page=topic&id=<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
        </tr>
        <?php
          }
        ?>
        <tr>
          <td>
            <form class="form-group" action="?act=addTopic" method="post">
              <input type="text" class="form-control" name="topic">
              <button type="submit" class="btn btn-success form-control" style="margin-top: 1%">add a topic</button>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
