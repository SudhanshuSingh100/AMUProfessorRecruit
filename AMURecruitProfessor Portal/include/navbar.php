<?php
include 'include/BS_Link.php';
?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" id="id_NavBar">
    <a class="navbar-brand" href="#">Aligarh Muslim University</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item" style="position: fixed;right: 0px;top:5px;">
                <a class="btn nav-link" style="background-color:#4caf50 ;box-radius:0px;color:white;display: inline-block" href="#"><?php echo "Welcome " . $_SESSION['userName']; ?></a>
                <a class="btn nav-link" style="background-coor:#4caf50 ;box-radius:0px;color:white;display: inline-block" href="logout.php"><?php echo "Log Out" ?></a>
            </li>
        </ul>
    </div>
</nav>
<div style="margin: 55px"></div>
<!--<button onclick="document.getElementById('id_NavBar').style.display='none'; ">Hide NavBar</button>-->