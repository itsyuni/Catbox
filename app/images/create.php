<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");
use \api\mofh\Client;
$username = $_POST['username'];
$password = $_POST['password'];
$email = DB::query('SELECT email FROM users WHERE id=:id', array(':id'=>$id_user))[0]['email'];
$id_user = isLoggedIn();
$ftp_host = 'ftpupload.net';
$ftp_username = $username;
$ftp_password = $password;
$ftp_port = '21';
$ftp_location = 'uk';

$characters = 'abcdefghijklmnopqrstuvwxyz';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;

$client = Client::create([
    'apiUsername' => 'uyLwwW1OuGpigKRr6pCah2DsIHN5nlUi80EPZcY7Fe6uvelM3l8Xr7v0mvmTz59Rl85xARuxbBSIDpigtAk7Yw7Ub1qbTsNi6RJesGm6zrR7GKe541mDLbjqAie1x59zY6uE6EubCum1jRCS8SibBaj3qfj1fj7BDsTQpzU3ALWcD7PIG0pkOGW9iVLnkrIBivbZSZopNJTVk2JeRGDickeLAHc1lhE1Q374AJuATyVE7ViT2EFoy94Sv0ncAqE',
    'apiPassword' => 'YYkGhRAP5pr7JX66G3ctLbR1eQzNS38Lr7WIxfw651oX0l4zo642gfEEx013grbxR8kJgFLGRzv2J6U8oqyJiXpZofLsGKHmnE5TMoT2sF57BBsXYcfFVcDTqoFE7jCXqd7UxX29HJ4T8GmAHwXrZGPGItsaRt197oRRrHPK51Qrr87WyuvoZ1aw0BpaQcFoyNwEBTH4yUHFlqAV6artwYUj61lVoBP2Vi99RCdHB2RTurOkG0m7lAgUlxEJdSW',
    'plan' => 'my_plan',
]);

$request = $client->createAccount([
    'username' => $username,
    'password' => $password,
    'domain' => $randomString.'catboximages.ml',
    'email' => $email,
    'plan' => 'Always free',
]);
$response = $request->send();

if ($response->isSuccessful()) {
    DB::query('INSERT INTO images_ftp_accounts VALUES (\'0\', :id_user, :ftp_host, :ftp_username, :ftp_password, :ftp_port, :ftp_location)', array(':id_user'=>$id_user, ':ftp_host'=>$ftp_host, ':ftp_username'=>$ftp_username, ':ftp_password'=>$ftp_password, ':ftp_port'=>$ftp_port, ':ftp_location'=>$ftp_location));
    header("/app/images");
} else {
   echo '<br><br><br>
   <div class="main">
       <div class="alert alert-dangernew" role="alert">
       $response->getMessage();
         </div>
       </div>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Авторизация</title>
    <link rel="stylesheet" href="/static/css/header__new.css">
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background-image: url(/static/images/cards2__ecosystem__background.jpg);
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
            background-image: url(/static/images/cards4__ecosystem__background.jpg);
            background-position: top;
            background-size: cover;
        }
        .username,
        .password {
            border-radius: 10px;
        }
        .btn-login {
            background-color: #006079;
            border-radius: 10px;
            color: #fff;
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 500;
        }
        .btn-login:hover,
        .btn-login:active {
            background-color: #009ec5;
            color: #fff;
        }
        @media screen and (min-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                margin-right: 100px;
                margin-left: 100px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 50px;
                margin-left: 50px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 30px;
                transition: 0.3s;
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
                transition: 0.3s;
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
    <header class="l-header">
        <nav class="nav bd-grid">
                <a href="/" class="nav__logo"><img class="nav__logo__img" src="/static/images/catboxlogo__white__beta.png" width="500" height="300"></a>
    
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="/app" class="nav__link active">Главная</a></li>
                        <li class="nav__item"><a href="https://tostmedia.com" class="nav__link">Перейти в TostMedia</a></li>
                        <li class="nav__item"><a href="/app/account" class="nav__link">Мой аккаунт</a></li>
                    </ul>
                </div>
    
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <br><br>
    <div class="main">
        <br><br><br>
        <p class="login__header"><b>Создание аккаунта CatboxImages</b></p>
        <br>
        <div class="content">
            <br><br>
            <form action="login" method="post">
            <div class="inputs__group">
                <p class="input__slider">Имя</p>
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <p class="input__slider">Пароль</p>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <br>
                <div class="d-grid gap-2">
                    <button name="loginaccount" class="btn btn-login" type="submit">Создать аккаунт</button>
                </div>
                <br><br>
            </div>
            </form>
        </div>
        <br><br>
    </div>
</body>
</html>