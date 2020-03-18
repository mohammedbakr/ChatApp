<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageDelivered implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

    }// end of construct

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat-group');
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->prepareData(),
        ];
    }

    protected function prepareData()
    {
        return [
            'id'  => $this->message->id,
            'userId'  => $this->message->user->id,
            'body'  => $this->message->body,
            'createdAt'  => $this->message->created_at,
            'updatedAt'  => $this->message->updated_at,
            'userName'  => $this->message->user->name,

        ];
    }
}
