@extends('layout.master')

@section('content')
    <section class="privacy_section">
        <div class="privacy_container">
            <div class="privacy_content">
                <h1>Privacy Policy</h1>
            </div>
        </div>
    </section>

    <section class="privacy_main_section">
        <div class="privacy_main_container">
            <div class="privacy_main_left">
                <ul>
                    <li class="active" data-index="0">Information We Collect</li>
                    <li data-index="1">How We Use Information</li>
                    <li data-index="2">Sharing of Information</li>
                    <li data-index="3">Data Security</li>
                    <li data-index="4">Cookies & Tracking</li>
                    <li data-index="5">Children’s Privacy</li>
                    <li data-index="6">Updates to this Policy</li>
                    <li data-index="7">Contact Us</li>
                </ul>
            </div>
            <div class="privacy_main_right">
                <div class="privacy_specific_content"> <!-- 0 -->
                    <h4>Information We Collect</h4>
                    <p>- Information you provide directly (e.g., when filling out forms or contacting us). <br>
                        - Basic usage data collected automatically (e.g., browser type, IP address, pages visited). <br>
                        - If you become a customer, additional data may be collected under a separate service agreement.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 1 -->
                    <h4>How We Use Information</h4>
                    <p>We use collected information to: <br>
                        - Provide and improve our website and services. <br>
                        - Respond to inquiries and communicate with you. <br>
                        - Send updates, promotional materials, or important notices (you can opt out anytime). <br>
                        - Comply with legal requirements.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 2 -->
                    <h4>Sharing of Information</h4>
                    <p>We do not sell your personal information. We may share information with trusted third-party service
                        providers who assist us in operating the Site, conducting business, or servicing you - subject to
                        confidentiality obligations.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 3 -->
                    <h4>Data Security</h4>
                    <p>We implement reasonable security measures to protect personal information. However, no method of
                        transmission over the Internet is completely secure, and we cannot guarantee absolute security.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 4 -->
                    <h4>Cookies & Tracking</h4>
                    <p>Our Site may use cookies or similar technologies to enhance your experience. You can disable cookies
                        through your browser settings, though some features may not work properly.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 5 -->
                    <h4>Children’s Privacy</h4>
                    <p>Our Site is not directed to children under 13. We do not knowingly collect information from children.
                    </p>
                </div>
                <div class="privacy_specific_content"> <!-- 6 -->
                    <h4>Updates to this Policy</h4>
                    <p>We may update this Privacy Policy from time to time. Any updates will be posted on this page with a
                        revised effective date.</p>
                </div>
                <div class="privacy_specific_content"> <!-- 7 -->
                    <h4>Contact Us</h4>
                    <p>TIf you have any questions about these Terms or Privacy Policy, please contact:
                        📧 support@fetchcaresolutions.com</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    {{-- <script>
    const menuItems = document.querySelectorAll('.privacy_main_left ul li');
    const sections = document.querySelectorAll('.privacy_specific_content');

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
