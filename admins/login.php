<?php
    require_once "../config.php";
    require_once BL . "functions/validate.php";
    require_once BL . "functions/db.php";

    if(isset($_SESSION["admin_name"])):
        header("Location:" . BURLA . "index.php");
    endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>css/style.css">
    <title>Login</title>
</head>
<body>
    <?php
            if(isset($_POST["login"])):
                $email = $_POST["email"];
                $password = $_POST["password"];

                if(checkEmpty($email) && checkEmpty($password)):
                    if(validEmail($email)):
                    $data = login($email, $password);
                    // $check_password = password_verify($password, $data["admin_password"]);
                        if($data == true):
                            $_SESSION["admin_name"] = $data['admin_name'];
                            $_SESSION["admin_email"] = $data['admin_email'];
                            $_SESSION["admin_id"] = $data['admin_id'];

                            header("Location:".BURLA."index.php"); 
                        else:
                            $error_message = "Data Not Correct";
                        endif;
                    else:
                        $error_message = "Please Type Correct Email";
                    endif;
                else:
                    $error_message = "Please Fill All Fields";
                endif;
            endif;
        ?>
    
    <div class="cont-login d-flex align-items-center justify-content-center">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="border p-5">
            <div class="row">
                <!-- To call message file from functions folder to validate -->
                <?php require_once BL . "functions/messages.php" ?>
                <div class="col-sm-12">
                    <h3 class="text-center p-3 text-white">Login</h3>
                </div>
                <div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control mb-3" placeholder="Enter your email" >
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control mb-3" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-success login save">Login</button>   
                    </div> 
                </div>
            </div>
        </form>
    </div>


    <script src="<?php echo ASSETS; ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo ASSETS; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>