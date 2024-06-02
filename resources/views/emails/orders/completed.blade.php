<x-mail::message>
# Pesanan Anda telah selesai

Pesanan Anda #{{ $order->id }} telah dikirimkan.

Terima kasih atas pembelian Anda!

<a href="{{ url('/dashboard') }}" style="background-color: #ed8936; color: #ffffff; font-weight: bold; text-decoration: none; padding: 12px 24px; border-radius: 4px; display: inline-block;">Lihat Pesanan Anda</a>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
