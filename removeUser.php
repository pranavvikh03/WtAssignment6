<?php 
    if(isset($_POST['deelete']))
    {
        $con=new mysqli("localhost","root","","varad_vinayak_db");
        if($con->connect_error){ die("Connection Failed:".$con->connect_error); }
        $stmtt=$con->prepare("delete from userlist where User_id=?");
        $stmtt->bind_param("i",$_POST['userlist']);
        if($stmtt->execute())
        {
            $con->close();
            header("location:LoginPage.php?iid=1");
        }
        else
        {
            $con->close();
            header("location:LoginPage.php?iid=2");
        }
    }
?>