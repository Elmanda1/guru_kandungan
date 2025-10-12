<footer class="bg-primary text-white">
    <div class="container">
        <div class="row row-gap-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <a class="navbar-brand d-flex align-items-center gap-2 py-3" href="<?php echo e(url()->current()); ?>"
                           style="margin-right: 120px">
                            <img src="<?php echo e(asset('assets/images/logo-with-yellow-text.png')); ?>" alt="" height="68">
                        </a>
                    </div>
                    <div class="col-12 col-lg-5 mt-5 mt-lg-3 pe-lg-5">
                        <h6 class="fw-bold mb-3 text-uppercase text-warning">Tentang Kami</h6>
                        <p class="small">
                            Guru Kandungan adalah platform edukasi online yang menyediakan informasi lengkap tentang
                            kesehatan reproduksi wanita. Dikembangkan oleh Dosen Departemen Obstetri dan Ginekologi,
                            Fakultas Kedokteran Universitas Airlangga.
                        </p>
                    </div>
                    <div class="col-12 col-lg-2 mt-4 mt-lg-3 ps-lg-4">
                        <h6 class="fw-bold mb-3 text-uppercase text-warning">Team Development</h6>
                        <ul class="list-group small" type="none">
                            <li class="mb-2">Brahmana Askandar</li>
                            <li class="mb-2">Ashon Sa'adi</li>
                            <li class="mb-2">M. Dimas Abdi Putra</li>
                            <li class="mb-2">Khoirunnisa Novitasari</li>
                            <li class="mb-2">Pandu Hanindito Habibie</li>
                            <li class="mb-3">Tim IT</li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-2 mt-4 mt-lg-3 ps-lg-5">
                        <h6 class="fw-bold mb-3 text-uppercase text-warning">Menu</h6>
                        <div class="row">
                            <div class="col-6 col-lg-12">
                                <ul class="navbar-nav small">
                                    <li class="nav-item mb-3">
                                        <a class="text-decoration-none text-white" href="<?php echo e(route('home')); ?>">
                                            <?php echo e(__('Home')); ?>

                                        </a>
                                    </li>

                                    <li class="nav-item mb-3">
                                        <a class="text-decoration-none text-white"
                                           href="<?php echo e(route('course-schedule.guest-list')); ?>">
                                            <?php echo e(__('Course Schedule')); ?>

                                        </a>
                                    </li>

                                    <?php if(auth()->user() == null): ?>
                                        <li class="nav-item mb-3">
                                            <a class="text-decoration-none text-white"
                                               href="<?php echo e(route('auth.login')); ?>">
                                                <?php echo e(__('Login')); ?>

                                            </a>
                                        </li>

                                        <li class="nav-item mb-3">
                                            <a class="text-decoration-none text-white"
                                               href="<?php echo e(route('auth.register')); ?>">
                                                <?php echo e(__('Register')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column flex-lg-row gap-4 justify-content-lg-center border-top pt-5 small">
                    <a class="text-decoration-none text-white" href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a>
                    <a class="text-decoration-none text-white" href="<?php echo e(route('term-of-service')); ?>">Term of Service</a>
                </div>
            </div>
            <div class="col-12">
                <p class="text-center small">
                    © 2024
                    <a class="text-decoration-none text-white fw-semibold" href="<?php echo e(route('home')); ?>">
                        GURU KANDUNGAN
                    </a>
                    ALL RIGHTS RESERVED.
                </p>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/layouts/default/footer.blade.php ENDPATH**/ ?>