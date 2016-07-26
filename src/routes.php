<?php

use App\Controller\NotesController;

$app->mount($app["api.endpoint"].'/'.$app["api.version"], NotesController::routes($app));
