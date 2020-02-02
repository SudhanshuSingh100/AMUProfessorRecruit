<?php
session_start();
if (isset($_SESSION['userID'])) {
    echo "<script>document.location='userDashboard.php'</script>";
} else {
//    echo "<script>document.location='index.php'</script>";
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
                top:400px;
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
                padding:5px 0;
            }

            .textbox{
                width:100%;
                overflow:hidden;
                font-size:20px;
                padding:8px 0;
                /*                margin:30px 0;*/
                padding: 10px;
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
        <!--        <nav class="navbar navbar-expand-md  navbar-light">
                    <a class="navbar-brand" href="#">Aligarh Muslim Unversity</a>
        
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                        </ul>
                    </div>
                </nav>-->

        <?php
        require('include/connection.php');
        //Process
        if (isset($_POST['submit'])) {

            $myName = $_POST['name']; //prevents types of SQL injection
            $myEmail = $_POST['email'];
            $myPhone = $_POST['phone'];
            $myPassword = $_POST['password'];
            $myConfirm = $_POST['confirm'];


            if (empty($myName)) {
                $msg = "please enter your name";
            } else if (empty($myEmail)) {
                $msg = "please enter your email";
            } else if (empty($myPhone)) {
                $msg = "please enter your phone number";
            } else if (empty($myPassword)) {
                $msg = "please enter your password";
            } else if (!filter_var($myEmail, FILTER_VALIDATE_EMAIL)) {
                $msg = "please enter valid email address";
            } else if ($myPassword != $myConfirm) {
                $msg = "password not matched";
            } else {
                $sql = "Select * from tbluser where userEmail='$myEmail'";
                $chkData=$con->query($sql);
                if (mysqli_affected_rows($con)>0) {
                    $c_msg = "<div style='color:red;'>User already registrated</div>";
                } else {
                    $sql = "INSERT INTO tbluser(userName, userEmail, userContact, userPassword) VALUES ('$myName','$myEmail','$myPhone', '$myPassword')";
                    if ($con->query($sql)) {
                        $con->query("INSERT INTO `partStatus`(`isALock`, `isBLock`, `isCLock`, `isFinalLock`) VALUES ('false','false','false',
                            'false')");
                        $c_msg = "Registered successfull";
                    } else {
                        $c_msg = $sql;
                    }
                }
            }
            //$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

            /* 	$sql = mysql_query( "INSERT INTO signup(name, email, phone, password) VALUES ('$myName','$myEmail','$myPhone', '$myPassword')" )
              or die( mysql_error() );


              die( "You have registered for an account.<br><br>Go to <a href=\"login.php\">Login</a>" );
              }

              echo "<center><h3>Register an account by filling in the needed information below:</h3></center>";
             */
        }
        ?> 

        <br><br><br><br>

        <form action="" method="post">
            <div class="row" style="padding:20px;box-shadow: 0px 0px 10px green" >
                <div class="col-sm-2"></div>
                <div class="col-sm-4" style="background-colo: red">
                    <br>
                    <center>
                        <img src="Resource/Amu-logo.png" style="padding: 0px;height:250px;width: 250px"/>
                        <br><br>
                        <h3>Aligarh Muslim University</h3>
                    </center>  
                </div>

                <div class="col-sm-4">
                    <div class="login-ox " style="borer: 1px solid black">
                        <h1><center>Sign Up</center></h1>
                        <div class="textbox">
                            <input type="text"  placeholder=Name name="name" value="">
                        </div>

                        <div class="textbox">
                            <input type="email" placeholder="Email/Username" required name="email" value="">
                        </div>
                        <div class="textbox">
                            <Script>
                                function isVaildNo(){
                                if (document.getElementById("id_contactNo").value.length > 10){ 
                                document.getElementById("id_contactNo").style.color = 'red';
                                } else{
                                document.getElementById("id_contactNo").style.color = 'black';
                                }
                                }
                            </script>
                            <input type="number" oninput="isVaildNo();" placeholder="Phone number" id="id_contactNo" name="phone" value="">
                        </div>

                        <div class="textbox">
                            <input type="password" placeholder="Password" required name="password" value="">
                        </div>

                        <div class="textbox">
                            <input type="password" placeholder="confirm password" required name="confirm" value="">
                        </div>
                        <script>
                            function isPasswordMatch() {
                            if (document.getElementById().value == document.getElementByOd)
                            }
                        </script>
                        <input class="btn" type="submit" onsubmit="return isPasswordMatch();" name="submit" value="Sign up">

                        <p style="color:red">
                            <?php
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?></p>
                        <p style="color:green">
                            <?php
                            if (isset($c_msg)) {
                                echo $c_msg;
                            }
                            ?></p>



                        </form>
                        <center>
                            Already have an account? <a href="index.php"><b>Login Here</b></a>
                        </center>

                    </div>

                </div>


            </div>




    </body>
</html>