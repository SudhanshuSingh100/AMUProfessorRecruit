<?php
session_start();
if (isset($_SESSION['userID'])) {
    include 'include/navbar.php';
    include 'dashboard.php';
    
} else {
    echo "<script>document.location='index.php'</script>";
}
?>
