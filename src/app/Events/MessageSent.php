<?php
declare(strict_types=1);

namespace App\Events;

use App\Models\ChatHistory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets;

    public string $userName;
    public string $message;
    public string $time;

    /**
     * @param ChatHistory $message
     */
    public function __construct(ChatHistory $message)
    {
        $this->userName = $message->user->name;
        $this->message = $message->message;
        $this->time = (string) $message->created_at;
    }

    /**
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('chat');
    }
}
