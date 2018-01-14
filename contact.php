<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Contact</title>

      <style>
         .error {
            color: red;
         }
      </style>
   </head>
   <body>
      <h2>PHP Form Validation Example</h2>
      <p><span class="error">* required field.</span></p>

      <form method="post" action="confirmation.php">

        Name: <input type="text" name="name" value="<?php echo $name;?>" required>
        <span class="error">* <?php echo $_SESSION['name'];?></span>
        <br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>" required>
        <span class="error">* <?php echo $_SESSION['email'];?></span>
        <br><br>

        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error"><?php echo $_SESSION['website'];?></span>
        <br><br>

        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
        <br><br>

        Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") {
    echo "checked";
}?> value="female" required>Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") {
    echo "checked";
}?> value="male">Male
        <span class="error">* <?php echo $_SESSION['gender']?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
      </form>

      <?php
          unset($_SESSION['name']);
          unset($_SESSION['email']);
          unset($_SESSION['website']);
          unset($_SESSION['gender']);
      ?>

   </body>
</html>
