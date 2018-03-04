<?php
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
    $temp_name=$_FILES['myFile']['tmp_name'];
    $file_name=$_FILES['myFile']['name'];
    $x=$_POST['goods'];
    $destination="../img/".$file_name;
    move_uploaded_file($temp_name,$destination);
    $sql="INSERT INTO goods (name,file,price) values('$_POST[goods]','{$_FILES['myFile']['name']}','$_POST[price]')";
    if($x!="")
     {mysqli_query($links,$sql);}
    else
    {
        echo "内容不能为空";
    }
?>

