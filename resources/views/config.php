<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ibras');
define('DB_PASSWORD', 'test1234');
define('DB_DATABASE', 'ibrasdatabase');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>