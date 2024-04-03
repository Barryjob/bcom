<?php
    session_start(); // start session
    session_regenerate_id(); // regenerating for security issues
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
    header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page


    $thename='Loan Application'; 
    $page = basename($_SERVER['SCRIPT_NAME']);
    $website_auto_url =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip_address=$_SERVER['REMOTE_ADDR']; //ip used
    $sysname=gethostname();//computer used
    /////////////////////////////////////////////////////////////////

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";

    // Create Connection //
    $conn = mysqli_connect($main_server, $server_username, $server_password) or die("connection error");
    mysqli_select_db($conn, "bcom_loan");

?>


<?php 
    // variable declaration  //
    $fullname=trim(strtoupper($_POST['fullname']));
    $loan_amount=trim($_POST['loan_amount']);
    $loan_duration=trim($_POST['loan_duration']);
    $loan_rate=(1.5);
?>
