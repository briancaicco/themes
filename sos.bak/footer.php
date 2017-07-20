<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sos-knowledge-base
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-6" style="background-color: rgb(10, 43, 61); padding-top: 90px; padding-bottom: 90px;">
    
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/download-128x78.png"></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Address</strong><br>
1234 Street Name<br>
City, AA 99999</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Contacts</strong><br>
Email: support@mobirise.com<br>
Phone: +1 (0) 000 0000 001<br>
Fax: +1 (0) 000 0000 002</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Links</strong><br>
				<a class="text-primary" href="https://mobirise.com/">Website builder</a><br>
				<a class="text-primary" href="https://mobirise.com/mobirise-free-win.zip">Download for Windows</a><br>
				<a class="text-primary" href="https://mobirise.com/mobirise-free-mac.zip">Download for Mac</a></p>
            </div>

        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(6, 26, 37); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright <?php echo date('Y'); ?> – Students Offering Support – <a href="#" target="_blank">Terms of Service </a>– <a href="#" target="_blank">Privacy Policy</a></p>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

