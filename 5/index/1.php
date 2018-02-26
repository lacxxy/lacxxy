<?PHP
    $links=mysqli_connect("localhost","root","2375468369");
    mysqli_select_db($links,'shop');
	$sql = "INSERT into tuser(username,password) values('$_POST[username]','$_POST[password]')";
    $qy=mysqli_query($links,$sql);
    if($qy)
    {
        header('Location:4.html');
    }
?>