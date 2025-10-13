

<?php $__env->startSection('content'); ?>
    <main id="reset-password">
        <section id="reset-password-form" class="my-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-3">
                                    Reset Password
                                </h4>
                                <p class="text-center text-muted small mb-4">
                                    Masukkan password baru Anda
                                </p>

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

                                <form action="<?php echo e(route('password.update')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                    <input type="hidden" name="email" value="<?php echo e($email); ?>">

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Password Baru
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control <?php echo e($errors->first('password') != null ? 'is-invalid' : ''); ?>"
                                            id="password"
                                            name="password"
                                        >
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('password')); ?>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            Konfirmasi Password
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control <?php echo e($errors->first('password') != null ? 'is-invalid' : ''); ?>"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                        >
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Reset Password
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>