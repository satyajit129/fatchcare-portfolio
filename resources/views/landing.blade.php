@extends('layout.master')

@section('content')

    <section class="hero">
        <div class="hero_container">
            <div class="hero_top_content">
                <div class="blank left-blank"></div>
                <div class="hero_text">
                    <div class="hero_text_content">
                        <h1>Run Your Veterinary Clinic Smarter with AI-Powered Insights</h1>
                        <p>With <span>real-time AI insights, seamless scheduling, and smarter KPI tracking</span> -
                            all
                            in
                            one simple dashboard.</p>
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
                        <a class="btn">Apply To Pilot</a>
                        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                    </div>
                    <div class="book_call">
                        <a class="btn">Book a Call</a>
                        <img src="{{ asset('svg/calendar-2.png') }}" alt="Calender">
                    </div>
                </div>
                <div class="blank right-blank"></div>
            </div>
        </div>
    </section>
    <section class="hero_bottom">
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
    </section>

    <section class="ai_section">
        <div class="ai_container">
            <div class="ai_section_content">
                <img src="{{ asset('images/ai_content.png') }}" alt="ai-content">
            </div>
        </div>
    </section>

    <section class="why_choose_us">
        <div class="why_choose_container">
            <div class="why_choose_us_content">
                <h2>Why Veterinary Clinics Choose FetchCare</h2>
                <p>Modern veterinary clinic requires more than appointments. FetchCare gives you <span> real-time 
                        visibility
                        into performance, simplifies operations, </span> and <span> AI Data-Driven helps you </span>
                    focus on what  matters most:
                    <span> delivering better care for pets. </span>
                </p>
                <div class="why_choose_us_btn">
                    <div class="apply_pilot ">
                        <a class="btn">Apply To Pilot</a>
                        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                    </div>
                </div>
            </div>
            <div class="graph_container">
                <div class="graph_content">
                    <img src="{{ asset('images/graph_1.png') }}" alt="graph">
                    <div class="graph_text">
                        <img src="{{ asset('svg/activity.svg') }}" alt="">
                        <h4>AI Insights & Actions</h4>
                        <p>Transform complex raw data into simple, clear, and highly actionable recommendations that
                            drive better decisions.</p>
                    </div>
                </div>
                <div class="graph_content">
                    <img src="{{ asset('images/graph_2.png') }}" alt="graph">
                    <div class="graph_text">
                        <img src="{{ asset('svg/chart.svg') }}" alt="">
                        <h4>Performance Dashboard</h4>
                        <p>Easily track revenue utilization, monitor client retention trends, and gain deeper insights
                            every key performance metric.</p>
                    </div>
                </div>
                <div class="graph_content">
                    <img src="{{ asset('images/graph_3.png') }}" alt="graph">
                    <div class="graph_text">
                        <img src="{{ asset('svg/chart.svg') }}" alt="">
                        <h4>Seamless Integrations</h4>
                        <p>Seamlessly connect with your existing PIMS system without causing any disruption to your
                            current operations.</p>
                    </div>
                </div>
                <div class="graph_content">
                    <img src="{{ asset('images/graph_4.png') }}" alt="graph">
                    <div class="graph_text">
                        <img src="{{ asset('svg/activity.svg') }}" alt="">
                        <h4>Clinic Health Score</h4>
                        <p>Get a complete, at-a-glance AI Data-Driven overview of your organization’s overall
                            performance in real time.</p>
                    </div>
                </div>
            </div>
            <div class="client_feedback">
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
            </div>
        </div>

    </section>

    <section class="experience_fatchcare">
        @php
            $date = date('Y-m-d');
        @endphp

        <div class="experience_container">
            <div class="experience_content">
                <h2>Ready to Experience FetchCare?</h2>
                <p>
                    Book a free 15-minute demo and see how FetchCare Solutions can <span> transform your clinic <br>
                        operations. </span>
                </p>
                <div class="calendly_section">
                    <!-- Inline Calendly Widget -->
                    <div class="calendly-inline-widget"
                        data-url="https://calendly.com/royroys043/new-meeting?back=0&month={{ date('Y-m', strtotime($date)) }}&date={{ $date }}&hide_gdpr_banner=1"
                        style="min-width:320px; width:100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact">
        <div class="contact_container">
            <div class="contact_left">
                <p class="contact_intro">We’re here to help you</p>
                <h2>Discuss Your <span> Clinic <br> Management Solution </span> <br> Needs</h2>
                <p class="contact_email">Enter your email to get <span> updates, insights, and <br> exclusive early
                        access.</span></p>
            </div>
            <div class="contact_right">
                <div class="contact_form">
                    <input type="text" placeholder="Full Name">
                    <input type="text" placeholder="Clinic Name">
                    <input type="email" placeholder="Enter Your Email">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Mesasge"></textarea>
                    <div class="submit_btn">
                        <div class="apply_pilot ">
                        <a class="btn">Apply To Pilot</a>
                        <img src="{{ asset('svg/arrow-right.svg') }}" alt="Calender">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="faq_container">
            <div class="faq_content">
                <h2>FAQs</h2>
                <p>We’re here to make business insurance simple.</p>

                <div class="faq_item">
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>What is FetchCare, and who is it for?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>Do I need technical skills to use FetchCare?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>How secure is my data?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>Can FetchCare integrate with my existing tools?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>How does FetchCare improve my clinic’s efficiency?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>Is there customer support if I need help?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                    <div class="faq_accordion_container">
                        <div class="faq_accordion">
                            <h4>Do you offer a free trial?</h4>
                            <img src="{{ asset('svg/add-circle.svg') }}" alt="add-circle" class="toggle-icon">
                        </div>
                        <div class="faq_answer" style="display: none;">
                            <p>
                                FetchCare is a clinic management solution designed for healthcare providers,
                                helping them streamline scheduling, patient records, billing, and overall operations.
                                It’s ideal for small to medium-sized clinics that want efficiency and better patient
                                engagement.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection