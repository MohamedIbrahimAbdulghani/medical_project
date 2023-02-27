<?php

require_once "../../config.php";
require_once BLA . "include/header.php";

if(isset($_GET["id"]) && is_numeric($_GET["id"])):
    $row = getRow('cities', 'city_id', $_GET["id"]);
    if($row):
        $city_id = $row["city_id"];
    else:
        header("Location: " . BURLA);
    endif;
else:
    header("Location: " . BURLA);
endif;


?>




<div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="text-center p-3 bg-primary text-white ">Edit City</h3>
        <form action="<?php echo BURLA . "cities/update.php" ?>" method="POST">
            <div class="form-group">
                <input type="text" name="name" class="form-control mt-3" placeholder="Enter name of city" value="<?php echo $row["city_name"] ?>">
                <input type="hidden" name="city_id" value="<?php echo $city_id ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-success save">Save</button>
        </form>
    </div>


<?php require_once BLA . "include/footer.php"; ?>