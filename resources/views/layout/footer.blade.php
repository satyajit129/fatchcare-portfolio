 <footer>
        <div class="footer_container">
            <div class="footer_content">
                <div class="logo">
                    <img src="{{ asset('images/Logo_lg.png') }}" alt="logo_lg">
                </div>
                <div class="footer_links">
                    <div class="left">
                        <ul>
                            <li>Features</li>
                            <li>Pilot Program</li>
                            <li>Screenshots</li>
                        </ul>
                    </div>
                    <div class="middle">
                        <ul>
                            <li>Contact</li>
                            <li>
                                <a href="{{ route('privacy') }}">
                                Privacy Policy
                                </a>
                            </li>
                            <li><a href="{{ route('tc') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="right">
                        <p class="subscribe_text">Subscribe for early access</p>
                        <div class="input_group">
                            <input type="email" placeholder="Enter your email">
                            <div class="submit_btn">
                                {{-- <div class="apply_pilot">
                                    <a class="btn">Subscribe</a>
                                </div> --}}
                                <a>Apply To Pilot</a>
                            </div>
                        </div>
                        <p class="contact_text">Contact</p>
                        <div class="social_media">
                            <img src="{{ asset('svg/mdi_linkedin.svg') }}" alt="twitter">
                            <img src="{{ asset('svg/ic_baseline-facebook.svg') }}" alt="linkedin">
                            <img src="{{ asset('svg/mingcute_instagram-fill.svg') }}" alt="facebook">
                            <img src="{{ asset('svg/streamline-logos_x-twitter-logo-block.svg') }}" alt="twitter">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy_right_text">
                <p>© 2025 FetchCare Solutions</p>
            </div>
        </div>
    </footer>