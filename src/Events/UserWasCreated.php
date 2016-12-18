<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Repositories\Users\UserInterface;

class UserWasCreated extends Event
{
    use SerializesModels;

    /**
     *  User Repository Interface
     */
    protected $userInterface;

    public $userRow;

    /**
     * UserWasCreated constructor.
     * @param UserInterface $userInterface
     * @param array $userRow
     */
    public function __construct(UserInterface $userInterface, array $userRow)
    {
        $this->userInterface = $userInterface;
        $this->userRow = $userRow;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
