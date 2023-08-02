<?php

require('./config/connect_bddClass.php');
require('./model/User.php');
require_once('model/Article.php');

function form() {
    require('view/form.php');
}

function signInForm(){
        require('view/form.php');
}

function signInTraitement() {
    $userRepo = new UserRepository();
    $user = new User();
    if($user->createToSignIn($_POST)) {
        $userTmpNom = $userRepo->getUserByNom($_POST['nom']);
        $userTpmEmail = $userRepo->getUserByEmail($_POST['email']);
        if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $userTpmEmail == []) {
            if(!empty($_POST['nom']) && preg_match('/^[a-zA-Z]+$/', $_POST['nom']) && $userTmpNom == []) {
                if (!empty($_POST['mdp']) && preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$_POST['mdp']))  {
                    if ($_POST['confirm_mdp'] == $_POST['mdp']) {
                    $user->mdp = password_hash($user->mdp, PASSWORD_BCRYPT);
                    $userRepo->insertUser($user);
                    // var_dump($user);
                    header('Location: ?action=FirstSignUp&token=' . urlencode($user->token));
                    } else {
                        // var_dump("mdp differents");
                        header('Location:?action=unmatchingMdp#create-account');
                    }
                } else {
                    // var_dump("mauvais format mdp");
                    header('Location:?action=invalidMdp#create-account');
                }
            } else {
                if ($userTmpNom !== []) {
                    // var_dump("nom existant"); 
                    header('Location: ?action=usedNom#create-account');
                } else if (!preg_match('/^[a-zA-Z]+$/', $_POST['nom'])) {
                    // var_dump("mauvais format");
                    header('Location:?action=invalidNom#create-account');
                }
            }
        } else {
            if ($userTpmEmail !== []) {
                // var_dump("email existant"); 
                header('Location: ?action=usedEmail#create-account');
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // var_dump("mauvais format");
                header('Location:?action=invalidEmail#create-account');
            }
        }
    } else {
        // var_dump("champ vide");
        header('Location: ?action=emptyForm#create-account');
    }
}



function signUpForm(){
    require('view/form.php');
}

function signUpTraitement() {
    $userRepo = new UserRepository();
    $user = $userRepo->getUserByNom($_POST['nom']);
    if (!empty($_POST)) {
        if($user->actif == 1) {
            if($user != []) {
                if (password_verify($_POST['mdp'], $user->mdp)) {
                    $_SESSION['id_user'] = $user->id;
                    $_SESSION['nom_user'] = $user->nom;
                    $_SESSION['email_user'] = $user->email;
                    $_SESSION['id_role'] = $user->id_role;
                    // var_dump($user);
                    // var_dump($_SESSION);
                    header('Location: ?action=signedUp');
                } else {
                    header('Location: ?action=wrongMdp');
                }
            } else {
                // user inexistant
                header('Location: ?action=unknownUser');
            }
        } else {
            if (!$user) {
                // user inexistant
                header('Location: ?action=unknownUser');
            } else {
                header('Location: ?action=CantSignUp&token=' . urlencode($user->token));
            }
        }
    } else {
        // champ vide
        header('Location: ?action=emptyForm');
    }
}

function activeUser() {
    $userRepo = new UserRepository();
    $token = $_GET['token'] ?? null;
    $user = null;
    if (!is_null($token)) {
        $user = $userRepo->getUserByToken($token);
        if ($user) {
            $userRepo->checkActivation($token);
            var_dump('User activated');
        } else {
            // user inexistant
            header('Location: ?action=unknownUser');
        }
    } else {
        // user inexistant
        header('Location: ?action=unknownUser');
    }
    if ($user !== false) {
        // user inexistant
        header('Location: ?action=signUpForm');
    }
}

function signedUp() {
    if (!isset($_SESSION['id_user'])) {
        header("Location: ?action=unSignedUp");
    } else {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getArticles();

        require('view/blog.php');
    }
}

function logOut() {
    require('view/logout.php');
}




?>