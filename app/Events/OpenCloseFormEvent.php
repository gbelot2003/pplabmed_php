<?php

namespace App\Events;

use App\Histopatologia;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OpenCloseFormEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $object;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        //dd($this->object);
        return new Channel('histopatologia.'.$this->object['serial']);
    }

    public function broadcastAs()
    {
        return 'openHisto';
    }
}
