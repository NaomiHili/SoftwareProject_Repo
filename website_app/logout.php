<?php

    session_start();
    session_destroy(); //stops session for the user
    header("Location: index.php");
?>
