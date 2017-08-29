<?php
  require ('./config/config.php');
  require ('./config/db.php');
  //Get ID from pg_parameter_status
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM posts WHERE id ='.$id;
  //Get the result
  $result = mysqli_query($conn, $query);
  //Fetch data
  $post = mysqli_fetch_assoc($result);
  //var_dump($posts);
  //Free the result
  mysqli_free_result($result);
  //Close connection
  mysqli_close($conn);



 ?>
 <?php require ('./inc/navbar.php'); ?>
 <?php require ('./inc/header.php'); ?>
      <div class="container">
        <a href="<?php echo ROOT_URL;?>">Back</a>
        <h1><?php echo $post['title']; ?></h1>
            <small>created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
            <p><?php echo $post['body']; ?></p>
            <a  class="btn btn-default" href="post.php?id=<?php echo $post['id']; ?>" >Read More</a>
      </div>
<?php require ('./inc/footer.php'); ?>
