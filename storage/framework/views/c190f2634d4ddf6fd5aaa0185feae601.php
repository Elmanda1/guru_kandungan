<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginale8eb44197c590483f6e377cc8d50f3e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale8eb44197c590483f6e377cc8d50f3e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.my-account','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.my-account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-2"><?php echo e(__('Change Password')); ?></h2>
                <p class="text-muted small">
                    Ubah password yang Anda gunakan untuk masuk ke aplikasi. Password harus terdiri dari
                    setidaknya 8 karakter.
                </p>

                <form action="<?php echo e(route('my-account.change-password.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label required">
                                    <?php echo e(__('New Password')); ?>

                                </label>
                                <input
                                    type="password"
                                    class="form-control <?php echo e($errors->first('password') != null ? 'is-invalid' : ''); ?>"
                                    id="password"
                                    name="password"
                                    value="<?php echo e(old('password')); ?>"
                                    required
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('password')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label required">
                                    <?php echo e(__('Password Confirmation')); ?>

                                </label>
                                <input
                                    type="password"
                                    class="form-control <?php echo e($errors->first('password_confirmation') != null ? 'is-invalid' : ''); ?>"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    value="<?php echo e(old('password_confirmation')); ?>"
                                    required
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('password_confirmation')); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Update')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale8eb44197c590483f6e377cc8d50f3e8)): ?>
<?php $attributes = $__attributesOriginale8eb44197c590483f6e377cc8d50f3e8; ?>
<?php unset($__attributesOriginale8eb44197c590483f6e377cc8d50f3e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8eb44197c590483f6e377cc8d50f3e8)): ?>
<?php $component = $__componentOriginale8eb44197c590483f6e377cc8d50f3e8; ?>
<?php unset($__componentOriginale8eb44197c590483f6e377cc8d50f3e8); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/my-account/change-password.blade.php ENDPATH**/ ?>