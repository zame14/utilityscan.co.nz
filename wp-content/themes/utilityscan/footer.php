<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
$setting = new Setting(15);
if(!hideCTA()) { ?>
    <section id="footer-cta">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <strong>How much are our services?</strong>
                    <p>Fill out our contact form and we can provide a quote before we get started on the job.</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 btn-wrapper">
                    <a href="<?=$setting->getQuoteLink()?>" class="btn btn-primary">Get a quote</a>
                </div>
            </div>
            <div class="spacer-20"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <strong>Got a project?</strong>
                    <p>Book online for any of our services. Create an account to keep track of what jobs you have booked.</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 btn-wrapper">
                    <a href="<?=$setting->getBookingLink()?>" class="btn btn-primary">Book now</a>
                </div>
            </div>
            <span class="bg-triangle"></span>
        </div>
    </section>
<?php
}
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <?=footerMenu()?>
                <a href="<?=get_home_url()?>" class="footer-logo"><img src="<?=get_stylesheet_directory_uri()?>/images/logo-large.png" alt="Utility Scan Taranaki" /></a>
            </div>
        </div>
    </div>
</footer>
<section id="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                Copyright Utility Scan <?=date('Y')?>. <?=$setting->getAddress()?> <span>Website by <a href="https://www.designgarage.co.nz/" target="_blank">Design Garage</a></span>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>