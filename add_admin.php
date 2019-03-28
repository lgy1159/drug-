<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = trim($_GET['username']);//处理下空格操作
    $password = $_GET['password'];
}
$mysqli = new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
$result = $mysqli->query("SELECT password FROM user WHERE username = '$username'");
$rs=$result->fetch_row();
if(!empty($rs)){
    $data = array(
        array('code' => 1, 'message' => '用户已存在,请重新注册'),
    );
    echo json_encode($data); //数组转json格式
}else {
    $mysqli = new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
    $sql = "INSERT INTO user (username,password) VALUES ('$_GET[username]', '$_GET[password]')";
    $rs = $mysqli->query($sql);
    if (!$rs) {
        $data = array(
            array('code' => 2, 'message' => '注册失败,请重新注册'),
        );
        echo json_encode($data);
    } else {
        $data = array(
            array('code' => 3, 'message' => '注册成功！跳转到登录页面。。。'),
        );
        echo json_encode($data);
    }
}