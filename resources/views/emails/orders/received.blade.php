<x-mail::message>
    <div style="background-color: #f7fafc; ">
        <div style="background-color: #ffffff; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 4px; overflow: hidden;">
            <div style="padding: 20px;">
                <h1 style="font-size: 24px; font-weight: bold; color: #ed8936; margin-bottom: 16px;">Terima kasih atas pembelian Anda!</h1>
                <h3>Pesanan: #{{$order->id}}</h3>
                <p style="color: #4a5568; margin-bottom: 16px;">
                    Pesanan Anda telah kami terima dan sedang diproses. Anda akan segera menerima email konfirmasi berisi detail pesanan Anda.
                </p>
                <p style="color: #4a5568; margin-bottom: 16px;">
                    Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi tim dukungan kami.
                </p>
                <a href="{{ url('/dashboard') }}" style="background-color: #ed8936; color: #ffffff; font-weight: bold; text-decoration: none; padding: 12px 24px; border-radius: 4px; display: inline-block;">Lihat Pesanan Anda</a>
            </div>
            <div style="background-color: #f7fafc; padding: 10px; border-raduis: 10px; display: flex; justify-content: space-between; align-items: center;">
                <p style="color: #4a5568;">
                    Terima kasih, {{$order->user->name}}<br>
                    {{ config('app.name') }}
                </p>
            </div>
            <a href="#" style="color: #ed8936; text-decoration: none;">Dukungan Kontak Kantin</a>
        </div>
    </div>
</x-mail::message>
