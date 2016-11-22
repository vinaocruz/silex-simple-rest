<?php

namespace Domain;

use Domain\AbstractEntity;

interface RepositoryInterface
{
    public function save(AbstractEntity $entity);

    public function update(AbstractEntity $entity);

    public function delete(AbstractEntity $entity);

    public function get($id);

    public function findAll($options = null);
}