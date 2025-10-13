<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7a47602b82bf674ab8c2418c71610a1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a47602b82bf674ab8c2418c71610a1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.page-title','data' => ['title' => 'Hubungi kami']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Hubungi kami']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a47602b82bf674ab8c2418c71610a1d)): ?>
<?php $attributes = $__attributesOriginal7a47602b82bf674ab8c2418c71610a1d; ?>
<?php unset($__attributesOriginal7a47602b82bf674ab8c2418c71610a1d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a47602b82bf674ab8c2418c71610a1d)): ?>
<?php $component = $__componentOriginal7a47602b82bf674ab8c2418c71610a1d; ?>
<?php unset($__componentOriginal7a47602b82bf674ab8c2418c71610a1d); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal0bf578e17de7983bb51257488ec87542 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0bf578e17de7983bb51257488ec87542 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.info','data' => ['title' => 'Informasi belum tersedia','message' => 'Halaman ini sedang dalam tahap pengembangan, harap periksa kembali nanti']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Informasi belum tersedia','message' => 'Halaman ini sedang dalam tahap pengembangan, harap periksa kembali nanti']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0bf578e17de7983bb51257488ec87542)): ?>
<?php $attributes = $__attributesOriginal0bf578e17de7983bb51257488ec87542; ?>
<?php unset($__attributesOriginal0bf578e17de7983bb51257488ec87542); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0bf578e17de7983bb51257488ec87542)): ?>
<?php $component = $__componentOriginal0bf578e17de7983bb51257488ec87542; ?>
<?php unset($__componentOriginal0bf578e17de7983bb51257488ec87542); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rafif-arka/Projects/guru_kandungan/resources/views/contact-us.blade.php ENDPATH**/ ?>