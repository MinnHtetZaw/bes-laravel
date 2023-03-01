<?php

namespace App\Events;

use App\Models\Bed;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bed;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bed $bed)
    {
        $this->bed = $bed;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
