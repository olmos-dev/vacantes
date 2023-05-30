<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante,$vacante_id)
    {
        /**En el constructor recibe la informacion que el pasamos
         * en el CandidatoController en el metodo notify
         */
        $this->vacante = $vacante;
        $this->vacante_id = $vacante_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
        //return ['mail'];
        //return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: '.$this->vacante)
                    ->action('Vísita devJobs', url('/'))
                    ->line('Gracias por utilizar devjobs');
    }

    /**Notificaciones en la base de datos */
    public function toDatabase($notifiable){
        return[
            'vacante' => $this->vacante,
            'vacante_id' => $this->vacante_id
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
