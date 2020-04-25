<?php
// include("config.php");
if (session_id() == '') {
    session_start();
    $_SESSION['loginerrorFlag'] = FALSE;
    $_SESSION['registererrorFlag'] = FALSE;
}

if (isset($_SESSION['username']) && $_SESSION["loggedin"] == true) {
    header("location: dashboard.php");
    exit;
}

$myusername = '';
$mypassword = '';
$myregisterusername = '';
$myregisterpassword = '';
$myregisteremail = '';
$myregisteraddress = '';
$myregisterusertype = '';
$loginerrors = array('username' => '', 'password' => '');
$registrationerrors = array('name' => '', 'email' => '', 'password' => '', 'confirm_password' => '', 'location' => '', 'user_type' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    // Login Check 
    if (isset($_POST['username'])) {
        if (empty($_POST['username'])) {
            $loginerrors['username'] = 'Username is required';
            $_SESSION['loginerrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myusername = htmlspecialchars($_POST['username']);
        }
        if (empty($_POST['password'])) {
            $loginerrors['password'] = 'Password is required';
            $_SESSION['loginerrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $mypassword = htmlspecialchars($_POST['password']);
        }
    }
    if (isset($_POST['registeremail'])) {
        // User Full Name
        if (empty($_POST['registerfullname'])) {
            $registrationerrors['name'] = "Name is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisterusername = htmlspecialchars($_POST['registerfullname']);
        }
        // Email
        if (empty($_POST['registeremail'])) {
            $registrationerrors['email'] = "Email is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisteremail = htmlspecialchars($_POST['registeremail']);
            if (!filter_var($myregisteremail, FILTER_VALIDATE_EMAIL)) {
                $registrationerrors['email'] = 'Email Invalid Format';
            }
        }
        // Password
        if (empty($_POST['registerpassword'])) {
            $registrationerrors['password'] = "Password is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisterpassword = htmlspecialchars($_POST['registerpassword']);
            // Validate password strength with regex
            $uppercase = preg_match('@[A-Z]@', $myregisterpassword);
            $lowercase = preg_match('@[a-z]@', $myregisterpassword);
            $number    = preg_match('@[0-9]@', $myregisterpassword);
            $specialChars = preg_match('@[^\w]@', $myregisterpassword);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($myregisterpassword) < 5) {
                $errors['password'] = 'Password should be at least 8 characters and max of characters in length and should include at least one upper case letter, one number, and one special character.';
            }
        }
        // Repeat-Password
        if (empty($_POST['registerrepeatpassword'])) {
            $registrationerrors['confirm_password'] = "Password is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisterrepeatpassword = htmlspecialchars($_POST['registerrepeatpassword']);
        }

        if ($myregisterpassword != $myregisterrepeatpassword) {
            $registrationerrors['password'] = "Passwords do not match!";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        }
        // Address
        if (empty($_POST['registeraddress'])) {
            $registrationerrors['location'] = "Address is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisteraddress = htmlspecialchars($_POST['registeraddress']);
        }
        // User Type : Customer/Admin
        if (empty($_POST['registerusertype'])) {
            $registrationerrors['user_type'] = "User Type is required";
            $_SESSION['registererrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        } else {
            $myregisterusertype = htmlspecialchars($_POST['registerusertype']);
        }
    }
    if (array_filter($registrationerrors)) {
        // Registration Error
        $error = '';
        foreach ($registrationerrors as $row) {
            $error = $error . " " . $row;
        }
    } else if (array_filter($loginerrors)) {
        // Login Error
        $error = '';
        foreach ($loginerrors as $row) {
            $error = $error . " " . $row;
        }
    } else if (!empty($myusername) && !empty($mypassword)) {
        $sql = "SELECT * FROM users  WHERE username ='" . $myusername . "' AND password= '" . $mypassword . "'";
        $result = mysqli_query($db, $sql);
        $logincount = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($logincount == 1) {
            while ($row = mysqli_fetch_array($result)) {
                // echo $row['RoleID'];
                if ($row['RoleID'] == 1) {
                    header("location: CustomerMenuPage.php");
                    $_SESSION['username'] = $myusername;
                    $_SESSION['loggedin'] = TRUE;
                    exit;
                } else {
                    header("location: dashboard.php");
                    $_SESSION['username'] = $myusername;
                    $_SESSION['loggedin'] = TRUE;
                    exit;
                }
                break;
            }
            $_SESSION['username'] = $myusername;
            $_SESSION['loggedin'] = TRUE;
            // header("location: customer.php")
            exit;
        } else {
            $error = "Your Login Name or Password is invalid";
            $_SESSION['loginerrorFlag'] = TRUE;
            $_SESSION['loggedin'] = FALSE;
        }
    } else {
        if (!empty($myregisterusername) && !empty($myregisteremail) && !empty($myregisterpassword) && !empty($myregisterpassword) && !empty($myregisterrepeatpassword) && !empty($myregisteraddress) && !empty($myregisterusertype)) {
            $sql = "SELECT * FROM registration  WHERE username ='" . $myregisteremail . "'";
            $result = mysqli_query($db, $sql);
            $registercount = mysqli_num_rows($result);
            // If result matched $myusername and $mypassword, table row must be 1 row
            if ($registercount > 0) {
                $error = "Someone already has that username";
                $_SESSION['registererrorFlag'] = TRUE;
                $_SESSION['loggedin'] = FALSE;
            } else {
                $sql = "INSERT INTO `registration`(`Name`, `Address`, `UserName`, `Password`, `RoleID`) VALUES ('" . $myregisterusername . "','" . $myregisteraddress . "','" . $myregisteremail . "','" . $myregisterpassword . "','" . $myregisterusertype . "')";
                $result = mysqli_query($db, $sql);
                if ($result > 0 && $myregisterusertype == 2) {
                    $sql = "Select RegID from `registration` where UserName='" . $myregisteremail . "'";
                    // echo $sql;
                    $RegIDresult = mysqli_query($db, $sql);
                    while ($row = $RegIDresult->fetch_assoc()) {
                        $RegID = $row['RegID'];
                        break;
                    }
                    echo "<script>console.log(" . $RegID . ");</script>";

                    $sql = "INSERT INTO `users`(`Name`, `UserName`, `Password`,`RegID`, `RoleID`) VALUES ('" . $myregisterusername . "','" . $myregisteremail . "','" . $myregisterpassword . "','" . $RegID . "','" . $myregisterusertype . "')";
                    // echo $sql;
                    $result = mysqli_query($db, $sql);

                    $sql = "Select (UserID) from `users` where RegID='" . $RegID . "'";
                    $UserIDresult = mysqli_query($db, $sql);
                    while ($row = $UserIDresult->fetch_assoc()) {
                        $UserID = $row['UserID'];
                        break;
                    }
                    $sql = "INSERT INTO `profile`(`UserID`,`FullName`, `emailid`, `address`,`city`) VALUES ('" . $UserID . "','" . $myregisterusername . "','" . $myregisteremail . "','" . $myregisteraddress . "','" . $myregisteraddress . "')";
                    // echo $sql;
                    $result = mysqli_query($db, $sql);

                    header("Location: https://nxb4645.uta.cloud/bysani_ciudad/HTML/dashboard.php");
                    $_SESSION['username'] = $myregisteremail;
                    $_SESSION['loggedin'] = TRUE;
                    // include("email.php");

                    exit;
                } else if ($result > 0 && $myregisterusertype == 1) {
                    $sql = "Select Max(Regid) as regid from `registration`";
                    $RegIDresult = mysqli_query($db, $sql);
                    while ($row = $RegIDresult->fetch_assoc()) {
                        $RegID = $row['regid'];
                        break;
                    }
                    $sql = "INSERT INTO `users`(`Name`, `UserName`, `Password`,`RegID`, `RoleID`) VALUES ('" . $myregisterusername . "','" . $myregisteremail . "','" . $myregisterpassword . "','" . $RegID . "','" . $myregisterusertype . "')";
                    // echo $sql;
                    $result = mysqli_query($db, $sql);
                    $_SESSION['username'] = $myregisteremail;
                    $_SESSION['loggedin'] = TRUE;
                    // include("email.php");
                    header("location: CustomerMenuPage.php");
                    exit;
                }
            }
        }
    }
}
