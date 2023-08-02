<?php
require_once('controller/admin_controller.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    switch ($_GET['action']) {
        case 'addArticleForm':
            addArticleForm();
            break;
        case 'addArticle':
            addArticle();
            break;
        default:
            admin();
            break;
    }
} else {  
    admin();
}


?>