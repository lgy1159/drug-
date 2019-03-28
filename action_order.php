<?php
//这是一个信息增、删和改操作的处理页

//（1）、 导入配置文件

//（2）、连接MySQL、并选择数据库
$mysqli=new mysqli('localhost', 'root', 'lgy123456', 'information_drug');

//（3）、根据需要action值，来判断所属操作，执行对应的代码
switch($_GET["action"]){
    case "add": //执行添加操作
        //1. 获取要添加的信息，并补充其他信息
        $Order_Id= $_POST["Order_Id"];
        $Order_Number = $_POST["Order_Number"];
        $MedId= $_POST["MedId"];
        $Medname = $_POST["Medname"];
        $Flag = $_POST["Flag"];
        //2. 做信息过滤（省略）
        //3. 拼装添加SQL语句，并执行添加操作
        $mysqli = new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
        $result = $mysqli->query("SELECT Medname FROM order_information WHERE Order_Id = '$Order_Id'");
        $rs=$result->fetch_row();
        if(!empty($rs)){
            echo "<h3>订单重复！添加失败</h3>";
        }
        else{


            if($Order_Id>0){
                $sql = "insert into order_information values('{$Order_Id}','{$Order_Number}','{$Medname}','{$Flag}','{$MedId}')";
                //echo $sql;
                $mysqli->query($sql);
                echo "<h3>订单信息添加成功！</h3>";
            }else{
                echo "<h3>订单信息添加失败！</h3>";
            }
            echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
            echo "<a href='index_order.php'>浏览订单</a>";

            break;
        }
        echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
        echo "<a href='index_order.php'>浏览订单</a>";
        break;


    case "del": //执行删除操作
        //1. 获取要删除的id号
        $Order_Id= $_GET["Order_Id"];

        //2. 拼装删除sql语句，并执行删除操作
        $sql = "delete from order_information where Order_Id={$Order_Id}";
        $mysqli->query($sql);

        //3. 自动跳转到浏览药品界面
        header("Location:index_order.php");
        break;

    case "update": //执行修改操作
        //1. 获取要修改的信息
        $Order_Id= $_POST["Order_Id"];
        $Order_Number = $_POST["Order_Number"];
        $MedId= $_POST["MedId"];
        $Medname = $_POST["Medname"];
        $Flag = $_POST["Flag"];

        //2. 过滤要修改的信息（省略）
        //3. 拼装修改sql语句，并执行修改操作
        $sql = "update order_information set MedId='{$MedId}',Medname='{$Medname}',Flag='{$Flag}',Order_Number='{$Order_Number}'where Order_Id={$Order_Id}";
        //echo $sql;
        $mysqli->query($sql);

        //4. 跳转回浏览界面
        header("Location:index_order.php");

        break;

}

//（4）、关闭数据连接
mysqli_close($mysqli);
