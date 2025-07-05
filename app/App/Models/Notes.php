<?php

class Note
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Assumes you have a Database class
    }

    public function getNotesByUser($userId)
    {
        $this->db->query("SELECT * FROM notes WHERE user_id = :user_id AND deleted_at IS NULL ORDER BY created_at DESC");
        $this->db->bind(':user_id', $userId);
        return $this->db->resultSet();
    }

    public function getNoteById($id)
    {
        $this->db->query("SELECT * FROM notes WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $this->db->query("INSERT INTO notes (user_id, subject, body, completed, created_at) VALUES (:user_id, :subject, :body, :completed, NOW())");
        $this->db->bindMultiple($data);
        return $this->db->execute();
    }

    public function update($data)
    {
        $this->db->query("UPDATE notes SET subject = :subject, body = :body, completed = :completed WHERE id = :id AND user_id = :user_id");
        $this->db->bindMultiple($data);
        return $this->db->execute();
    }

    public function delete($id, $userId)
    {
        $this->db->query("UPDATE notes SET deleted_at = NOW() WHERE id = :id AND user_id = :user_id");
        $this->db->bind(':id', $id);
        $this->db->bind(':user_id', $userId);
        return $this->db->execute();
    }
}
