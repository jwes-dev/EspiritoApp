<?php
    class _es_cat_helper
    {
        public function __construct()
        {
            $this->db = NewSQLConnection();
        }

        public function capture_app()
        {
            return $this->db->query("INSERT INTO ES_CATS(_es_name) VALUES(
                '".$_POST["c_name"]."'
            )");
        }

        public function capture_edit()
        {
            return $this->db->query("UPDATE ES_CATS SET _es_name = '".$_POST["c_name"]."'
            WHERE _es_id =".$_POST["c_id"]);
        }

        public function index()
        {
            return $this->db->query("SELECT * FROM ES_CATS");
        }

        public function capture_delete()
        {
            return $this->db->query("DELETE FROM ES_CATS WHERE _Es_id = ".$_POST["c_id"]);
        }

        public function exists($name)
        {
            $res = $this->db->query("SELECT * FROM ES_CATS WHERE _es_name = '$name'");
            return $res->num_rows > 0;
        }
    }
?>