<?php

//CHeck whether the user is logged in or not
if (!isset($_SESSION['user'])) //IF user session is not set
{
    //User is not logged in
    $_SESSION['no-login'] = "<div class='error text-center'>Hãy đăng nhập.</div>";
    //REdirect to Login Page
    header('location: login.php');
}
