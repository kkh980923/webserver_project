<?php
 include 'header.php';
 include 'navbar.php';
 $dbname = "post"; 
 require 'includes/database-connection.php';
 require 'includes/functions.php';
?>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">조회수</th>
      <th scope="col">Like</th>
      <th scope='col'>Update</th>
      <th scope-'col'>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $sql = "SELECT COUNT(*) FROM posts";
     $count = pdo($pdo, $sql)->fetchColumn();
     
     //$sort = filter_input(INPUT_GET, 'sort') ?? 'id';

     $show = 5;
     $from = filter_input(INPUT_GET, 'from', FILTER_VALIDATE_INT)?? 0;
     
    if($count > 0)
    {
      $argment['show'] = $show;
      $argment['from'] = $from;
      
      $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT :show OFFSET :from;";
      $rows = pdo($pdo, $sql,$argment)->fetchAll();
      foreach($rows as $row)
      {	
          echo '<tr>';
          echo '<td><a href="/post.php?id='.html_escape($row['id']).'">'.$row['id'].'</a></td>';
          echo '<td>'.html_escape($row['title']).'</td>';
          echo '<td>'.html_escape($row['username']).'</td>';
          echo '<td>'.html_escape($row['time']).'</td>';
          echo '<td>'.html_escape($row['views']).'</td>';
          echo '<td>'.html_escape($row['likes']).'</td>';
          echo '<td> <a href="/post_update.php?id='.$row['id'].'" class="btn btn-primary" role="button">update</a></td>';
          echo '<td> <a href="/post_delete.php?id='.$row['id'].'" class="btn btn-primary" role="button">Delete</a></td>';
          echo '</tr>';	
      }
    }
    if($count > $show)
    {
      $total_pages = ceil($count / $show);
      $current_page = ceil($from / $show) + 1;
    }
		?>
  </tbody>
 </table>
 <?php if($count > $show) {?>
 <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <?php for($i = 1; $i <= $total_pages; $i++){ ?>
    <li class="page-item"><a href="?show=<?= $show ?>&from=<?= (($i - 1) * $show) ?>" class="page-link <?= ($i == $current_page)? 'active" aria-current="true' : '' ?>">
    <?= $i ?>
  </a></li>
  <?php } ?>
  </ul>
</nav>
<?php } ?>
</body>
<?php include 'footer.php' ?>















