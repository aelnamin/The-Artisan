<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderPlaced extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail']; // Add 'whatsapp' later if you integrate a WhatsApp channel
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $items = collect($this->order->items)->map(function ($item) {
            return "{$item['name']} ({$item['size']}) x{$item['qty']} – RM " . ($item['price'] * $item['qty']);
        })->implode("\n");

        return (new MailMessage)
            ->subject('Pesanan Anda Telah Diterima – The Artisan Parfum')
            ->greeting('Hai ' . $this->order->customer_name . '!')
            ->line('Terima kasih kerana membuat pesanan di The Artisan Parfum.')
            ->line('Berikut adalah butiran pesanan anda:')
            ->line($items)
            ->line('Jumlah Bayaran: RM ' . number_format($this->order->total, 2))
            ->line('Kami akan menghubungi anda melalui WhatsApp dalam masa 1–2 jam untuk pengesahan pembayaran dan penghantaran.')
            ->line('Sila semak WhatsApp anda.')
            ->action('Lihat Pesanan', url('/'))
            ->line('Sekian, terima kasih.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'total' => $this->order->total,
        ];
    }
}