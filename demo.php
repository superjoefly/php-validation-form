




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $_SESSION['name']= "Name is required";
    }
    if (empty($_POST["email"])) {
        $_SESSION['email'] = "Email is required";
    }
    if (empty($_POST["website"])) {
        $_SESSION['website'] = "Website is required";
    }
    if (empty($_POST["gender"])) {
        $_SESSION['gender'] = "Gender is required";
    }
}

if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["website"]) || empty($_POST["gender"])) {
    header("Location: contact.php");
}

echo $_POST['name'];
?>
