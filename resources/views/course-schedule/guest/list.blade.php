@extends('layouts.default')

@section('content')
    <x-section.page-title title="{{ $title }}"/>

    <main id="course-schedule-list">
        <section class="py-5">
            <div class="container">
                <div class="row row-gap-24">
                    <div class="col-12">
                        <div class="card border-0 bg-transparent">
                            <div class="card-header border-0 px-0 bg-transparent">
                                {{-- BAGIAN TOMBOL FILTER TETAP ADA --}}
                                <div class="text-center mb-3">
                                    <a href="{{ url()->current() }}"
                                       class="btn btn-outline-primary me-1 filter-btn {{ !request()->has('done') ? 'active' : '' }}"
                                       data-status="available">Belum Tayang</a>
                                    <a href="{{ url()->current() }}?done"
                                       class="btn btn-outline-primary filter-btn {{ request()->has('done') ? 'active' : '' }}"
                                       data-status="done">Sudah Tayang</a>
                                </div>

                                {{-- INPUT PENCARIAN DENGAN ID --}}
                                <div class="d-flex justify-content-end">
                                    <div class="w-100">
                                        <input type="text"
                                               class="form-control w-100"
                                               id="search-input"
                                               placeholder="Cari judul atau nama pembicara..."
                                               style="width: 255px; margin-left: auto;"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 border-0 bg-transparent">
                                {{-- CONTAINER UNTUK HASIL LIVE SEARCH --}}
                                <div class="row row-gap-48" id="course-results">
                                    {{-- Load initial content --}}
                                    @include('course-schedule.guest._course_list', ['courses' => $courses])
                                </div>
                            </div>

                            <div class="card-footer bg-transparent" id="pagination-container">
                                {{-- Pagination akan di-load di sini jika diperlukan, atau bisa dihapus jika tidak pakai pagination lagi --}}
                                {{ $courses->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
{{-- Pastikan layout Anda punya jQuery, atau tambahkan CDN ini --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    let currentStatus = '{{ request()->has("done") ? "done" : "available" }}';

    // Fungsi utama untuk fetch data via AJAX
    function fetchCourses(query = '', status = 'available') {
        // Sembunyikan pagination saat live search aktif
        $('#pagination-container').hide();

        $.ajax({
            url: "{{ route('course-schedule.search') }}",
            type: 'GET',
            data: {
                query: query,
                status: status
            },
            success: function(data) {
                $('#course-results').html(data);
            },
            error: function() {
                $('#course-results').html('<div class="col-12 text-center my-5"><p>Terjadi kesalahan saat memuat data.</p></div>');
            }
        });
    }

    // Event listener untuk input pencarian
    $('#search-input').on('keyup', function() {
        let searchQuery = $(this).val();
        fetchCourses(searchQuery, currentStatus);
    });

    // Event listener untuk tombol filter
    $('.filter-btn').on('click', function(e) {
        e.preventDefault(); // Mencegah reload halaman

        // Update status aktif tombol
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        // Ambil status dari atribut data-*
        currentStatus = $(this).data('status');
        let searchQuery = $('#search-input').val();
        
        // Update URL di browser tanpa reload
        let newUrl = currentStatus === 'done' ? '{{ url()->current() }}?done' : '{{ url()->current() }}';
        history.pushState(null, '', newUrl);

        // Panggil fungsi fetch dengan status baru
        fetchCourses(searchQuery, currentStatus);
    });
});
</script>
@endpush
