<?php
    if(isset($_POST['submitdata']))
    {
        $date=$_POST['mydate'];
        $rs2000=$_POST['rs2000'];
        $rs500=$_POST['rs500'];
        $rs200=$_POST['rs200'];
        $rs100=$_POST['rs100'];
        $rs50=$_POST['rs50'];
        $rs20=$_POST['rs20'];
        $rs10=$_POST['rs10'];
        $rs5=$_POST['rs5'];
        $coin=$_POST['coin'];
        $total_price=$_POST['total_price'];
        $uid=$_POST['uid'];
        $con=new mysqli("localhost","root","","varad_vinayak_db");
        if($con->connect_error){ die("Connection Failed:".$con->connect_error); }
        $stmt=$con->prepare("insert into transaction(Date,Rs2000,Rs500,Rs200,Rs100,Rs50,Rs20,Rs10,Rs5,Coin,Total,Us_id) Values(?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssi",$date,$rs2000,$rs500,$rs200,$rs100,$rs50,$rs20,$rs10,$rs5,$coin,$total_price,$uid);
        if($stmt->execute())
        {
            $con->close();
            header("location:UserLogin.php?succ_id=".$uid);
        }
        else
        {
            $con->close();
            header("location:UserLogin.php?succ_id=6666");
        }
    }
?>