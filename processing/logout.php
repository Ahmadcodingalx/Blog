<?php
        
    if (isset($_COOKIE['username'])) {
        setcookie('username', $username, -1,'/');
    }

    header('Location: /blog/index.php');
?>