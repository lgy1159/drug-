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



                    <h3>分页浏览药品</h3>
                    <table width="880" border="1">
                        <tr>
                            <th>药品编号</th><th>药品种类</th><th>药品名字</th>
                            <th>中西药</th><th>库存</th><th>单元</th>
                            <th>进价</th><th>售价</th><th>库存</th>
                        </tr>
                        <?php
                        //1.导入配置文件


                        //2.连接MySQL，选择数据库
                        $mysqli=new mysqli('localhost', 'root', 'lgy123456', 'information_drug');

                        //2.1 插入分页处理代码
                        //======================================
                        //1. 定义一些分页变量
                        $page=isset($_GET["page"])?$_GET['page']:1;		//当前页号
                        $pageSize=3;	//页大小
                        $maxRows;		//最大数据条
                        $maxPages;		//最大页数

                        //2. 获取最大数据条数
                        $sql = "select count(*) from drug_information";
                        $res = $mysqli->query($sql);
                        function mysqli_result($res,$n){
                            $arr = mysqli_fetch_array($res);
                            return $arr[$n];
                        }
                        $maxRows = mysqli_result($res,0); //定位从结果集中获取总数据条数这个值。
                        //3. 计算出共计最大页数
                        $maxPages = ceil($maxRows/$pageSize); //采用进一求整法算出最大页数

                        //4. 效验当前页数
                        if($page>$maxPages){
                            $page=$maxPages;
                        }
                        if($page<1){
                            $page=1;
                        }

                        //5. 拼装分页sql语句片段
                        $limit = " limit ".(($page-1)*$pageSize).",{$pageSize}";   //起始位置是当前页减一乘以页大小
                        //======================================

                        //3. 执行查询，并返回结果集
                        $sql = "select * from drug_information order by MedId desc {$limit}";
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
                    <?php
                    //输出分页信息，显示上一页和下一页的连接
                    echo "<br/><br/>";
                    echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
                    echo " <a href='list2.php?page=1'>首页</a> ";
                    echo " <a href='list2.php?page=".($page-1)."'>上一页</a> ";
                    echo " <a href='list2.php?page=".($page+1)."'>下一页</a> ";
                    echo " <a href='list2.php?page={$maxPages}'>末页</a> ";
                    ?>



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