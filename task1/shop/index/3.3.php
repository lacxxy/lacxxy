<?php
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $sql="UPDATE goods set name='{$_POST['newname']}',file='{$_FILES['newpic']['name']}',price='{$_POST['newprice']}' where name='{$_POST['oldname']}'";
    mysqli_query($links,$sql);
    header('location:3.3.html');
?>