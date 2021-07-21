<?php


include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$idflname = isLoggedIn();
$flname_true_var = 1;

$idflname_valid = DB::query('SELECT flname_true FROM users WHERE id=:id', array(':id'=>$idflname))[0]['flname_true'];


if (isset($_POST['updateaccount'])) {
    if(!empty($_POST['fname'])) {
        if (strlen($fname) >= 3 && strlen($fname) <= 500) {
                if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname)) {
                                DB::query('UPDATE users SET fname=:fname WHERE id=:userid', array(':userid'=>$idflname, ':fname'=>$fname));
                                DB::query('UPDATE users SET flname_true=:flname_true_var WHERE id=:userid', array(':userid'=>$idflname, ':flname_true_var'=>$flname_true_var));
                                header("Location: index");
                                echo '<br>
                                <div class="main">
                                    <div class="alert alert-success" role="alert">
                                       Имя успешно изменено!
                                      </div>
                                    </div>';
                        }
                } else {
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-danger" role="alert">
                               Неккоректные символы в имени!
                              </div>
                            </div>';
                }
        } else {
                echo '<br>
                <div class="main">
                    <div class="alert alert-danger" role="alert">
                       Имя недопустимой длины!
                      </div>
                    </div>';
        }           
    
    if(!empty($_POST['lname'])) {
        if (strlen($lname) >= 3 && strlen($lname) <= 500) {
                if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname)) {
                        DB::query('UPDATE users SET lname=:lname WHERE id=:userid', array(':userid'=>$idflname, ':lname'=>$lname));
                        DB::query('UPDATE users SET flname_true=:flname_true_var WHERE id=:userid', array(':userid'=>$idflname, ':flname_true_var'=>$flname_true_var));
                        header("Location: index");
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-success" role="alert">
                               Фамилия успешно изменена!
                              </div>
                            </div>';
                } else {
                        echo '<br>
                        <div class="main">
                            <div class="alert alert-danger" role="alert">
                               Неккоректные символы в фамилии!
                              </div>
                            </div>';
                }
        } else {
                echo '<br>
                <div class="main">
                    <div class="alert alert-danger" role="alert">
                       Фамилия недопустимой длины!
                      </div>
                    </div>';
        }
    }
}

if ($idflname_valid) {
    header("Location: /app/menu");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Подтвердите действие</title>
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background: #141c2b;
            font-family: SF UI Text;
        }
        a,span,h1,h2,h3,h4,h5,h6,p {
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
    <br><br><br>
    <div class="main">
        <div class="alert alert-warning" role="alert">
            С 05.05.2021 теперь нужно всем заполнять имя и фамилию для дальнейшего использования Catbox
          </div>
        </div>
        <br><br><br>
    <div class="main">
        <br>
        <div class="content">
            <br><br>
            <form action="accessden" method="post">
            <div class="inputs__group">
                <p class="input__slider">Имя</p>
                    <div class="input-group mb-3">
                        <input name="fname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <p class="input__slider">Фамилия</p>
                    <div class="input-group mb-3">
                        <input name="lname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                <br>
                <div class="d-grid gap-2">
                    <button name="updateaccount" class="btn btn-primary" type="submit">Обновить информацию</button>
                </div>
                <br><br>
            </div>
            </form>
        </div>
        <br><br>
    </div>
</body>
</html>