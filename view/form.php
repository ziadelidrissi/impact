<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <div class="main">

    <!-- Sign up Form -->
    <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#create-account" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form id="signup" action="?action=signUpTraitement" method="POST" class="register-form" id="login-form">
                                <?php if (isset($_GET['action']) && ($_GET['action'] == 'FirstSignUp' || $_GET['action'] == 'CantSignUp')) { 
                                    $url = $_SERVER['REQUEST_URI'];
                                    $token_start = strpos($url, 'token=') + 6;
                                    $token_end = strpos($url, '#', $token_start);
                                    if ($token_end === false) {
                                        $token_end = strlen($url);
                                    }
                                    $token = substr($url, $token_start, $token_end - $token_start);
                                ?>
                                    <div class="error">
                                        Un email vous a été envoyé. <br>
                                        Cliquez sur le lien dans votre email pour activer votre compte. <br>
                                        <a href="?action=unactiveUser&token=<?php echo urlencode($token); ?>">Activez votre compte</a>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'signUpForm') { ?>
                                <div class="error">Votre compte a été activé.</div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'unknownUser') { ?>
                                <div class="error">Ce compte n'existe pas.</div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'unSignedUp') { ?>
                                <div class="error">Connectez vous pour accéder au site.</div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom" id="your_name" required placeholder="Your Name"/>
                            </div>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'wrongMdp') { ?>
                                <div class="error">Mot de passe incorrect.</div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="mdp" id="your_pass" required placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sign in form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign in</h2>
                        <form action="?action=signInTraitement" method="POST" class="register-form" id="register-form">
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'usedNom') { ?>
                                    <div class="error">Nom déjà utilisé. Veuillez en chosir un autre.</div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'invalidNom') { ?>
                                    <div class="error">Format incorrect. Le nom doit être composé uniquement de lettres, sans aucune ponctuation ou caractère spécial.</div>                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'emptyForm') { ?>
                                <div class="error">Veuillez remplir tous les champs.</div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom" id="name" placeholder="Your Name" required/>
                            </div>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'usedEmail') { ?>
                                    <div class="error">Email déjà utilisée. Veuillez en choisir une autre.</div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'invalidEmail') { ?>
                                    <div class="error">Format incorrect. Format requis : example@mail.fr</div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'unmatchingMdp') { ?>
                                <div class="error">Les mots de passes ne correspondent pas.</div>
                                <?php } ?>
                                <?php if (isset($_GET['action']) && $_GET['action'] == 'invalidMdp') { ?>
                                    <div class="error">Le mot de passe doit contenir : une majuscule, une minuscule, un chiffre et un caractère spécial. Il doit également comporter au moins 8 caractères.</div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="mdp" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_mdp" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="./assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#already-member" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>