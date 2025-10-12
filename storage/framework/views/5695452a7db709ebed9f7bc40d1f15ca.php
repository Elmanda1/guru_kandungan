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
            <div class="py-4">
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
                    <?php if(!$course->isCancelled()): ?>
                        <?php if($course->isRegistered()): ?>
                            <?php if(!$course->isDone()): ?>
                                <?php if($course->isStarting()): ?>
                                    <button
                                        class="btn btn-primary w-100"
                                        data-coreui-toggle="modal"
                                        data-coreui-target="#zoom-modal"
                                    >
                                        Belajar Sekarang
                                    </button>
                                <?php endif; ?>

                                <button class="btn btn-danger text-white mt-2 w-100"
                                        onclick="handleCancel(<?php echo e($course->id); ?>)"
                                >
                                    Batalkan Pendaftaran
                                </button>
                            <?php else: ?>
                                <button
                                    class="btn btn-primary w-100"
                                    data-coreui-toggle="modal"
                                    data-coreui-target="#youtube-modal"
                                >
                                    Review
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($course->remainingQuota != 0 || $course->isDone()): ?>
                                <button class="btn btn-primary w-100"
                                        onclick="handleRegister(<?php echo e($course->id); ?>)"
                                >
                                    Daftar
                                </button>
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
        </div>
    </div>

    <div class="modal fade" id="zoom-modal" tabindex="-1" aria-labelledby="zoom-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="https://gurukandungan.id/assets/images/zoom-logo.png" alt="Zoom Logo" width="96">
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Judul</div>
                        <div><?php echo e($course->title); ?></div>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Link</div>
                        <a href="<?php echo e($course->zoom_link); ?>" target="_blank">
                            <div><?php echo e($course->zoom_link); ?></div>
                        </a>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">ID</div>
                        <div><?php echo e($course->zoom_id); ?></div>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Password</div>
                        <div><?php echo e($course->zoom_password); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="youtube-modal" data-coreui-backdrop="static" data-coreui-keyboard="false"
         tabindex="-1"
         aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <iframe
                        width="100%"
                        height="400px"
                        src="<?php echo e($course->embeddedYoutubeLink); ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen
                    >
                    </iframe>
                </div>
            </div>
        </div>
    </div>
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
                    let url = `<?php echo e(route('course-schedule.register', ['courseScheduleId'])); ?>`.replace('courseScheduleId', id) + '?app=true';
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
                    let url = `<?php echo e(route('course-schedule.cancel', ['courseScheduleId'])); ?>`.replace('courseScheduleId', id) + '?app=true';
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/my-course/detail.blade.php ENDPATH**/ ?>