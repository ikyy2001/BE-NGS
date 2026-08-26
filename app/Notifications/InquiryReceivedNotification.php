<?php

namespace App\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InquiryReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Inquiry $inquiry)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $channels = ['mail'];

        if (env('TELEGRAM_BOT_TOKEN') && env('TELEGRAM_CHAT_ID')) {
            $this->sendTelegramNotification();
        }

        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Studio Inquiry: ' . $this->inquiry->subject)
            ->greeting('Hello Studio Admin,')
            ->line('You have received a new contact inquiry from the public website.')
            ->line('Name: ' . $this->inquiry->name)
            ->line('Email: ' . $this->inquiry->email)
            ->line('Subject: ' . $this->inquiry->subject)
            ->line('Message:')
            ->line($this->inquiry->message)
            ->action('View Inquiries in Admin Panel', url('/admin/inquiries'));
    }

    /**
     * TODO: Optional Telegram / Slack Webhook Notification Integration
     *
     * Wire up Telegram/Slack webhook notification using TELEGRAM_BOT_TOKEN & TELEGRAM_CHAT_ID.
     */
    protected function sendTelegramNotification(): void
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (! $botToken || ! $chatId) {
            return;
        }

        try {
            $text = "📩 *New Studio Inquiry*\n\n"
                . "*From:* {$this->inquiry->name} ({$this->inquiry->email})\n"
                . "*Subject:* {$this->inquiry->subject}\n\n"
                . "*Message:*\n{$this->inquiry->message}";

            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to send Telegram notification for inquiry', [
                'error' => $e->getMessage(),
                'inquiry_id' => $this->inquiry->id,
            ]);
        }
    }
}
