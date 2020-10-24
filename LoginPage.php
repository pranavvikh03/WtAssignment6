<!Doctype html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="Assets/CSS_for_bootstrap/bootstrap.min.css"/>
        <script src="Assets/JS_for_bootstrap/jquery-2.2.4.min.js"></script>
        <script src="Assets/JS_for_bootstrap/bootstrap.bundle.min.js"></script>
        <script src="Assets/JS_for_bootstrap/popper.min.js"></script>
        <link rel="icon" type="ico" sizes="16x16" href="Assets/Images/gopalicon.png">
        <style>
            li{
                font-size:26px;
                vertical-align: middle;
            }
            li:hover{
                color:black;
                background-color:greenyellow;
                
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-dark">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-light">Home</a>
            </li>
            <li class="nav-item">
                <a href="LoginPage.php" class="nav-link text-light ">Login</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light" data-toggle="modal" data-target="#Adduser">Add User</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light" data-toggle="modal" data-target="#removeuser">Remove User</a>
            </li>
            </ul>
        </nav>
        </div>
        <div class="container"><br/>
            <?php 
            if(isset($_GET['id'])){
             $pid=$_GET['id'];            
            if($pid==1)
            {?>
            <div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:20px;">User Created Successfully....!</strong>
            </div>
            <?php }
            if($pid==2)
            {?>
            <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:20px;">User Not Created</strong>
            </div>
            <?php } } ?>
            <?php if(isset($_GET['iid']))
            { $rid=$_GET['iid'];
            if($rid==1){?>
            <div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:20px;">User Removed Successfully....!</strong>
            </div><?php } if($rid==2){?>
            <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:20px;">User Not Removed</strong>
            </div> <?php } } ?>
            <div class="display-4 offset-2"><strong>Login To VaradVinayak Agency</strong></div>
            <?php 
                $con=new mysqli("localhost","root","","varad_vinayak_db");
                if($con->connect_error){ die("Connection Failed:".$con->connect_error);}
                $result=$con->query("select * from userlist");
            ?>
            <form action="UserLogin.php" method="post">
                <div class="form-group">
                    <label for="selectuser" class="font-weight-bold">Select User:</label>
                    <select class="form-control" name="userlist" required>
                        <option disabled hidden>Select User</option>
                        <?php
                         while($row=$result->fetch_assoc())
                        {?><option value="<?= $row['User_id']?>"><?= $row['User_Name']?></option><?php }?>
                    </select>
                </div>
                    <input type="submit" class="btn btn-success btn-lg" style="margin-left:40%;" value="Submit" name="usersubmit"/>
               
            </form>
        </div>
        <div class="modal" id="Adduser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="addUser.php" method="post">
                            <div class="form-group">
                                <label for="username" class="font-weight-bold">User Name:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required/>
                            </div>
                            <div class="form-group"  class="font-weight-bold">
                                <label for="mobile_no">Mobile No:</label>
                                <input type="text" name="mobile" id="mobile_no" class="form-control" placeholder="Enter Mobile No" required/>
                            </div>
                            <input type="submit" class="btn btn-success" value="Submit" name="Submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="removeuser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Remove User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="removeUser.php" method="post">
                            <div class="form-group">
                                <label for="username" class="font-weight-bold">User Name:</label>
                                <select name="userlist" class="form-control" required>
                                    <option disabled hidden>Select User</option>
                                    <?php
                                    $result1=$con->query("select * from userlist");
                                    while($row1=$result1->fetch_assoc())
                                    {?><option value="<?= $row1["User_id"]?>"><?= $row1['User_Name']?></option><?php }?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success" value="Delete" name="deelete"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body><?php $con->close();?>
</html>