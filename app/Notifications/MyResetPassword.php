<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends ResetPassword
{
    public function toMail($notifiable)
{
    return (new MailMessage)
        ->subject('Recuperar contraseña')
        ->greeting('Hola'. config('name'))
        ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
        ->action('Recuperar contraseña', route('password.reset', $this->token))
        ->line('Esta solicitud expira en 60 minutos ')
        ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
        ->salutation('Saludos, de parte de '. config('app.name'));
}
}