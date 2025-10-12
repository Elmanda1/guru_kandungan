<?php $__env->startPush('style'); ?>
    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('assets/css/evo-calendar.min.css')); ?>">
    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('assets/css/evo-calendar.royal-navy.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main id="home">
        <section id="introduction">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="mb-3 heading">
                            <div class="d-flex flex-column">
                                <span class="text-primary">Guru Kandungan</span>
                                <small class="text-primary small ms-0 ms-lg-1" style="font-size: 13px">
                                    By Departemen Obstetri dan Ginekologi FK Universitas Airlangga
                                </small>
                            </div>
                            <span class="fs-2">Education Without Wall</span>
                        </div>
                        <p class="lead mb-4">
                            Platform Belajar Online Tentang Kesehatan Reproduksi Wanita.
                        </p>
                    </div>
                    <div class="col-12 col-lg-5">
                        <img src="https://gurukandungan.id/assets/images/banner.png"
                             class="img-fluid" width="600">
                    </div>
                </div>
            </div>
        </section>

        <section id="benefit" class="bg-primary py-5 text-light">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="mb-5 text-uppercase text-warning fw-bold">Manfaat Yang Didapatkan</h4>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fas-lightbulb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '66','height' => '66','class' => 'mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <p class="px-5">Materi Sesuai Standard Kompetensi</p>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fas-user-doctor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '66','height' => '66','class' => 'mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <p class="px-5">Narasumber Oleh Dosen Fakultas Kedokteran UNAIR</p>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fas-calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '66','height' => '66','class' => 'mb-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <p class="px-5">Pilihan Jadwal Belajar Yang Beragam</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="upcoming-course-schedules" class="py-5" style="margin: 68px 0">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="mb-5 text-primary text-uppercase fw-bold">Jadwal Pembelajaran</h4>
                    </div>
                    <div class="col-12">
                        <div class="border shadow-none" id="calendar"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/evo-calendar.min.js')); ?>"></script>

    <script>
        $("#calendar").evoCalendar({
            theme: 'Royal Navy',
            calendarEvents: <?php echo $courseCalendarEvents; ?>,
        });

        $('#calendar').evoCalendar('toggleEventList', true);

        $('#calendar').on('selectEvent', function (event, activeEvent) {
            window.location.href = activeEvent.detail_link;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/home.blade.php ENDPATH**/ ?>