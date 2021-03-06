<!DOCTYPE html>
<?php include("判断.php"); //判断是否登录
?>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>药品信息管理系统</title>
    <script type="text/javascript">
        function dodel(id){
            if(confirm("确定要删除吗？")){
                window.location="action_order.php?action=del&Order_Id="+id;
            }
        }

    </script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/comdee.css" />
    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->
</head>
<?php include("判断.php"); //判断是否登录


?>
<center>
    <body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="logo_box">
                    <?php include("menu.html"); //导入导航栏
                    ?>

                    <h3>浏览订单</h3>
                    <table width="880" border="1">
                        <tr>
                            <th>订单编号</th><th>订单数量</th><th>药品编号</th>
                            <th>药品名称</th><th>中西药</th><th>功能</th>
                        </tr>
                        <?php
                        //1.导入配置文件

                        //2.连接MySQL，选择数据库
                        $mysqli=new mysqli('localhost', 'root', 'lgy123456', 'information_drug');

                        //3. 执行查询，并返回结果集
                        $sql = "select * from order_information order by Order_Id desc";
                        $result = $mysqli->query($sql);

                        //4. 解析结果集,并遍历输出
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>{$row['Order_Id']}</td>";
                            echo "<td>{$row['Order_Number']}</td>";
                            echo "<td>{$row['MedId']}</td>";
                            echo "<td>{$row['Medname']}</td>";
                            echo "<td>{$row['Flag']}</td>";
                            echo "<td>
								<a href='javascript:dodel({$row['Order_Id']})'> 删除</a>
								<a href='edit_order.php?Order_Id={$row['Order_Id']}'> 修改</a>
								<a href='about.php'>返回主页面</a></td>";
                            echo "</tr>";
                        }
                        //5. 释放结果集
                        mysqli_free_result($result);
                        mysqli_close($mysqli);
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div><!-- /container -->
    <script src="js/TweenLite.min.js"></script>
    <script src="js/EasePack.min.js"></script>
    <script src="js/rAF.js"></script>
    <script src="js/demo-1.js"></script>
    <div style="text-align:center;">
    </div>
    </body>
</center>
</html>