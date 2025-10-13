<section class="my-account">
    <div class="row row-gap-24">
        <div class="col-12">
            <?php if (isset($component)) { $__componentOriginal524f937a9eb5fa19fe447ec4c5d077f9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal524f937a9eb5fa19fe447ec4c5d077f9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.app.page-title','data' => ['title' => ''.e(__('My Account')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.app.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('My Account')).'']); ?>
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
        <div class="col-12">
            <div class="row row-gap-24">
                <div class="col-12 col-lg-3">
                    <ul class="sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link py-3 <?php if(request()->is('app/my-account/profile')): ?> active <?php endif; ?>"
                               href="<?php echo e(route('my-account.profile')); ?>"
                            >
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'me-2','height' => '24','width' => '24']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                <?php echo e(__('Profile')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link py-3 <?php if(request()->is('app/my-account/change-password')): ?> active <?php endif; ?>"
                               href="<?php echo e(route('my-account.change-password')); ?>"
                            >
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'me-2','height' => '24','width' => '24']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                <?php echo e(__('Change Password')); ?>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="px-lg-4">
                        <?php echo e($slot); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/components/section/my-account.blade.php ENDPATH**/ ?>