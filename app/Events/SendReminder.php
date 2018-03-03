<?php

namespace App\Events;

use App\Models\Reminder;
use App\Scheduler\Event;
use GuzzleHttp\Client;

class SendReminder extends Event
{
    protected $reminder;

    protected $client;

    protected $settings;

    public function __construct(Reminder $reminder, Client $client, $settings)
    {
        $this->reminder = $reminder;
        $this->client = $client;
        $this->settings = $settings;
    }

    public function handle()
    {
        $this->client->request('GET', $this->buildRequestUrl());

        if ($this->reminder->shouldBeRunOnce()) {
            $this->reminder->delete();
        }
    }

    protected function buildRequestUrl()
    {
        return "https://api.telegram.org/bot{$this->settings['telegram']['secret']}/sendMessage?chat_id={$this->settings['telegram']['chat_id']}&text={$this->reminder->body}";
    }
}