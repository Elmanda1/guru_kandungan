<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7a47602b82bf674ab8c2418c71610a1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a47602b82bf674ab8c2418c71610a1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section.page-title','data' => ['title' => ''.e($title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($title).'']); ?>
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

    <main id="course-schedule-detail">
        <section class="py-5">
            <div class="container">
                <?php if (isset($component)) { $__componentOriginald3ce726e44861259270a1ae1a8a20b7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ce726e44861259270a1ae1a8a20b7b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course-detail','data' => ['course' => $course]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('course-detail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['course' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course)]); ?>
                    <?php if(auth()->user()->isParticipant()): ?>
                        <?php if(!$course->isCancelled()): ?>
                            <?php if($course->isRegistered()): ?>
                                <?php if(!$course->isDone()): ?>
                                    <a class="btn btn-primary w-100" href="<?php echo e(route('my-course.list')); ?>">
                                        Cek Pembelajaran Saya
                                    </a>

                                    <button class="btn btn-danger text-white mt-2 w-100"
                                            onclick="handleCancel(<?php echo e($course->id); ?>)"
                                    >
                                        Batalkan Pendaftaran
                                    </button>
                                <?php else: ?>
                                    <a class="btn btn-primary w-100" href="<?php echo e(route('my-course.list')); ?>">
                                        Cek Pembelajaran Saya
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($course->remainingQuota != 0 || $course->isDone()): ?>
                                    <button class="btn btn-primary w-100"
                                            onclick="handleRegister(<?php echo e($course->id); ?>)"
                                    >
                                        Daftar
                                    </button>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginal5b10c248b62c6cc88f569c93f9df044b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b10c248b62c6cc88f569c93f9df044b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert.info','data' => ['message' => 'Pendaftaran sudah penuh']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => 'Pendaftaran sudah penuh']); ?>
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
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalf45b1c0e8778cb8b2622428c1655559e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf45b1c0e8778cb8b2622428c1655559e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert.danger','data' => ['message' => 'Pembelajaran dibatalkan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.danger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => 'Pembelajaran dibatalkan']); ?>
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
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ce726e44861259270a1ae1a8a20b7b)): ?>
<?php $attributes = $__attributesOriginald3ce726e44861259270a1ae1a8a20b7b; ?>
<?php unset($__attributesOriginald3ce726e44861259270a1ae1a8a20b7b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ce726e44861259270a1ae1a8a20b7b)): ?>
<?php $component = $__componentOriginald3ce726e44861259270a1ae1a8a20b7b; ?>
<?php unset($__componentOriginald3ce726e44861259270a1ae1a8a20b7b); ?>
<?php endif; ?>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function copyLink(element) {
            const input = document.querySelector(element);
            input.select();
            input.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(input.value);
            alert("Link berhasil disalin: " + input.value);
        }

        function handleRegister(id) {
            new Swal({
                title: "Lakukan Pendaftaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-warning text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `<?php echo e(route('course-schedule.register', ['courseScheduleId'])); ?>`.replace('courseScheduleId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleCancel(id) {
            new Swal({
                title: "Batalkan Pendaftaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-warning text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `<?php echo e(route('course-schedule.cancel', ['courseScheduleId'])); ?>`.replace('courseScheduleId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    let methodField = document.createElement('input');
                    methodField.setAttribute('type', 'hidden');
                    methodField.setAttribute('name', '_method');
                    methodField.setAttribute('value', 'DELETE');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/course-schedule/guest/detail.blade.php ENDPATH**/ ?>