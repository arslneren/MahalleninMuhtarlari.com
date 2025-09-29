<?php
session_start();
session_destroy();
setcookie("çerez","", time()-1);
header("location:login");

?>