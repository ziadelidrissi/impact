<?php
session_start();
require('controller/form_controller.php');
require('controller/admin_controller.php');

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    switch ($_GET['action']) {
        case 'signInForm':
            signInForm();
            break;
        case 'usedNom':
            signInForm();
            break;
        case 'usedEmail':
            signInForm();
            break;
        case 'wrongMdp':
            signUpForm();
            break;
        case 'emptyForm':
            signUpForm();
            break;
        case 'signInTraitement':
            signInTraitement();
            break;
        case 'FirstSignUp':
            signUpForm();
            break;
        case 'signUpForm':
            signUpForm();
            break;
        case 'signUpTraitement':
            signUpTraitement();
            break;
        case 'unactiveUser':
            activeUser();
            break;
        case 'signedUp':
            signedUp();
            break;
        case 'logOut':
            logOut();
            break;
        default:
            form();
            break;
    }
} else {  
    if(isset($_GET['admin']) && (!empty($_SESSION) && $_SESSION['id_role'] == 2)){
        require_once('admin.php');
    } else {
        form();
    }
}


?>