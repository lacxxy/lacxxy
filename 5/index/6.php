<?php
     $links=mysqli_connect("localhost","root","2375468369");
     mysqli_select_db($links,'shop');  
     $goodsname=$_POST['hd'];
     $goodsprice=$_POST['hd1'];

     $a=$_COOKIE['gdn'];
     $b=$_COOKIE['gdp'];
     setcookie('gdn',$goodsname."  $a");
     setcookie('gdp',$goodsprice."  $b");
     header('location:index.php');
  
?>