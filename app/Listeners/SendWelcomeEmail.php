<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use App\Mail\WelcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterUser $event): void
    {
        Mail::to($event->user)->send(new WelcomeEmail);
    }
}
