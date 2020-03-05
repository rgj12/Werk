<?php

class Chat
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMessages($id)
    {
        $this->db->query("SELECT * FROM chat_message INNER JOIN users ON chat_message.`from_user_id` = users.id WHERE chat_message.to_user_id = :user_id OR chat_message.to_user_id = 0 OR chat_message.from_user_id = :user_id
        ORDER BY time_stamp DESC LIMIT 50");
        $this->db->bind(':user_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        $results = $this->db->resultSet();
        return $results;
    }

    public function sendMessage($data)
    {
        $this->db->query(
            "INSERT INTO chat_message (to_user_id, from_user_id,bericht,urgentie,gelezen)
            VALUES (:to_id, :from_id,:mssage,:urg,:gelezen)"
        );

        //bind data
        $this->db->bind(':to_id', $data['to']);
        $this->db->bind(':from_id', $data['from']);
        $this->db->bind(':mssage', $data['bericht']);
        $this->db->bind(':urg', $data['urgentie']);
        $this->db->bind(':gelezen', $data['gelezen']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMessage($id)
    {
        $this->db->query('UPDATE chat_message SET gelezen = "wel" WHERE chat_message_id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMessagesInDropdown($id)
    {
        $this->db->query("SELECT * FROM chat_message INNER JOIN users ON chat_message.`from_user_id` = users.id WHERE chat_message.to_user_id = :user_id AND chat_message.gelezen = 'niet' ORDER BY time_stamp DESC LIMIT 10");
        $this->db->bind(':user_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getNumberOfMessages($id)
    {
        $this->db->query("SELECT COUNT(chat_message_id) AS aantalBerichten FROM chat_message WHERE to_user_id = :user_id AND gelezen = 'niet'");
        $this->db->bind(':user_id', $id);
        $aantalBerichten = $this->db->single();
        return $aantalBerichten['aantalBerichten'];
    }
}