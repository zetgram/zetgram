<?php

use App\Handlers\StartHandler;

$bot->hears('\/start.*', StartHandler::class);
