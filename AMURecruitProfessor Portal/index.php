<?php session_start();
    if(isset($_SESSION['userID'])){
        echo "<script>document.location='userDashboard.php';</script>";
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            .{
                background-color:lightblue;
                box-sizing: border-box;
                margin-left:150px;
                margin-right:150px;
                padding: 10px;
            }

            .header {
                padding: 2px;

                background-color:#C0C0C0;
                text-align: center;
                /* background: #1abc9c;*/
                color:black;
                font-size: 17px;
            }

            .login-box{
                width:280px;
                position:absolute;
                top:360px;
                left:50%;
                transform:translate(-50%,-50%);
                color:black;
                font-size:18px;

            }

            .login-box h1{
                float:left;
                font-size:35px;
                border-bottom:3px solid #4caf50;
                margin-bottom:30px;
                padding:10px 0;
            }

            .textbox{
                width:100%;
                overflow:hidden;
                font-size:20px;
                padding:8px 0;
                margin:30px 0;
                border-bottom:1px solid #4caf50;
            }

            .textbox input{
                border:none;
                outline:none;
                background:none;
                color:black;
                font-size:18px;
                width:80%;
                float:left;
                margin:0 10px;
            }

            .btn{
                width:100%;
                background:none;
                border:2px solid #4caf50;
                color:black;
                padding:5px;
                font-size:18px;
                cursor:pointer;
                margin:12px 0;
            }
        </style>    
    </head>

    <body>
        <!--        <div class="header">
                    <h1>ALIGARH MUSLIM UNIVERSITY</h1>
                </div>-->
        <br><br><br><br>
        <form action="" method="post">
            <div class="row" style="padding:20px;box-shadow: 0px 0px 10px green" >
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <br>
                    <center>
                        <img src="Resource/Amu-logo.png" style="padding: 0px;height:250px;width: 250px"/>
                        <br><br>
                        <h3>Aligarh Muslim University</h3>
                    </center>  
                </div>
                <div class="col-sm-4"><br>
                    <center><h2>User Login</h2></center>
                    <div class="textbox">
                        <input type="text" placeholder="Registered Email" name="uEmail" required="" value="">
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="uPassword" required="" value="">
                    </div>

                    <input class="btn" type="submit" name="btnLogin" value="Secure Sign ">
                    <center>
                        Not yet registered? <a href="signup.php"><b>Register Here</b></a>
                    </center>

                </div>
            </div>
        </form>
    </body>
</html>

<?php
include 'include/connection.php';
if (isset($_POST['btnLogin'])) {
    $sql = "Select * from tbluser where userEmail='" . $_POST['uEmail'] . "' and userPassword='" . $_POST['uPassword'] . "' ";
//    echo $sql;
    if ($dataR = $con->query($sql)) {
        if (mysqli_affected_rows($con) > 0) {
            $data = $dataR->fetch_assoc();
            $_SESSION['userID'] = $data['userID'];
            $_SESSION['userName'] = $data['userName'];
            echo "<script>document.location='userDashboard.php';</script>";
        } else {
//            echo "<script>alert('Invalid login details');</script>";
            echo "Invalid login details";
        }
    } else {
        
    }
}
?>