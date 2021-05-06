<?php
/* Template Name: Asset Page */

gt_set_post_view();

// Define variables that should be used
$asset_industry = get_field('asset_industry');
$asset_type = get_field('asset_type');
$asset_media = get_field('asset_infographics');
$asset_description = get_field('asset_description');
$asset_advisory = get_field('additonal_comments');
$asset_topic = get_field('topic');
$asset_languages = get_field('languages');
$asset_recommended_use = get_field('recommended_use');
$asset_products_and_solutions = get_field('products_&_solutions');
$asset_approved_for = get_field('approved_for');
$asset_availability = get_field('availability');
$asset_target_buyer = get_field('target_buyer');
$asset_sales_play = get_field('sales_play');
$asset_supporting_resources = get_field('supporting_resources');
$asset_download = get_field('download');
$asset_maintained_by = get_field('maintained_by');

get_header();




// // Define the order of items we want to appear on the page
// // Really, just use this to define the right column
// // so we can loop through it
// $items_on_page = [
//     ['title' => 'Industry', 'value' => get_field('asset_industry')],
//     ['title' => 'Topic', 'value' => get_field('topic')],
//     ['title' => 'Products & Solutions', 'value' => get_field('products_&_solutions')],
//     ['title' => 'Business value/benefits', 'value' => get_field('business_valuebenefits')],
//     ['title' => 'Recommended use', 'value' => get_field('recommended_use')],
//     ['title' => 'Language(s)', 'value' => get_field('languages')],
//     ['title' => 'Availability', 'value' => get_field('availability')],
//     ['title' => 'Target buyer', 'value' => get_field('target_buyer')],
//     ['title' => 'Sales play', 'value' => get_field('sales_play')],
//     ['title' => 'Approved for', 'value' => get_field('approved_for')]
// ];

function get_icon_for_page($url, $text)
{
    if (strpos($url, 'git') !== false || strpos($text, 'git') !== false) {
        return get_template_directory_uri() . '/media/icons/code.svg';
    } else if (strpos($text, 'video') !== false) {
        return get_template_directory_uri() . '/media/icons/video.svg';
    } else {
        return get_template_directory_uri() . '/media/icons/document.svg';
    }
}

function get_url_for_sales_play($play)
{
    $links = [
        'Deliver enhanced front-end digitalization' => 'https://ibm.seismic.com/Link/Content/DC8UF_5Eo0sUaYTFOrnOAo7g',
        'Increase multi organizational process efficiency' => 'https://ibm.seismic.com/Link/Content/DCzrwrcn3KtkGFa1O9VpuICw',
        'Transform business processes with intelligent workflows' => 'https://ibm.seismic.com/Link/Content/DCuUlqyM6LPU2lu-5NY4VMIg',
        'Accelerate growth and efficiency by harnessing the power of big data and analytics at scale' => 'https://ibm.seismic.com/Link/Content/DCNoHc2aKTekuXu6blaIItlQ',
        'Turbo charge innovation by modernizing the application estate' => 'https://ibm.seismic.com/Link/Content/DCndagBmZ6fE-agPRnv1_Ynw',
        'Increase development velocity' => 'https://ibm.seismic.com/Link/Content/DCJwp-_HBc0kKIJOvqHpaJ2Q',
        'Secure the enterprise' => 'https://ibm.seismic.com/Link/Content/DCKp7NT4fBNEypRQ_54-WlhA',
        'Drive enhanced IT/AI Ops productivity' => 'https://ibm.seismic.com/Link/Content/DChjTg9ztSYUa_YIamEklPNg',
        'Manage seamlessly across multiple infrastructure environments' => 'https://ibm.seismic.com/Link/Content/DCMsTAzd2cvU6new1UBtnMDw',
        'Establish a resident, modern, infrastructure' => 'https://ibm.seismic.com/Link/Content/DCSkqfS4URokG2K3gWpW4FOg'
    ];

    return $links[$play];
}

function url_sales_play_not_available($plays)
{
    return in_array('N/A', $plays);
}

function get_page_maintained_by($maintained_by)
{
    if (empty($maintained_by['user_firstname']) || empty($maintained_by['user_lastname'])) {
        return "Administrator";
    }
    return $maintained_by['user_firstname'] . " " . $maintained_by['user_lastname'];
}

function get_page_maintained_by_letters($maintained_by)
{
    if (empty($maintained_by['user_firstname']) || empty($maintained_by['user_lastname'])) {
        return "AD";
    }
    return substr($maintained_by['user_firstname'], 0, 1) . substr($maintained_by['user_lastname'], 0, 1);
}




