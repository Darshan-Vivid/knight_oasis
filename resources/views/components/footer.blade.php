<footer class="site-footer">
    <div class="ko-footer-top">
        <div class="ko-container">
            <div class="ko-footer-row">
                <div class="ko-footer-wiget">
                    <div class="ko-inner-footer-content">
                        <h4>Address</h4>
                        <p>{{ getSetting("admin_address") }}</p>
                    </div>
                </div>
                <div class="ko-footer-wiget">
                    <div class="ko-inner-footer-content">
                        <div class="ko-footer-logo">
                            <img src="{{ getSetting("site_logo") }}" alt="footer logo" />
                        </div>
                        <ul class="ko-footer-social">
                            @php
                                $s_media = json_decode(getSetting("site_social_links"));
                            @endphp
                            @if (!empty($s_media))
                                @foreach ($s_media as $index => $media)
                                    <li><a href="{{ $media->link }}" target="_blank"><img src="{{ $media->icon }}" ></img></svg></a></li>
                                    @endforeach
                                    @endif
                        </ul>
                    </div>
                </div>
                <div class="ko-footer-wiget">
                    <div class="ko-inner-footer-content">
                        <h4>Contact Us</h4>
                        <a href="tel:{{ getSetting("admin_phone") }}">T. {{ getSetting("admin_phone") }}</a>
                        <a href="mailto:{{ getSetting("admin_email") }}">M. {{ getSetting("admin_email") }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ko-copyright">
            <p>{{ getSetting("site_copyright_text") }}</p>
        </div>
    </div>
</footer>
<div class="loader-wrap">
    <span class="loader"></span>
</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="{{ URL::asset('assets/js/custom-script.js') }}"></script>
</body>
</html>
