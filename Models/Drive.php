<?php
class _es_drive
{
    public function __construct()
    {
        $this->db = NewSQLConnection();
    }

    public function capture_upload($id)
    {
        if(!isset($id))
            $e_id = $_POST["e_id"];
        else
            $e_id = $id;
        file_log("$e_id", "UPLOAD");
        // $res = $this->db->query("SELECT _es_id FROM ES_EVENT WHERE _es_id = $e_id");
        // if($res->num_rows < 1)
        //     return FALSE;
        if(!$this->db->query("INSERT INTO ES_FILES(_es_name, _es_event) VALUES('".$_FILES["es_file"]["name"]."', $e_id)"))
        {
            $this->db->close();
            return FALSE;
        }
        $id = $this->db->insert_id;

        $target_dir = FILES_ROOT."FileStore/";
        $target_file = $target_dir . basename($_FILES["es_file"]["name"]);
        if(strtolower(pathinfo($target_file,PATHINFO_EXTENSION)) == "zip")
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], FILES_ROOT."FilesStore/$id.zip");
            $this->db->close();
            return TRUE;
        }
        $this->db->close();
        return FALSE;
    }

    public function download($file_id)
    {
        file_log("$file_id", "DOWNLOAD");
        $res = $this->db->query("SELECT * FROM ES_FILES WHERE _es_id = $file_id");
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            $file_url = FILES_ROOT."FileStore/".$id.".zip";
            header('Content-Type: application/zip');
            header("Content-Transfer-Encoding: Binary"); 
            header("Content-disposition: inline; filename=\"".$row["_es_name"]."\""); 
            readfile($file_url);
            die();
        }
    }

    public function get_event_files($event_id)
    {
        return $this->db->query("SELECT * FROM ES_FILES WHERE _es_event = $event_id");
    }

    public function all_files()
    {
        return $this->db->query("SELECT * FROM ES_FILES");
    }

    private function file_log($file, $action)
    {
        global $Auth;
        $this->db->query("INSERT INTO ES_F_LOGS(_es_f_id, _es_user, _es_action) VALUES('$file', '$Auth->email', '$action')");
    }
}


class file_log_helper
{
    public function __construct()
    {
        $this->db = NewSQLConnection();
    }

    public function get_logs($f_id)
    {
        return $this->db->query("SELECT * FROM ES_F_LOGS WHERE _es_f_id = $f_id");
    }
}
?>