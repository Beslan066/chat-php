<?php


const MESSAGES_FILE = "files/messages.txt";



if(!file_exists(MESSAGES_FILE)) {
    file_put_contents(MESSAGES_FILE, "{}");
}


$fileText = file_get_contents(MESSAGES_FILE);
$messagesArray = json_decode($fileText, true);

if(isset($_POST['message'])) {
    $messagesArray[] = $_POST['message'];

    file_put_contents(MESSAGES_FILE, json_encode($messagesArray));
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>
<body>

<div class="messages">
    <?php
        foreach($messagesArray as $message) {
            echo "<p>$message</p>";
            echo "<br/>";
        }
    ?>
</div>
    

<form method="post">
    <input type="text" name="message">
    <button type="submit">send</button>
</form>

</body>
</html>