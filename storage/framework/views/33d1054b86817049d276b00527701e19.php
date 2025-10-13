<?php $__env->startSection('content'); ?>
    <div class="row row-gap-32">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12 col-lg-6">
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
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end gap-2 flex-wrap">
                        <a href="<?php echo e(route('course.index')); ?>"
                           class="btn btn-light border"
                        >
                            <?php echo e(__('Back')); ?>

                        </a>

                        <?php if(!$course->isCancelled() && !$course->isDone()): ?>
                            <?php if($course->isStarting()): ?>
                                <a
                                    class="btn btn-primary"
                                    href="<?php echo e($course->zoom_link); ?>"
                                    target="_blank"
                                >
                                    <?php echo e(__('Mulai Pembelajaran')); ?>

                                </a>
                            <?php endif; ?>

                            <button
                                class="btn btn-danger"
                                onclick="handleCancel(<?php echo e($course->id); ?>)"
                            >
                                <?php echo e(__('Cancel It')); ?>

                            </button>
                        <?php endif; ?>

                        <?php if($course->isCancelled() && !$course->isDone()): ?>
                            <button
                                class="btn btn-danger"
                                onclick="handleDelete(<?php echo e($course->id); ?>)"
                            >
                                <?php echo e(__('Delete')); ?>

                            </button>

                            <button
                                class="btn btn-primary"
                                onclick="handleContinue(<?php echo e($course->id); ?>)"
                            >
                                <?php echo e(__('Continue It')); ?>

                            </button>
                        <?php endif; ?>

                        <?php if(!$course->isCancelled() && !$course->isDone()): ?>
                            <button
                                class="btn btn-primary"
                                data-coreui-toggle="modal"
                                data-coreui-target="#markAsCompleteModal"
                            >
                                <?php echo e(__('Mark As Completed')); ?>

                            </button>
                        <?php endif; ?>

                        <?php if($course->isDone()): ?>
                            <a
                                class="btn btn-primary"
                                href="<?php echo e(route('certificate.download', $course)); ?>"
                                target="_blank"
                            >
                                <?php echo e(__('Download Certificate')); ?>

                            </a>
                        <?php endif; ?>

                        <a href="<?php echo e(route('course.edit', $course)); ?>"
                           class="btn btn-success"
                        >
                            <?php echo e(__('Edit')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0 card-title">Data Pembelajaran</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="topic_id" class="form-label">
                                    <?php echo e(__('Topic')); ?>

                                </label>
                                <select
                                    class="form-select <?php echo e($errors->first('topic_id') != null ? 'is-invalid' : ''); ?>"
                                    id="topic_id"
                                    name="topic_id"
                                    disabled
                                >
                                    <option value="" selected>Pilih salah satu opsi</option>

                                    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($topic->id); ?>"
                                            <?php if(old('topic_id', $course->topic_id) == $topic->id): ?>
                                                selected
                                            <?php endif; ?>
                                        >
                                            <?php echo e($topic->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('topic_id')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    <?php echo e(__('Title')); ?>

                                </label>
                                <input
                                    type="text"
                                    class="form-control <?php echo e($errors->first('title') != null ? 'is-invalid' : ''); ?>"
                                    id="title"
                                    name="title"
                                    value="<?php echo e(old('title', $course->title)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('title')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="education_level_ids" class="form-label">
                                Sasaran Peserta
                            </label>
                            <div
                                class="form-control <?php echo e($errors->first('education_level_ids') != null ? 'is-invalid' : ''); ?>">
                                <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="education-level-<?php echo e($educationLevel->id); ?>"
                                            value="<?php echo e($educationLevel->id); ?>"
                                            name="education_level_ids[]"
                                            <?php echo e(in_array($educationLevel->id, old('education_level_ids', $course->educationLevelIds())) ? 'checked' : ''); ?>

                                            disabled
                                        >
                                        <label class="form-check-label"
                                               for="education-level-<?php echo e($educationLevel->id); ?>">
                                            <?php echo e($educationLevel->name); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <span class="error invalid-feedback">
                                    <?php echo e($errors->first('education_level_ids')); ?>

                                </span>
                        </div>

                        <?php if(auth()->user()->isAdmin()): ?>
                            <div class="col-12 ">
                                <div class="mb-3">
                                    <label for="lecturer_id" class="form-label">
                                        <?php echo e(__('Speaker')); ?>

                                    </label>
                                    <select
                                        class="form-select <?php echo e($errors->first('lecturer_id') != null ? 'is-invalid' : ''); ?>"
                                        id="lecturer_id"
                                        name="lecturer_id"
                                        disabled
                                    >
                                        <option value="" selected>Pilih salah satu opsi</option>

                                        <?php $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($lecturer->id); ?>"
                                                <?php if(old('lecturer_id', $course->lecturer_id) == $lecturer->id): ?>
                                                    selected
                                                <?php endif; ?>
                                            >
                                                <?php echo e($lecturer->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('lecturer_id')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    <?php echo e(__('Description')); ?>

                                </label>
                                <textarea
                                    type="text"
                                    class="form-control <?php echo e($errors->first('description') != null ? 'is-invalid' : ''); ?>"
                                    id="description"
                                    name="description"
                                    rows="3"
                                    disabled
                                ><?php echo e(old('description', $course->description)); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="date" class="form-label">
                                    <?php echo e(__('Date')); ?>

                                </label>
                                <input
                                    type="date"
                                    class="form-control <?php echo e($errors->first('date') != null ? 'is-invalid' : ''); ?>"
                                    id="date"
                                    name="date"
                                    value="<?php echo e(old('date', $course->date)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('date')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="start_time" class="form-label">
                                    <?php echo e(__('Start Time')); ?>

                                </label>
                                <input
                                    type="time"
                                    class="form-control <?php echo e($errors->first('start_time') != null ? 'is-invalid' : ''); ?>"
                                    id="start_time"
                                    name="start_time"
                                    value="<?php echo e(old('start_time', $course->start_time)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('start_time')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="quota" class="form-label">
                                    <?php echo e(__('Quota')); ?>

                                </label>
                                <input
                                    type="number"
                                    class="form-control <?php echo e($errors->first('quota') != null ? 'is-invalid' : ''); ?>"
                                    id="quota"
                                    name="quota"
                                    value="<?php echo e(old('quota',$course->quota)); ?>"
                                    min="0"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('quota')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header border-top">
                    <h2 class="mb-0 card-title">Data Zoom</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_link" class="form-label">
                                    <?php echo e(__('Link Zoom')); ?>

                                </label>
                                <input
                                    type="url"
                                    class="form-control <?php echo e($errors->first('zoom_link') != null ? 'is-invalid' : ''); ?>"
                                    id="zoom_link"
                                    name="zoom_link"
                                    value="<?php echo e(old('zoom_link', $course->zoom_link)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('zoom_link')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_id" class="form-label">
                                    <?php echo e(__('ID Zoom')); ?>

                                </label>
                                <input
                                    type="text"
                                    class="form-control <?php echo e($errors->first('zoom_id') != null ? 'is-invalid' : ''); ?>"
                                    id="zoom_id"
                                    name="zoom_id"
                                    value="<?php echo e(old('zoom_id', $course->zoom_id)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('zoom_id')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_password" class="form-label">
                                    <?php echo e(__('Password Zoom')); ?>

                                </label>
                                <input
                                    type="text"
                                    class="form-control <?php echo e($errors->first('zoom_password') != null ? 'is-invalid' : ''); ?>"
                                    id="zoom_password"
                                    name="zoom_password"
                                    value="<?php echo e(old('zoom_password', $course->zoom_password)); ?>"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('zoom_password')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($course->isDone()): ?>
                    <div class="card-header border-top">
                        <h2 class="mb-0 card-title">Data Youtube</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">
                                        <?php echo e(__('Link Youtube')); ?>

                                    </label>
                                    <div class="input-group">
                                        <input
                                            type="url"
                                            class="form-control"
                                            id="youtube_link"
                                            name="youtube_link"
                                            value="<?php echo e(old('youtube_link', $course->youtube_link)); ?>"
                                            disabled
                                        >
                                        <button
                                            class="input-group-text"
                                            type="button"
                                            data-coreui-toggle="modal"
                                            data-coreui-target="#youtube-modal"
                                        >
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-play'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => '18']); ?>
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
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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

    <div class="modal fade" id="markAsCompleteModal" data-coreui-backdrop="static" data-coreui-keyboard="false"
         tabindex="-1"
         aria-labelledby="markAsCompleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo e(route('course.complete', $course)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="markAsCompleteModalLabel"><?php echo e(__('Mark As Completed')); ?></h5>
                        <button type="reset" class="btn-close" data-coreui-dismiss="modal"
                                aria-label="Close"></button>
                    </div>

                    <div class="modal-body py-0">
                        <div class="mb-3">
                            <label for="youtube_link" class="form-label required">
                                Link Youtube
                            </label>
                            <input
                                type="url"
                                class="form-control <?php echo e($errors->first('youtube_link') != null ? 'is-invalid' : ''); ?>"
                                id="password"
                                name="youtube_link"
                                value="<?php echo e(old('youtube_link')); ?>"
                                required
                            >
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('youtube_link')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-2">
                        <button type="reset" class="btn btn-secondary my-0"
                                data-coreui-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" class="btn btn-primary my-0"><?php echo e(__('Confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <?php echo session('script'); ?>


    <script>
        function handleCancel(id) {
            new Swal({
                title: "Batalkan Pembelajaran",
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
                    let url = `<?php echo e(route('course.cancel', ['courseId'])); ?>`.replace('courseId', id);
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
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleDelete(id) {
            new Swal({
                title: "Hapus Pembelajaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `<?php echo e(route('course.destroy', ['courseId'])); ?>`.replace('courseId', id);
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

        function handleContinue(id) {
            new Swal({
                title: "Lanjutkan Pembelajaran",
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
                    let url = `<?php echo e(route('course.continue', ['courseId'])); ?>`.replace('courseId', id);
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
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleMarkAsCompleted(id) {
            new Swal({
                title: "Tandai Selesai",
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
                    let url = `<?php echo e(route('course.complete', ['courseId'])); ?>`.replace('courseId', id);
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
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('#lecturer-table tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');

                cells.forEach((cell, index) => {
                    if (index !== cells.length - 1) {
                        cell.addEventListener('click', () => {
                            const url = row.getAttribute('data-href');
                            if (url) {
                                window.location.href = url;
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/resource/course/show.blade.php ENDPATH**/ ?>