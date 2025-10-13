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
                <h2 class="card-title mb-2"><?php echo e(__('Profile')); ?></h2>
                <p class="text-muted small">
                    Kelola data diri Anda untuk komunikasi dan personalisasi sistem.
                </p>

                <form action="<?php echo e(route('my-account.profile.update')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Full Name')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control <?php echo e($errors->first('name') != null ? 'is-invalid' : ''); ?>"
                                        id="name"
                                        name="name"
                                        value="<?php echo e(old('name') ?? $user->name); ?>"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-3 col-form-label">
                                    <?php echo e(__('NIK')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control <?php echo e($errors->first('nik') != null ? 'is-invalid' : ''); ?>"
                                        id="nik"
                                        name="nik"
                                        value="<?php echo e(old('nik') ?? $user->nik); ?>"
                                        min="16"
                                        maxlength="16"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nik')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Email')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="email"
                                        class="form-control <?php echo e($errors->first('email') != null ? 'is-invalid' : ''); ?>"
                                        id="email"
                                        name="email"
                                        value="<?php echo e(old('email') ?? $user->email); ?>"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Phone')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control <?php echo e($errors->first('phone') != null ? 'is-invalid' : ''); ?>"
                                        id="phone"
                                        name="phone"
                                        value="<?php echo e(old('phone') ?? $user->phone); ?>"
                                        maxlength="13"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('phone')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Address')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <textarea
                                        type="text"
                                        class="form-control <?php echo e($errors->first('address') != null ? 'is-invalid' : ''); ?>"
                                        id="address"
                                        name="address"
                                        rows="3"
                                        required
                                    ><?php echo e(old('address') ?? $user->address); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('address')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="institution" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Institution')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control <?php echo e($errors->first('institution') != null ? 'is-invalid' : ''); ?>"
                                        id="institution"
                                        name="institution"
                                        value="<?php echo e(old('institution') ?? $user->institution); ?>"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('institution')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Department')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <select
                                        class="form-select <?php echo e($errors->first('department_id') != null ? 'is-invalid' : ''); ?>"
                                        id="department_id"
                                        name="department_id"
                                        required
                                    >
                                        <option value="" selected>Pilih salah satu opsi</option>

                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($department->id); ?>"
                                                <?php if(old('department_id') ?? $user->department_id == $department->id): ?>
                                                    selected
                                                <?php endif; ?>
                                            >
                                                <?php echo e($department->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('department_id')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="education_level_id" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Education Level')); ?>

                                </label>
                                <div class="col-sm-9">
                                    <select
                                        class="form-select <?php echo e($errors->first('education_level_id') != null ? 'is-invalid' : ''); ?>"
                                        id="education_level_id"
                                        name="education_level_id"
                                        required
                                    >
                                        <option value="" selected>Pilih salah satu opsi</option>

                                        <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($educationLevel->id); ?>"
                                                <?php if(old('education_level_id') ?? $user->education_level_id == $educationLevel->id): ?>
                                                    selected
                                                <?php endif; ?>
                                            >
                                                <?php echo e($educationLevel->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('education_level_id')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="photo" class="col-sm-3 col-form-label">
                                    <?php echo e(__('Photo')); ?>

                                </label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-column flex-lg-row align-items-center">
                                        <img class="avatar avatar-80 me-3 mb-3 mb-lg-0"
                                             src="<?php echo e(auth()->user()->getPhotoUrl()); ?>"
                                             alt="<?php echo e(auth()->user()->name); ?>"
                                        >
                                        <div>
                                            <input
                                                type="file"
                                                class="form-control <?php echo e($errors->first('photo') != null ? 'is-invalid' : ''); ?>"
                                                id="photo"
                                                name="photo"
                                                value="<?php echo e(old('photo') ?? $user->photo); ?>"
                                                maxlength="255"
                                            >
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('photo')); ?>

                                            </div>
                                        </div>
                                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/my-account/profile/participant.blade.php ENDPATH**/ ?>