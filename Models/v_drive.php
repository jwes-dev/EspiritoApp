<?php
/*
BUILD IN PROCEESS
*/

class v_drive
{
    public function __construct($drive_root)
    {
        if(!isset($drive_root))
        {
            throw new Exception("FATAL ERROR: V-Drive root not set. Cannot start drive");
            die();
        }
        $this->root = $drive_root;
        $this->db = NewSQLConnection();
        if($this->db == null)
        {
            throw new Exception("could not initialise the database");
        }
    }

    public function create_folder($folder_name)
    {

    }
}
?>