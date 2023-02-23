<?php 
    require_once "../../config.php";
    require_once BLA . "include/header.php";
    require_once BL . "functions/validate.php";
?>

<?php
    if(isset($_POST["submit"])):
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(checkEmpty($name) && checkEmpty($email) && checkEmpty($password)):
            if(validEmail($email)):
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $insert_data = "INSERT INTO `admins` (`admin_name`, `admin_email`, `admin_password`) VALUES ('$name', '$email', '$hash_password')";
                $success_message = insertAdmin($insert_data);
            else:
                $error_message = "Please Enter Valid Email";
            endif;
        else:
            $error_message = "Please Fill All Fields";
        endif;
        require_once BL . "functions/messages.php";
    endif;
?>

    <div class="col-sm-6 offset-sm-3 border p-3 mt-5">
        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success save">Save</button>
        </form>
    </div>

<?php require_once BLA . "include/footer.php"; ?>