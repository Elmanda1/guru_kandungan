<x-mail::message>
# Halo {{ $user->name }} 

Link Zoom untuk kursus {{ $course->title }} sudah dibuka!  
Klik tombol di bawah untuk membuka halaman detail kelas kamu.

<x-mail::button :url="route('course-schedule.app-detail', $course->slug)" color="success">
Buka Detail Kelas
</x-mail::button>

Atau salin link ini secara manual:  
testes
[{{ route('course-schedule.app-detail', $course->slug) }}]({{ route('course-schedule.app-detail', $course->slug) }})

Terima kasih,  
{{ config('app.name') }}
</x-mail::message>