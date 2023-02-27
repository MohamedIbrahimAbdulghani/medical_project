<?php 
require_once "../../config.php";
require_once BLA . "include/header.php";
require_once BL . "functions/validate.php";

?>

    <?php
    if(isset($_POST["submit"])):
        $name = $_POST["name"];
        if(checkEmpty($name) && checkLength($name, 3)):
            $sql = "INSERT INTO `cities` (`city_name`) VALUES ('$name') ";
            $success_message = insertData($sql);
            // Focus This Code
            header("refresh:1;url=".BURLA."cities/all_cities.php");
        else:
            $error_message = "You Must Enter 3 Letter Minimum";
        endif;
    endif;
    require_once BL . "functions/messages.php";

    ?>

    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="text-center p-3 bg-primary text-white ">Add New City</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="form-group">
                <input type="text" name="name" class="form-control mt-3" placeholder="Enter name of city">
            </div>
            <button type="submit" name="submit" class="btn btn-success save">Save</button>
        </form>
    </div>



<?php require_once BLA . "include/footer.php"; ?>