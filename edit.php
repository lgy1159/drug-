<!DOCTYPE html>
<?php include("判断.php"); //判断是否登录


?>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>药品信息管理系统</title>
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
                <div class="logo_box-3">
                    <?php
                    include("menu.php"); //导入导航栏

//                    1. 导入配置文件

                                    //2. 连接MySQL、选择数据库
                                    $mysqli=new mysqli('localhost', 'root', 'lgy123456', 'information_drug');
                                    //3. 获取要修改信息的id号，并拼装查看sql语句，执行查询，获取要修改的信息
                                    $sql = "select * from drug_information where MedId={$_GET['MedId']}";
                                    $result = $mysqli->query($sql);

                                    //4. 判断是否获取到了要修改的信息
                                    if($result && mysqli_num_rows($result)>0){
                                        $Drug = mysqli_fetch_assoc($result);
                                    }else{
                                        die("没有找到要修改的信息！");
                                    }
                    ?>
                    <?php include("判断.php"); //判断是否登录


                    ?>
                    <h3>编辑药品</h3>
                    <form action="action.php?action=update" method="post">
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="MedId" name="MedId" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['MedId']; ?>">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Mtype" name="Mtype" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['Mtype']; ?>">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Medname" name="Medname" class="text" style="color: #FFFFFF !important" type="text"value="<?php echo $Drug['Medname']; ?>">
                        </div>


                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Total" name="Total" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['Total']; ?>">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Unit" name="Unit" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['Unit']; ?>">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="BuyPrice" name="BuyPrice" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['BuyPrice']; ?>">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="SalePrice" name="SalePrice" class="text" style="color: #FFFFFF !important" type="text" value="<?php echo $Drug['SalePrice']; ?>">
                        </div>

                        中西药标记: 中药<input type="radio"   name="Flag" value="中药" checked="checked">
                        西药<input type="radio"  name="Flag" value="西药"><br>
                        <input type="submit" id="Drug_add" class="act-but-3 button" name="Drug_add"  value="提交">
                    </form>




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