
<?php
  if (isset($_POST['submit'])) {
    $username = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $info =[
      'username' => $username,
      'email' => $email
    ];

    $info = serialize($info);
    setcookie('info',$info,time()+3600);
    header('Location:page2.php');
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sessions</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <br>
      <br>
      <br>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </fieldset>
        <fieldset class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="e-mail">
        </fieldset>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
      <hr>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
