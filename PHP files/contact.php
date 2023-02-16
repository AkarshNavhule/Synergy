<?php
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php?redirect_link=contact.php");
        exit;
    }
    require "config/config.php";
    $message_err = "";

    if (!empty($_GET['err_message'])) {
        $message_err = $_GET['err_message'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">
        <title>Contact</title>
        <link rel="shortcut icon" href="logos/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/contact.css?v=<?php echo time(); ?>">
        <script src="jquery/jquery.js"></script>
        <script>
            $(document).ready(function() {    
                loadadmins();
            });
            function loadadmins() {
                $("#show_admins").load("actions.php?action=search_admins");
                setTimeout(loadadmins, 2000);
            }
        </script>
    </head>
    <body>
        <?php require_once("header.php"); ?>
        <div class="wrapper" style="margin:20px;">
            <h1>Give your feedback</h1>
            <p> <a href="terms.php">TERMS AND CONDITIONS</a>.</p>
            <form action="actions.php?action=create_ticket" method="post">
                <div class="input">
                    <textarea type="text" name="message" class="user-input" placeholder="Message"></textarea>
                    <br>
                    <span class="user-error"><?php echo $message_err; ?></span>
                </div>
                <div>
                    <button onclick="func1()">SUBMIT</button>
                </div>
            </form>
            <div >
                <h4>Your issues will be resolved soon!</h4>
            </div>
        </div>    
    </body>
</html>