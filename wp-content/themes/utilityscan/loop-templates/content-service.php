<?php
$service = new Service($post);
$imageid = getImageID($service->getBanner());
$img = wp_get_attachment_image_src($imageid, 'inside-banner');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inside-banner-wrapper">
        <img src="<?=$img[0]?>" alt="<?=$service->getTitle()?>" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 page-title">
                <h1><?=$service->getTitle()?></h1>
            </div>
        </div>
        <div class="row service-wrapper">
            <div class="col-xs-12 col-sm-3">
                <div class="image-wrapper">
                    <img src="<?=$service->getIcon()?>" alt="<?=$service->getTitle()?>" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 service-content">
                <?=$service->getContent()?>
                <div class="other-services-wrapper">
                    <h3>Other services:</h3>
                    <ul>
                        <?php
                        foreach (getServices() as $otherservice) {
                            if($otherservice->id() <> $post->ID) {
                                echo '<li><a href="' . $otherservice->link() . '"><img src="' . $otherservice->getIcon() . '" alt="" /><span>' . $otherservice->getTitle() . '</span></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-50"></div>
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article>
