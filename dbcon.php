<?php

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/

function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $db = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!mysqli_select_db($db, 'copd_guard'))

        die("Unable to select database: " . mysqli_error($db));
    return $db;
}

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/