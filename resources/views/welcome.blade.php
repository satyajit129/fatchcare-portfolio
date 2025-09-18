<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FetchCare Solution | Index</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header>
            <div class="logo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo">
            </div>
            <div class="nav_bar">
                <ul>
                    <li><a href="#">Featured</a></li>
                    <li><a href="#">Pilot Program</a></li>
                    <li><a href="#">Screenshots</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="apply_pilot">
                <a class="btn">Apply To Pilot</a>
            </div>
        </header>
    </div>
    <section class="hero">
        <div class="hero_container">
            <div class="hero_top_content">
                <div class="blank left-blank"></div>
                <div class="hero_text">
                    <div class="hero_text_content">
                        <h1>Run Your Veterinary Clinic Smarter <br> with AI-Powered Insights</h1>
                        <p>With <span>real-time AI insights, seamless scheduling, <br> and smarter KPI tracking</span> -
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
                    <div class="apply_pilot">
                        <a class="btn">Apply To Pilot</a>
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
</body>

</html>
