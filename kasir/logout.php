<?php 

session_start();
unset($_SESSION['idkaskit']);
unset($_SESSION['userkaskit']);
unset($_SESSION['passkaskit']);
unset($_SESSION['namakaskit']);
unset($_SESSION['levelkaskit']);
unset($_SESSION['fotokaskit']);
header("location: ../")


 ?>