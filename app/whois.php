<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");
if (isset($_POST['whoislook'])) {
    $domain = $_POST['address'];
    $domain = strtolower(trim($domain));
    $domain = preg_replace('/^http:\/\//i', '', $domain);
    $domain = preg_replace('/^www\./i', '', $domain);
    $domain = explode('/', $domain);
    $domain = trim($domain[0]);

    // split the TLD from domain name
    $_domain = explode('.', $domain);
    $lst = count($_domain)-1;
    $ext = $_domain[$lst];

    $servers = array(
        "biz" => "whois.neulevel.biz",
        "com" => "whois.internic.net",
        "us" => "whois.nic.us",
        "coop" => "whois.nic.coop",
        "info" => "whois.nic.info",
        "name" => "whois.nic.name",
        "net" => "whois.internic.net",
        "gov" => "whois.nic.gov",
        "edu" => "whois.internic.net",
        "mil" => "rs.internic.net",
        "int" => "whois.iana.org",
        "ac" => "whois.nic.ac",
        "ae" => "whois.uaenic.ae",
        "at" => "whois.ripe.net",
        "au" => "whois.aunic.net",
        "be" => "whois.dns.be",
        "bg" => "whois.ripe.net",
        "br" => "whois.registro.br",
        "bz" => "whois.belizenic.bz",
        "ca" => "whois.cira.ca",
        "cc" => "whois.nic.cc",
        "ch" => "whois.nic.ch",
        "cl" => "whois.nic.cl",
        "cn" => "whois.cnnic.net.cn",
        "cz" => "whois.nic.cz",
        "de" => "whois.nic.de",
        "fr" => "whois.nic.fr",
        "hu" => "whois.nic.hu",
        "ie" => "whois.domainregistry.ie",
        "il" => "whois.isoc.org.il",
        "in" => "whois.ncst.ernet.in",
        "ir" => "whois.nic.ir",
        "mc" => "whois.ripe.net",
        "to" => "whois.tonic.to",
        "tv" => "whois.tv",
        "ru" => "whois.ripn.net",
        "org" => "whois.pir.org",
        "aero" => "whois.information.aero",
        "nl" => "whois.domain-registry.nl"
    );

    if(!isset($servers[$ext])) echo '<br><br><br><br>
    <div class="main">
        <div class="alert alert-dangernew" role="alert">
            Такой доменной зоны у нас нету в базе!
        </div>
    </div>';
    $domainnot = True;

    $nic_server = $servers[$ext];
    $output = '';

    // connect to whois server:
    if($conn = fsockopen ($nic_server, 43)) {
        fputs($conn, $domain."\r\n");
        while(!feof($conn)) $output .= fgets($conn,128);    
        fclose($conn);
    } else { 
        if (!$domainnot) {
            echo '<br><br><br><br>
        <div class="main">
            <div class="alert alert-dangernew" role="alert">
                Ошибка подключения к серверу!
            </div>
        </div>';
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | WHOIS</title>
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
    <script src="/static/js/header.js" type="text/javascript"></script>
    <style>
        .alert-dangernew {
            background-color: rgb(83, 0, 18);
            border-color: rgb(255, 0, 64);
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
            border-radius: 15px;
        }

        body {
            background: #141c2b;
            font-family: SF UI Text;
        }

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
                margin-right: 85px;
                margin-left: 85px;
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
                margin-right: 250px;
                margin-left: 250px;
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
                margin-right: 40px;
                margin-left: 40px;
                transition: 0.3s;
            }

            .inputs__group {
                margin-right: 50px;
                margin-left: 50px;
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
            }
        }

        @media (max-width: 1024px) {
            .alertlog {
                width: 600px;
                height: 100px;
                border-radius: 10px;
            }
        }
    </style>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" style="color: #000;" id="offcanvasExampleLabel">Упс!</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Эта функция ещё на стадии разработки, следите за новостями!
            </div>
        </div>
    </div>
    <div class="main">
        <br><br><br>
        <p class="login__header"><b>WHOIS</b></p>
        <br>
        <div class="content">
            <br>
            <form action="whois" method="post">
                <div class="inputs__group">
                    <p class="input__slider">Имя домена</p>
                    <div class="input-group mb-3">
                        <input name="address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button name="whoislook" class="btn btn-primary" type="submit">Узнать WHOIS</button>
                    </div>
                    <br><br>
                    <div class="main">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <div class="whois-result">
        <p><pre style="color: aliceblue;"><?php echo $output ?></pre></p>
    </div>
</body>

</html>