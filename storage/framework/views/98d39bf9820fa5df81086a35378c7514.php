<?php $__env->startSection('content'); ?>
    <main id="login">
        <section id="login-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-5">
                                    Registrasi
                                </h4>

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

                                <form action="<?php echo e(route('auth.register.submit')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="registration_type" class="form-label">
                                            <?php echo e(__('Registration Type')); ?>

                                        </label>

                                        <div class="d-flex gap-2">
                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="registration_type"
                                                id="participant"
                                                value="participant"
                                                autocomplete="off"
                                                checked
                                            >
                                            <label class="btn btn-outline-primary w-100" for="participant">
                                                <?php echo e(__('Participant')); ?>

                                            </label>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="registration_type"
                                                id="lecturer"
                                                value="lecturer"
                                                autocomplete="off"
                                            >
                                            <label class="btn btn-outline-primary w-100" for="lecturer">
                                                <?php echo e(__('Lecturer')); ?>

                                            </label>
                                        </div>
                                    </div>

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
                                        >
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Password
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control <?php echo e($errors->first('password') != null ? 'is-invalid' : ''); ?>"
                                            id="password"
                                            name="password"
                                            value="<?php echo e(old('password')); ?>"
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
                                            class="form-control <?php echo e($errors->first('password_confirmation') != null ? 'is-invalid' : ''); ?>"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            value="<?php echo e(old('password_confirmation')); ?>"
                                        >
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('password_confirmation')); ?>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Registrasi
                                    </button>

                                    <div class="text-center small mt-2 text-secondary">
                                        <?php echo e(__('Already have an account?')); ?>

                                        <a href="<?php echo e(route('auth.login')); ?>" class="text-decoration-none">Login</a>
                                    </div>

                                    <hr class="hr-text small" data-content="atau"/>

                                    <a href="<?php echo e(route('auth.google')); ?>"
                                       class="btn border w-100 d-flex align-items-center">
                                        <img src="<?php echo e(asset('assets/images/google-icon.png')); ?>" alt="Google Icon"
                                             width="20" height="20"/>
                                        <span class="text-center w-100">Registrasi dengan Google</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/auth/register.blade.php ENDPATH**/ ?>