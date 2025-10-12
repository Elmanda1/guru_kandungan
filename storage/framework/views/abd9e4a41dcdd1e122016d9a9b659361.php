<?php $__env->startSection('content'); ?>
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12">
                    <?php if (isset($component)) { $__componentOriginal524f937a9eb5fa19fe447ec4c5d077f9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal524f937a9eb5fa19fe447ec4c5d077f9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.app.page-title','data' => ['title' => ''.e($title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.app.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($title).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal524f937a9eb5fa19fe447ec4c5d077f9)): ?>
<?php $attributes = $__attributesOriginal524f937a9eb5fa19fe447ec4c5d077f9; ?>
<?php unset($__attributesOriginal524f937a9eb5fa19fe447ec4c5d077f9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal524f937a9eb5fa19fe447ec4c5d077f9)): ?>
<?php $component = $__componentOriginal524f937a9eb5fa19fe447ec4c5d077f9; ?>
<?php unset($__componentOriginal524f937a9eb5fa19fe447ec4c5d077f9); ?>
<?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 bg-transparent">
                <div class="card-header border-0 px-0 bg-transparent">
                    <div class="text-center mb-3">
                        <a href="<?php echo e(url()->current()); ?>"
                           class="btn btn-outline-primary me-1 <?php echo e(!request()->has('done') ? 'active' : ''); ?>">Belum
                            Tayang</a>
                        <a href="<?php echo e(url()->current()); ?>?done"
                           class="btn btn-outline-primary <?php echo e(request()->has('done') ? 'active' : ''); ?>">Sudah Tayang</a>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="w-100">
                            <form action="<?php echo e(url()->current()); ?>" method="get">
                                <input type="text"
                                       class="form-control w-100"
                                       name="s"
                                       placeholder="Cari"
                                       style="width: 255px"
                                       value="<?php echo e($search); ?>"
                                >
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 border-0 bg-transparent">
                    <div class="row row-gap-48">
                        <?php if(!empty($courses) && $courses->count() > 0): ?>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <a href="<?php echo e(route('my-course.detail', $course->slug)); ?>"
                                       class="text-decoration-none">
                                        <?php if (isset($component)) { $__componentOriginal0a1b9827ce04f2b2ad6eeae95024b702 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a1b9827ce04f2b2ad6eeae95024b702 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course-card','data' => ['course' => $course]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('course-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['course' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0a1b9827ce04f2b2ad6eeae95024b702)): ?>
<?php $attributes = $__attributesOriginal0a1b9827ce04f2b2ad6eeae95024b702; ?>
<?php unset($__attributesOriginal0a1b9827ce04f2b2ad6eeae95024b702); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a1b9827ce04f2b2ad6eeae95024b702)): ?>
<?php $component = $__componentOriginal0a1b9827ce04f2b2ad6eeae95024b702; ?>
<?php unset($__componentOriginal0a1b9827ce04f2b2ad6eeae95024b702); ?>
<?php endif; ?>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-12 text-center my-5">
                                <img src="<?php echo e(asset('assets/images/flat/not-found.png')); ?>" width="250"
                                     alt="Not Found"/>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <?php echo e($courses->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/my-course/list.blade.php ENDPATH**/ ?>