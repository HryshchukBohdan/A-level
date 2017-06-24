<?php
include_once 'Singleton.php';

class server
{
    public function addMessage($res)
    {
        $query = "INSERT INTO chat set nick = '$res->nick', message = '$res->message'";
        DbConnect::getConnect()->query($query);
    }

    public function getMessage($res)
    {
        $query = "SELECT * FROM chat WHERE id > $res->messageId";
        $message = DbConnect::getConnect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        $leng = DbConnect::getConnect()->query("select MAX(id) from chat")->fetch();
        $leng = $leng[0];
        $data['data'] = $message;
        $data['nextMessageId'] = $leng;
        echo json_encode($data);
    }

    public function __construct()
    {
        foreach ($_POST as $key => $val)
        {
            $result[] = $key;
            $res = json_decode($result[0]);
            if ($res->func == "addMessage" and !empty($res->nick) and !empty($res->message)) {
                $this->addMessage($res);
            } elseif ($res->func == "getMessages") {
                $this->getMessage($res);
            }
        }
    }
}

$server = new server();