<?php

namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NotesController
{

    protected $notesService;

    public function __construct($service)
    {
        $this->notesService = $service;
    }

    public function routes(Application $app)
    {
        $routing = $app["controllers_factory"];

        $routing->get('/notes', "notes.controller:fetchAll");
        $routing->get('/notes/{id}', "notes.controller:fetch");
        $routing->post('/notes', "notes.controller:save");
        $routing->put('/notes/{id}', "notes.controller:update");
        $routing->delete('/notes/{id}', "notes.controller:delete");

        return $routing;
    }

    public function fetchAll()
    {
        return new JsonResponse($this->notesService->getAll());
    }

    public function fetch($id)
    {
        return new JsonResponse($this->notesService->get($id));
    }

    public function save(Request $request)
    {

        $note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->notesService->save($note)));

    }

    public function update($id, Request $request)
    {
        $note = $this->getDataFromRequest($request);
        $this->notesService->update($id, $note);
        return new JsonResponse($note);

    }

    public function delete($id)
    {

        return new JsonResponse($this->notesService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
