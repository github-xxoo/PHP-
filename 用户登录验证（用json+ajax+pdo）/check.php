<?php
//登陆验证
// print_r($_POST) ;
$user = json_decode($_POST['data']);
$email = $user->email;
$password = $user->password;

$pdo = new PDO('mysql:host=localhost; dbname=php', 'wjh', '1010');

$sql = "SELECT count(*) FROM `user` WHERE `email`='{$email}' AND `password`='{$password}'";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->fetchColumn(0) == 1){
    echo json_encode(['status'=>1, 'msg'=>'登录成功，正在跳转...']);
    exit;
} else {
    echo json_encode(['status'=>0, 'msg'=>'登录失败，邮箱或密码错误...']);
    exit;
}






// SELECT * FROM `user` WHERE `email`='126@qq.ocm' AND `password`='1234'