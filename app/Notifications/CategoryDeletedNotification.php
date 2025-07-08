<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryDeletedNotification extends Notification
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
            ->subject("Kategori Dihapus")
            ->greeting("Halo {$notifiable->name}!")
            ->line("Kategori '{$this->category->name}' telah dihapus dari sistem.")
            ->line('Harap periksa kembali data Anda jika diperlukan.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}