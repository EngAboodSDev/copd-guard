<?php
/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/


// --------- Start operations used for admin logined ---------- //

function admin_login($Email, $Password)
{   // function to login admin to system -- Login page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "SELECT `Admin_ID` FROM admins WHERE `Email` = '" . $Email . "' AND `Password` = '" . $Password . "'";
    // get the result of the query 
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row['Admin_ID'])) {
        unset($_COOKIE);
        setcookie('admin_id', $row['Admin_ID'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}

function getAllRecentRequests()
{   // function to  get all Recent Requests in system -- AdminDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT * FROM `healthcare_provider` where `Status`='registered' ORDER BY `Register_date` DESC ");
    $RecentRequests = array();
    while ($row = mysqli_fetch_array($result)) {
        $RecentRequests[] = $row;
    }
    return $RecentRequests;
}



function getAllUsers()
{   // function to get all users in system -- AdminDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // Retrieve records from the 'admins' table
    $adminsResult = mysqli_query($db, "SELECT * FROM `Admins`");
    // Retrieve records from the 'healthcare_providers' table
    $providersResult = mysqli_query($db, "SELECT * FROM `healthcare_provider` WHERE `status` <> 'rejected' ");
    // Combine and shuffle the records
    $combinedRecords = array();
    if ($adminsResult->num_rows > 0) {
        while ($row = $adminsResult->fetch_assoc()) {
            $row['Job'] = ''; // Set an empty value for Job column
            $combinedRecords[] = $row;
        }
    }
    if ($providersResult->num_rows > 0) {
        while ($row = $providersResult->fetch_assoc()) {
            $combinedRecords[] = $row;
        }
    }

    shuffle($combinedRecords);
    return $combinedRecords;
}


function deleteHealthcareProviderUser($Healthcare_Provider_ID)
{   // function to delete healthcare provider from system -- AdminDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "DELETE FROM `healthcare_provider` WHERE `Healthcare_Provider_ID`=$Healthcare_Provider_ID";
    return mysqli_query($db, $sql);
}

function deleteAdminUser($Admin_ID)
{   // function to delete admin from system -- AdminDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "DELETE FROM `Admins` WHERE `Admin_ID`=$Admin_ID";
    return mysqli_query($db, $sql);
}

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/



function changeHealthcareProviderStatus($Healthcare_Provider_ID, $Status)
{   // function to change the Healthcare Provider Status in system -- AdminDashboard page

    // assign connection variable to create connection with database    
    $db = connectDB();
    $sql = "UPDATE `healthcare_provider` SET `Status`='$Status' WHERE `Healthcare_Provider_ID`=$Healthcare_Provider_ID";
    return mysqli_query($db, $sql);
}




function numOfHealthcareProvider($status)
{   // function to get the number of Healthcare Providers that Registered in system  -- Registration page

    // assign connection variable to create connection with database
    $db = connectDB();
    if ($status === "registered")
        $sql = "SELECT count(*) as count FROM healthcare_provider WHERE `Status`='registered'";
    elseif ($status === "accepted")
        $sql = "SELECT count(*) as count FROM healthcare_provider WHERE `Status`='accepted'";
    elseif ($status === "rejected")
        $sql = "SELECT count(*) as count FROM healthcare_provider WHERE `Status`='rejected'";
    else
        $sql = "SELECT count(*) as count FROM healthcare_provider";

    // get the result of the query 
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result)['count'];
}



// --------- End operations used for admin logined ---------- //


// --------- Start operations used for Healthcare Provider logined ---------- //

function isValidReg($user_id, $email)
{   // function to check if the registretion process in system is valid or not -- Registration page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "SELECT count(*) as count FROM healthcare_provider WHERE `Email` = '" . $email . "' OR `Healthcare_Provider_ID` = '" . $user_id . "'";
    // get the result of the query 
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result)['count'];
}



function register($First_name, $Last_name, $Email, $Password, $Phone, $Healthcare_Provider_ID, $Job_name, $Hospital)
{   // function to register user to system -- Registration page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "INSERT INTO `healthcare_provider`(`First_name`, `Last_name`, `Email`, `Password`, `Phone`, `Healthcare_Provider_ID` , `Job_name` , `Hospital`) VALUES ('$First_name','$Last_name','$Email','$Password','$Phone','$Healthcare_Provider_ID','$Job_name','$Hospital')";
    // get the result of the query 
    return mysqli_query($db, $sql);
}


function resetPassword($Healthcare_Provider_ID, $Password)
{   // function to reset password of Healthcare Provider  in the system -- Reseted page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query
    $sql = "UPDATE `healthcare_provider` SET  `Password`='$Password' WHERE `Healthcare_Provider_ID`='$Healthcare_Provider_ID'";
    return mysqli_query($db, $sql);
}

