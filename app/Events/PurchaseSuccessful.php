<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PurchaseSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $device;
    public $expiryDate;
    public $receipt;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($device, $expiryDate, $receipt)
    {
        $this->device = $device;
        $this->expiryDate = $expiryDate;
        $this->receipt = $receipt;
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
