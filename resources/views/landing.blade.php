@extends('layout.master')
@section('custom_css')
    <style>
        .swiper-wrapper {
            align-items: center;
        }
        .slider-wrap {
            width: 100vw;
            /* height: 520px; */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .swiper {
            width: 100%;
            height: 100%;
            padding: 55px 0;
        }
        .swiper-slide {
            width: 544px;
            height: 402px;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slide-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .swiper-slide-active {
            width: 910px;
            height: 100%;
            transform: scale(1.06) translateY(0);
            z-index: 5;
            border: 12px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
        }
        .swiper-slide-next,
        .swiper-slide-prev {
            width: 544px;
            height: 402px;
            border-radius: 18px;
            transform: translateY(59px);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.6);
        }
        .swiper-slide:not(.swiper-slide-active) {
            filter: saturate(0.9) brightness(0.95);
            opacity: 0.92;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(0, 0, 0, 0.7);
        }
        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 1;
            margin-top: 40px;
        }

        .swiper-pagination-bullet-active {
            background: #ffffff;
        }
        @media (max-width: 820px) {
            .swiper {
                padding: 20px 18px;
                margin: 10px;
            }

        }
    </style>
@endsection
@section('content')
    <section class="hero">
        <div class="hero_container">
            <div class="hero_top_content">
                <div class="blank left-blank"></div>
                <div class="hero_text">
                    <div class="hero_text_content">
                        <h1>{{ $settings->hero_text_one }}</h1>
                        <p>{{ $settings->hero_text_two }}</p>
                    </div>

                </div>
                <div class="blank right-blank"></div>
            </div>
        </div>
    </section>
    <section class="hero_middle">
        <div class="hero_middle_container">
            <div class="hero_middle_content">
                <div class="blank left-blank"></div>
                <div class="hero_middle_text">
                    <div class="apply_pilot ">
                        <a href="#contact" class="btn">Apply To Pilot</a>
                        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                    </div>
                    <div class="book_call">
                        <a href="#book_call" class="btn">Book a Call</a>
                        <img src="{{ asset('svg/calendar-2.png') }}" alt="Calender">
                    </div>
                </div>
                <div class="blank right-blank"></div>
            </div>
        </div>
    </section>
    {{-- <section class="hero_bottom">
        <div class="hero_bottom_container">
            <div class="hero_bottom_content">
                <div class="hero_bottom_brands">
                    <img src="{{ asset('images/BluePearlVet-Logo_1.png') }}" alt="brand-image">
                    <img src="{{ asset('images/BluePearlVet-Logo_2.png') }}" alt="brand-image">
                    <img src="{{ asset('images/BluePearlVet-Logo_3.png') }}" alt="brand-image">
                    <img src="{{ asset('images/BluePearlVet-Logo_4.png') }}" alt="brand-image">
                </div>
            </div>
        </div>
    </section> --}}

    <section class="ai_section" id="featured">
        <div class="slider-wrap">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $key => $slider)
                        <div class="swiper-slide">
                            <img class="slide-img" src="{{ asset('images/website/' . $slider->image) }}"
                                alt="Slide {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>
                <!-- Pagination (indicators/dots) -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <section class="why_choose_us" id="screenshot">
        <div class="why_choose_container">
            <div class="why_choose_us_content">
                <h2>Why Veterinary Clinics Choose FetchCare</h2>
                <p>Running a modern clinic means balancing patient care with practice performance. FetchCare puts both in
                    focus — giving you real-time visibility into operations, simplified workflows, and data-driven insights
                    that improve efficiency, growth, and quality of care.</span>
                </p>
                <div class="why_choose_us_btn">
                    <div class="apply_pilot ">
                        <a href="#contact" class="btn">Apply To Pilot</a>
                        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                    </div>
                </div>
            </div>
            <div class="graph_container">
                @forelse ($featureds as $featured)
                    <div class="graph_content">
                        <img src="{{ asset('images/website/' . $featured->image) }}" alt="graph">
                        <div class="graph_text">
                            <img src="{{ asset('images/website/' . $featured->icon) }}" alt="">
                            <h4>{{ $featured->title }}</h4>
                            <p>{{ $featured->description }}</p>
                        </div>
                    </div>
                @empty
                    <p>No data Found</p>
                @endforelse
            </div>
            {{-- <div class="client_feedback">
                <h2>What Clinics Are Saying</h2>
                <div class="client_feedback_content">
                    <img class="quote" src="{{ asset('svg/quote-down.svg') }}" alt="">
                    <div class="client_feedback_text">
                        <p>
                            "Using this platform has completely transformed the way we run our clinic. Scheduling,
                            billing, and patient records are now all in one place, making our daily operations so much
                            smoother. What used to take hours is now done in minutes, and our staff can spend more time
                            focusing on pet care rather than paperwork. It truly feels like we’ve upgraded to a smarter,
                            more professional way of managing everything."
                        </p>
                        <div class="star_rating">
                            <img src="{{ asset('svg/star.svg') }}" alt="star">
                            <img src="{{ asset('svg/star.svg') }}" alt="star">
                            <img src="{{ asset('svg/star.svg') }}" alt="star">
                            <img src="{{ asset('svg/star.svg') }}" alt="star">
                            <img src="{{ asset('svg/star.svg') }}" alt="star">
                        </div>
                    </div>
                    <h4>BluePearl Pet Hospital</h4>
                </div>
            </div> --}}
        </div>

    </section>

    <section class="experience_fatchcare" id="book_call">
        @php
            $date = date('Y-m-d');
        @endphp

        <div class="experience_container">
            <div class="experience_content">
                <h2>Ready to Experience FetchCare?</h2>
                <p>
                    Book a free 30-minute demo and see how FetchCare Solutions can <span> transform your clinic <br>
                        operations. </span>
                </p>
                <div class="calendly_section">
                    <!-- Inline Calendly Widget -->
                    <div class="calendly-inline-widget"
                        data-url="https://calendly.com/fetchcaresolutions/new-meeting?back=0&month={{ date('Y-m', strtotime($date)) }}&date={{ $date }}&hide_gdpr_banner=1"
                        style="min-width:320px; width:100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="contact">
        <div class="contact_container">
            <div class="contact_left">
                <p class="contact_intro">We’re here to help you</p>
                <h2>Discuss Your <span> Clinic <br> Management Solution </span> <br> Needs</h2>
                <p class="contact_email">Enter your email to get <span> updates, insights, and <br> exclusive early
                        access.</span></p>
            </div>
            <div class="contact_right">
                <form id="contactForm">
                    @csrf
                    <div class="contact_form">

                        <input type="text" placeholder="Full Name" name="full_name">
                        <input type="text" placeholder="Clinic Name" name="clinic_name">
                        <input type="email" placeholder="Enter Your Email" name="email">
                        <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                        <div class="submit_btn">
                            <div class="apply_pilot ">
                                <a href="javascript:void(0);" id="submitForm" class="btn">Apply To Pilot</a>
                                <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="faq" id="faq">
        <div class="faq_container">
            <div class="faq_content">
                <h2>FAQs</h2>
                <p>We’re here to make business insurance simple.</p>

                <div class="faq_item">
                    @foreach ($faqs as $faq)
                        <div class="faq_accordion_container">
                            <div class="faq_accordion">
                                <h4>{{ $faq->question }}</h4>
                                <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                            </div>
                            <div class="faq_answer" style="display: none;">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        $("#submitForm").on("click", function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('contactSubmit') }}",
                type: "POST",
                data: $("#contactForm").serialize(),
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $("#contactForm")[0].reset();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error("Something went wrong!");
                }
            });
        });
    </script>

    <script>
        const swiper = new Swiper('.swiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 3,
            loop: true,
            spaceBetween: 60,
            speed: 2500,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: -20,
                stretch: 0,
                depth: 160,
                modifier: 1.2,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                900: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                600: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                350: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
            },
            on: {
                init: function() {
                    toggleNavPagination(this);
                },
                resize: function() {
                    toggleNavPagination(this);
                }
            }
        });

        // // Function to hide/show pagination & nav for small screens
        // function toggleNavPagination(swiperInstance) {
        //     if (window.innerWidth <= 600) {
        //         swiperInstance.pagination.el.style.display = 'none';
        //         swiperInstance.navigation.nextEl.style.display = 'none';
        //         swiperInstance.navigation.prevEl.style.display = 'none';
        //     } else {
        //         swiperInstance.pagination.el.style.display = 'block';
        //         swiperInstance.navigation.nextEl.style.display = 'block';
        //         swiperInstance.navigation.prevEl.style.display = 'block';
        //     }
        // }
    </script>
@endsection
