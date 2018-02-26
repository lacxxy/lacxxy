<html>
<head>
    <meta charset="utf-8" />
    <link href="../css/index.css" rel="stylesheet" type="text/css">
    <title>主页</title>

    </script>
</head>

<body>
    <div id="div_2">
        <a href="2.html" class="1">管理员页面</a>
        <a href="4.html"  class="1">登录</a>
        <a href="5.php"  class="1">我的购物车<a/>
        
        <?php
         error_reporting(E_ALL^E_NOTICE);
            if($_COOKIE['id'])
            {echo "欢迎{$_COOKIE['id']}";}
            else
        ?>
    </div>
    <div id="div_3">
        <h1>一个简单的商城</h1>
    </div>
    <div id="div_4">
        
    </div>
</body>
<?php
    error_reporting(E_ALL^E_NOTICE);
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $page=$_GET['p'];
    $mid=($page)*13;
    $sql="SELECT name,file,price FROM goods LIMIT $mid,13";
    $result=mysqli_query($links,$sql);
    $data = array();
    while($res= mysqli_fetch_array($result)){
        $data[]=$res;
    }

    for($i=0;$i<count($data)-1;$i++)
    {
        echo "<div class='gd'>";
        echo "<p>{$data[$i+1][0]}</p>";
        echo "<br/>";
        echo "<img src='../img/{$data[$i+1][1]}'>";
        echo "<br/>";
        echo "<p>{$data[$i+1][2]}</p>";
        echo "<form action='6.php' method='POST'>
          <input type='submit' name='tt' value='加入购物车'/>
          <input type='hidden' name='hd' value='{$data[$i+1][0]}'/> 
          <input type='hidden' name='hd1' value='{$data[$i+1][2]}'/>
        </form>";
        echo "</div>";
        
    }
    
    $bt="<a href='{$_SERVER['PHP_SELF']}?p=".($page-1)."'>上一页</a>";
    $bt1="<a href='{$_SERVER['PHP_SELF']}?p=".($page+1)."'>下一页</a>";
    if($page==0){
        echo "<div id=dv>";
        echo "       ";
        echo $bt1;
        echo "</div>";
    }
    else{
        echo "<div id=dv>";
        echo $bt;
        echo "       ";
        echo $bt1;
        echo "</div>";
    }
?>
</html>


