<?php
/**
 * Template Name: Aurum
 * 
 * @package axotan
 **/

// Do not allow directly accessing this file.
if (! defined('ABSPATH') ) {
    exit('Direct script access denied.');
}
?>
<?php get_header(); ?>
<section id="new-product">
    <?php while ( have_posts() ) : ?>
        <?php the_post(); 
        //vars
        $header_logo = get_field('header_logo');
        $size = 'stories-feed';
        ?>
    <header class="site-header new-product">
        <h1><?php the_title(); ?></h1>
        <?php if ($header_logo) : ?>
            <div class="header-logo"><?php echo wp_get_attachment_image($header_logo, $size); ?>
            </div>
        <?php endif; ?>
        <div class="header-button">
            <a href="<?php echo esc_url('https://www.axotan.se/kontaktformular-prover/'); ?>">
                <p>Request a <b>sample</b></p>
            </a>
        </div>
    </header>

    <div>
        <?php if (have_rows('hero_area')) :
            while (have_rows('hero_area')) : the_row();
                // vars
                $header = get_sub_field('header');
                $sub_header = get_sub_field('sub_header');
                $button_text = get_sub_field('button_text');
                $button_url = get_sub_field('button_url');
                $hero_image = get_sub_field('hero_image');
                $size = 'full';
                ?>
                <div class="page-header content-wrapper">
                    <div class="hero-text-area">
                        <?php if ($header) : ?><h2><?php echo esc_html($header); ?></h2><?php 
                        endif; ?>
                        <?php if ($sub_header) : ?><h3><?php echo esc_html($sub_header); ?></h3><?php 
                        endif; ?>
                        <?php if ($button_text) :  ?><span class="btn btn-bg-white"><a href="<?php echo esc_html($button_url); ?>"><?php echo $button_text; ?></a></span>
                        <?php endif; ?>
                    </div>
                    <div class="hero-image animated">
                        <?php if ($hero_image) : echo wp_get_attachment_image($hero_image, $size);
                        endif; ?>
                    </div>
                    <div class="hero-bg-image"></div>
                </div>      
            <?php endwhile;
        endif;
        ?>
        <!-- .page-header -->
        <?php
        $triple_column_header = get_field('triple_column_header');
        if (have_rows('single_column')) : ?>
        <div class="content-wrapper triple-column">
            <?php if ($triple_column_header) : ?><h2><?php echo esc_html($triple_column_header); ?></h2><?php 
            endif; ?>
            <?php while (have_rows('single_column')) : the_row();
                $header = get_sub_field('header');
                $text = get_sub_field('text');
                ?>
                <div class="one-third animated">
                    <h3><?php echo esc_html($header); ?></h3>
                    <p><?php echo esc_html($text); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <!-- .triple-column -->

        <div class="content-wrapper two-column product-choice">
            <?php
            $product_choice_header = get_field('product_choice_header');
            if ($product_choice_header) : ?><h2><?php echo esc_html($product_choice_header); ?></h2><?php 
            endif; ?>
            <?php if (have_rows('left_column_choice')) :
                while (have_rows('left_column_choice')) : the_row();
                    $header = get_sub_field('header');
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    $size = 'w300';
                    ?>
                    <div class="half-width bg-beige">
                        <?php if ($header) : ?><h4><?php echo esc_html($header); ?></h4><?php 
                        endif; ?>
                        <?php if ($text) : ?><p><?php echo esc_html($text); ?></p><?php 
                        endif; ?>
                        <?php if ($image) : echo wp_get_attachment_image($image, $size);
                        endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
            <?php if (have_rows('right_column_choice')) :
                while (have_rows('right_column_choice')) : the_row();
                    $header = get_sub_field('header');
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    $size = 'w300';
                    ?>
                    <div class="half-width bg-dark-grey">
                        <?php if ($header) : ?><h4><?php echo esc_html($header); ?></h4><?php 
                        endif; ?>
                        <?php if ($text) : ?><p><?php echo esc_html($text); ?></p><?php 
                        endif; ?>
                        <?php if ($image) : echo wp_get_attachment_image($image, $size);
                        endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
            <?php
            $product_close_up = get_field('product_close_up');
            $size = 'full';
            if ($product_close_up) : ?>
                <div class="product-choice-background"><?php echo wp_get_attachment_image($product_close_up, $size); ?></div>
            <?php endif; ?>
        </div>
        <!-- .product-choice -->

        <div class="content-wrapper blockquote-wrapper">
            <div class="flex-preload">
                <div class="flexslider blockquote-slider">
                    <ul class="slides">
                        <?php
                        if (have_rows('blockquote_slide')) :
                            while (have_rows('blockquote_slide')) : the_row();
                                //vars
                                $blockquote = get_sub_field('blockquote');
                                $author = get_sub_field('author');
                                $title = get_sub_field('title');
                                ?>
                                <li class="blockquote-slide">
                                    <?php if ($blockquote) : ?>
                                        <div class="quote-container">
                                            <figure>
                                                <blockquote><?php echo esc_html($blockquote); ?></blockquote>
                                                <hr />
                                                <?php if ($author) : ?>
                                                    <figcaption>
                                                        <?php echo esc_html($author); ?>
                                                        <?php if ($title) : ?><span class="job-title"><?php echo $title; ?></span><?php 
                                                        endif; ?>
                                                    </figcaption>
                                                <?php endif; ?>
                                            </figure>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Blockquote slider -->

        <?php
        $product_confidence_background = get_field('product_confidence_background');
        $size = 'full';
        ?>
        <div class="content-wrapper two-column animated product-choice product-confidence" style="background-image: url(<?php echo wp_get_attachment_image_url($product_confidence_background, $size); ?>)">
            <?php
            $product_confidence_header = get_field('product_confidence_header');
            if ($product_confidence_header) : ?><h2><?php echo esc_html($product_confidence_header); ?></h2><?php 
            endif; ?>
            <?php if (have_rows('left_column_confidence')) :
                while (have_rows('left_column_confidence')) : the_row();
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    $size = 'w250';
                    ?>
                    <div class="half-width">
                        <?php if ($image) : echo wp_get_attachment_image($image, $size);
                        endif; ?>
                        <?php if ($text) : ?><p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
            <?php if (have_rows('right_column_confidence')) :
                while (have_rows('right_column_confidence')) : the_row();
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    $size = 'w250';
                    ?>
                    <div class="half-width">
                        <?php if ($image) : echo wp_get_attachment_image($image, $size);
                        endif; ?>
                        <?php if ($text) : ?><p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
        <!-- .product-confidence -->

        <?php
        //vars
        $triple_column_header2 = get_field('triple_column_header2');
        $triple_column_image2 = get_field('triple_column_image2');

        if (have_rows('single_column_with_image')) : ?>
        <div class="content-wrapper triple-column animated triple-column-image slidedown">
            <?php if ($triple_column_image2) : echo wp_get_attachment_image($triple_column_image2, 'full');
            endif;
            if ($triple_column_header2) : echo '<h3>' . esc_html($triple_column_header2) . '</h3>';
            endif;
            while (have_rows('single_column_with_image')) : the_row();
                $header = get_sub_field('header');
                $text = get_sub_field('text');

                ?>
            <div class="one-third">
                <div class="graphic">+</div>
                <h3><?php if ($header) : echo esc_html($header);
               endif; ?></h3>
                <p><?php if ($text) : echo $text;
               endif; ?></p>
            </div>
            <?php endwhile; ?>
            <div class="button-container">
                <span class="btn bg-dark-grey"><a href="#new-prod-sample">Request a <strong>sample</a></strong></span>
            </div>
        </div>
        <?php endif; ?>
        <!-- New triple content section -->

        <div class="content-wrapper two-column video">
            <?php if (have_rows('left_column')) :
                while (have_rows('left_column')) : the_row();
                    $video_embed = get_sub_field('video_embed'); ?>
                    <div class="half-width video-embed">
                        <?php if ($video_embed) : echo $video_embed;
                        endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
            <?php if (have_rows('right_column')) :
                while (have_rows('right_column')) : the_row();
                    $header = get_sub_field('header');
                    $text = get_sub_field('text');
                    $button_text = get_sub_field('button_text');
                    $button_url = get_sub_field('button_url');
                    $image = get_sub_field('image');
                    $size = 'w300';
                    ?>
                    <div class="half-width bg-yellow">
                        <div class="text-container">
                            <?php if ($header) : ?><h4><?php echo esc_html($header); ?></h4><?php 
                            endif; ?>
                            <?php if ($text) : ?><p><?php echo esc_html($text); ?></p><?php 
                            endif; ?>
                            <?php if ($button_text) :  ?><span class="btn bg-dark-grey"><a href="<?php echo esc_html($button_url); ?>"><?php echo esc_html($button_text); ?></a></span><?php 
                            endif; ?>
                        </div>
                        <div class="image-container">
                            <?php if ($image) : echo wp_get_attachment_image($image, $size);
                            endif; ?>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
        <!-- .two-column -->


        <div id="new-prod-sample" class="content-wrapper bg-dark-grey sample-form">
            <h3>Interested in a sample of Aurum® Plus?</h3>
            <p>Complete the form and we’ll be in touch as soon as the product is available in your region.</p>
            <?php echo do_shortcode(
                '[geoip_detect2_show_if not_country="GB"]
                                        [gravityform id="10" title="false"]
                                        [/geoip_detect2_show_if]
                                        [geoip_detect2_show_if country="GB"]
                                        [gravityform id="11" title="false"]
                                        [/geoip_detect2_show_if]'
            ); ?>
            <p>By subscribing, you agree to receiving monthly news emails from Welland Medical. You can unsubscribe at any time by clicking the link in any of
                our emails, calling +44 (0) 1293 615455 or emailing info@wellandmedical.com, and you can view our full privacy policy here. </p>
        </div>
        <!-- .sample-form -->
        <div class="share-bar">
            <h5>Share with a friend</h5>
            <?php echo do_shortcode('[getsocial app="sharing_bar"]'); ?>
        </div>
        <!-- .share-bar -->
    <?php endwhile; ?>
    </div>
</section>
<?php do_action('avada_after_content'); ?>
<?php get_footer(); ?>
