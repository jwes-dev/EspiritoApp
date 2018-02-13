<?php
require_once "helpers/Comm.php";
$realm = 'Espirito';

//user => password
$users = array();
$db = NewSQLConnection();
$res = $db->query("SELECT _es_email, _es_pwd FROM ES_ACC");
while($row = $res->fetch_assoc())
{
    $users = array_merge($users, array($row["_es_email"] => $row["_es_pwd"]));
}

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die();
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate:  Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');
        die();
    }


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
{
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');
    die();
}

class session_data
{ 
    public function __construct()
    {
        global $data;
        $this->email = $data["username"];

        global $db;
        global $data;
        $res = $db->query("SELECT _es_role FROM ES_Acc WHERE _es_email = '".$data["username"]."'");
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            $this->role = $row["_es_role"];
        }
        $this->_is_authentic = true;
    }
}

$Auth = new session_data();

// function to parse the http auth header
function http_digest_parse($txt)
{
    // protect against missing data
    
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
?> 