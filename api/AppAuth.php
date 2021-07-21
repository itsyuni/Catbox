<?php
include($_SERVER['DOCUMENT_ROOT'].'/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/ValidAuth_api.php');
$app_id_get = $_GET['app_id'];
$app_token_get = $_GET['token'];
$app_userid_get = $_GET['userid'];

$app_user_id = $_GET['userid'];
$app_user_username = DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>$app_user_id))[0]['username'];
$app_user_fname = DB::query('SELECT fname FROM users WHERE id=:id', array(':id'=>$app_user_id))[0]['fname'];
$app_user_lname = DB::query('SELECT lname FROM users WHERE id=:id', array(':id'=>$app_user_id))[0]['lname'];
$app_user_email = DB::query('SELECT email FROM users WHERE id=:id', array(':id'=>$app_user_id))[0]['email'];

$app_id = DB::query('SELECT id FROM api_apps WHERE id=:id', array(':id'=>$app_id_get))[0]['id'];
if ($app_id_get) {
    if(isset($_GET['token'])) {
        if ($app_id) {
            if (isset($_GET['userid'])) {
                    $res = [
                        "status" => false,
                        "error_code" => "app_user_info",
                        "http_code" => "200",
                        "userid" => "$app_user_id",
                        "username" => "$app_user_username",
                        "first_name" => "$app_user_fname",
                        "last_name" => "$app_user_lname",
                        "email" => "$app_user_email"
                    ];
                    http_response_code(200);
                    echo json_encode($res);
            } else {
                $res = [
                    "status" => false,
                    "error_code" => "app_auth_required",
                    "http_code" => "401",
                    "message" => "User not be logged!"
                ];
                http_response_code(200);
                echo json_encode($res);
            }
        } else {
            $res = [
                "status" => false,
                "error_code" => "app_bad_request",
                "http_code" => "404",
                "message" => "App not found!"
            ];
            http_response_code(400);
            echo json_encode($res);
        }
            } else {
                $res = [
                    "status" => false,
                    "error_code" => "app_bad_request",
                    "http_code" => "400",
                    "message" => "Excellent! But something is missing for us to fulfill the request."
                ];
                http_response_code(400);
                echo json_encode($res);
            }

        } else {
            $res = [
                "status" => false,
                "error_code" => "app_token_forbidden",
                "http_code" => "403",
                "message" => "No token!"
            ];
            http_response_code(404);
            echo json_encode($res);
}
?>