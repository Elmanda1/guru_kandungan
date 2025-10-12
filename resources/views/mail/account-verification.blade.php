<x-mail::layout>
<x-slot:header>
<x-mail::header url="{{ config('app.url') }}">
<img src="{{ asset('assets/images/logo-with-text.png') }}" alt="Guru Kandungan Logo" height="60">
</x-mail::header>
</x-slot:header>

# Halo, {{ $user->name }}

Terima kasih telah mendaftar di Guru Kandungan

Untuk mulai menggunakan akun Anda, silakan verifikasi email Anda dengan mengklik tombol di bawah ini:

<x-mail::button :url="$verificationUrl" color="primary">
Verifikasi Email
</x-mail::button>

Jika Anda tidak merasa melakukan pendaftaran, abaikan email ini.

<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }}
<a href="{{ route('home') }}">GURU KANDUNGAN</a>
ALL RIGHTS RESERVED.
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
