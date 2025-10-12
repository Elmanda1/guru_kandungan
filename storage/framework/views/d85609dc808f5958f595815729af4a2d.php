<?php $__env->startPush('style'); ?>
    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('assets/css/evo-calendar.min.css')); ?>">
    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('assets/css/evo-calendar.royal-navy.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <img class="avatar avatar-md me-3"
                             src="<?php echo e(auth()?->user()?->getPhotoUrl()); ?>"
                             alt="<?php echo e(auth()?->user()?->name); ?>"
                        >
                        <div class="d-flex flex-column">
                            <h2 class="fw-bold m-0" style="font-size: 16px">Selamat Datang</h2>
                            <p class="m-0" style="font-size: 14px"><?php echo e(auth()->user()->name); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="border shadow-none" id="calendar"></div>
        </div>
    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/my-home/participant.blade.php ENDPATH**/ ?>