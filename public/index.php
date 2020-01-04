<?php
declare(strict_types=1);

use App\Handlers\StartHandler;
use Zetgram\Bot;
use Zetgram\Types\Update;

require __DIR__ . '/../boot.php';

/**
 * @var Bot $bot
 */
$bot = $container->get(Bot::class);

include APP_DIR . 'routes.php';

$update = new Update(getRequestBody());
$bot->handleUpdate($update);
