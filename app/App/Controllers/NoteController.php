<?php

class NotesController
{
    private $noteModel;

    public function __construct()
    {
        require_once '../app/models/Note.php';
        $this->noteModel = new Note();
    }

    public function index()
    {
        $userId = $_SESSION['user_id'];
        $notes = $this->noteModel->getNotesByUser($userId);
        require_once '../app/views/notes/index.php';
    }

    public function create()
    {
        require_once '../app/views/notes/create.php';
    }

    public function store()
    {
        $data = [
            'user_id' => $_SESSION['user_id'],
            'subject' => $_POST['subject'],
            'body' => $_POST['body'],
            'completed' => isset($_POST['completed']) ? 1 : 0
        ];
        $this->noteModel->create($data);
        header('Location: /notes');
    }

    public function edit($id)
    {
        $note = $this->noteModel->getNoteById($id);
        require_once '../app/views/notes/edit.php';
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'user_id' => $_SESSION['user_id'],
            'subject' => $_POST['subject'],
            'body' => $_POST['body'],
            'completed' => isset($_POST['completed']) ? 1 : 0
        ];
        $this->noteModel->update($data);
        header('Location: /notes');
    }

    public function destroy($id)
    {
        $this->noteModel->delete($id, $_SESSION['user_id']);
        header('Location: /notes');
    }
}
