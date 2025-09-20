@extends('layout.master')

@section('content')
<section class="tc_section">
    <div class="tc_container">
        <div class="tc_content">
            <h1>Terms & Conditions</h1>
        </div>
    </div>
</section>

<section class="tc_main_section">
    <div class="tc_main_container">
        <div class="tc_main_left">
            <ul>
                <li class="active" data-index="0">Acceptance of Terms</li>
                <li data-index="1">Use of Website</li>
                <li data-index="2">Intellectual Property</li>
                <li data-index="3">No Medical or Veterinary Advice</li>
                <li data-index="4">Limitation of Liability</li>
                <li data-index="5">Third-Party Links</li>
                <li data-index="6">Changes to Terms</li>
                <li data-index="7">Governing Law</li>
            </ul>
        </div>
        <div class="tc_main_right">
            <div class="tc_specific_content"> <!-- 0 -->
                <h4>Acceptance of Terms</h4>
                <p>By accessing or using the FetchCare Solutions website (the “Site”), you agree to be bound by these
                    Terms & Conditions. If you do not agree, you should not use this Site.</p>
            </div>
            <div class="tc_specific_content"> <!-- 1 -->
                <h4>Use of Website</h4>
                <p>This Site is provided for informational purposes about FetchCare Solutions’ veterinary software and
                    services. You agree not to misuse the Site, attempt unauthorized access, or engage in activities
                    that could harm the Site or interfere with other users.</p>
            </div>
            <div class="tc_specific_content"> <!-- 2 -->
                <h4>Intellectual Property</h4>
                <p>All content, logos, graphics, and materials displayed on this Site are the property of FetchCare
                    Solutions and may not be copied, reproduced, or distributed without prior written consent.</p>
            </div>
            <div class="tc_specific_content"> <!-- 3 -->
                <h4>No Medical or Veterinary Advice</h4>
                <p>The information on this Site is for general business and product information only. FetchCare
                    Solutions does not provide medical or veterinary advice. All veterinary and medical decisions remain
                    the responsibility of licensed professionals.</p>
            </div>
            <div class="tc_specific_content"> <!-- 4 -->
                <h4>Limitation of Liability</h4>
                <p>To the maximum extent permitted by law, FetchCare Solutions shall not be liable for any damages
                    resulting from the use or inability to use this Site or our services.</p>
            </div>
            <div class="tc_specific_content"> <!-- 5 -->
                <h4>Third-Party Links</h4>
                <p>This Site may contain links to third-party websites. FetchCare Solutions is not responsible for the
                    content or practices of any third-party sites.</p>
            </div>
            <div class="tc_specific_content"> <!-- 6 -->
                <h4>Changes to Terms</h4>
                <p>FetchCare Solutions may update these Terms & Conditions from time to time. Your continued use of the
                    Site constitutes acceptance of any changes.</p>
            </div>
            <div class="tc_specific_content"> <!-- 7 -->
                <h4>Governing Law</h4>
                <p>This Site is provided for informational purposes about FetchCare Solutions’ veterinary software and
                    services. You agree not to misuse the Site, attempt unauthorized access, or engage in activities
                    that could harm the Site or interfere with other users.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom_js')
{{-- <script>
    const menuItems = document.querySelectorAll('.tc_main_left ul li');
    const sections = document.querySelectorAll('.tc_specific_content');

    // Initially show only the first section
    sections.forEach((sec, idx) => {
        sec.style.display = idx === 0 ? 'block' : 'none';
    });

    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            // Remove active from all
            menuItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');

            // Show corresponding section
            const index = parseInt(item.dataset.index);
            sections.forEach((sec, idx) => {
                sec.style.display = idx === index ? 'block' : 'none';
            });
        });
    });
</script> --}}
@endsection
