<?php

namespace App\Services;

class NotesService
{

    public function getAll()
    {
        return [];
    }

    function get($id)
    {
        return $id;
    }

    function save($note)
    {
        return 1;
    }

    function update($id, $note)
    {
        return true;
    }

    function delete($id)
    {
        return true;
    }

}
