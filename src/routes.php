<?php

use App\Controller\NotesController;

$app->mount($app["api.endpoint"].'/', NotesController::routes($app));
