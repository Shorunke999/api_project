<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PublicChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class chat_event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $message;
    /**
     * Create a new event instance.
     */
    public function __construct($message)
    {
        return $this->message =$message;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PublicChannel('message_channel'),
        ];
    }
    public function broadcastWith(): array
    {
        return [
            'message'=> $message,
        ];
    }
}
