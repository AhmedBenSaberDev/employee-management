<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $nickname;
    public $message;
    public $userId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId,$nickname,$message)
    {
        $this->nickname = $nickname;

        $this->message = $message;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new channel('task'.$this->userId);
    }

    public function broadcastAs()
    {
        return "task-message";
    }
}
