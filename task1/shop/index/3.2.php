<?php
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $x=$_POST['name_dlt'];
    $sql="DELETE FROM `goods` WHERE name = '$_POST[name_dlt]'";
    $result=mysqli_query($links,$sql);
    if($result){
        header('location:3.2.html');
    }
    else{
        echo "删除失败";
    }
?>