<!-- footer -->
<footer class="footer" role="contentinfo">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__ctr">
                <div class="footer-col">
                    <div class="product-menu"></div>
                </div>
                <div class="footer-col">
                    <img class="lazy lazy-loading " data-src="<?php echo get_template_directory_uri(); ?>/img/slaskie.png" alt="">
                    <img class="lazy lazy-loading " data-src="<?php echo get_template_directory_uri(); ?>/img/program-regionalny.png" alt="">
                    <img class="lazy lazy-loading " data-src="<?php echo get_template_directory_uri(); ?>/img/unia-europejska.png" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-menu footer-menu__div">
                <?php html5blank_nav_footer(); ?>
                <div class="social-icons">
                    <span>Bądź na bieżąco</span>
                        <a href="https://www.facebook.com/virtuozismaku/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/social/facebook-white.svg" alt=""></a>
                        <a href="https://www.instagram.com/virtuozi_smaku/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/social/instagram-white.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom__span-text">
                <div class="footer-bottom__span-text__div">
                    <span class="copyrights">Copyright 2020 Virtu Production sp. z o.o. All Rights Reserved.</span>
                </div>
                <div class="footer-bottom__span-text__div">
                    <div class="">
                      <span>Strategia / Design:</span><a href="https://jaaqob.pl/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/footer/logo-jaaqob.png" alt=""></a>
                   </div>
                   <div class="">
                     <span>Wdrożenie:</span><a href="https://echomarketing.pl/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/footer/logo-echo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<?php if (!defined('IS_GOOGLE_SPEED')): ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
<?php endif; ?>

<script>
    window.addEventListener('load', (event) => {
        var fonts = [
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-Bold.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-ExtraBold.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-ExtraLight.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-Light.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-Medium.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-Regular.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-SemiBold.ttf',
            '<?= get_template_directory_uri() ?>/fonts/FiraSans-Thin.ttf',

        ];
        var newStyle = document.createElement('style');
        newStyle.setAttribute('id', 'font-styles');
        newStyle.appendChild(document.createTextNode("\
        @font-face {\
            font-family: FiraSans-Bold;\
            src: url('" + fonts[0] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-ExtraBold;\
            src: url('" + fonts[1] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-ExtraLight;\
            src: url('" + fonts[2] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-Light;\
            src: url('" + fonts[3] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-Medium;\
            src: url('" + fonts[4] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-Regular;\
            src: url('" + fonts[5] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-SemiBold;\
            src: url('" + fonts[6] + "');\
            font-display: swap;\
        }\
        @font-face {\
            font-family: FiraSans-Thin;\
            src: url('" + fonts[7] + "');\
            font-display: swap;\
        }\
    "));

        document.head.appendChild(newStyle);
    });
</script>

</body>
</html>
