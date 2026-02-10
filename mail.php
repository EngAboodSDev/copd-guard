<?php
/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/


require_once 'utils.php';
require_once 'dbcon.php';
require_once 'Controller.php';
// redirect login user to home page if it whosen't user
if (isAdminLoggedIn() && !isUserLoggedIn()) {
    redirect('AdminDashboard.php');
}
if (!isAdminLoggedIn() && isUserLoggedIn()) {
    redirect('HPDashboard.php');
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

    $email = escapeStr(connectDB(), $_POST["Email"]);
    $checked = emailCheck($email);
    if (!$checked) {
        alertMessage('Email that you entered is Incorrect... Can not Reset Your Password');
        redirect('Login.php');
        exit;
    }
    if (is_numeric($checked)) {
        $hcp = encrypt($checked, "U#h2*4pL!Z8d@9sF");
        date_default_timezone_set("Asia/Riyadh");
        $on = date("Y-m-d H:i:s");


        $mail = new PHPMailer(true);
        $serverBaseUrl = $_SERVER['HTTP_HOST'];
        $fullUrl = $serverBaseUrl . "/COPD_GUARD/Reseted.php?reseted=" . $hcp . "&on=" . $on;
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth = true;             //Enable SMTP authentication
        $mail->Username = 'copdguard@gmail.com';   //SMTP write your email
        $mail->Password = 'vjlyagapxawvbjuk';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('copdguard@gmail.com'); // Sender Email and name
        $mail->addAddress($email);     //Add a recipient email  
        // $mail->addReplyTo($_POST["Email"], "Dear"); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = "[COPD GUARD] Please reset your password using link  ";   // email subject headings
        $mail->Body = "We heard that you lost your password in . \r\nSorry about that!
                        But don’t worry! You can use the following link to reset your password:\r\n  " . $fullUrl .
            "\r\nIf you don't want to change your password or didn't request this, 
                        please ignore and delete this message.\r\n
                        Thank you,\r\n
                        The COPD GUARD Team "; //email message
        // Success sent message alert
        if ($mail->send()) {
            redirect('ResetConfirm.php');
        } else {
            alertMessage("Email could not be sent ...");
            redirect('Login.php');
            // echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
        }
    } else {
        redirect('Login.php');
    }
}


/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/
?>