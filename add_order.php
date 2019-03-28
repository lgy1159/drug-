<!DOCTYPE html>
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
<center>
    <body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="logo_box-2">
                    <?php include("menu.html"); //导入导航栏
                    ?>

                    <?php include("判断.php"); //判断是否登录


                    ?>
                    <form action="action_order.php?action=add" method="post"><br>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input name="Order_Id" class="text" id="Order_Id"
                                   style="color: #FFFFFF !important;  z-index:100;" value="" type="text"
                                   placeholder="请输入订单编号">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input name="Order_Number" class="text" id="Order_Number"
                                   style="color: #FFFFFF !important;  z-index:100;" value="" type="text"
                                   placeholder="请输入订单数量">
                        </div>

                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input name="MedId" class="text" id="MedId"
                                   style="color: #FFFFFF !important; z-index:100;" value="" type="text"
                                   placeholder="请输入药品编号">
                        </div>
                        <div class="input_outer-2">
                            <span class="u_user"></span>
                            <input name="Medname" class="text" id="Medname"
                                   style="color: #FFFFFF !important; z-index:100;" value="" type="text"
                                   placeholder="请输入药品名称">
                        </div>

                        中西药标记： 中药<input type="radio" name="Flag" value="中药" checked="checked">
                        西药<input type="radio" name="Flag" value="西药"><br>

                        <input  class="act-but-3 button" type="submit" id="Order_add" name="Order_add" value="提交">
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