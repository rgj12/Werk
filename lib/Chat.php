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
        $this->db->query("SELECT * FROM chat_message INNER JOIN users ON chat_message.`from_user_id` = users.id WHERE to_user_id = :user_id");
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
}