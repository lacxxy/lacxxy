<?php
    error_reporting(E_ALL^E_NOTICE);
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
      $ar=explode('  ',$_COOKIE['gdn']);
      $br=explode('  ',$_COOKIE['gdp']);
      a:for($i=0;$i<count($ar);$i++)
      {
        echo $ar[$i]."  ".$br[$i];
        echo "<br/>";
      }
      echo "<button>全部购买</button>";
      echo "<br/>";
    echo "<a href=\"index.php\">返回主页</a>";
    
?>