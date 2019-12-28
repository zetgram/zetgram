<?php
declare(strict_types=1);

use App\Handlers\StartHandler;
use Zetgram\Bot;

require __DIR__ . '/../boot.php';

/**
 * @var Bot $bot
 */
$bot = $container->get(Bot::class);

$bot->hears('\/start.*', StartHandler::class);
/*
 * @TODO webhook
 */
$bot->run();
