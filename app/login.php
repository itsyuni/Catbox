<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/DB.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/UserInfo.php");

if (isset($_POST['loginaccount'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ip = UserInfo::get_ip();
    $versionos = UserInfo::get_os();
    $browser = UserInfo::get_browser();
    $twofa_code_on = DB::query('SELECT 2fa_code_on FROM users WHERE username=:username', array(':username'=>$username))[0]['twofa_code_on'];

    if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

        if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
            if (!$twofa_code_on) {

                header("Location: http://{$_SERVER['SERVER_NAME']}/app/menu");
                $cstrong = True;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                DB::query('INSERT INTO login_tokens VALUES (\'0\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
            } else {
                header("Location: http://{$_SERVER['SERVER_NAME']}/app/2fa");
                $cstrong = True;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                DB::query('INSERT INTO 2fa_login_tokens VALUES (\'0\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                setcookie("SNID2FA", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie("SNID2FA_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
            }
           
                } else {
                    echo '<br>
                    <div class="main">
                        <div class="alert alert-dangernew" role="alert">
                           Неправильный логин или пароль!
                          </div>
                        </div>';
            }

    } else {
        echo '<br>
        <div class="main">
            <div class="alert alert-dangernew" role="alert">
               Неправильный логин или пароль!
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
    <link rel="stylesheet" href="/static/css/login.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<style>
    a,
span,
h1,
h2,
h3,
h4,
h5,
h6,
p {
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
.btn-login {
    background-color: rgba(29, 59, 31, 0.5);
    border-radius: 10px;
    color: #fff;
    font-family: Avenir Next Cyr;
    color: aliceblue;
    font-weight: 500;
    backdrop-filter: blur(20px);
}

.btn-login:hover,
.btn-login:active {
    background-color: rgba(64, 138, 69, 0.5);
    color: #fff;
}

.btn-tost {
    background-color: rgba(255, 118, 27, 0.5);
    border-radius: 10px;
    color: #fff;
    font-family: Avenir Next Cyr;
    color: aliceblue;
    font-weight: 500;
    backdrop-filter: blur(20px);
}

.btn-tost:hover,
.btn-tost:active {
    background-color: rgba(255, 151, 81, 0.5);
    color: #fff;
}
</style>
<body>
    <div class="main">
        <br><br><br>
        <p class="login__header"><b>Вход в аккаунт BRXPass(CBXID)</b></p>
        <br>
        <div class="content">
            <br><br>
            <form action="login" method="post">
            <div class="inputs__group">
                <p class="input__slider">Имя пользователя</p>
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <p class="input__slider">Пароль</p>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <br>
                <div class="d-grid gap-2">
                    <button name="loginaccount" class="btn btn-login" type="submit">Войти в аккаунт</button>
                    <button name="loginaccount" class="btn btn-tost" type="submit">Войти с помощью TostID</button>
                </div>
                <br><br>
            </div>
            </form>
        </div>
        <br><br><center><a href="/app/reg">Ещё не зарегистрированы?</a></center>
        <center>
            <a href="/app/recovery">Я забыл пароль от аккаунта</a>
        </center>
    </div>
</body>
</html>