<?php
        
    if (isset($_COOKIE['username'])) {
        setcookie('username', "", -1,'/');
        setcookie('id', "", -1,'/');
    }

    header('Location: /blog');

?>