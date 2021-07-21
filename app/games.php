<?php

include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Главная</title>
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/css/header__games.css">
    <link rel="stylesheet" href="https://webuildthemes.com/guidebook/assets/css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <style>
    body {
           background-color: #101d15;
           font-family: SF UI Text;
    }
    .bg-dark-pro {
        background-color: #0d121b;
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
    <br><br><br><br><br>
                <style>
                     a,span,h1,h2,h3,h4,h5,h6,p {
                        color: aliceblue;
                        font-family: SF UI Text;
                        text-decoration: none;
                    }
                    .hr-white {
                        color: white;
                        margin-right: 310px;
                        margin-left: 310px;
                    }
                    .card {
                        border-radius: 30px;
                        border: none;
                        background-color:#00301c;
                    }
                    .card-text,
                    .card-title
                    {
                        color: #fff;
                    }
                    .btn-secondary {
                        background-color: #00301c;
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
                    .btn-games {
                        background-color: #009c15;
                        border-radius: 10px;
                        color: #fff;
                    }
                    .btn-games:hover,
                    .btn-games:active {
                        background-color: #18d100;
                        color: #fff;
                    }
                    @media screen and (min-width: 768px) { 
            .main {
                margin-right: 0px;
                margin-left: 100px;
            }
            .login__header {
                font-size: 30px;
            }
        }
        @media screen and (min-width: 1250px) {
            .main {
                margin-right: 0px;
                margin-left: 310px;
            }
            .login__header {
                font-size: 35px;
            }
        }
        @media screen and (max-width: 768px) {
            .main {
                margin-right: 0px;
                margin-left: 40px;
            }
            .login__header {
                font-size: 25px;
            }
        }
                </style>
    <div class="main">
        <p class="login__header"><b>Игры от нашей экосистемы</b></p>
    </div>
    <hr class="hr-white"><br><br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/hg.png" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">Hardcore Game</h4></center>
                        <hr>  
                        <p class="card-text">Сможете ли вы пройти все уровни с первого раза?</p>   
                        <center><a href="https://saturn-games.ml/" class="btn btn-games">Скачать</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="main">
        <p class="login__header"><b>Игры от других авторов</b></p>
    </div>
    <hr class="hr-white"><br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/2048.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">2048</h4></center>
                        <hr>  
                        <p class="card-text">Залипательная игра-головоломка! Попробуйте набрать 2048 очков :)</p>   
                        <center><a href="init_game?name=2048" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/dhunt.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">DuckHunt</h4></center>
                        <hr>  
                        <p class="card-text">Вам нужно убить всех уток, пока они летают. Собака вам не будет помогать.</p>   
                        <center><a href="init_game?name=dhunt" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/emoji-msweeper.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">Emoji Minesweeper</h4></center>
                        <hr>  
                        <p class="card-text">Сапёр в виде эмодзи! Мы думаем, что сыграть в это будет интересно.</p>   
                        <center><a href="init_game?name=emoji-msweeper" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/froggy.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">Flexbox Froggy</h4></center>
                        <hr>  
                        <p class="card-text">Игра на знание CSS! А вы умеете дизайнить сайты?</p>   
                        <center><a href="init_game?name=froggy" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/ggarden.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">Grid Garden</h4></center>
                        <hr>  
                        <p class="card-text">Ещё одна игра на знание CSS! Наверное, вы уже прошли Flexbox Froggy =)</p>   
                        <center><a href="init_game?name=ggarden" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card" src="/static/images/games/racer.jpg" alt="2048">
                    <div class="card-body">
                        <center><h4 class="card-title">Racer</h4></center>
                        <hr>  
                        <p class="card-text">Гонки в браузере! Мы любим гоночные машикни, а вы?</p>   
                        <center><a href="init_game?name=racer" class="btn btn-games">Перейти</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
</body>
</html>