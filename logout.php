<?php
session_start();
session_destroy();
Header("Location: http://localhost:8888/PHP-learning/login.html");
// Header("Location: http://localhost/PHP-learning/login.html");
// Header("login.html");
?>