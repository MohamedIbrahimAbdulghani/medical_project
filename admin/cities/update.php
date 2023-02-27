<?php

    require_once "../../config.php";
    require_once BLA . "include/header.php";
    require_once BL . "functions/validate.php";

    if(isset($_POST["submit"])):
        $name = $_POST["name"];
        $city_id = $_POST["city_id"];
        if(checkEmpty($name) && checkLength($name, 3)):
            $row = getRow('cities', 'city_id', $city_id);
            if($row) {
                $sql = "UPDATE `cities` SET `city_name` = '$name' WHERE `city_id` = '$city_id' ";
                $success_message = updateData($sql);
                // Focus This Code
                header("refresh:1;url=".BURLA."cities/all_cities.php");
            } else {
                $error_message = "Please Type Correct Data";
            }
        else:
            $error_message = "Please Fill All Field";
        endif;
    endif;
    require_once BL . "functions/messages.php";


?>




<?php require_once BLA . "include/footer.php"; ?>