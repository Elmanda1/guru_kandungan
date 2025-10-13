

<?php $__env->startSection('content'); ?>
    <main id="forgot-password">
        <section id="forgot-password-form" class="my-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-3">
                                    Lupa Password
                                </h4>
                                <p class="text-center text-muted small mb-4">
                                    Masukkan email Anda dan kami akan mengirimkan link untuk reset password
                                </p>

                                <?php if(session()->has('success')): ?>
                                    <?php if (isset($component)) { $__componentOriginalf192f9e16cd34f43530f7484bbd899b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf192f9e16cd34f43530f7484bbd899b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert.success','data' => ['message' => ''.e(session()->get('success')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session()->get('success')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf192f9e16cd34f43530f7484bbd899b4)): ?>
<?php $attributes = $__attributesOriginalf192f9e16cd34f43530f7484bbd899b4; ?>
<?php unset($__attributesOriginalf192f9e16cd34f43530f7484bbd899b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf192f9e16cd34f43530f7484bbd899b4)): ?>
<?php $component = $__componentOriginalf192f9e16cd34f43530f7484bbd899b4; ?>
<?php unset($__componentOriginalf192f9e16cd34f43530f7484bbd899b4); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php if(session()->has('error')): ?>
                                    <?php if (isset($component)) { $__componentOriginalf45b1c0e8778cb8b2622428c1655559e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf45b1c0e8778cb8b2622428c1655559e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert.danger','data' => ['message' => ''.e(session()->get('error')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.danger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session()->get('error')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf45b1c0e8778cb8b2622428c1655559e)): ?>
<?php $attributes = $__attributesOriginalf45b1c0e8778cb8b2622428c1655559e; ?>
<?php unset($__attributesOriginalf45b1c0e8778cb8b2622428c1655559e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf45b1c0e8778cb8b2622428c1655559e)): ?>
<?php $component = $__componentOriginalf45b1c0e8778cb8b2622428c1655559e; ?>
<?php unset($__componentOriginalf45b1c0e8778cb8b2622428c1655559e); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <form action="<?php echo e(route('auth.forgot.password.submit')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email
                                        </label>
                                        <input
                                            type="email"
                                            class="form-control <?php echo e($errors->first('email') != null ? 'is-invalid' : ''); ?>"
                                            id="email"
                                            name="email"
                                            value="<?php echo e(old('email')); ?>"
                                            placeholder="nama@example.com"
                                        >
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Kirim Link Reset Password
                                    </button>

                                    <div class="text-center small mt-3 text-secondary">
                                        <a href="<?php echo e(route('auth.login')); ?>" class="text-decoration-none">
                                            ← Kembali ke Login
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>