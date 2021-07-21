<?php

include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

$idflname = isLoggedIn();
$flname_true = DB::query('SELECT flname_true FROM users WHERE id=:id', array(':id'=>$idflname))[0]['flname_true'];
if (!$flname_true) {
        header("Location: /app/flname_action");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Главная</title>
    <link rel="stylesheet" href="/static/css/root__new.css">
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
    <br><br><br><br>
    <div class="main">
    <div class="alert alert-primarynew" role="alert">
            Хотите ещё больше контента? Мы представили CBXMarketplace.
        </div>
        <br><br>
        <p class="login__header"><b>Наши продукты</b></p>
        <br>
    </div>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <style>
                    .card {
                        border-radius: 30px;
                        border: none;
                        background-color:#1e2f4e;
                    }
                    .card>img {
                        border-radius: 30px 30px 0px 0px;
                    }
                    .card-text,
                    .card-title
                    {
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
                    .btn-github {
                        background-color: #161b22;
                        border-radius: 10px;
                        color: #fff;
                    }
                    .btn-github:hover,
                    .btn-github:active {
                        background-color: #1c2128;
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
                    <img class="card" src="/static/images/cards__menu/apps.png" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxApps</h4></center>
                        <hr>  
                        <p class="card-text">Каталог приложений и большинства сервисов уже в кармане!</p>   
                        <center><a href="apps" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/drive__100gb.png" alt="DuckHunt">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxCloud</h4></center>  
                        <hr>
                        <p  class="card-text">Ваше личное облачное хранилище файлов в кармане - 100 гигабайт бесплатно.</p>   
                        <center><a href="https://cloud.catbox-gr.ru" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/cards__menu/games.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxGames</h4></center>  
                        <hr>
                        <p class="card-text">Вам скучно? Нечем заняться? Тогда вам нужен CatboxGames!</p>   
                        <center><a href="games" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/proxy.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxProxy</h4></center>  
                        <hr>
                        <p class="card-text">Заходите на подозрительные сайты без риска утечки информации.</p>   
                        <center><a href="webproxy/" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/maps.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxMaps</h4></center>  
                        <hr>
                        <p class="card-text">Безопасно стройте маршруты с нашей картой.</p>   
                        <center><a href="maps" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/images.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxImages</h4></center>  
                        <hr>
                        <p class="card-text">Ваше личное безлимитное пространство для фотографий.</p>   
                        <center><a href="https://images.catbox-gr.ru/" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
            <div class="card">
                <img class="card" src="/static/images/cards__menu/analytics.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxAnalytics</h4></center>  
                        <hr>
                        <p class="card-text">Следите за статистикой сайтов в одном месте.</p>   
                        <center><a href="https://analytics.catbox-gr.ru/" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <img class="card" src="/static/images/cards__menu/links.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxLinks</h4></center>  
                        <hr>
                        <p class="card-text">Длинна яссылка это некрасиво, но её можно сократить в CatboxLinks!</p>   
                        <center><a href="https://ctli.ru/" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <img class="card" src="/static/images/cards__menu/uptimer.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxUptimer</h4></center>  
                        <hr>
                        <p class="card-text">Следите за стабильностью и статусом сайтов в CatboxUptimer.</p>   
                        <center><a href="https://uptimer.catbox-gr.ru/" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="main">
        <br><br>
        <p class="login__header"><b>Уже скоро</b></p>
        <br>
    </div>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/sites.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxSites</h4></center>  
                        <hr>
                        <p class="card-text">Удобный и бесплатный конструктор сайтов.</p>   
                        <center><a href="#" class="btn btn-secondary">Скоро</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/mail.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CatboxMail</h4></center>  
                        <hr>
                        <p class="card-text">Посылайте электронную почту в считанные секунды.</p>   
                        <center><a href="#" class="btn btn-secondary">Скоро</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="main">
        <br><br>
        <p class="login__header"><b>Нужно ещё больше контента?</b></p>
        <br>
    </div>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/playground.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CBXMarketplace</h4></center>  
                        <hr>
                        <p class="card-text">Каталог других сервисов, которые возможно вам понадобятся.</p>   
                        <center><a href="marketplace" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/msbin.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">MS-BIN</h4></center>  
                        <hr>
                        <p class="card-text">Эксперементируйте с виртуальным терминалом Catbox!</p>   
                        <center><a href="msbin" class="btn btn-serverst">Перейти</a></center>
                        <center><a href="https://github.com/CatboxGroup/ms-bin" class="btn btn-github">Посмотреть на Github</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <img class="card" src="/static/images/cards__menu/counts.png" alt="Emoji MineSweeper">
                    <div class="card-body">
                        <center><h4 class="card-title">CBXCounts</h4></center>  
                        <hr>
                        <p class="card-text">Следите за статистикой ваших социальных сетей в CBXCounts.</p>   
                        <center><a href="https://cbxcounts.ml" class="btn btn-serverst">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br><br>
</html>