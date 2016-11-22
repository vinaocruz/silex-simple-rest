<?php

namespace Annotation\Service;

use Silex\Application;
use Domain\{AbstractService,RepositoryInterface};
use Annotation\Entity\Note;

class NoteService extends AbstractService
{
    protected $repository;

    public function __construct(Application $app, RepositoryInterface $repository)
    {
        parent::__construct($app);
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function get($id)
    {
        return $this->repository->get($id);
    }

    public function save(Note $note)
    {
        return $this->repository->save($note);
    }

    public function update(Note $note)
    {
        return $this->repository->update($note);
    }

    public function delete(Note $note)
    {
        return $this->repository->delete($note);
    }

}
