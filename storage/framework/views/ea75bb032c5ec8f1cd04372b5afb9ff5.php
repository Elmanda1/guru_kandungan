<?php if (isset($component)) { $__componentOriginal3287929725b3f878740bf3f25881b9ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3287929725b3f878740bf3f25881b9ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::layout'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('header', null, []); ?> 
<?php if (isset($component)) { $__componentOriginal4b27c9cf0646a011e45f5c0081cff2ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b27c9cf0646a011e45f5c0081cff2ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::header'),'data' => ['url' => ''.e(config('app.url')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(config('app.url')).'']); ?>
<img src="<?php echo e(asset('assets/images/logo-with-text.png')); ?>" alt="Guru Kandungan Logo" height="60">
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b27c9cf0646a011e45f5c0081cff2ae)): ?>
<?php $attributes = $__attributesOriginal4b27c9cf0646a011e45f5c0081cff2ae; ?>
<?php unset($__attributesOriginal4b27c9cf0646a011e45f5c0081cff2ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b27c9cf0646a011e45f5c0081cff2ae)): ?>
<?php $component = $__componentOriginal4b27c9cf0646a011e45f5c0081cff2ae; ?>
<?php unset($__componentOriginal4b27c9cf0646a011e45f5c0081cff2ae); ?>
<?php endif; ?>
 <?php $__env->endSlot(); ?>

# Halo, <?php echo e($user->name); ?>


Terima kasih telah mendaftar di Guru Kandungan

Untuk mulai menggunakan akun Anda, silakan verifikasi email Anda dengan mengklik tombol di bawah ini:

<?php if (isset($component)) { $__componentOriginal15a5e11357468b3880ae1300c3be6c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal15a5e11357468b3880ae1300c3be6c4f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::button'),'data' => ['url' => $verificationUrl,'color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($verificationUrl),'color' => 'primary']); ?>
Verifikasi Email
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal15a5e11357468b3880ae1300c3be6c4f)): ?>
<?php $attributes = $__attributesOriginal15a5e11357468b3880ae1300c3be6c4f; ?>
<?php unset($__attributesOriginal15a5e11357468b3880ae1300c3be6c4f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15a5e11357468b3880ae1300c3be6c4f)): ?>
<?php $component = $__componentOriginal15a5e11357468b3880ae1300c3be6c4f; ?>
<?php unset($__componentOriginal15a5e11357468b3880ae1300c3be6c4f); ?>
<?php endif; ?>

Jika Anda tidak merasa melakukan pendaftaran, abaikan email ini.

 <?php $__env->slot('footer', null, []); ?> 
<?php if (isset($component)) { $__componentOriginalef4bd4280c5be2fca1cb0cfd4325d122 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef4bd4280c5be2fca1cb0cfd4325d122 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::footer'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
© <?php echo e(date('Y')); ?>

<a href="<?php echo e(route('home')); ?>">GURU KANDUNGAN</a>
ALL RIGHTS RESERVED.
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef4bd4280c5be2fca1cb0cfd4325d122)): ?>
<?php $attributes = $__attributesOriginalef4bd4280c5be2fca1cb0cfd4325d122; ?>
<?php unset($__attributesOriginalef4bd4280c5be2fca1cb0cfd4325d122); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef4bd4280c5be2fca1cb0cfd4325d122)): ?>
<?php $component = $__componentOriginalef4bd4280c5be2fca1cb0cfd4325d122; ?>
<?php unset($__componentOriginalef4bd4280c5be2fca1cb0cfd4325d122); ?>
<?php endif; ?>
 <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3287929725b3f878740bf3f25881b9ff)): ?>
<?php $attributes = $__attributesOriginal3287929725b3f878740bf3f25881b9ff; ?>
<?php unset($__attributesOriginal3287929725b3f878740bf3f25881b9ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3287929725b3f878740bf3f25881b9ff)): ?>
<?php $component = $__componentOriginal3287929725b3f878740bf3f25881b9ff; ?>
<?php unset($__componentOriginal3287929725b3f878740bf3f25881b9ff); ?>
<?php endif; ?>
<?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/mail/account-verification.blade.php ENDPATH**/ ?>