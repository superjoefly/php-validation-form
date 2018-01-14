<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation</title>
</head>
<body>
  <!-- Defines variables and Run Checks -->
  <?php
  // define variables and set to empty values
  $_SESSION['name'] = $_SESSION['email'] = $_SESSION['gender'] = $_SESSION['website'] = "";
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
          $_SESSION['name'] = "Name is required";
      } else {
          $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
          $_SESSION['name'] = "Only letters and white space allowed";
      }
      }

      if (empty($_POST["email"])) {
          $_SESSION['email'] = "Email is required";
      } else {
          $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $_SESSION['email'] = "Invalid email format";
      }
      }

      if (empty($_POST["website"])) {
          $website = "";
      } else {
          $website = test_input($_POST["website"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
          $_SESSION['email'] = "Invalid URL";
      }
      }

      if (empty($_POST["comment"])) {
          $comment = "";
      } else {
          $comment = test_input($_POST["comment"]);
      }

      if (empty($_POST["gender"])) {
          $_SESSION['gender'] = "Gender is required";
      } else {
          $gender = test_input($_POST["gender"]);
      }
  }

  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }


  if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["website"]) || empty($_POST["gender"])) {
      header("Location: contact.php");
  }
  ?>


<!-- Store in database and/or display input to user -->
<?php
  echo "<h2>Your Input:</h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $comment;
  echo "<br>";
  echo $gender;
?>

<hr>

<p>Thank you for contacting us!</p>

<a href="index.php">Home</a>
</body>
</html>