?>
<pre>

<?php

// print_r(get_fields());
// print_r($asset_sales_play);


// Some miscellaneous functions to help us format the data better
if (isset($asset_supporting_resources)) {

    // loop through and make sure at least one resource is set
    // this is obnoxious by default ACF returns an array of empty items, but here we go
    $isFound = false;
    foreach ($asset_supporting_resources as $k => $v) {
        if (!empty($v)) {
            $isFound = true;
            break;
        }
    }
    if (!$isFound)
        $asset_supporting_resources = NULL;
}

// Asset industry's are stored by post ID
// So we need to look up the post ID to get the proper title

// This first function is just a hack to get a bunch of them to display properly.
if (!is_array($asset_industry)) {
    $asset_industry = [$asset_industry];
}
if (isset($asset_industry)) {
    $my_list = array();
    foreach ($asset_industry as $industry) {
        array_push($my_list, get_post($industry)->post_title);
    }
    $asset_industry = $my_list;
}


// print_r($asset_industry);

// Reassign asset_industry so we can use the links appropriately
// $asset_industry = ["title" => $asset_industry[0]->post_title, "url" => get_permalink($asset_industry[0])];

?>
</pre>


<div class="bx--grid asset-page">
    <div class="bx--row">
        <div class="bx--col-md-4">
            <nav class="bx--breadcrumb" aria-label="breadcrumb">
                <div class="bx--breadcrumb-item">
                    <a href="<?php echo get_post_type_archive_link('industrie'); ?>" class="bx--link">Industries</a>
                </div>
                <!-- <div class="bx--breadcrumb-item">
                    <a href="<?php echo esc_url($asset_industry['url']) ?>" class="bx--link"><?php echo esc_html($asset_industry['title']) ?></a>
                </div> -->
            </nav>
            <div class="asset-page__title">
                <?php the_title(); ?>
            </div>
        </div>
    </div>
    <div class="bx--row">
        <div class="bx--col-md-4">
            <div class="ap__header-buttons">
                <div class="ap__asset-type-buttons">
                    <?php
                    foreach (get_field('asset_type') as $type) {
                    ?>
                        <button class="bx--tag bx--tag--blue sp__sme_tag">
                            <span class="bx--tag__label"><?php echo $type ?></span>
                        </button>
                    <?php
                    }
                    ?>
                </div>
                <div class="ap__asset-format-buttons">
                    <?php
                    foreach (get_field('format') as $format) {
                    ?>
                        <button class="bx--tag bx--tag--gray sp__sme_tag">
                            <span class="bx--tag__label"><?php echo $format ?></span>
                        </button>
                    <?php
                    }
                    ?>
                    <?php
                    if (get_field('contains_code') != 0) { ?>
                        <button class="bx--tag bx--tag--gray sp__sme_tag">
                            <span class="bx--tag__label">Contains code</span>
                        </button>
                    <?php
                    }
                    ?>
                    <?php
                    if (get_field('created_by_client_center') != 0) { ?>
                        <button class="bx--tag bx--tag--gray sp__sme_tag">
                            <span class="bx--tag__label">Created by Client Centers</span>
                        </button>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="bx--row">
        <div class="bx--col-lg-6 bx--col-md-8">
            <div class="asset-page__media">
                <!-- <img src="<?php echo esc_url($asset_media['url']) ?>" alt="<?php echo $asset_media['alt']; ?>" /> -->
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="asset-page__caption">
                <?php echo get_the_post_thumbnail_caption(); ?>
            </div>
            <div class="asset-page__description">
                <div class="asset-page__section-header">Description</div>
                <div class="asset-page__description"><?php echo htmlspecialchars_decode($asset_description) ?></div>
            </div>
            <div class="asset-page__stats">
                <div class="bx--row">
                    <div class="bx--col-sm-1">
                        <div class="asset-page__stats-big"><?= gt_get_post_view(); ?></div>
                        <div class="asset-page__stats-small">views</div>
                    </div>
                    <div class="bx--col-sm-1">
                        <div class="asset-page__stats-big">0</div>
                        <div class="asset-page__stats-small">downloads</div>
                    </div>
                </div>
            </div>
            <div class="asset-page__collection-btns">
                <a class="bx--btn bx--btn--tertiary bx--btn--field" href="<?php echo $asset_download['url'] ?>" download>
                    Download
                    <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" class="bx--btn__icon" width="16" height="16" viewBox="0 0 32 32" aria-hidden="true">
                        <path d="M26,24v4H6V24H4v4H4a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2h0V24Z" />
                        <polygon points="26 14 24.59 12.59 17 20.17 17 2 15 2 15 20.17 7.41 12.59 6 14 16 24 26 14" />
                    </svg>
                </a>
            </div>
            <?php
            if (!empty($asset_advisory)) { ?>
                <div class="asset-page__advisory"><?php echo $asset_advisory ?></div>
            <?php } ?>
            <br><br><br><br><br><br><br>
        </div>
        <div class="bx--col-lg-6 bx--col-md-8">
            <div class="asset-page__section-header">
                Details
            </div>
            <div class="asset-page__maintained-by">
                <span class="logo"><?php echo get_page_maintained_by_letters($asset_maintained_by) ?>
                </span>
                <span class="details">
                    <div class="who">Maintained by <?php echo get_page_maintained_by($asset_maintained_by) ?></div>
                    <div class="what"><?php printf(__('Added on %s', 'textdomain'), get_the_date(('jS M Y'))); ?> • Last modified on <?php printf(__('%s', 'textdomain'), get_the_modified_date('jS M Y')); ?> </div>
                </span>
            </div>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">
                    <?php if (count($asset_industry) < 2) {
                        echo "Industry";
                    } else {
                        echo "Industries";
                    } ?></div>
                <div class="asset-page__subsection-values">
                    <?php echo implode(', ', $asset_industry); ?>
                </div>
            </div>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">Topic</div>
                <div class="asset-page__subsection-values"><?php echo implode(', ', $asset_topic); ?></div>
            </div>
            <?php if (!empty($asset_products_and_solutions)) { ?>
                <div class="asset-page__subsection">
                    <div class="asset-page__subsection-header">Products & solutions</div>
                    <div class="asset-page__subsection-values"><?php echo $asset_products_and_solutions ?></div>
                </div>
            <?php } ?>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">Recommended use</div>
                <div class="asset-page__subsection-values"><?php echo $asset_recommended_use; ?></div>
            </div>
            <div class="asset-page__2-col">
                <div class="asset-page__subsection">
                    <div class="asset-page__subsection-header">Language(s)</div>
                    <div class="asset-page__subsection-values"><?php echo implode(', ', $asset_languages); ?></div>
                </div>
                <div class="asset-page__subsection">
                    <div class="asset-page__subsection-header">Availability</div>
                    <div class="asset-page__subsection-values"><?php echo implode(', ', $asset_availability); ?></div>
                </div>
            </div>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">Target buyer</div>
                <div class="asset-page__subsection-values"><?php echo implode(', ', $asset_target_buyer); ?></div>
            </div>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">IBM sales play</div>
                <div class="asset-page__subsection-values">
                    <?php
                    if (url_sales_play_not_available($asset_sales_play)) {
                        echo "N/A";
                    } else {
                    ?>
                        <ul class="asset-page__2-col-list">
                            <?php
                            foreach ($asset_sales_play as $play) {
                            ?>
                                <li><a href="<?php echo get_url_for_sales_play($play) ?>" class="bx--link"><?php echo $play ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="asset-page__subsection">
                <div class="asset-page__subsection-header">Approved for</div>
                <div class="asset-page__subsection-values"><?php echo implode(', ', $asset_approved_for); ?></div>
            </div>
            <!-- <div class="asset-page__section-header">
                Used in
            </div> -->
            <br>
            <br>
            <br>
            <br>
            <?php
            if (isset($asset_supporting_resources)) {
            ?>
                <div class="asset-page__section-header">
                    Supporting Resources
                </div>
                <div class="ap__sr-tile-wrap">
                    <?php
                    foreach ($asset_supporting_resources as $asr) {
                        if (empty($asr))
                            continue;
                    ?>
                        <div class="bx--tile bx--tile--clickable ap__sr_tile" tabindex="0" onclick="window.open('<?php echo $asr['url'] ?>', '_blank');">
                            <div class="ap__sr-icon">
                                <img src="<?php echo get_icon_for_page($asr['url'], $asr['title']); ?>" />
                            </div>
                            <?php echo $asr['title'] ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- <div class="bx--row asset-page__ratings">
        <div class="bx--col-md-4">
            <div class="asset-page__section-header">Ratings</div>
        </div>
        <div class="bx--col-md-4">
            <div class="asset-page__section-header">Top Comments</div>
        </div>
    </div> -->
</div>


<!-- <?php

        echo get_the_ID();

        echo '<pre>';
        var_dump(get_fields());
        echo '</pre>';

        ?> -->


<?php get_footer(); ?>