<?php 

use App\Scheduler\Kernel;
use App\Models\Reminder;
use App\Events\SendReminder;

require_once  __DIR__. '/bootstrap/app.php';

$kernel = new Kernel;

Reminder::get()->each(function($reminder) use ($kernel, $container){
    $kernel->add(new SendReminder($reminder, $container->guzzle, $container->settings))->cron($reminder->expression);
});


$kernel->run();