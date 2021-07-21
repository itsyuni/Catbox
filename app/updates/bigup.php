<?php

include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

$idflname = isLoggedIn();
$update_cbx = "bigup";
if (isset($_POST['updatecbx'])) {
    DB::query('INSERT INTO updates_tokens VALUES (\'0\', :update_cbx, :user_id)', array(':update_cbx'=>$update_cbx, ':user_id'=>$idflname));
    header("Location: http://{$_SERVER['SERVER_NAME']}/app/menu");
}
$update_cbx = DB::query('SELECT user_id FROM updates_tokens WHERE id=:id', array(':id'=>$idflname))[0]['user_id'];
if ($update_cbx === $idflname) {
    header("Location: /app/menu");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/sticky-footer.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/root__updates.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Catbox | BIGUP</title>
</head>
<style>
    .navbar-white {
        background-color: rgb(233, 233, 233);
    }
    
    h1 {
        font-weight: 250;
    }
    
    b {
        font-weight: 600;
    }
</style>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">CATBOX <b>BIGUP</b></h1>
            <p class="lead">Действительно большое обновление</p>
            <h1 class="mt-5"><b>Нововведения:</b></h1>
        </div>
    </main>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/catboxanalytics.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CatboxAnalytics</p>
                <p style="font-size: 18px;" class="lead">Отслеживайте статистику сайта в одном месте: посетители, место кампаний, местоположение и много другое уже вас ждут в панели управления Catbox.</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/catboxcloud100gb.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CatboxCloud - теперь точно хватит</p>
                <p style="font-size: 18px;" class="lead">Мы расширили облако в 6,5 раз! Теперь всем пользователям доступно место на 100 гигабайт, но мы не занизили скорость, а только увеличили её!</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/catboxuptimer.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CatboxUptimer</p>
                <p style="font-size: 18px;" class="lead">Отслеживать за стабильностью и доступностью сайтов стало действительно проще, когда появился CatboxUptimer. Хотя, мы даже не знаем :)</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/account.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">Забота о безопасности</p>
                <p style="font-size: 18px;" class="lead">Мы заботимся о вас точно также, как и о себе! Мы обновили раздел с аккаунтом, добавив смену пароля и двухфакторную авторизацию.</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/catboxlinks.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CatboxLinks</p>
                <p style="font-size: 18px;" class="lead">Сокращать ссылки это всегда хорошо, но ещё лучше - с робной статистикой. Это уже есть на главном меню - дерзайте =)</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/catboximages.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CatboxImages</p>
                <p style="font-size: 18px;" class="lead">Одно облако это хорошо, но два - ещё лучше! Сохраняйте свои фотографии в безлимитном хранилище CatboxImages.</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/cbxcounts.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">CBXCounts</p>
                <p style="font-size: 18px;" class="lead">Точные счётчики, стабильность и быстрота - это в CBXCounts. Теперь можно следить за статистикой своего аккаунта в нашем сервисе.</p>
            </div>
        </div>
    </div>
    <div class="container col-xxl-8 px-4 py-1 toastt" aria-live="assertive" aria-atomic="true">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-5">
                <img style="box-shadow: 0px 0px 75px rgb(20, 28, 43,0.2); border: none; border-radius: 18px;" src="/static/images/updates/cbxmarketplace.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
            </div>
            <div class="col-lg-7">
                <p style="font-size: 25px;" class="headertexttt" id="headertexttt">Теперь можно опубликовать свои сервисы в CBXMarktplace</p>
                <p style="font-size: 18px;" class="lead">Это не шутка, мы действительно это сделали, и подать заявку на публикацию сервиса можно в пару кликов - пробуйте!</p>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-white">
        <div class="container">
            <div class="row">
                <form action="bigup" method="post">
                <button name="updatecbx" type="submit" class="btn btn-primary d-inline-block align-top navbar-brand">Перейти</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>