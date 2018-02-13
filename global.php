<?php
/*
Defines
*/
define("APP_ROOT", "/EspiritoApp/");
define("FILES_ROOT", $_SERVER["DOCUMENT_ROOT"]."/EspiritoApp/");

/*
Logging helper
*/
function event_log($type, $desc)
{
    $conn = NewSQLConnection();
    /* Add the user email */
    return $conn->query("INSERT INTO ES_LOGS(_es_type, _es_desc,_es_logger) VALUES('$type', '$desc', '')");
}



/*
Status helpers
*/
function set_Status_code_result($id, $msg)
{
    $sapi_type = php_sapi_name();
    if (substr($sapi_type, 0, 3) == 'cgi')
        header("Status: $id $msg");
    else
        header("HTTP/1.1 $id $msg");
    die();
}


/*
Simple helper functions
*/
function server_map_url($vpath)
{
    return APP_ROOT."$vpath";
}




/*
functionality
*/

class Sanders_Nav
{
    public function __construct()
    {
        /*
        NAME => {url, display icon, title}
        */
        $this->menu = array(
            "New Events" => array("./event.php", "event", "New Event"),
            "Event List" => array("./table.php", "content_paste", "All Events"),
            "Files" => array("./files.php", "play_for_work", "Uploaded Files")
        );

        $this->master_menu = array(
            "Users" => array("./Admin/Users.php", "group", "User Manager")
        );
    }

    public function render_menu()
    {
        foreach($this->menu as $name => $ico_url)
        {
            if($ico_url[0] == "./".REQ_RES)
            {
                echo '<li class="active">
                <a href="'.$ico_url[0].'">
                    <i class="material-icons">'.$ico_url[1].'</i>
                    <p>'.$name.'</p></a></li>';
            }
            else{
                echo '<li>
                <a href="'.$ico_url[0].'">
                    <i class="material-icons">'.$ico_url[1].'</i>
                    <p>'.$name.'</p></a></li>';
            }
        }
        global $Auth;
        if($Auth->role == "ADMIN")
            foreach($this->master_menu as $name => $ico_url)
            {
                if($ico_url[0] == "./".REQ_RES)
                {
                    echo '<li class="active">
                    <a href="'.$ico_url[0].'">
                        <i class="material-icons">'.$ico_url[1].'</i>
                        <p>'.$name.'</p></a></li>';
                }
                else{
                    echo '<li>
                    <a href="'.$ico_url[0].'">
                        <i class="material-icons">'.$ico_url[1].'</i>
                        <p>'.$name.'</p></a></li>';
                }
            }
    }

    public function get_title()
    {
        foreach($this->menu as $name => $ico_url)
            if($ico_url[0] == "./".REQ_RES)
                return $ico_url[2];
        return "";
    }
}

$sanders_nav = new Sanders_Nav();
?>