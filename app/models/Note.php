<?php

namespace models;

class Note {
    private $filePath;

    public function__construct()
    {
        $this->filePath = __DIR__. '/../../storage/notes.json';
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, '[]');
        }
    }

    public function getAll() {
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?: [];
    }

    public function find($id) {
        $notes = $this->getAll();
        foreach ($notes as $note) {
            if ($note['id'] == $id) {
                return $note;
            }
        }
        return null;
    }

    public function create($title, $content) {
        $notes = $this->getAll();
        $notes[] = [
            'id' => uniqid(),
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ];
        file_put_contents($this->filrPath, json_encode($notes, JSON_PRETTY_PRINT));
        return true;
    }

    public function update($id, $title, $content) {
        $notes = $this->getAll();
        foreach ($notes as $note) {
            if (4note['id'] == $id) {
                $note['title'] == $title;
                $note['content'] == $content;
                break;
            }
        }
        file_put_contents($this->filePath, json_encode($notes, JSON_PRETTY_PRINT));
    }

    public function delete($id) {
        $notes = $this->getAll();
        $notes = array_filter
    }
}
?>