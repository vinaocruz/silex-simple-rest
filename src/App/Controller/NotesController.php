<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NotesController
{
    protected $notesService;

    public function __construct(Application $app)
    {
        $this->notesService = $app['notes.service'];
    }

    public static function routes(Application $app)
    {
        $routing = $app["controllers_factory"];

        $routing->get('/notes', [new self($app), 'fetchAll']);
        $routing->get('/notes/{id}', [new self($app), 'fetch']);
        $routing->post('/notes', [new self($app), 'save']);
        $routing->put('/notes/{id}', [new self($app), 'update']);
        $routing->delete('/notes/{id}', [new self($app), 'delete']);

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
