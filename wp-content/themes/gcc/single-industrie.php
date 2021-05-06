<?php

/**
 *
 * This template can be used to override the default template
 *
 * @package GCC
 */

// Exit if accessed directly;
defined('ABSPATH') || exit;


$industry_description = get_field('industry_description');
$industry_supporting_resources = get_field('supporting_resources');
$team_title = get_field('team_title');
$team_slack_channel = get_field('team_slack_channel');
$client_value_plays_link = get_field('client_value_plays_link');
$page_title = html_entity_decode(get_the_title());

$banner_array = [
    "Automotive, Aerospace & Defense" => ["auto", "#059f9c"],
    "Banking & Financial Markets" => ["banking-financial", "#24a148"],
    "Government & Education" => ["govt-ed", "#5593ff"],
    "Insurance" => ["insurance", "#a56eff"],
    "Consumer" => ["retail", "#f16da6"],
    "Telco, Media & Entertainment" => ["telco", "#23aaa7"]
];
get_header();
?>
<div class="industry-landing-page">

    <div class="industry-landing__header">

        <div>
            <nav class="bx--breadcrumb" aria-label="breadcrumb">
                <div class="bx--breadcrumb-item">
                    <a href="<?php echo get_post_type_archive_link('industrie'); ?>" class="bx--link">Industries</a>
                </div>
            </nav>

        </div>
        <div class="industry-page-title">
            <?php the_title(); ?>
        </div>
        <div id="site-header" class="industry-page-header-image">
            <img src="<?php echo get_template_directory_uri(); ?>/media/images/<?php echo $banner_array[$page_title][0] ?>.png" alt="<?php echo $banner_array[$page_title][0] ?>">
        </div>
    </div>
    <div class="industry-landing__content">
        <div class="bx--grid industry-landing--grid">
            <div class="bx--row">
                <div class="bx--col-lg-6 industry-landing-col">
                    <div class="industry-landing-col-left">
                        <div class="bx--row">
                            <div class="industry-landing-pr">
                                <?php echo htmlspecialchars_decode($industry_description) ?>
                            </div>
                        </div>
                        <div class="bx--row">
                            <div class="industry-left-link">
                                <?php
                                if (!empty($client_value_plays_link) && is_array($client_value_plays_link)) {
                                ?>
                                    <ul class="bx--header__menu-bar" aria-label="Platform Name">
                                        <a data-tile="clickable" class="bx--tile  btn-Launch industries-left-tile" tabindex="0" href="<?php echo esc_url($client_value_plays_link['url']); ?>" target="_blank">
                                            <div class="btn-Launch__wrap">
                                                <div class="btn-Launch__text-left"><?php echo esc_html($client_value_plays_link['title']); ?></div>
                                                <svg class="btn-Launch__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32">
                                                    <path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z" />
                                                    <polygon points="20 2 20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2" />

                                                </svg>

                                            </div>
                                        </a>
                                    </ul>
                                <?php

                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bx--col-lg-6 industry-landing-col">
                    <div class="bx--row">
                        <div class="industry-subtitle">
                            Client Centers industry advisers
                        </div>
                    </div>
                    <div class="bx--row">
                        <div class="industry-team__wrap">
                            <div class="industry-team__icon" style="background:<?php echo $banner_array[$page_title][1] ?>">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M31,30H29V27a3,3,0,0,0-3-3H22a3,3,0,0,0-3,3v3H17V27a5,5,0,0,1,5-5h4a5,5,0,0,1,5,5Z" transform="translate(0)" />
                                    <path d="M24,12a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,24,10Z" transform="translate(0)" />
                                    <path d="M15,22H13V19a3,3,0,0,0-3-3H6a3,3,0,0,0-3,3v3H1V19a5,5,0,0,1,5-5h4a5,5,0,0,1,5,5Z" transform="translate(0)" />
                                    <path d="M8,4A3,3,0,1,1,5,7,3,3,0,0,1,8,4M8,2a5,5,0,1,0,5,5A5,5,0,0,0,8,2Z" transform="translate(0)" />
                                </svg>
                            </div>
                            <div class="industry-team__title">
                                <p><?php echo $team_title ?></p>
                                <a href="<?php echo $team_slack_channel ?>" target="_blank">
                                    <svg id="icon" class="slake-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                }
                                            </style>
                                        </defs>
                                        <title>logo--slack</title>
                                        <path d="M9.0423,19.1661A2.5212,2.5212,0,1,1,6.5212,16.645H9.0423Z" />
                                        <path d="M10.3127,19.1661a2.5212,2.5212,0,0,1,5.0423,0v6.3127a2.5212,2.5212,0,1,1-5.0423,0Z" />
                                        <path d="M12.8339,9.0423A2.5212,2.5212,0,1,1,15.355,6.5212V9.0423Z" />
                                        <path d="M12.8339,10.3127a2.5212,2.5212,0,0,1,0,5.0423H6.5212a2.5212,2.5212,0,1,1,0-5.0423Z" />
                                        <path d="M22.9577,12.8339a2.5212,2.5212,0,1,1,2.5211,2.5211H22.9577Z" />
                                        <path d="M21.6873,12.8339a2.5212,2.5212,0,0,1-5.0423,0V6.5212a2.5212,2.5212,0,1,1,5.0423,0Z" />
                                        <path d="M19.1661,22.9577a2.5212,2.5212,0,1,1-2.5211,2.5211V22.9577Z" />
                                        <path d="M19.1661,21.6873a2.5212,2.5212,0,0,1,0-5.0423h6.3127a2.5212,2.5212,0,1,1,0,5.0423Z" />
                                        <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bx--row">
                        <div class="industry-link">
                            <?php if (isset($industry_supporting_resources)) {
                                foreach ($industry_supporting_resources as $asr) {
                                    if (!isset($asr))
                                        continue;
                            ?>
                                    <!-- <div class="bx--row"> -->
                                    <ul class="bx--header__menu-bar" aria-label="Platform Name">
                                        <a data-tile="clickable" class="bx--tile  btn-Launch" tabindex="0" href="<?php echo esc_url($asr['url']); ?>" target="_blank">
                                            <div class="btn-Launch__wrap">
                                                <div class="btn-Launch__text"><?php echo esc_html($asr['title']); ?></div>
                                                <svg class="btn-Launch__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32">
                                                    <defs>
                                                        <style>
                                                            .cls-1 {
                                                                fill: none;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z" />
                                                    <polygon points="20 2 20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2" />
                                                    <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="16" height="16" />
                                                </svg>
                                            </div>
                                        </a>
                                    </ul>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="industry-landing__post">
        <div class="featured-content__title">Featured content
        </div>
        <div class="bx--grid asset-card--grid">
            <div class="bx--row">
                <?php
                $args = array(
                    'post_type' => 'assets',
                    'posts_per_page' => 4,
                    'meta_query'    => array(
                        'relation'        => 'AND',
                        array(
                            'key'        => 'asset_industry',
                            'value'        => get_page_by_title($page_title, '', 'industrie')->ID,
                            'compare'    => 'LIKE'
                        )
                    )
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) {
                    $loop->the_post();
                ?>
                    <div class="bx--col-lg-3 asset-card">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        <div class="asset-card__contant">
                            <div class="asset-card__title"><?php the_title() ?></div>
                            <p class="asset-card__description"><?php echo get_field('asset_description') ?></p>
                            <div class="asset-card__read-more">
                                <a href="<?php echo get_permalink(); ?>" target="_blank">Read more</a>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
            <div class="bx--row">
                <a class="btn--view-all" href="<?php echo get_permalink(url_to_postid('search')) . "?" . urlencode("asset_industry[]") . "=" . get_page_by_title($page_title, '', 'industrie')->ID; ?>">
                    <button class="bx--btn bx--btn--tertiary bx--btn--field" type="button" onclick="">
                        View all
                        <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" class="bx--btn__icon" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>