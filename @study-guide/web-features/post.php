<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/29/2019
 * Time: 11:49 PM
 */


$uploadFolder = 'uploads/';
$uploadFile = $uploadFolder . basename($_FILES['rsm_data']['name']);

foreach ($_FILES["pics"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pics"]["tmp_name"][$key];

        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = $uploadFolder . basename($_FILES["pics"]["name"][$key]);
        move_uploaded_file($tmp_name, $name);
    }
}

if (move_uploaded_file($_FILES['rsm_data']['tmp_name'], $uploadFile)) {
    echo "success !";
}
else {
    echo "fail";
}




echo "<br><br>";

var_dump($_FILES);



//