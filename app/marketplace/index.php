<?php

/*include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

$idflname = isLoggedIn();
$flname_true = DB::query('SELECT flname_true FROM users WHERE id=:id', array(':id'=>$idflname))[0]['flname_true'];
if (!$flname_true) {
        header("Location: /app/flname_action");
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Главная</title>
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/css/header__loggedd.css">
    <link rel="stylesheet" href="https://webuildthemes.com/guidebook/assets/css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <style>
        .login__header {
            color: aliceblue;
        }
        
        body {
            background-color: #141c2b;
            font-family: SF UI Text;
        }
        
        .bg-dark-pro {
            background-color: #0d121b;
        }
        
        .alert-primarynew {
            background-color: rgb(0, 26, 83);
            border-color: rgb(104, 70, 255);
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
            border-radius: 15px;
        }
        
        .alert-warningnew {
            background-color: rgb(255, 241, 163);
            border-color: rgb(255, 174, 0);
            font-family: Avenir Next Cyr;
            color: rgb(68, 33, 0);
            font-weight: 300;
            border-radius: 15px;
        }
    </style>
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Упс!</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Эта функция ещё на стадии разработки, следите за новостями!
            </div>
        </div>
    </div>
    <script src="/static/js/header.js" type="text/javascript"></script>
    <br><br><br><br>
    <div class="main">
        <div class="alert alert-primarynew" role="alert">
            Новинка: CBXMarketplace! Это каталог сервисов от нас и других разработчиков.
        </div>
        <div class="alert alert-warningnew" role="alert">
            Многие сервисы недоступны из-за технических проблем. Мы их постараемся решить как можно быстрее, извиняемся за доставленные неудобства!
        </div>
        <p class="login__header"><b>CBXMarketplace</b></p>
        <br>
    </div>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <style>
                    .card {
                        border-radius: 30px;
                        border: none;
                        background-color: #1e2f4e;
                    }
                    
                    .card-text,
                    .card-title {
                        color: #fff;
                    }
                    
                    .btn-secondary {
                        background-color: #1e2f4e;
                        border-radius: 10px;
                    }
                    
                    .btn-secondary:hover,
                    .btn-secondary:active {
                        background-color: #435c8b;
                    }
                    
                    hr {
                        color: rgb(0, 0, 0);
                    }
                    
                    .btn-serverst {
                        background-color: #5d96ff;
                        border-radius: 10px;
                        color: #fff;
                    }
                    
                    .btn-serverst:hover,
                    .btn-serverst:active {
                        background-color: #aac8ff;
                        color: #fff;
                    }
                    
                    @media screen and (min-width: 768px) {
                        .main {
                            margin-right: 100px;
                            margin-left: 100px;
                        }
                        .login__header {
                            font-size: 30px;
                        }
                    }
                    
                    @media screen and (min-width: 1250px) {
                        .main {
                            margin-right: 310px;
                            margin-left: 310px;
                        }
                        .login__header {
                            font-size: 35px;
                        }
                    }
                    
                    @media screen and (max-width: 768px) {
                        .main {
                            margin-right: 40px;
                            margin-left: 40px;
                        }
                        .login__header {
                            font-size: 25px;
                        }
                    }
                    
                    .card-title {
                        font-family: Avenir Next Cyr !important;
                        color: aliceblue !important;
                    }
                    
                    .card-text {
                        font-family: Avenir Next Cyr !important;
                        color: aliceblue !important;
                        font-weight: 300 !important;
                    }
                </style>
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/whois.png" alt="2048">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">CatboxWhois</h4>
                        </center>
                        <hr>
                        <p class="card-text">Проверяйте информацию о доменах с опмощью нашего сервиса</p>
                        <center><a href="/app/whois" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/partner__1.png" alt="2048">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Сервис партнёра</h4>
                        </center>
                        <hr>
                        <p class="card-text">Сервис партнёра</p>
                        <br>
                        <center><a href="#" class="btn btn-secondary">Скоро</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/partner__2.png" alt="2048">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Сервис партнёра</h4>
                        </center>
                        <hr>
                        <p class="card-text">Сервис партнёра</p>
                        <br>
                        <center><a href="#" class="btn btn-secondary">Скоро</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/addelement.png" alt="2048">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Добавить свой сервис</h4>
                        </center>
                        <hr>
                        <p class="card-text">Может, выхотите добавить свой сервис сюда?</p>
                        <center><a href="send-service" class="btn btn-serverst">Отправить заявку</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<br><br><br><br>

</html>