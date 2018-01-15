<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Contact</title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="styles.css">
</head>
<body>

   <?php
      // define variables and set to empty values
      $name_err = $email_err = $website_err = $gender_err = "";
      $name = $email = $gender = $comment = $website = "";

      $errors = [];

      $show_form = true;
      $show_user_input = false;

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
              $errors['name_err'] = "Name is required";
              // $name_err = "Name is required";
          } else {
              $name = test_input($_POST["name"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
             // $name_err = "Only letters and white space allowed";
             $errors['name_err'] = "Only letters and white space allowed";
         }
          }

          if (empty($_POST["email"])) {
              // $email_err = "Email is required";
              $errors['email_err'] = "Email is required";
          } else {
              $email = test_input($_POST["email"]);
         // check if e-mail address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             // $email_err = "Invalid email format";
             $errors['email_err'] = "Invalid email format";
         }
          }

          if (empty($_POST["website"])) {
              $website = "";
          } else {
              $website = test_input($_POST["website"]);
         // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
         if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
             // $website_err = "Invalid URL";
             $errors['website_err'] = "Invalid URL";
         }
          }

          if (empty($_POST["comment"])) {
              $comment = "";
          } else {
              $comment = test_input($_POST["comment"]);
          }

          if (empty($_POST["gender"])) {
              // $gender_err = "Gender is required";
              $errors['gender_err'] = "Gender is required";
          } else {
              $gender = test_input($_POST["gender"]);
          }

         // Check if Post is set and if errors is empty...if so, hide the form and show user input
          if (isset($_POST) && empty($errors)) {
              $show_form = false;
              $show_user_input = true;
          } else {
              $show_form = true;
              $show_user_input = false;
          }
      }


      function test_input($data)
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
   ?>

   <!-- Form to Validate -->
   <?php if ($show_form): ?>
      <div class="w3-container form-container" id="form">
         <div class="w3-card-4">
            <div class="w3-container w3-teal">
               <h2 class="w3-center">Form with Validation</h2>
            </div>
               <p class="w3-padding">
                  <span class="error">* Required Field.</span>
               </p>
               <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w3-container">

                 <p>Name:
                    <span class="error">* <?php echo $errors['name_err'];?></span>
                 </p>
                 <input type="text" name="name" value="<?php echo $name;?>" class="w3-input" required autofocus>

                 <p>Email:
                    <span class="error">* <?php echo $errors['email_err'];?></span>
                 </p>
                 <input type="text" name="email" value="<?php echo $email;?>" class="w3-input" required>

                 <p>Website:
                     <span class="error"><?php echo $errors['website_err'];?></span>
                 </p>
                 <input type="text" name="website" value="<?php echo $website;?>" class="w3-input">

                 <p>Comment:</p>
                 <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
                 <br>

                  <div class="gender-box">
                     <p>Gender:
                        <span class="error">* <?php echo $errors['gender_err'];?></span>
                     </p>
                     <input type="radio" name="gender"
                     <?php
                        if (isset($gender) && $gender=="female") {
                            echo "checked";
                        }
                     ?> value="female" class="w3-radio" required>
                     <label>Female</label>
                        <br>
                     <input type="radio" name="gender"
                     <?php
                        if (isset($gender) && $gender=="male") {
                            echo "checked";
                        }
                     ?> value="male" class="w3-radio">
                     <label>Male</label>
                  </div>

                  <input type="submit" name="submit" value="Submit" class="w3-margin w3-button w3-right w3-teal">
               </form>

               <div class="w3-container w3-teal">
                  <p class="w3-center">NewUp Developments</p>
               </div>
         </div>
      </div>
   <?php endif; ?>

   <?php if ($show_user_input): ?>
      <div class="w3-container" id="data">
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
         <p>Thank you for contacting us!</p>
         <a href="index.php">Home</a>
      </div>
   <?php endif; ?>



</body>
</html>
