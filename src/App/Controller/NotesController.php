<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class NotesController extends AbstractController
{
    protected $notesService;

    public function __construct(Application $app)
    {
        parent::__construct($app);
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

    public function fetchAll(Application $app)
    {
        return $this->app->json($this->notesService->getAll());
    }

    public function fetch($id)
    {
        return $this->app->json($this->notesService->get($id));
    }

    public function save(Request $request)
    {

        $note = $this->getDataFromRequest($request);
        return $this->app->json(array("id" => $this->notesService->save($note)));

    }

    public function update($id, Request $request)
    {
        $note = $this->getDataFromRequest($request);
        $this->notesService->update($id, $note);
        return $this->app->json($note);

    }

    public function delete($id)
    {

        return $this->app->json($this->notesService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