function user_login($Email, $Password)
{   // function to login user to system -- Login page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "SELECT `Healthcare_Provider_ID` FROM healthcare_provider WHERE `Email` = '" . $Email . "' AND `Password` = '" . $Password . "' AND `Status` = 'accepted' ";
    // get the result of the query 
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row['Healthcare_Provider_ID'])) {
        unset($_COOKIE);
        setcookie('user_id', $row['Healthcare_Provider_ID'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/



function emailCheck($Email)
{   // function to check from entered email fro health care providers in system -- HPDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT * FROM `healthcare_provider` WHERE `Email` = '" . $Email . "'");
    // print_r($result);
    if ($result->num_rows > 0)
        return mysqli_fetch_assoc($result)["Healthcare_Provider_ID"];
    else {
        return false;
    }
}

function getAssignedPetientsToHProvider($Assign_Healthcare_Provider_ID)
{   // function to  get all Patients assigned to health care providers in system -- HPDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT * FROM `patient` WHERE `Assign_HProvider_id` = '$Assign_Healthcare_Provider_ID' AND( SELECT COUNT(*) FROM `patient_health_records` WHERE patient.National_ID = patient_health_records.Patient_id ) > 0;");
    $AssignedPatients = array();
    while ($row = mysqli_fetch_array($result)) {
        $AssignedPatients[] = $row;
    }
    return $AssignedPatients;
}


function getHProviderProfileInfo($Healthcare_Provider_ID)
{   // function to  get healthcare provider Info. in system -- HPDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "SELECT * FROM `healthcare_provider` where `Healthcare_Provider_ID` = $Healthcare_Provider_ID";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}


function getclickedPatientInfo($Patient_ID, $mon)
{   // function to  get  clicked Patient Info in system -- HPDashboard and AddPrescription page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT * FROM `patient_health_records` JOIN `patient` ON patient_health_records.Patient_id=patient.National_ID WHERE National_ID='$Patient_ID' AND DATE_FORMAT(`Date`, '%m-%Y') = '$mon' ORDER BY `Date` DESC;");
    $clickedPatientInfo = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $clickedPatientInfo[] = $row;
    }
    return $clickedPatientInfo;
}

function getPatientInfo($Patient_ID)
{   // function to  get patient Info. in system -- AddPrescription page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "SELECT * FROM `patient` where `National_ID` = $Patient_ID";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}


function  addPrescription($Generic_Drug_name, $Trade_Drug_name, $Prescribed_Quantity, $Prescribed_Dosage_unit, $Duration, $Refills, $Frequency_value, $Unit_per_Frequency, $Dispense_Date, $Dispensed_Quantity_by_Pack, $Instructions, $Patient_ID, $Healthcare_Provider_ID)
{   // function to Add Prescription for patient in system -- AddPrescription page

    // assign connection variable to create connection with database
    $db = connectDB();
    $sql = "INSERT INTO `prescriptions`(`Generic_Drug_name`, `Trade_Drug_name`, `Prescribed_Quantity`, `Prescribed_Dosage_unit`, `Duration`, `Refills` , `Frequency_value` , `Unit_per_Frequency`, `Dispense_date`, `Dispensed_Quantity_by_pack`, `Instructions`, `Patient_id`, `HProvider_id`) VALUES ('$Generic_Drug_name', '$Trade_Drug_name', '$Prescribed_Quantity', '$Prescribed_Dosage_unit', '$Duration', '$Refills', '$Frequency_value', '$Unit_per_Frequency', '$Dispense_Date','$Dispensed_Quantity_by_Pack', '$Instructions','$Patient_ID','$Healthcare_Provider_ID')";
    // get the result of the query 
    return mysqli_query($db, $sql);
}



function getPrescriptions($Healthcare_Provider_ID)
{   // function to  get all Prescriptions that added by Healthcare_Provider for patients in the system -- Prescriptions page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT prescriptions.*, concat(patient.First_name,' ',patient.Last_name) AS patient_name ,concat(healthcare_provider.First_name,' ',healthcare_provider.Last_name) AS hprovider_name , healthcare_provider.First_name, healthcare_provider.Last_name FROM prescriptions,patient,healthcare_provider where prescriptions.Patient_id=patient.National_ID AND prescriptions.HProvider_id=healthcare_provider.Healthcare_Provider_ID AND prescriptions.HProvider_id='$Healthcare_Provider_ID'");
    $Prescriptions = array();
    while ($row = mysqli_fetch_array($result)) {
        $Prescriptions[] = $row;
    }
    return $Prescriptions;
}


function updateHProviderProfile($Healthcare_Provider_ID, $First_name, $Last_name, $Email, $Password, $Phone, $Job_name, $Hospital, $first_id)
{   // function to update Healthcare Provider profile Info. in the system -- Profile page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query
    $sql = "UPDATE `healthcare_provider` SET `Healthcare_Provider_ID`='$Healthcare_Provider_ID',`First_name`='$First_name',`Last_name`='$Last_name', `Email`='$Email', `Password`='$Password', `Phone`='$Phone', `Job_name`='$Job_name', `Hospital`='$Hospital' WHERE `Healthcare_Provider_ID`=$first_id";
    return mysqli_query($db, $sql);
}

function getHProviderNotifications($Healthcare_Provider_ID)
{   // function to  get new Notifications for Healthcare_Provider  in the system -- Notifications page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT * FROM `notifications` WHERE `HProvider_id`='$Healthcare_Provider_ID';");
    $Notifications = array();
    while ($row = mysqli_fetch_array($result)) {
        $Notifications[] = $row;
    }
    return $Notifications;
}

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/


function seeNotification($seenId)
{   // function to change status of Notification  in the system -- HPDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query
    $sql = "UPDATE `notifications` SET  `Status`='old' WHERE `Notification_ID`='$seenId'";
    return mysqli_query($db, $sql);
}


function getDateManths($Patient_ID)
{   // function to  get month of patient records  in the system -- HPDashboard page

    // assign connection variable to create connection with database
    $db = connectDB();
    // get the result of the query 
    $result = mysqli_query($db, "SELECT DATE_FORMAT(`Date`, '%m-%Y') mon_year, count(month(Date)) mon_days FROM `patient_health_records` where Patient_id='$Patient_ID' GROUP BY month(Date) ORDER BY mon_year DESC");
    $Months = array();
    while ($row = mysqli_fetch_array($result)) {
        $Months[] = $row;
    }
    return $Months;
}

// --------- End operations used for Healthcare Provider logined ---------- //

// /////////////////////////////////////////////////////////////////////

/*
 * Copyright © 2026 COPD GUARD - Health Management System (Dashboard)
 * All rights reserved.
 * Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev (abdulrahmanfadhl@gmail.com)
*/