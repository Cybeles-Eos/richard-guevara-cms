@push('extrastylesheets')
    <style>
        .hero-qoute{
            opacity: 1;
            transform: translateY(0);
            transition: opacity .6s ease, transform .6s ease;
        }

        .shero-banner-img{
            opacity: 1;
            transform: translateY(0) translateX(-50%);
            transition: opacity .6s ease, transform .6s ease;
        }

        .fade-out{
            opacity: 0;
            transform: translateY(10px);
        }
        .fade-in{
            opacity: 1;
            transform: translateY(0);
        }

        .fade-out-up{
            opacity: 0;
            transform: translateY(-10px) translateX(-50%);
        }
        .fade-in-up{
            opacity: 1;
            transform: translateY(0) translateX(-50%);
        }
    </style>
@endpush
<main class="main-content page--home">
    <section class="section--hero g-padding">
        @php
            $HomeHeroData = getPageSectionData($page->id, 'home-hero-section');
        
            $heroImage1 =
                !empty($HomeHeroData['quote_image_1']) && is_object($HomeHeroData['quote_image_1'])
                    ? $HomeHeroData['quote_image_1']->url
                    : '';
            $heroImage2 =
                !empty($HomeHeroData['quote_image_2']) && is_object($HomeHeroData['quote_image_2'])
                    ? $HomeHeroData['quote_image_2']->url
                    : '';
            $heroImage3 =
                !empty($HomeHeroData['quote_image_3']) && is_object($HomeHeroData['quote_image_3'])
                    ? $HomeHeroData['quote_image_3']->url
                    : '';
            $heroImage4 =
                !empty($HomeHeroData['quote_image_4']) && is_object($HomeHeroData['quote_image_4'])
                    ? $HomeHeroData['quote_image_4']->url
                    : '';
        @endphp
        <script>
            console.log(@json($HomeHeroData));
            console.log($heroImage1);
        </script>
        {{-- 
        @php 
            $heroSectionData = getPageSectionData(1, 'home-hero');
            $heroData = is_array($heroSectionData) && isset($heroSectionData[0]) ? $heroSectionData[0] : $heroSectionData;
            
            $mainImage = !empty($heroData['image']) && is_object($heroData['image']) ? $heroData['image']->url : '';
        @endphp
        <img src="{{ !empty($mainImage) ? $mainImage : asset('public/redesign-layout/images/hero-bot.png') }}" loading="lazy" decoding="async" alt="">
        --}}
        {{-- {{ section('Award Overview.data.first.award_emblem_1')->asAttachment()->url ?? asset('public/assets/images/awards-1.png')}} --}}
        <img src="{{ asset('public/redesign/Shape Grid.svg') }}" class="shero-bg" alt="bg-vec">
        <h1>{!! $HomeHeroData['headline'] ?? "Designing Websites That <span>Command Attention</span>" !!}</h1>
        <p class="section--hero--label">{!! $HomeHeroData['description'] ?? "Skip the waiting room. Get seen through mobile, online, or phone for urgent medical needs, common symptoms, and prescription refills without leaving home." !!}</p>
        <div class="btns-con">
            <a href="{{ url($HomeStepData['primary_cta_link'] ?? '/contact-us') }}" class="btn--arrow">
                {!! $HomeHeroData['primary_cta_label'] ?? 'Book Free Consultation' !!}
                <div>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                        <i class="fas fa-handshake"></i>
                    </span>
                </div>
            </a>
            <a href="{{url($HomeHeroData['secondary_cta_link'] ?? '/contact-us' )}}" class="btn btn--secondary">{!! $HomeHeroData['secondary_cta_label'] ?? "Request A Quote" !!}</a>
        </div>

        <div class="section--hero--foo mt-4">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.27734 6.613C9.06335 8.25527 10.3852 9.77924 10.3852 9.77924C10.3852 9.77924 12.0539 8.64055 12.2679 6.99828C12.4819 5.356 11.1601 3.83203 11.1601 3.83203C11.1601 3.83203 9.49134 4.97072 9.27734 6.613Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M7.70939 12.1321C8.40786 13.6354 10.3429 14.2254 10.3429 14.2254C10.3429 14.2254 11.1454 12.3778 10.447 10.8745C9.74848 9.37118 7.81348 8.78125 7.81348 8.78125C7.81348 8.78125 7.01093 10.6287 7.70939 12.1321Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M11.8496 18.0136C11.8496 18.0136 9.86502 18.4083 8.5323 17.4151C7.19959 16.422 7.02344 14.4172 7.02344 14.4172C7.02344 14.4172 9.00805 14.0226 10.3408 15.0157C11.6735 16.0089 11.8496 18.0136 11.8496 18.0136ZM11.8496 18.0136H15.0589C16.1636 18.0136 17.0591 18.906 17.0591 20.0068C17.0591 21.1076 16.1636 22 15.0589 22H13.0452" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M13.8283 2.96764C12.6136 4.10058 12.6604 6.11247 12.6604 6.11247C12.6604 6.11247 14.6767 6.28752 15.8914 5.15458C17.1061 4.02165 17.0592 2.00975 17.0592 2.00975C17.0592 2.00975 15.043 1.83471 13.8283 2.96764Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
            </svg>
            <p class="hero-qoute" id="heroQuote">Trusted in 50+ Companies Worldwide</p>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.8066 6.613C15.0206 8.25527 13.6988 9.77924 13.6988 9.77924C13.6988 9.77924 12.03 8.64055 11.8161 6.99828C11.6021 5.356 12.9238 3.83203 12.9238 3.83203C12.9238 3.83203 14.5926 4.97072 14.8066 6.613Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M16.3746 12.1321C15.6761 13.6354 13.7411 14.2254 13.7411 14.2254C13.7411 14.2254 12.9386 12.3778 13.637 10.8745C14.3355 9.37118 16.2705 8.78125 16.2705 8.78125C16.2705 8.78125 17.0731 10.6287 16.3746 12.1321Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M12.2343 18.0136C12.2343 18.0136 14.219 18.4083 15.5517 17.4151C16.8844 16.422 17.0605 14.4172 17.0605 14.4172C17.0605 14.4172 15.0759 14.0226 13.7432 15.0157C12.4105 16.0089 12.2343 18.0136 12.2343 18.0136ZM12.2343 18.0136H9.02504C7.92042 18.0136 7.02492 18.906 7.02492 20.0068C7.02492 21.1076 7.92042 22 9.02504 22H11.0388" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
                <path d="M10.2556 2.96764C11.4704 4.10058 11.4236 6.11247 11.4236 6.11247C11.4236 6.11247 9.40731 6.28752 8.19261 5.15458C6.97791 4.02165 7.02477 2.00975 7.02477 2.00975C7.02477 2.00975 9.04095 1.83471 10.2556 2.96764Z" stroke="#3A3A3A" stroke-width="1.2" stroke-linejoin="round"/>
            </svg>
        </div>

        <div class="section--hero--banners">
            <img src="{{ asset(!empty($heroImage1) ? $heroImage1 : 'public/redesign/banner-1.png') }}" loading="lazy" decoding="async" class="shero-banner-img" id="heroBanner" alt="Banner Image">
        </div>
    </section>
    <section class="section--clients g-padding">
        <div class="section--clients__main wrapper">

            <div class="section--clients__main--title">
                <p>Trusted by Growing Brands</p>
            </div>

            <div class="swiper brandSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                    <div class="swiper-slide"><img src="{{ asset('public/redesign/clients-logo/c6.png') }}" loading="lazy" decoding="async" alt="client-logo"></div>
                </div>
            </div>

        </div>
    </section>
    <section class="section--about-me">
        <div class="section--about-me__main wrapper g-padding">
            <div class="sabm-m-img">
                <img src="{{ asset('public/redesign/hsam-pic.png') }}" loading="lazy" decoding="async" alt="Richard G.">
            </div>
            <div class="sabm-m-txt">
                <h2>Hey there, I'm Richard!</h2>
                <p>
                    Richard G. is a Senior DevOps & Software Engineer specializing in scalable infrastructure, deployment pipelines, and automation-driven systems. He builds resilient architectures designed for performance, efficiency, and long-term growth.
                    <br><br>
                    With deep expertise in cloud environments and system reliability, Richard focuses on turning complex technical challenges into streamlined, production-ready solutions. His work blends precision engineering with strategic thinking ensuring systems are not only functional, but future-proof.
                    <br><br>
                    Outside of engineering, he explores disciplines that sharpen strategic thinking — from boxing and geopolitics to philosophy and character development.
                </p>
                <a href="#" class="btn btn--primary">Get  10 Minutes Consultation</a>
            </div>
        </div>
        <img src="{{ asset('public/redesign/aboutme-sec-vec.svg') }}" loading="lazy" decoding="async" class="aboutme-sec-vec" alt="vector">
    </section>
    <section class="section--service g-padding">
        <p class="section--service__pre-title">SERVICES</p>
        <h2>Stand Out With Proven Expertise</h2>
        <p class="section--service__label">Delivering strategic, high-performance digital solutions built to elevate brands and drive measurable growth.</p>

        <div class="sserv-con">
            <div class="sserv-con-box aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="200">
                <div class="sserv-con-box--icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.4776 8.00005C17.485 8.00002 17.4925 8 17.5 8C19.9853 8 22 10.0147 22 12.5C22 14.0602 21.206 15.435 20 16.2422M17.4776 8.00005C17.4924 7.83536 17.5 7.66856 17.5 7.5C17.5 4.46243 15.0376 2 12 2C9.12324 2 6.76233 4.20862 6.52042 7.0227M17.4776 8.00005C17.4131 8.71494 17.2119 9.39038 16.9003 10M6.52042 7.0227C3.98398 7.26407 2 9.40034 2 12C2 13.7891 2.93963 15.3587 4.35232 16.2422M6.52042 7.0227C6.67826 7.00768 6.83823 7 7 7C8.12582 7 9.16474 7.37209 10.0005 8" stroke="url(#paint0_linear_3723_17821)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 14H11C10.0572 14 9.58579 14 9.29289 14.2929C9 14.5858 9 15.0572 9 16V18C9 18.9428 9 19.4142 9.29289 19.7071C9.58579 20 10.0572 20 11 20H13C13.9428 20 14.4142 20 14.7071 19.7071C15 19.4142 15 18.9428 15 18V16C15 15.0572 15 14.5858 14.7071 14.2929C14.4142 14 13.9428 14 13 14Z" stroke="url(#paint1_linear_3723_17821)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.5 20V22M13.5 20V22M10.5 12V14M13.5 12V14M9 15.5H7M9 18.5H7M17 15.5H15M17 18.5H15" stroke="url(#paint2_linear_3723_17821)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_3723_17821" x1="12" y1="2" x2="12" y2="16.2422" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_3723_17821" x1="12" y1="14" x2="12" y2="20" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        <linearGradient id="paint2_linear_3723_17821" x1="12" y1="12" x2="12" y2="22" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="sserv-con-box--line">
                    <p>01</p>
                    <hr>
                </div>
                <div class="sserv-con-box--description">
                    <h3>Cloud Computing</h3>
                    <p>Expertise in managing and scaling cloud-based servers for peak performance and efficiency.</p>
                </div>
                <a href="contact.html">Read more →</a>
            </div>
            <div class="sserv-con-box aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="300">
                <div class="sserv-con-box--icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 20L7.41286 17.5871M7.41286 17.5871C8.21715 18.3914 9.32826 18.8889 10.5556 18.8889C13.0102 18.8889 15 16.899 15 14.4444C15 11.9898 13.0102 10 10.5556 10C8.10096 10 6.11111 11.9898 6.11111 14.4444C6.11111 15.6717 6.60857 16.7829 7.41286 17.5871Z" stroke="url(#paint0_linear_3629_36158)" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M3 15.1877C2.36394 14.0914 2 12.8191 2 11.4623C2 7.34099 5.35786 4 9.5 4H14.5C18.6421 4 22 7.34099 22 11.4623C22 14.7114 19.913 17.4756 17 18.5" stroke="url(#paint1_linear_3629_36158)" stroke-width="1.5" stroke-linecap="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_3629_36158" x1="10" y1="10" x2="10" y2="20" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_3629_36158" x1="12" y1="4" x2="12" y2="18.5" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="sserv-con-box--line">
                    <p>02</p>
                    <hr>
                </div>
                <div class="sserv-con-box--description">
                    <h3>SEO & Branding</h3>
                    <p>Strategies that can help businesses increase their online visibility and establish a strong brand identity.</p>
                </div>
                <a href="contact.html">Read more →</a>
            </div>
            <div class="sserv-con-box aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="400">
                <div class="sserv-con-box--icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 21H16M14 21C13.1716 21 12.5 20.3284 12.5 19.5V17H12M14 21H10M12 17H11.5V19.5C11.5 20.3284 10.8284 21 10 21M12 17V21M10 21H8" stroke="url(#paint0_linear_3629_36168)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 3H8C5.17157 3 3.75736 3 2.87868 3.87868C2 4.75736 2 6.17157 2 9V11C2 13.8284 2 15.2426 2.87868 16.1213C3.75736 17 5.17157 17 8 17H16C18.8284 17 20.2426 17 21.1213 16.1213C22 15.2426 22 13.8284 22 11V9C22 6.17157 22 4.75736 21.1213 3.87868C20.2426 3 18.8284 3 16 3Z" stroke="url(#paint1_linear_3629_36168)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 8L13.5 10.5C13.2274 10.7726 13.0911 10.9089 12.944 10.9818C12.6642 11.1204 12.3358 11.1204 12.056 10.9818C11.9089 10.9089 11.7726 10.7726 11.5 10.5C11.2274 10.2274 11.0911 10.0911 10.944 10.0182C10.6642 9.87955 10.3358 9.87955 10.056 10.0182C9.90894 10.0911 9.77262 10.2274 9.5 10.5L7 13M14 7H15.7143C16.3204 7 16.6234 7 16.8117 7.18829C17 7.37658 17 7.67962 17 8.28571V10" stroke="url(#paint2_linear_3629_36168)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_3629_36168" x1="12" y1="17" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_3629_36168" x1="12" y1="3" x2="12" y2="17" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        <linearGradient id="paint2_linear_3629_36168" x1="12" y1="7" x2="12" y2="13" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2EBE96"/>
                        <stop offset="1" stop-color="#96C05A"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="sserv-con-box--line">
                    <p>03</p>
                    <hr>
                </div>
                <div class="sserv-con-box--description">
                    <h3>Web development</h3>
                    <p>Cover all stages of website development, from design to deployment, to ensure a seamless user experience.</p>
                </div>
                <a href="contact.html">Read more →</a>
            </div>

            <img src="{{ asset('public/redesign/vector-1.svg') }}" class="vec-2" loading="lazy" decoding="async" alt="vector">
            <img src="{{ asset('public/redesign/vector-2.svg') }}" class="vec-1" loading="lazy" decoding="async" alt="vector">
        </div>
    </section>
    <section class="section--portfolios g-padding">
        <div class="section--portfolios__main wrapper">
            <div class="hspm-head">
                <div class="hspm-head__info">
                    <p class="hspm-head__info--pre-title">FEATURED PROJECTS</p>
                    <h2>Developed websites that Conquer <span>Industries and Generate Revenue</span></h2>
                    <p class="hspm-head__info--label">Delivering strategic, high-performance digital solutions built to elevate brands and drive measurable growth.</p>
                </div>
                <a href="portfolio.html" class="btn btn--primary">See More</a>
            </div>
            <div class="hspm-con">

                <div class="hspm-con-box">
                    <a href="#">
                        <img src="{{ asset('public/redesign/portfolio/project-banner-1.png') }}" loading="lazy" decoding="async" alt="project-banner">
                        
                        <a class="btn-spp" href="#">
                            <div>
                                <svg class="btn-spp-1" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>

                                <svg class="btn-spp-2" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>
                            </div>

                        </a>
                    </a>
                </div>

                <div class="hspm-con-box">
                    <a href="#">
                        <img src="{{ asset('public/redesign/portfolio/project-banner-2.png') }}" loading="lazy" decoding="async" alt="project-banner">
                        
                        <a class="btn-spp" href="#">
                            <div>
                                <svg class="btn-spp-1" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>

                                <svg class="btn-spp-2" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>
                            </div>

                        </a>
                    </a>
                </div>

                <div class="hspm-con-box">
                    <a href="#">
                        <img src="{{ asset('public/redesign/portfolio/project-banner-3.png') }}" loading="lazy" decoding="async" alt="project-banner">
                        
                        <a class="btn-spp" href="#">
                            <div>
                                <svg class="btn-spp-1" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>

                                <svg class="btn-spp-2" width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.313 12.8981L11.6568 4.91149L10.5741 13.3311L12.7063 13.5977L14.2559 1.5481L2.20629 -0.00144641L1.93318 2.12229L10.3443 3.2116L0.000493467 11.1982L1.313 12.8981Z" fill="#00563F"/>
                                </svg>
                            </div>

                        </a>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <section class="section--testimonials g-padding">
        <h2>Trusted Voices, <span>Real Experiences</span></h2>
        <p class="section--testimonials__label">
            Hear directly from our satisfied clients who have experienced our commitment to quality, reliability, and exceptional service. Their stories reflect the trust we’ve built and the results we consistently deliver.
        </p>

        <div class="section--testimonials__dev" id="testimonialGrid"> 

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Richard did an outstanding job on my project. His coding skills are impressive, the process was smooth, and he was always available to help whenever needed.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Great developer to work with. Communicationed expectations. I would gladly work with him again.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Very reliable and easy to work with. The pll quality of the work was excellent from start to finish.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>
            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

            <div class="section--testimonials__dev__main">
                <div class="section--testimonials__dev__main--head">
                    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 3.5L10.5 0H7C3.1325 0 0 4.8825 0 8.75V21H12.25V8.75H5.25C5.25 3.5 8.75 3.5 8.75 3.5ZM21 8.75C21 3.5 24.5 3.5 24.5 3.5L26.25 0H22.75C18.8825 0 15.75 4.8825 15.75 8.75V21H28V8.75H21Z" fill="#DEDEDE"/>
                    </svg>
                    <p>Ahuh! So you should do even better! Raise the Philippine flag!. You are the only Filipino developer who has been hired so far!. I had the pleasure of working with Richard, a Full Stack developer, for Recruitdrip, and I must say that he is one of the most skilled and professional developers I have ever worked with.</p>
                </div>
                <div class="section--testimonials__dev__main--foo">
                    <img src="{{ asset('public/redesign/angel-drip.webp') }}" loading="lazy" decoding="async" alt="author">
                    <div>
                        <p class="testi-author">Jack Jung</p>
                        <p class="testi-position">Businessman</p>
                    </div>
                </div>
            </div>

        </div>

        <button class="section--testimonials__toggle" id="testimonialToggle" type="button">View All Reviews →</button>
        
        <img src="{{ asset('public/redesign/testih-vector.svg') }}" class="testih-sec-vec" alt="vector">
    </section>
    <section class="section--blogs g-padding">
        <h2>Our Latest Blogs</h2>
        <div class="section--blogs--con">

            <div class="blog-box-m">
                <div class="blog-box-m-head">
                    <div class="blog-box-m-head-banner">
                        <img src="{{ asset('public/redesign/blog-banner.png') }}" loading="lazy" decoding="async" alt="banner-image">
                        <div class="blog-box-m-head-banner-txt">
                            <div class="blog-box-m-head-banner-txt__left">
                                <h5>Richard Guevara</h5>
                                <p>02 Jan 2026</p>
                            </div>
                            <h5>Design</h5>
                        </div>
                    </div>
                    <div class="blog-box-m-head-detail">
                        <h3>SEO & Branding</h3>
                        <p>Strategies that can help businesses increase their online visibility and establish a strong brand identity.</p>
                    </div>
                </div>
                <a href="blog-detail.html">
                    Read Post
                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.41667 0.850215C2.41667 0.850215 7.0422 0.488395 7.6936 1.13975C8.34493 1.79111 7.98307 6.41667 7.98307 6.41667M7.41667 1.41667L0.75 8.08333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="blog-box-m">
                <div class="blog-box-m-head">
                    <div class="blog-box-m-head-banner">
                        <img src="{{ asset('public/redesign/blog-banner.png') }}" loading="lazy" decoding="async" alt="banner-image">
                        <div class="blog-box-m-head-banner-txt">
                            <div class="blog-box-m-head-banner-txt__left">
                                <h5>Richard Guevara</h5>
                                <p>02 Jan 2026</p>
                            </div>
                            <h5>Design</h5>
                        </div>
                    </div>
                    <div class="blog-box-m-head-detail">
                        <h3>SEO & Branding</h3>
                        <p>Strategies that can help businesses increase their online visibility and establish a strong brand identity.</p>
                    </div>
                </div>
                <a href="blog-detail.html">
                    Read Post
                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.41667 0.850215C2.41667 0.850215 7.0422 0.488395 7.6936 1.13975C8.34493 1.79111 7.98307 6.41667 7.98307 6.41667M7.41667 1.41667L0.75 8.08333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="blog-box-m">
                <div class="blog-box-m-head">
                    <div class="blog-box-m-head-banner">
                        <img src="{{ asset('public/redesign/blog-banner.png') }}" loading="lazy" decoding="async" alt="banner-image">
                        <div class="blog-box-m-head-banner-txt">
                            <div class="blog-box-m-head-banner-txt__left">
                                <h5>Richard Guevara</h5>
                                <p>02 Jan 2026</p>
                            </div>
                            <h5>Design</h5>
                        </div>
                    </div>
                    <div class="blog-box-m-head-detail">
                        <h3>SEO & Branding</h3>
                        <p>Strategies that can help businesses increase their online visibility and establish a strong brand identity.</p>
                    </div>
                </div>
                <a href="blog-detail.html">
                    Read Post
                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.41667 0.850215C2.41667 0.850215 7.0422 0.488395 7.6936 1.13975C8.34493 1.79111 7.98307 6.41667 7.98307 6.41667M7.41667 1.41667L0.75 8.08333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            
        </div>
    </section>
</main>

@include('front.pages.custom-page.sections.global-cta-v1')
@push('extrascripts')
    <script>
        const quotes = [
            "Trusted by 50+ Companies Worldwide",
            "Building Scalable Websites for Modern Brands",
            "Crafting High-Performance Web Experiences",
            "Helping Businesses Grow Through Web Tech",
            "Delivering Clean Code and Smart Solutions",
            "Custom Web Development for Ambitious Teams"
        ];

        let index = 0;
        const quoteEl = document.getElementById("heroQuote");

        setInterval(() => {

            quoteEl.classList.remove("fade-in");
            quoteEl.classList.add("fade-out");

            setTimeout(() => {
                index = (index + 1) % quotes.length;

                quoteEl.textContent = quotes[index];

                quoteEl.classList.remove("fade-out");
                quoteEl.classList.add("fade-in");

            }, 600);

        }, 4000);

        const banners = [
            
            "{{ asset('public/redesign/banner-1.png') }}",
            "{{ asset('public/redesign/banner-2.png') }}",
            "{{ asset('public/redesign/banner-3.png') }}",
            "{{ asset('public/redesign/banner-4.png') }}"
        ];

        let bannerIndex = 0;
        const bannerEl = document.getElementById("heroBanner");

        if (bannerEl) {
            setInterval(() => {

                bannerEl.classList.remove("fade-in-up");
                bannerEl.classList.add("fade-out-up");

                setTimeout(() => {

                    bannerIndex = (bannerIndex + 1) % banners.length;
                    bannerEl.src = banners[bannerIndex];

                    bannerEl.classList.remove("fade-out-up");
                    bannerEl.classList.add("fade-in-up");

                }, 600);

            }, 4000);
        }
    </script>
    <script>
        // Logo Slider
        new Swiper('.brandSwiper', {
            loop: true,
            slidesPerView: 5,
            spaceBetween: 40,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            speed: 3000,
            allowTouchMove: true,
            breakpoints: {
                320: { slidesPerView: 2 },
                576: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                992: { slidesPerView: 5 }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const boxes = document.querySelectorAll('.section--testimonials__dev__main');
            const toggleBtn = document.getElementById('testimonialToggle');
            const initialVisible = 6; // change from 9 to 3 for now
            let expanded = false;

            function updateTestimonials() {
                boxes.forEach((box, index) => {
                    if (!expanded && index >= initialVisible) {
                        box.classList.add('is-hidden');
                    } else {
                        box.classList.remove('is-hidden');
                    }
                });

                toggleBtn.textContent = expanded ? 'View Less Reviews →' : 'View More Reviews →';

                if (boxes.length <= initialVisible) {
                    toggleBtn.style.display = 'none';
                } else {
                    toggleBtn.style.display = 'inline-flex';
                }
            }

            toggleBtn.addEventListener('click', function () {
                expanded = !expanded;
                updateTestimonials();

                if (!expanded) {
                    document.getElementById('testimonialGrid').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });

            updateTestimonials();
        });
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.section--testimonials__dev__main');
            const colors = ['#D4E0FF', '#F7FFC7', '#FFE0E0', '#E4FBE7', '#F3E4FF'];
            const defaultColor = '#F2F2F2';

            cards.forEach(card => {
                card.style.backgroundColor = defaultColor;

                if (Math.random() > 0.55) {
                    const color = colors[Math.floor(Math.random() * colors.length)];
                    card.style.backgroundColor = color;
                }
            });
        });
    </script>
@endpush
 