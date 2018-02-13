<?php
class _es_event_helper
{
    public function __construct()
    {
        $this->db = NewSQLConnection();
        if($this->db == null)
        {
            throw new Exception("could not initialise the database");
        }
    }

    public function capture_add()
    {
        global $Auth;
        $q = "INSERT INTO ES_EVENT(_es_type, _es_cat, _es_mode, _es_name, _es_location, _es_description, _es_start_date, _es_end_date, _es_start_time, _es_end_time, _es_url, _es_added_by)
        VALUES (
            '".$_POST["e_type"]."',
            '".$_POST["e_cat"]."',
            '".$_POST["e_mode"]."',
            '".$_POST["e_name"]."',
            '".$_POST["e_loc"]."',
            '".$_POST["e_desc"]."',
            '".$_POST["e_s_date"]."',
            '".$_POST["e_e_date"]."',
            '".$_POST["e_s_time"]."',
            '".$_POST["e_e_time"]."',
            '".$_POST["e_url"]."',
            '".$Auth->email."'
        )";
        if($this->db->query($q) == TRUE)
        {
            $ret = $this->db->insert_id;
            event_log("NEW_EVENT", "Event '".$_POST["e_name"]."', was created");
            return $ret;
        }
        return 0;

    }

    public function index()
    {
        return $this->db->query("SELECT * FROM ES_EVENT");
    }

    public function capture_edit()
    {
        $q = "UPDATE EV_EVENT SET
            _es_type = '".$_POST["e_type"]."',
            _es_cat = '".$_POST["e_cat"]."',
            _es_mode = '".$_POST["e_mode"]."',
            _es_name = '".$_POST["e_name"]."',
            _es_location = '".$_POST["e_loc"]."',
            _es_description = '".$_POST["e_desc"]."',
            _es_start_date = '".$_POST["e_s_date"]."',
            _es_end_date = '".$_POST["e_e_date"]."',
            _es_start_time = '".$_POST["e_s_time"]."',
            _es_end_time = '".$_POST["e_e_time"]."',
            _es_url = '".$_POST["e_url"]."'
            WHERE _es_id = ".$_POST["_e_id"];
        if($this->db->query($q) == TRUE)
        {
            event_log("EDITED_EVENT", "Event '".$_POST["e_name"]."', was edited");
            return TRUE;
        }
        return FALSE;
    }
    
    public function remove($id)
    {
        $q = "DELETE FROM ES_EVENT WHERE _es_id = $id";
        if($this->db->query($q) == TRUE)
        {
            event_log("EVENT_DELETED", "Event '".$_POST["e_name"]."', was deleted");
            return TRUE;
        }
        return FALSE;
    }

    public function find($id)
    {
        $q = "SELECT * FROM ES_EVENT WHERE _es_id = $id";
        $res = $this->db->query($q);
        if($res->num_rows > 0)
        {
            return $res->fetch_assoc();
        }
    }
}
?>