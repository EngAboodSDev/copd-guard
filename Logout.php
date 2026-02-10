<?php 
/*
* Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
* All rights reserved.
* Developed by Abdulrahman Fadhl Ameer Saif
* @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/
    require_once 'utils.php';
    setcookie('user_id', null, time() - 3600, "/");
    setcookie('admin_id', null, time() - 3600, "/");
    unset($_COOKIE);
    redirect('Index.php');

    /*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/
?>