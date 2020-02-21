<?php

class Chat
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMessage($id)
    {
        $this->db->query("SELECT * FROM chat_message INNER JOIN users ON chat_message.`from_user_id` = users.id WHERE to_user_id = :user_id ORDER BY time_stamp DESC LIMIT 1");
        $this->db->bind(':user_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getNumberOfMessages($id)
    {
        $this->db->query("SELECT COUNT(chat_message_id) AS aantalBerichten FROM chat_message WHERE to_user_id = :user_id");
        $this->db->bind(':user_id', $id);
        $aantalBerichten = $this->db->single();
        return $aantalBerichten['aantalBerichten'];
    }

    public function sendMessage($data)
    {
        $this->db->query('INSERT INTO chat_message(to_user_id,from_user_id,chat_message) VALUES(:uid,:fuid,:chat_message)');
        $this->db->bind(':uid', $data['sender']);
        $this->db->bind(':fuid', $data['receiver']);
        $this->db->bind(':chat_message', $data['bericht']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getChat($sender, $reciever)
    {
        $this->db->query("SELECT * FROM chat_message LEFT JOIN users AS from_user_id ON chat_message.'from_user_id' = from_user_id.id LEFT JOIN users AS to_user_id ON chat_message.'to_user_id' = to_user_id.id ORDER BY chat_message.chat_message_id");
        $this->db->bind(':sender_id', $sender);
        $this->db->bind(':reciever', $reciever);
        $results = $this->db->resultSet();
        return $results;
    }
}
