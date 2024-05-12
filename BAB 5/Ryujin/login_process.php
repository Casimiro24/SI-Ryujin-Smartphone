<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $valid_username = "Casimiro";
        $valid_password = "12345";

        if ($username == $valid_username && $password == $valid_password) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: admin.php");
            exit();
        } else {
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    }
}

header("Location: login.php");
exit();
?>
