<html>
<head>
    <meta charset="utf-8" />
    <title>主页</title>
    <link href="../css/index.css" rel="stylesheet" type="text/css">
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
            else{
                echo "未登录";
            }
        ?>
    </div>
    <div id="div_3">
        <h1>一个简单的商城</h1>
    </div>
    <div id="div_4">
    <a href="sort.php?st=iphone" class="st">苹果</a><br/><br/>
        <a href="sort.php?st=s" class="st">三星</a><br/><br/>
        <a href="sort.php?st=huawei" class="st">华为</a><br/><br/>
        <a href="sort.php?st=honor" class="st">荣耀</a><br/><br/>
        <a href="sort.php?st=nokia" class="st">诺基亚</a><br/><br/>
        <a href="sort.php?st=oppo" class="st">oppo</a><br/><br/>
        <a href="sort.php?st=vivo" class="st">vivo</a><br/><br/>
        <a href="index.php" class="sort">显示全部</a><br/><br/>
    </div>
</body>
<?php
    error_reporting(E_ALL^E_NOTICE);
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $a=$_GET['st'];
    $sql="SELECT name,file,price FROM goods where sort='$_GET[st]'";
    $result=mysqli_query($links,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($links));
        exit();
       }
    $data = array();
    while($res= mysqli_fetch_array($result)){
        $data[]=$res;
    }

  
    for($i=0;$i<=count($data)-1;$i++)
    {
        echo "<div class='gd'>";
        echo "<p>{$data[$i][0]}</p>";
        echo "<br/>";
        echo "<img src='../img/{$data[$i][1]}'>";
        echo "<br/>";
        echo "<p>{$data[$i][2]}</p>";
        echo "<form action='6.php' method='POST'>
          <input type='submit' name='tt' value='加入购物车'/>
          <input type='hidden' name='hd' value='{$data[$i][0]}'/> 
          <input type='hidden' name='hd1' value='{$data[$i][2]}'/>
        </form>";
        echo "</div>";
        
    }
        
    

?>
</html>