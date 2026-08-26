<?php

namespace App\Notifications;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class QuoteReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Quote $quote)
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
            ->subject('New Quote Request from ' . $this->quote->company)
            ->greeting('Hello Studio Admin,')
            ->line('A new project quote request was submitted on the website.')
            ->line('Name: ' . $this->quote->name)
            ->line('Email: ' . $this->quote->email)
            ->line('Company: ' . $this->quote->company)
            ->line('Organization Size: ' . ucfirst($this->quote->organization_size))
            ->line('Goals & Challenges:')
            ->line($this->quote->goals_challenges)
            ->action('View Quotes in Admin Panel', url('/admin/quotes'));
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
            $text = "💰 *New Quote Request*\n\n"
                . "*From:* {$this->quote->name} ({$this->quote->email})\n"
                . "*Company:* {$this->quote->company} ({$this->quote->organization_size})\n\n"
                . "*Goals & Challenges:*\n{$this->quote->goals_challenges}";

            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'Markdown',
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to send Telegram notification for quote', [
                'error' => $e->getMessage(),
                'quote_id' => $this->quote->id,
            ]);
        }
    }
}
