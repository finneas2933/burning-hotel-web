<?php
    session_start();

    // Xoá toàn bộ session
    session_destroy();
    header("Location: index.php"); 
    exit;
?>
