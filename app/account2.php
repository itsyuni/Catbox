<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$descp = $_POST['descp'];
$msgbr = False;
/*$idflname = isLoggedIn();
$flname_true = DB::query('SELECT flname_true FROM users WHERE id=:id', array(':id'=>$idflname))[0]['flname_true'];
$fname_var = DB::query('SELECT fname FROM users WHERE id=:id', array(':id'=>$idflname))[0]['fname'];
$lname_var = DB::query('SELECT lname FROM users WHERE id=:id', array(':id'=>$idflname))[0]['lname'];
$username_var = DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>$idflname))[0]['username'];
$descp_var = DB::query('SELECT about FROM users WHERE id=:id', array(':id'=>$idflname))[0]['about'];
$usernamename = $_POST['username'];

$cbxme_email = DB::query('SELECT cbxme_email FROM users WHERE id=:id', array(':id'=>$idflname))[0]['cbxme_email'];
$cbxme_id = DB::query('SELECT cbxme_id FROM users WHERE id=:id', array(':id'=>$idflname))[0]['cbxme_id'];
$cbxme_img = DB::query('SELECT cbxme_img FROM users WHERE id=:id', array(':id'=>$idflname))[0]['cbxme_img'];
$cbxme_flname = DB::query('SELECT cbxme_flname FROM users WHERE id=:id', array(':id'=>$idflname))[0]['cbxme_flname'];

$cbxme_email_input = $_POST['cbxme_email'];
$cbxme_id_input = $_POST['cbxme_id'];
$cbxme_img_input = $_POST['cbxme_img'];
$cbxme_flname_input = $_POST['cbxme_flname'];
echo $cbxme_email;
if (!$flname_true) {
    header("Location: /app/accessden");
}*/

