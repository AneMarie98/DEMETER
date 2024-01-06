<?php
    session_start();
    if(isset($_SESSION["monthCal"])){$_SESSION["monthCal"]=$_SESSION["monthCal"]+$_GET["index"];}
    die("<script>location.href='../calendario.php'</script>");