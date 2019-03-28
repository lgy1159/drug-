<?php
header('Content-type:text/html;charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username=trim($_GET['username']);
    $password=$_GET['password'];
}
$mysqli = new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
$result = $mysqli->query("SELECT password FROM user WHERE username = "."'$username'");
$rs=$result->fetch_row();
if (!empty($rs)){
    if ($password != $rs[0]) {
        $data = array(
            array('code' => 1, 'message' => '密码错误,请重新登录'),
        );
        echo json_encode($data);
    }else{
        $expire=3600;
        ini_set('session.gc_maxlifetime', $expire);//保存1小时
        if (empty($_COOKIE['PHPSESSID'])) {
            session_set_cookie_params($expire);
            session_start();
        }else{
            session_start();
            setcookie('PHPSESSID', session_id(), time() + $expire);
        }
        if(isset($_SESSION['username'])){
            $data = array(
                array('code' => 2, 'message' => '您已经登入了，请不要重新登入','session'=>$_SESSION['username']),
            );
            echo json_encode($data);
        }else{
            $_SESSION['username']=$_GET['username'];
            $data = array(
                array('code' => 3, 'message' => '登录成功','session'=>$_SESSION['username']),
            );
            echo json_encode($data);
        }
    }
}else{
    $data = array(
        array('code' => 4, 'message' => '没有此用户,请重新登录'),
    );
    echo json_encode($data);
}