if (isset($_POST['editaccount'])) {
    if(!empty($_POST['fname'])) {
        if (strlen($fname) >= 3 && strlen($fname) <= 35) {
                if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname)) {
                                DB::query('UPDATE users SET fname=:fname WHERE id=:userid', array(':userid'=>$idflname, ':fname'=>$fname));
                                $msgbr = True;
                                echo ' <br><br><br>
                                <div class="main">
                                    <div class="alert alert-success" role="alert">
                                        Имя успешно изменено!
                                      </div>
                                    </div>';
                        }
                } else {
                    $msgbr = True;
                        echo ' <br><br><br>
                        <div class="main">
                            <div class="alert alert-danger" role="alert">
                                Неккоректные символы в имени!
                              </div>
                            </div>';
                }
        } else {
            $msgbr = True;
                echo '<br><br><br>
                <div class="main">
                    <div class="alert alert-danger" role="alert">
                        Имя недопустимой длины!
                      </div>
                    </div>';
        }
    
        if(!empty($_POST['descp'])) {
            if (strlen($descp) >= 1 && strlen($descp) <= 500) {
                        DB::query('UPDATE users SET about=:about WHERE id=:userid', array(':userid'=>$idflname, ':about'=>$descp));
                        $msgbr = True;
                        echo ' <br>
                            <div class="main">
                            <div class="alert alert-success" role="alert">
                                Описание успешно изменено!
                                </div>
                            </div>';
                }
            } else {
                $msgbr = True;
                    echo '<br>
                    <div class="main">
                        <div class="alert alert-danger" role="alert">
                            Описание слишком длинное!
                          </div>
                        </div>';
            }
    
    if(!empty($_POST['lname'])) {
        if (strlen($lname) >= 3 && strlen($lname) <= 500) {
                if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $aboutt)) {
                        DB::query('UPDATE users SET lname=:lname WHERE id=:userid', array(':userid'=>$idflname, ':lname'=>$lname));
                        $msgbr = True;
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-success" role="alert">
                                Фамилия успешно изменена!
                              </div>
                            </div>';
                } else {
                    $msgbr = True;
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-danger" role="alert">
                                Неккоректные символы в фамилии!
                              </div>
                            </div>';
                }
        } else {
            $msgbr = True;
                echo '<br>
                <div class="main">
                    <div class="alert alert-danger" role="alert">
                        Фамилия недопустимой длины!
                      </div>
                    </div>';
        }
    }
    
    if(!empty($_POST['username'])) {
        if (strlen($usernamename) >= 5 && strlen($usernamename) <= 15) {
                if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $usernamename)) {
                        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$usernamename))) {
                                DB::query('UPDATE users SET username=:username WHERE id=:userid', array(':userid'=>$idflname, ':username'=>$usernamename));
                                $msgbr = True;
                                echo '<br>
                                <div class="main">
                                    <div class="alert alert-success" role="alert">
                                        Имя пользователя успешно изменено!
                                      </div>
                                    </div>';
                        } else {
                            $msgbr = True;
                                echo '<br>
                                <div class="main">
                                    <div class="alert alert-danger" role="alert">
                                        Такое имя уже занято!
                                      </div>
                                    </div>';
                        }
                } else {
                    $msgbr = True;
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-danger" role="alert">
                                Неккоректные символы в имени!
                              </div>
                            </div>';
                }
        } else {
            $msgbr = True;
                echo '<br>
                <div class="main">
                    <div class="alert alert-danger" role="alert">
                        Имя недопустимой длины!
                      </div>
                    </div>';
        }           
    }
        if ($_POST['cbxme_email'][0]) {
            DB::query('UPDATE users SET cbxme_email=\'1\' WHERE id=:userid', array(':userid'=>$idflname));
        } else {
            DB::query('UPDATE users SET cbxme_email=\'0\' WHERE id=:userid', array(':userid'=>$idflname));
        }
        if ($_POST['cbxme_id'][1]) {
            DB::query('UPDATE users SET cbxme_id=\'1\' WHERE id=:userid', array(':userid'=>$idflname));
        } else {
            DB::query('UPDATE users SET cbxme_id=\'0\' WHERE id=:userid', array(':userid'=>$idflname));
        }
        if ($_POST['cbxme_img'][2] === 1) {
            DB::query('UPDATE users SET cbxme_img=\'1\' WHERE id=:userid', array(':userid'=>$idflname));
        } else {
            DB::query('UPDATE users SET cbxme_img=\'0\' WHERE id=:userid', array(':userid'=>$idflname));
        }
        if ($_POST['cbxme_flname'][3] === 1) {
            DB::query('UPDATE users SET cbxme_flname=\'1\' WHERE id=:userid', array(':userid'=>$idflname));
        } else {
            DB::query('UPDATE users SET cbxme_flname=\'0\' WHERE id=:userid', array(':userid'=>$idflname));
        }
    }



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Управление аккаунтом</title>
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
                margin-right: 10px;
                margin-left: 10px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 25px;
                margin-left: 25px;
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
        
        .avatar-img {
            width: 115px;
            height: 115px;
        }
        
        .avatar-links-actions {
            margin-left: 135px;
            margin-top: -125px;
        }
    </style>
    <header class="l-header">
        <nav class="nav bd-grid">
            <a href="/" class="nav__logo"><img class="nav__logo__img" src="/static/images/catboxlogo__white__beta.png" width="500" height="300"></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/app" class="nav__link">Главная</a></li>
                    <li class="nav__item"><a href="https://tostmedia.com" class="nav__link">Перейти в TostMedia</a></li>
                    <li class="nav__item"><a href="/app/account" class="nav__link active">Мой аккаунт</a></li>
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
    <br><br><br>
    <?php if ($msgbr) {
    ?><br><br><br><br>
    <?php
} ?>
        <div class="main">
            <p class="login__header"><b>Управление аккаунтом</b></p>
            <br>
            <div class="content">
                <br><br>
                <form action="account" method="post">
                    <div class="inputs__group">
                        <img class="avatar-img" src="/static/images/avatars/avatarblue.png" width="100px" height="100px" style="border-radius: 75px;" alt=""><br><br>
                        <div class="avatar-links-actions">
                            <a href="" class="">Сменить аватарку</a><br>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Выбрать аватарку из шаблонов</a>
                        </div>
                        <br><br><br>
                        <div class="row g-3">


                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">Имя</label><br>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">Фамилия</label><br>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div><br>

                            <p class="input__slider">Имя пользователя</p>
                            <div class="input-group mb-3">
                                <input name="username" type="text" class="form-control" value="<?php echo $username_var ?>">
                            </div>
                            <br>
                            <p class="input__slider">Описание профиля</p>
                            <div class="input-group mb-3">
                                <input name="descp" type="text" class="form-control" value="<?php
                                                                                        if ($descp_var) {
                                                                                            echo $descp_var;
                                                                                        } else {

                                                                                        }  ?>">
                            </div>
                            <br><br>
                            <div class="d-grid gap-2">
                                <button name="editaccount" class="btn btn-primary" type="submit">Обновить информацию</button>
                            </div>
                            <br><br><br>
                        </div>
                </form>
                </div>
                <br><br>
            </div>
        </div>
        <br><br><br>
        <div class="main">
            <p class="login__header"><b>Ссылка CBXME <span class="badge rounded-pill bg-warning">Новинка!</span></b></p>
            <br>
            <div class="content">
                <br><br>
                <form action="account2" method="post">
                    <div class="inputs__group">
                        <div class="row g-3">
                            <div class="form-check form-switch">
                                <input name="cbxme[]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" style="color: aliceblue;" for="flexSwitchCheckDefault">Показывать мою почту привязанную к аккаунту Catbox</label>
                            </div>
                            <div class="form-check form-switch">
                                <input name="cbxme[]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" style="color: aliceblue;" for="flexSwitchCheckDefault">Показывать мой ID аккаунта</label>
                            </div>
                            <div class="form-check form-switch">
                                <input name="cbxme[]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" style="color: aliceblue;" for="flexSwitchCheckDefault">Показывать мою аватарку</label>
                            </div>
                            <div class="form-check form-switch">
                                <input name="cbxme[]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" style="color: aliceblue;" for="flexSwitchCheckDefault">Показывать и имя и фамилию</label>
                            </div>
                            <!--
                            <p class="login__header"><b>Ваши социальные сети </b></p>
                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">Skype</label>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">Telegram</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">ВКонтакте</label>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">Одноклассники</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">Reddit</label>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">YouTube</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">Twitter</label>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">Facebook</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">TikTok</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">ICQ</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>-->

                            <br><br>
                            <div class="d-grid gap-2">
                                <button name="editaccount" class="btn btn-primary" type="submit">Обновить информацию</button>
                            </div>
                            <br><br><br>
                        </div>
                </form>
                </div>
                <br><br>
            </div>
        </div>
        <!--
        <div class="main">
            <p class="login__header"><b>Смена данных</b></p>
            <br>
            <div class="content">
                <br><br>
                <form action="account" method="post">
                    <div class="inputs__group">
                        <p class="login__header"><b>Смена пароля</b></p>
                        <br>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" style="color: #fff;" class="form-label">Старый пароль</label>
                                <br><input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname_var ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" style="color: #fff;" class="form-label">Новый пароль</label>
                                <br><input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname_var ?>">
                            </div>
                            <br><br><br><br>
                            <p class="input__slider">Подтверждение нового пароля</p>
                            <div class="input-group mb-3">
                                <input name="username" type="text" class="form-control" value="<?php echo $username_var ?>">
                            </div>

                            <br><br>
                            <div class="d-grid gap-2">
                                <button name="editaccount" class="btn btn-primary" type="submit">Обновить информацию</button>
                            </div>
                            <br><br><br>
                        </div>
                </form>
                </div>
                <br><br>
            </div>
        </div>-->
</body>