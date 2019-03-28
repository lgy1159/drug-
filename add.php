<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<?php include("判断.php"); //判断是否登录


?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

                    <form action="action.php?action=add" method="post">
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="MedId" name="MedId" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入药品编号">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Mtype" name="Mtype" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入药品类别">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Medname" name="Medname" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入药品名称">
                        </div>

                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Total" name="Total" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入药品库存数量">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="Unit" name="Unit" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入药品单元">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="BuyPrice" name="BuyPrice" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入进货价格">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input id="SalePrice" name="SalePrice" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入卖出价格">
                        </div>
                        中西药类别:   中药<input type="radio"   name="Flag" value="中药" checked="checked">
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