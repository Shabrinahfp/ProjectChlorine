<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryUpdatedNotification extends Notification
{
    use Queueable;

    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Kategori Diperbarui")
            ->greeting("Halo {$notifiable->name}!")
            ->line("Kategori '{$this->category->name}' telah diperbarui.")
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}