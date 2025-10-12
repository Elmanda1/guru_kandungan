<x-mail::layout>
<x-slot:header>
<x-mail::header url="{{ config('app.url') }}">
<img src="{{ asset('assets/images/logo-with-text.png') }}" alt="Guru Kandungan Logo" height="60">
</x-mail::header>
</x-slot:header>

# Halo, {{ $user->name }}

Selamat! Anda telah berhasil terdaftar dalam pembelajaran {{ $course->title }}.

<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td width="25%"><strong>Judul</strong></td>
        <td width="1%">:</td>
        <td>{{ $course->title }}</td>
    </tr>
    <tr>
        <td width="25%"><strong>Tanggal</strong></td>
        <td width="1%">:</td>
        <td>{{ $course->formatted_date }}</td>
    </tr>
    <tr>
        <td width="25%"><strong>Waktu Mulai</strong></td>
        <td width="1%">:</td>
        <td>{{ $course->start_time }}</td>
    </tr>
    <tr>
        <td width="25%"><strong>Pembicara</strong></td>
        <td width="5%">:</td>
        <td>{{ $course->lecturer->name }}</td>
    </tr>
</table>
<br/>

Sampai bertemu di sesi pembelajaran!

<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }}
<a href="{{ route('home') }}">GURU KANDUNGAN</a>
ALL RIGHTS RESERVED.
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
