<?php

require_once "../helpers/mailer/PHPMailerAutoload.php";

/*
Set session data once validated so that it can be used later
*/
class AuthManager
{
    public function __construct()
    {
        $this->db = NewSQLConnection();
        if($this->db == null)
        {
            throw new Exception("could not initialise the database");
        }
    }

    public function CreateAccount($email, $password, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $q = "INSERT INTO ES_Acc(_es_email, _es_pwd) VALUES('$email', '$password')";
        return $this->db->query($q);
    }

    public function ForgotPassword($email)
    {
        $token = md5($email);
        $q = "INSERT INTO ES_FORGOT_PWD(_es_email, _es_token) VALUES('$email', '$token')
        ON DUPLICATE KEY UPDATE _es_token = '$token'";
        if($this->db->query($q) === TRUE)
        {
            return send_pwd_reset_mail($email, $token);
        }
        else
        {
            return FALSE;
        }
    }

    public function AcceptPasswordChange($token, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $q = "SELECT _es_email FROM ES_FORGOT_PWD WHERE _es_token = '$token'";
        $res = $this->db->query($q);
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            $q = "UPDATE ES_ACC SET _es_pwd = '$password' WHERE _es_email = '".$row["_es_email"]."'";
            return $this->db->query($q);
        }
        return FAlSE;
    }

    public function UsersList()
    {
        return $this->db->query("SELECT * FROM ES_ACC");
    }
}



function send_pwd_reset_mail($email, $token)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    // WRITE THE SMTP SERVER DETAILS BELOW
    $mail->Host       = "mail.somesite.com";
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->Port       = 25;


    //GIVE THE USERNAME AND PASSWORD OF THE SMTP SERVER HERE
    $mail->Username   = "";
    $mail->Password   = "";  


    $mail->setFrom('someone@example.com', 'john Doe');
    $mail->addAddress("$Email");
    $mail->isHTML(true);


    $mail->Subject = 'Access Update';


    // WRITE THE EMAIL BODY WITH DESIGN BELOW
    $mail->Body = "";
    $mail->AltBody = 'Click to complete registration : <a href="http://previews.appley.io/AkamaiCDN/ContinueRegistration.php?ref=$token">Continue Registration</a>';
    return $mail->send();
}



/*
Auth user data
*/
class context_user
{
    public function __construct()
    {
        $this->username = "";
        $this->IsAuthed = FALSE;
    }
}

$live_user = new context_user();


?>