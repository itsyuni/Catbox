<?php
include($_SERVER['DOCUMENT_ROOT'].'/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/ValidAuth.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/UserInfo.php');

if (isset($_POST['createaccount'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $ip = UserInfo::get_ip();
    $versionos = UserInfo::get_os();
    $browser = UserInfo::get_browser();
    $verified = '0';
    $twofa_code = "1111";
    $about = 'Привет, я пользователь Catbox!';
    $photourl = '/nophoto.jpg';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $key = '6LdINbsZAAAAAOAH-FklczB6vaBbAoANkKs7jCrI';
    $query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip'.$_SERVER['REMOTE_ADDR'];
    $data = json_decode(file_get_contents($query));
    if($_POST['g-recaptcha-response']) {
        
        if($data->success == true) {

            if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 5 && strlen($username) <= 25) {

                    if (strlen($fname) >= 3 && strlen($fname) <= 25) {
                        
                        if (strlen($lname) >= 3 && strlen($lname) <= 25) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 5 && strlen($password) <= 120) {

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                        DB::query('INSERT INTO users VALUES (\'0\', :username, :password, :email, :ip, :browser, :version_os, \'0\', :about, :photourl, \'1\', :fname, :lname, \'0\', \'0\', \'1\', \'0\', \'1\', :2fa_code, \'0\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':ip'=>$ip, ':browser'=>$browser, ':version_os'=>$versionos, ':about'=>$about, ':photourl'=>$photourl, ':fname'=>$fname, ':lname'=>$lname, ':2fa_code'=>$twofa_code));
                                        header("Location: http://{$_SERVER['SERVER_NAME']}/app/menu");
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                                        DB::query('INSERT INTO login_tokens VALUES (\'0\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                                        echo '<br>
                                        <div class="main">
                                            <div class="alert alert-success" role="alert">
                                               Успешная регистрация!
                                              </div>
                                            </div>';
                                } else {
                                    echo '<br>
                                    <div class="main">
                                        <div class="alert alert-dangernew" role="alert">
                                           Такая почта уже используется!
                                          </div>
                                        </div>';
                                }
                        } else {
                            echo '<br>
                            <div class="main">
                                <div class="alert alert-dangernew" role="alert">
                                  Неправильный формат почты!
                                  </div>
                                </div>';
                                }
                        } else {
                            echo '<br>
                            <div class="main">
                                <div class="alert alert-dangernew" role="alert">
                                   Пароль должен быть от 5 до 120 символов!
                                  </div>
                                </div>';
                        }
                        } else {
                            echo '<br>
                            <div class="main">
                                <div class="alert alert-dangernew" role="alert">
                                   В имени пользователя содержатся неккоректные символы!
                                  </div>
                                </div>';
                        }
                        } else {
                            echo '<br>
                            <div class="main">
                                <div class="alert alert-dangernew" role="alert">
                                   Фамилия слишком короткая.
                                  </div>
                                </div>';
                        }
                    } else {
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-dangernew" role="alert">
                               Имя слишком короткое.
                              </div>
                            </div>';
                    }
                } else {
                            echo '<br>
                            <div class="main">
                                <div class="alert alert-dangernew" role="alert">
                                   Имя пользователя должно быть от 5 до 25 символов!
                                  </div>
                                </div>';
                }

        } else {
            echo '<br>
            <div class="main">
                <div class="alert alert-dangernew" role="alert">
                   Такое имя пользователя уже используется кем-то другим!
                  </div>
                </div>';
        }
        } else {

            echo '<br>
            <div class="main">
                <div class="alert alert-dangernew" role="alert">
                   Произошла непредвиденная ошибка с RECaptcha!
                  </div>
                </div>';
        }
        } else {
            echo '<br>
            <div class="main">
                <div class="alert alert-dangernew" role="alert">
                   Кажется, вы забыли заполнить поле с RECaptcha
                  </div>
                </div>';
        }
            
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Авторизация</title>
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background-image: url(/static/images/login__header__background.jpg);
            background-position: top;
            background-size: cover;
            font-family: SF UI Text;
        }
        .input__slider {
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
        }
        a,span,h1,h2,h3,h4,h5,h6,p {
            color: aliceblue;
            font-family: SF UI Text;
            text-decoration: none;
        }
        .login__header {
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 500;
        }
        .alert-dangernew {
            background-color: rgb(83, 0, 18);
            border-color: rgb(255, 0, 64);
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
            border-radius: 15px;
        }
        .content {
            background-image: url(/static/images/login__background.jpg);
            background-position: top;
            background-size: cover;
        }
        .btn-login {
            background-color: #372d47;
            border-radius: 10px;
            color: #fff;
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 500;
        }
        .btn-login:hover,
        .btn-login:active {
            background-color: #59667e;
            color: #fff;
        }
        @media screen and (min-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
            }
            .main {
                margin-right: 100px;
                margin-left: 100px;
            }
            .inputs__group {
                margin-right: 85px;
                margin-left: 85px;
            }
            .login__header {
                font-size: 30px;
            }
        }
        @media screen and (min-width: 1250px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                margin-right: 225px;
                margin-left: 225px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 150px;
                margin-left: 150px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 35px;
                transition: 0.3s;
            }
        }
        @media screen and (max-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
            }
            .main {
                margin-right: 25px;
                margin-left: 25px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 35px;
                margin-left: 35px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 25px;
            }
        }
        .alertlog {
                width: 920px;
                height: 100px;
                border-radius: 10px;
            } 

            @media (min-width: 801px) {

                .alertlog {
                width: 920px;
                height: 100px;
                border-radius: 10px;
                } }

            @media (max-width: 1024px) {
                .alertlog {
                width: 600px;
                height: 100px;
                border-radius: 10px;
                } }
    </style>
</head>
<body>
    <div class="main">
        <br><br><br>
        <p class="login__header"><b>Регистрация</b></p>
        <br>
        <div class="content">
            <br><br>
            <form action="reg" method="post">
            <div class="inputs__group">
                <div class="row g-3">
                <div class="col-sm-6">
                      <label for="firstName" style="color: #fff;" class="form-label">Имя</label><br>
                      <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="">
                </div>
                <div class="col-sm-6">
                      <label for="lastName" style="color: #fff;" class="form-label">Фамилия</label><br>
                      <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="">
                </div>

                <p class="input__slider">Имя пользователя</p>
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <p class="input__slider">Электронная почта</p>
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <p class="input__slider">Пароль</p>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <br><br><center><div class="g-recaptcha" data-sitekey="6LdINbsZAAAAALO9X5bvdLDVmRq880kpVszCRza3"></div></center><br><br>
                <div class="d-grid gap-2">
                    <button class="btn btn-login" name="createaccount" type="submit">Зарегистрироваться</button>
                </div>
                <br><br>
                <center><p>Ваш аккаунт также привяжется к</p></center>
                <center><img src="/static/images/tost2.png" width="150px" height="90px"></center><br><br>
            </div>
            </div>
            </form>
        </div>
        <br><br><center><a href="/app/login">У вас уже есть аккаунт?</a></center><br><br><br><br><br><br>
    </div>
</body>
</html>