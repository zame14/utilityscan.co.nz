<?php
vc_map( array(
    "name"                    => __( "Services" ),
    "base"                    => "us_services",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'us_services', 'services' );

function services() {
    $html = '
    <div class="row">';
    foreach(getServices() as $service) {
        $html .= '
        <div class="col-xs-12 col-sm-4 service-panel">
            <div class="image-wrapper">
                <img src="' . $service->getIcon() . '" alt="' . $service->getTitle() . '" />
            </div>
            <strong>' . $service->getTitle() .'</strong>
            <div class="snippet-wrapper">' . $service->getSnippet() . '</div>
            <a href="' . $service->link() . '" class="btn btn-default">More Info</a>
        </div>';
    }
    $html .= '
    </div>';

    return $html;
}