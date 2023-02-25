<?php
require_once "../config.php";
require_once BLA . "include/header.php";

    if(isset($_SESSION["admin_name"])):
        echo $_SESSION["admin_name"] . "<br>";
        echo $_SESSION["admin_email"] . "<br>";
        echo $_SESSION["admin_id"] . "<br>";
    endif;

?>



<?php require_once BLA . "include/footer.php"; ?>
