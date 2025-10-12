<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7a47602b82bf674ab8c2418c71610a1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a47602b82bf674ab8c2418c71610a1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.page-title','data' => ['title' => ''.e($title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($title).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a47602b82bf674ab8c2418c71610a1d)): ?>
<?php $attributes = $__attributesOriginal7a47602b82bf674ab8c2418c71610a1d; ?>
<?php unset($__attributesOriginal7a47602b82bf674ab8c2418c71610a1d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a47602b82bf674ab8c2418c71610a1d)): ?>
<?php $component = $__componentOriginal7a47602b82bf674ab8c2418c71610a1d; ?>
<?php unset($__componentOriginal7a47602b82bf674ab8c2418c71610a1d); ?>
<?php endif; ?>

    <main id="course-schedule-list">
        <section class="py-5">
            <div class="container">
                <div class="row row-gap-24">
                    <div class="col-12">
                        <div class="card border-0 bg-transparent">
                            <div class="card-header border-0 px-0 bg-transparent">
                                
                                <div class="text-center mb-3">
                                    <a href="<?php echo e(url()->current()); ?>"
                                       class="btn btn-outline-primary me-1 filter-btn <?php echo e(!request()->has('done') ? 'active' : ''); ?>"
                                       data-status="available">Belum Tayang</a>
                                    <a href="<?php echo e(url()->current()); ?>?done"
                                       class="btn btn-outline-primary filter-btn <?php echo e(request()->has('done') ? 'active' : ''); ?>"
                                       data-status="done">Sudah Tayang</a>
                                </div>

                                
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
                                
                                <div class="row row-gap-48" id="course-results">
                                    
                                    <?php echo $__env->make('course-schedule.guest._course_list', ['courses' => $courses], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent" id="pagination-container">
                                
                                <?php echo e($courses->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    let currentStatus = '<?php echo e(request()->has("done") ? "done" : "available"); ?>';

    // Fungsi utama untuk fetch data via AJAX
    function fetchCourses(query = '', status = 'available') {
        // Sembunyikan pagination saat live search aktif
        $('#pagination-container').hide();

        $.ajax({
            url: "<?php echo e(route('course-schedule.search')); ?>",
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
        let newUrl = currentStatus === 'done' ? '<?php echo e(url()->current()); ?>?done' : '<?php echo e(url()->current()); ?>';
        history.pushState(null, '', newUrl);

        // Panggil fungsi fetch dengan status baru
        fetchCourses(searchQuery, currentStatus);
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/course-schedule/guest/list.blade.php ENDPATH**/ ?>