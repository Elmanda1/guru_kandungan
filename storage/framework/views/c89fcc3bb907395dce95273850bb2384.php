<?php $__env->startSection('content'); ?>
    <main id="login">
        <section id="login-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-5">
                                    Login
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

                                <?php if(session()->has('info')): ?>
                                    <?php if (isset($component)) { $__componentOriginal5b10c248b62c6cc88f569c93f9df044b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b10c248b62c6cc88f569c93f9df044b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert.info','data' => ['message' => ''.e(session()->get('info')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session()->get('info')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b10c248b62c6cc88f569c93f9df044b)): ?>
<?php $attributes = $__attributesOriginal5b10c248b62c6cc88f569c93f9df044b; ?>
<?php unset($__attributesOriginal5b10c248b62c6cc88f569c93f9df044b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b10c248b62c6cc88f569c93f9df044b)): ?>
<?php $component = $__componentOriginal5b10c248b62c6cc88f569c93f9df044b; ?>
<?php unset($__componentOriginal5b10c248b62c6cc88f569c93f9df044b); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <form action="<?php echo e(route('auth.login.submit')); ?>" method="post">
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
                                            value="<?php echo e(old('email') ?? auth()->user()?->email); ?>"
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
                                    
                                    <div class="mb-3 d-flex justify-content-end">
                                        <a href="<?php echo e(route('auth.forgot.password')); ?>" class="text-decoration-none small">
                                            Lupa Password?
                                        </a>
                                    </div>
                                    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               id="rememberMe"
                                               name="remember_me"
                                               value="1"
                                            <?php echo e(old('remember_me') == 1 ? 'checked' : ''); ?>>
                                        <label class="form-check-label"
                                               for="rememberMe"><?php echo e(__('Remember me')); ?></label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Login
                                    </button>

                                    <div class="text-center small mt-2 text-secondary">
                                        <?php echo e(__('Don\'t have an account?')); ?>

                                        <a href="<?php echo e(route('auth.register')); ?>" class="text-decoration-none">Registrasi</a>
                                    </div>

                                    <hr class="hr-text small" data-content="atau"/>

                                    <a href="<?php echo e(route('auth.google')); ?>"
                                       class="btn border w-100 d-flex align-items-center">
                                        <img src="<?php echo e(asset('assets/images/google-icon.png')); ?>" alt="Google Icon"
                                             width="20" height="20"/>
                                        <span class="text-center w-100">Login dengan Google</span>
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

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rafif-arka/Projects/guru_kandungan/resources/views/auth/login.blade.php ENDPATH**/ ?>