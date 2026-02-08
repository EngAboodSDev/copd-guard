<?php 
    require_once 'utils.php';
    setcookie('user_id', null, time() - 3600, "/");
    setcookie('admin_id', null, time() - 3600, "/");
    unset($_COOKIE);
    redirect('Index.php');
?>