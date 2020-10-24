<?php 
    if(isset($_POST['Submit']))
    {
        $name=$_POST['username'];
        $mobile_no=$_POST['mobile'];
        $servername="localhost";
        $username="root";
        $dbname="varad_vinayak_db";
        $password="";
        $con=new mysqli($servername,$username,$password,$dbname);
        if($con->connect_error)
        {
            die("Connection Failed:".$con->connect_error);
        }
        $stmt=$con->prepare("insert into userlist(User_Name,Mobile_No) values(?,?)");
        $stmt->bind_param("ss",$name,$mobile_no);
        
        if($stmt->execute())
        { 
            $con->close();
             header("location:LoginPage.php?id=1");
        }
        else
        { $con->close();
            header("location:LoginPage.php?id=2");
        }
    }
    else
    {
        echo "this is not set";
    }
?>