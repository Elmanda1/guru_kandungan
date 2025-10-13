<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('apple-touch-icon.png')); ?>"/>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>"/>
    <link rel="manifest" href="<?php echo e(asset('site.webmanifest')); ?>"/>
    <title><?php echo e($title ?? 'Page Title'); ?> - <?php echo e(env('APP_NAME')); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    
    <?php echo $__env->yieldPushContent('style'); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body id="default" class="bg-body-tertiary">

<?php echo $__env->make('layouts.default.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.default.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if (isset($component)) { $__componentOriginalbf91dea5dbd678393bbfa5bd5c47d9c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf91dea5dbd678393bbfa5bd5c47d9c0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.impersonate','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.impersonate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf91dea5dbd678393bbfa5bd5c47d9c0)): ?>
<?php $attributes = $__attributesOriginalbf91dea5dbd678393bbfa5bd5c47d9c0; ?>
<?php unset($__attributesOriginalbf91dea5dbd678393bbfa5bd5c47d9c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf91dea5dbd678393bbfa5bd5c47d9c0)): ?>
<?php $component = $__componentOriginalbf91dea5dbd678393bbfa5bd5c47d9c0; ?>
<?php unset($__componentOriginalbf91dea5dbd678393bbfa5bd5c47d9c0); ?>
<?php endif; ?>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    if (performance.navigation.type == 2) {
        location.reload(true);
    }

    function handleLogout() {
        new Swal({
            title: "Keluar?",
            text: "Anda akan diarahkan kembali ke halaman login.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Ya',
                    className: 'btn btn-danger'
                },
                cancel: {
                    visible: true,
                    text: "Batal",
                    className: 'btn btn-info'
                },
            }
        }).then((Delete) => {
            if (Delete) {
                window.location = "<?php echo e(route('auth.logout')); ?>"
            } else {
                swal.close();
            }
        });
    }

    $(document).ready(function () {
        <?php if(Session::has('alert_success')): ?>
        new Swal({
            toast: true,
            width: "auto",
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            title: "<?php echo e(session('alert_success')); ?>",
            icon: "success",
        });
        <?php endif; ?>

        <?php if(Session::has('alert_error')): ?>
        new Swal({
            toast: true,
            width: "auto",
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            title: "<?php echo e(session('alert_error')); ?>",
            icon: "error",
        });
        <?php endif; ?>
    });
</script>


<?php echo $__env->yieldPushContent('script'); ?>

</body>
</html>
<?php /**PATH /home/rafif-arka/Projects/guru_kandungan/resources/views/layouts/default.blade.php ENDPATH**/ ?>