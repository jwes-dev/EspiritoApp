<?php
$file = new _es_Drive();
if($file->capture_upload())
{
    header("Location: ".APP_ROOT."table.php");
}
else{
    header("Location: ".APP_ROOT."error.pgp");
}
?>