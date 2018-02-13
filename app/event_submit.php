<?php

    $eva = new _es_event_helper();

    $res = $eva->capture_add();
    if  ($res < 1)
    {
        header("location:event_error.php?msg=".urlencode("Event Registration Failed"));
    }
    else
    {
        if($_FILES["es_file"]["error"] == 4) {
            $file = new _es_Drive();
            $file->capture_upload($res);
        }
        header("location:table.php"); 
    }
?>

    