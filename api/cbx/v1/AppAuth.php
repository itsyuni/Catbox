<?php
include($_SERVER['DOCUMENT_ROOT'].'/classes/DB.php');
$app_id_get = $_GET['app_id'];
$params = explode('/api/', $app_id_get);

$app_id = DB::query('SELECT id FROM api_apps WHERE id=:id', array(':id'=>$app_id_get))[0]['app_id'];
if ($app_id_get) {
    if(mysqli_num_rows($app_id) === 1) {

    } else {
        $res = [
            "status" => false,
            "error_code" => "app_not_found",
            "http_code" => "404",
            "message" => "App not found!"
        ];
        http_response_code(404);
        echo json_encode($res);
    }
}
?>