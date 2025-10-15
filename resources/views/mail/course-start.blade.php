<x-mail::message>
# Halo {{ $user->name }} 

Link Zoom untuk kursus **{{ $course->name }}** sudah dibuka!  
Klik tombol di bawah untuk membuka halaman detail kelas kamu.

<x-mail::button :url="$url" color="success">
Buka Detail Kelas
</x-mail::button>

Atau salin link ini secara manual:  
`{{ $url }}`

Terima kasih,  
{{ config('app.name') }}
</x-mail::message>
