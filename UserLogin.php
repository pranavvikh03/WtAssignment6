<?php
 ob_start();
 session_start();
?>
<!Doctype html>
<html>
    <head>
        <title>User Login</title>
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
<?php
$uuid=null;
if(isset($_POST['usersubmit']))
{
    $uuid=$_POST['userlist'];
}
if(isset($_GET['succ_id']))
{
    $uuid=$_GET['succ_id'];
}
    $con=new mysqli("localhost","root","","varad_vinayak_db");
    if($con->connect_error){ die("Connection Failed:".$con->connect_error);}
    $resultdata=$con->query("select * from transaction where Us_id=".$uuid);
    $resultdata1=$con->query("select User_Name from userlist where User_id=".$uuid);
    $row2525=$resultdata1->fetch_assoc();
?>        
        <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-dark">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-light">Home</a>
            </li>
            <li class="nav-item">
                <a href="LoginPage.php" class="nav-link text-light ">Login</a>
            </li>
            </ul>
        </nav>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="display-4 offset-5"><strong>User Login</strong></div><br/>
                <h4 class="offset-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome <?= $row2525['User_Name']?></h4>
                <?php 
                if(isset($_GET['succ_id']))
                {
                    $id=$_GET['succ_id'];
                    if($id!=6666)
                    {?>
                <div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Transaction inserted Successfully...!</strong></div>
                    <?php } if($id==6666){?>
                <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Transaction insertion Failed</strong></div>
                <?php } } ?>
                <div class="row">
                    <div class="col-sm-8">
                        <h3>Transaction History</h3>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-warning float-right" style="color:white;" data-toggle="modal" data-target="#myModal">Add a New Transaction</button>
                    </div>
                </div><br/>
                <table class="table table-hover table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>Date of Transaction</th>
                            <th>Rs.2000</th>
                            <th>RS.500</th>
                            <th>Rs.200</th>
                            <th>Rs.100</th>
                            <th>Rs.50</th>
                            <th>Rs.20</th>
                            <th>Rs.10</th>
                            <th>Rs.5</th>
                            <th>Coin</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($roww = $resultdata->fetch_assoc()){?>
                        <tr>
                            
                            <td><?= $roww['Date']?></td>
                            <td><?= $roww['Rs2000']?></td>
                            <td><?= $roww['Rs500']?></td>
                            <td><?= $roww['Rs200']?></td>
                            <td><?= $roww['Rs100']?></td>
                            <td><?= $roww['Rs50']?></td>
                            <td><?= $roww['Rs20']?></td>
                            <td><?= $roww['Rs10']?></td>
                            <td><?= $roww['Rs5']?></td>
                            <td><?= $roww['Coin']?></td>
                            <td><?= $roww['Total']?></td>
                        </tr>
                        <?php } $con->close();?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Transaction</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="insertTransaction.php" method="post">
                            <input type="hidden" name="uid" value="<?= $uuid?>"/>
                            <div class="form-group">
                                <label for="Date_of_trasaction" class="font-weight-bold">Date of Transaction:</label>
                                <input type="date" name="mydate" class="form-control" required/>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="rs2000" class="font-weight-bold">Rs.2000</label>
                                    <input type="number" name="rs2000" id="rs2000" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs500" class="font-weight-bold">Rs.500</label>
                                    <input type="number" name="rs500" id="rs500" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs200" class="font-weight-bold">Rs.200</label>
                                    <input type="number" name="rs200" id="rs200" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs100" class="font-weight-bold">Rs.100</label>
                                    <input type="number" name="rs100" id="rs100" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="rs50" class="font-weight-bold">Rs.50</label>
                                    <input type="number" name="rs50" id="rs50" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs20" class="font-weight-bold">Rs.20</label>
                                    <input type="number" name="rs20" id="rs20" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs10" class="font-weight-bold">Rs.10</label>
                                    <input type="number" name="rs10" id="rs10" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="rs5" class="font-weight-bold">Rs.5</label>
                                    <input type="number" name="rs5" id="rs5" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="coin" class="font-weight-bold">Coin</label>
                                    <input type="number" name="coin" id="coin" class="form-control" required/>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="total_price" class="font-weight-bold">Total Transaction:</label>
                                    <input type="text" name="total_price" id="total_price" class="form-control"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger" style="width:60%;margin-left:22%;" name="submitdata">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
               $("#total_price").on({
                   focus: function(){
                       var rs2000=parseInt($("#rs2000").val());
                       var total2000=rs2000*2000;
                       var rs500=parseInt($("#rs500").val());
                       var total500=rs500*500;
                       var rs200=parseInt($("#rs200").val());
                       var total200=rs200*200;
                       var rs100=parseInt($("#rs100").val());
                       var total100=rs100*100;
                       var rs50=parseInt($("#rs50").val());
                       var total50=rs50*50;
                       var rs20=parseInt($("#rs20").val());
                       var total20=rs20*20;
                       var rs10=parseInt($("#rs10").val());
                       var total10=rs10*10;
                       var rs5=parseInt($("#rs5").val());
                       var total5=rs5*5;
                       var coin=parseInt($("#coin").val());
                       var total=1;
                               total=total2000+total500+total200+total100+total50+total20+total10+total5+coin;
                       $("#total_price").val(total);
                   },
                   click: function(){ 
                       var rs2000=parseInt($("#rs2000").val());
                       var total2000=rs2000*2000;
                       var rs500=parseInt($("#rs500").val());
                       var total500=rs500*500;
                       var rs200=parseInt($("#rs200").val());
                       var total200=rs200*200;
                       var rs100=parseInt($("#rs100").val());
                       var total100=rs100*100;
                       var rs50=parseInt($("#rs50").val());
                       var total50=rs50*50;
                       var rs20=parseInt($("#rs20").val());
                       var total20=rs20*20;
                       var rs10=parseInt($("#rs10").val());
                       var total10=rs10*10;
                       var rs5=parseInt($("#rs5").val());
                       var total5=rs5*5;
                       var coin=parseInt($("#coin").val());
                       var total=total2000+total500+total200+total100+total50+total20+total10+total5+coin;
                       $("#total_price").val(total);
               }
              }); 
            });
        </script>
    </body>
</html>