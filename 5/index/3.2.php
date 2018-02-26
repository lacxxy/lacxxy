<?php
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $x=$_POST['name_dlt'];
    $sql="DELETE FROM `goods` WHERE name = '$_POST[name_dlt]'";
    $result=mysqli_query($links,$sql);
    if($result){
        echo "删除成功";
    }
    else{
        echo "删除失败";
    }
?>