<?php wp_head(); ?>

<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Experience</title>
</head>
<body>

    <section id="cntr-nav" class="series-col u-constraint--main">
        <div id="nav-head" class="series-col">
            <div id="nav-head-title" class="v-head">
                The Spectrum
            </div>
            <div id="nav-head-sub" class="v-head-sub">
                The Official media corps of the University of St. La Salle
            </div>
        </div>
        <div id="nav-div_cta" class="o-div_cta">
        
                <?php wp_nav_menu(
                    array(
                        'theme_location'    => 'primary',
                        'depth'             => 1,
                        'menu_id'           => 'nav-menu',
                        'menu_class'        => 'series-row u-center --equalize-margin'
                        )
                    ); 
                ?>

            <!-- </div> -->
            <div class="series-row u-center">
                <div class="c-div_cta-divider"></div>
                <div class="c-div_cta-cta">
                    <div class="c-div_cta-text">
                        Contact Us
                    </div>
                </div>
            </div>
        </div>
    </section>