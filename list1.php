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
                window.location="action.php?action=del&MedId="+id;
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
<center>
    <body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="logo_box">
                    <?php include("menu.php"); //导入导航栏
                    ?>
                    <h3>搜索药品</h3>
                    <!-----搜索表单--------->
                    <form action="list1.php" method="get">
                        药品编码 ：<input type="text" name="MedId" size="8" value="<?php $_GET['MedId'] = empty($_GET['MedId']) ? '' : $_GET['MedId']; echo $_GET['MedId']; ?>" />&nbsp;
                        药品名称  ：<input type="text" name="Medname" size="8" value="<?php echo$_GET['Medname'] = empty($_GET['Medname']) ? '' : $_GET['Medname']; $_GET['Medname']; ?>" />&nbsp;
                        药品类型 ：<input type="text" name="Mtype"  size="8"  value="<?php echo $_GET['Mtype'] = empty($_GET['Mtype']) ? '' : $_GET['Mtype'];$_GET['Mtype']; ?>"/>&nbsp;
                        <input type="submit" value="搜索"/>
                        <input type="button" value="全部信息" onclick="window.location='list1.php'"/>
                    </form>
                    <!-------------->
                    <table width="880" border="1">
                        <tr>
                            <th>药品编号</th><th>药品种类</th><th>药品名字</th>
                            <th>中西药</th><th>库存</th><th>单元</th>
                            <th>进价</th><th>售价</th><th>功能</th>
                        </tr>
                        <?php
                        //=============================
                        //封装搜索信息
                        $wherelist = array();//定义一个封装搜索条件的数组变量

                        //判断标题是否有值，若有则封装此搜索条件
                        if(!empty($_GET["MedId"])){
                            $wherelist[]="MedId like '%{$_GET['MedId']}%'";

                        }
                        //判断关键字是否有值，若有则封装此搜索条件
                        if(!empty($_GET["Medname"])){
                            $wherelist[]="Medname like '%{$_GET['Medname']}%'";

                        }
                        //判断作者是否有值，若有则封装此搜索条件
                        if(!empty($_GET["Mtype"])){
                            $wherelist[]="Mtype like '%{$_GET['Mtype']}%'";

                        }
                        //组装搜索条件
                        if(count($wherelist)>0){
                            $where = " where ".implode(" and ",$wherelist);
                        }
                        //=============================

                        //1.导入配置文件

                        //2.连接MySQL，选择数据库
                        $mysqli=new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
                        //3. 执行查询，并返回结果集
                        @ $sql = "select * from drug_information {$where} order by MedId desc";
                        $result = $mysqli->query($sql);

                        //4. 解析结果集,并遍历输出
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>{$row['MedId']}</td>";
                            echo "<td>{$row['Mtype']}</td>";
                            echo "<td>{$row['Medname']}</td>";
                            echo "<td>{$row['Flag']}</td>";
                            echo "<td>{$row['Total']}</td>";
                            echo "<td>{$row['Unit']}</td>";
                            echo "<td>{$row['BuyPrice']}</td>";
                            echo "<td>{$row['SalePrice']}</td>";
                            echo "<td>
								<a href='javascript:dodel({$row['MedId']})'> 删除</a>
								<a href='edit.php?MedId={$row['MedId']}'> 修改</a></td>";
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