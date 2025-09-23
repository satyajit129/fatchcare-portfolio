<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FetchCare Solution | Index</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .booking-kit_logo-container_39b65c89.booking-kit_logo-container-is-desktop-up_0b5953ec {
            min-height: 0 !important;
        }
    </style>
</head>

<body>

    <div class="container sm_container">
        @include('layout.header')
    </div>
    <main>
        @yield('content')
    </main>


    @include('layout.footer')

    
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".toggle-icon").on("click", function() {
                const $icon = $(this);
                const $answer = $icon.closest(".faq_accordion_container").find(".faq_answer");

                $answer.stop(true).slideToggle(300);

                // swap icon
                if ($icon.attr("src").includes("add-circle.svg")) {
                    $icon.attr("src", "{{ asset('svg/sub-circle.svg') }}");
                } else {
                    $icon.attr("src", "{{ asset('svg/add-circle.svg') }}");
                }
            });
        });
    </script>
    <script>
    const hamburger = document.querySelector('.hamburger');
    const navBar = document.querySelector('.nav_bar');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navBar.classList.toggle('show');
    });
</script>

    @yield('custom_js')
</body>

</html>
