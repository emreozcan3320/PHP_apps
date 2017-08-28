<?php
  $msg = '';
  $msgClass = '';
  //check for submit
  if (filter_has_var(INPUT_POST,'submit')) {
    //get form data
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
        $msg = 'geçerli bir e-mail kullanınız';
        $msgClass = 'alert-danger';
      }else{
        //Recipient email
        $toEmail = 'kadiremreozcan@gmail.com';
        //subject
        $subject = 'Contact Request From'.$name;
        $body = '<h2>Contact Request</h2>
        <h4>Name: </h4><p>'.$name.'</p>
        <h4>Email: </h4><p>'.$email.'</p>
        <h4>Message: </h4><p>'.$message.'</p>';
        //email header
        $headers = 'MIME-Version: 1.0'.'\r\n';
        $headers .= 'Content-Type:text/html;charset=UTF-8'.'\r\n';
        //additional headers
        $headers .= 'From:'.$name.'<'.$email.'>'.'\r\n';

        if (mail($toEmail, $subject, $body, $headers)) {
            $msg = 'emailiniz gönderildi';
            $msgClass = 'alert-success';
        }else {
            $msg = 'emailiniz gönderilemedi';
            $msgClass = 'alert-danger';
        }

      }
    } else {
      $msg = 'lütfen bütün alanları doldurunuz';
      $msgClass = 'alert-danger';
    }


  }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
 <?php require ("component/navbar.php");?>
<div class="container">
  <?php if ($msg != ''): ?>
    <div class="alert <?php echo $msgClass;?>">
        <div>
          <?php echo $msg; ?>
        </div>
    </div>
  <?php endif; ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset class="form-group">
      <label for="name">İsim</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="isim" value="<?php echo isset($_POST['name'])? $name : ''; ?>" />
    </fieldset>
    <fieldset class="form-group">
      <label for="email">E-mail</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="email"  value="<?php echo isset($_POST['name'])? $email : ''; ?>">
    </fieldset>
    <fieldset class="form-group">
      <label for="message">Mesajınız</label>
      <textarea class="form-control" id="message" name="message" placeholder="şifre"  value="<?php echo isset($_POST['name'])? $message : ''; ?>"></textarea>
    </fieldset>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

 <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
