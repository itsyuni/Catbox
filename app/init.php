<?php

$type = $_GET['name'];
if (!$type) {
    header('Location: /app/menu');
}

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
    <link rel="stylesheet" href="/static/css/header__loggedd.css">
    <link rel="stylesheet" href="https://webuildthemes.com/guidebook/assets/css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <style>
    body {
           background-color: #141c2b;
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
                        <li class="nav__item"><a href="/" class="nav__link active">Главная</a></li>
                        <li class="nav__item"><a href="https://birux.ml" class="nav__link" >Форум</a></li>
                        <li class="nav__item"><a href="https://tostproject.xyz" class="nav__link">Перейти в TostMedia</a></li>
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
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                transition: 0.3s;
                width: 750px;
                height: 500px;
                border: 1px aliceblue solid;
                border-radius: 15px;
            }
        }
        @media screen and (min-width: 1250px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                transition: 0.3s;
                width: 1280px;
                height: 780px;
                border: 1px aliceblue solid;
                border-radius: 15px;
            }
        }
        @media screen and (max-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
            }
            .main {
                transition: 0.3s;
                width: 400px;
                height: 400px;
                border: 1px aliceblue solid;
                border-radius: 15px;
            }
        }
              </style>
    <center><iframe class="main" src="frames/<?php echo $type ?>"></iframe>
     </iframe></center>
     <br><br><br>