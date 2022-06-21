<?php

namespace App\Broadcasting;

use App\Models\Admins;

class test
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\Admins  $user
     * @return array|bool
     */
    public function join(Admins $user)
    {
        //
    }
}
