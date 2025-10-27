@extends('layouts.default')

@section('content')
    <x-section.page-title title="Hubungi Kami"/>

    <main id="contact">
        <!-- Contact Information Section -->
        <section class="py-5" style="margin: 48px 0;">
            <div class="container px-lg-5">
                <div class="row g-4">
                    <!-- Address Card -->
                    <div class="col-12 col-md-6" style="animation: fadeInUp 1s ease;">
                        <div class="card h-100 border-0 shadow-sm" 
                             style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                             onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,86,179,0.15)';"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)';">
                            <div class="card-body p-4 p-lg-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="icon-wrapper d-flex align-items-center justify-content-center"
                                         style="width: 64px; height: 64px; background: linear-gradient(135deg, #0056b3 0%, #004aad 100%); 
                                                border-radius: 16px; box-shadow: 0 4px 12px rgba(0,86,179,0.25);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 24 24">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        </svg>
                                    </div>
                                    <h5 class="ms-3 mb-0 fw-bold" style="color: #0056b3; font-family: 'Inter', sans-serif;">
                                        Alamat Kantor
                                    </h5>
                                </div>
                                <p class="mb-0" 
                                   style="font-size: 16px; color: #475569; line-height: 1.8;
                                          font-family: 'Inter', system-ui, sans-serif;">
                                    Jl. Mayjend. Prof. Dr. Moestopo No. 6-8<br>
                                    Kecamatan Gubeng, Kelurahan Airlangga<br>
                                    Kota Surabaya
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="col-12 col-md-6" style="animation: fadeInUp 1s ease 0.2s; animation-fill-mode: both;">
                        <div class="card h-100 border-0 shadow-sm" 
                             style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                             onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,86,179,0.15)';"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)';">
                            <div class="card-body p-4 p-lg-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="icon-wrapper d-flex align-items-center justify-content-center"
                                         style="width: 64px; height: 64px; background: linear-gradient(135deg, #0056b3 0%, #004aad 100%); 
                                                border-radius: 16px; box-shadow: 0 4px 12px rgba(0,86,179,0.25);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                    </div>
                                    <h5 class="ms-3 mb-0 fw-bold" style="color: #0056b3; font-family: 'Inter', sans-serif;">
                                        Email Kami
                                    </h5>
                                </div>
                                <a href="mailto:gurukandungan@gmail.com" 
                                   class="text-decoration-none d-inline-block"
                                   style="font-size: 16px; color: #0056b3; font-weight: 500;
                                          font-family: 'Inter', system-ui, sans-serif;
                                          transition: color 0.3s ease;"
                                   onmouseover="this.style.color='#004aad';"
                                   onmouseout="this.style.color='#0056b3';">
                                    gurukandungan@gmail.com
                                </a>
                                <p class="mt-3 mb-0" style="font-size: 14px; color: #64748b; line-height: 1.6;">
                                    Kirimkan pertanyaan atau informasi yang Anda butuhkan melalui email kami
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="py-5 bg-light">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <h4 class="text-primary text-uppercase fw-bold" 
                            style="font-family: 'Inter', sans-serif; letter-spacing: 1px;">
                            Maps Kami
                        </h4>
                    </div>
                    <div class="col-12">
                        <div class="map-container shadow-sm" 
                             style="border-radius: 16px; overflow: hidden; height: 450px;">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.296!2d112.7684!3d-7.2867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sFakultas%20Kedokteran%20Universitas%20Airlangga!5e0!3m2!1sen!2sid!4v1234567890"
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Animations -->
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection