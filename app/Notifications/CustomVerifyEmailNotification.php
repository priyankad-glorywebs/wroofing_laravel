<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmailNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.customVerify', now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );
        return (new MailMessage)
            ->subject('Custom Email Verification')
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email', $verificationUrl);
    }
}
