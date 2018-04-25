<?php
session_start();
session_destroy();
Header("Location: http://localhost:8888/Todo-list/login.php");
?>