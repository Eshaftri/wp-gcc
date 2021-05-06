/* Template Name: Search Page */

<?php get_header(); ?>

<pre>
<?php


/* This function helps us gather the post type filters */
function BuildPostTypeFilters($post_type)
{
    // Grab the groups based on post type
    $groups = acf_get_field_groups(array('post_type' => $post_type));

    // Now grab the fields for that group
    $fields = acf_get_fields($groups[0]['key']);

    // Debug and print fields
    // echo "Post type: $post_type <BR>";
    // print_r($fields);

    // echo "<br>";

    // Now get all fields with selectable values (which should be queryable)
    // For each, we need to store the label and the key
    $items = array();
    foreach ($fields as $field) {
        if (in_array($field['type'], ['checkbox', 'select']))
            array_push($items, (object) [
                "label" => $field['label'],
                "name" => $field['name'],
                "choices" => $field['choices']
            ]);
        else if (in_array($field['type'], ['true_false'])) {
            array_push($items, (object) [
                "label" => $field['label'],
                "name" => $field['name'],
                "choices" => ['']
            ]);
        } else if (in_array($field['type'], ['post_object'])) {
            // basically see what the post type is if there is one
            // get a list of all the possible titles
            $all_posts = get_pages(array('post_type' => $field['post_type'][0]));
            $choice_list = array();
            foreach ($all_posts as $cp) {
                $choice_list[$cp->post_title . ''] = $cp->ID;
            }

            array_push($items, (object) [
                "label" => $field['label'],
                "name" => $field['name'],
                "choices" => $choice_list
            ]);
        }
    }

    // Debug results
    // print_r($items);

    return $items;
}

/* this function is used to see what filters we already have checked */
function IsValueChecked($section, $val)
{
    if (!array_key_exists($section, $_GET))
        return false;
    $current = $_GET[$section];

    return in_array($val, $current);
    // return false;
}




BuildPostTypeFilters('assets');


$my_posts = BuildSearchQueryFromPost('assets');

// print_r($my_posts);

// if (get_fields($my_posts->posts[0]->ID)['asset_industry'][0]->ID == 47) {
//     print_r(get_fields($my_posts->posts[0]->ID)['asset_industry']);
//     echo "<br><br>Found #47!<br>";
// }

// print_r(get_fields($my_posts->posts[0]));


?>
</pre>

<div class="bx--grid front-page">
    <div class="bx--tile-container" style="width: 100%">
        <div class="bx--row">
            <div class="bx--col-lg-4 sp__header">Search</div>
            <div class="bx--col-lg-12"></div>
        </div>
        <div class="bx--row">
            <div class="bx--col-lg-4">
                <div class="bx--tabs">
                    <div class="bx--tabs-trigger" tabindex="0">
                        <a href="javascript:void(0)" class="bx--tabs-trigger-text" tabindex="-1"></a>
                        <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M8 11L3 6 3.7 5.3 8 9.6 12.3 5.3 13 6z"></path>
                        </svg>
                    </div>
                    <ul class="bx--tabs__nav bx--tabs__nav--hidden sp__header_tabs" role="tablist">
                        <li class="bx--tabs__nav-item bx--tabs__nav-item--selected " data-target=".tab-1-default" role="tab" aria-selected="true">
                            <a tabindex="0" id="tab-link-1-default" class="bx--tabs__nav-link" href="<?php echo esc_url(home_url('/search/')); ?>" role="tab" aria-controls="tab-panel-1-default">Content</a>
                        </li>
                        <li class="bx--tabs__nav-item " data-target=".tab-2-default" role="tab">
                            <a tabindex="0" id="tab-link-2-default" class="bx--tabs__nav-link" href="<?php echo esc_url(home_url('/search-sme/')); ?>" role="tab" aria-controls="tab-panel-2-default">Experts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bx--row">
            <div class="bx--col-lg-3 sp__filter-column">
                <form id="filterform" method="GET" action="<?php echo esc_url(home_url('/search/')); ?>">

                    <div class="sp__search_bar">
                        <div class="bx--form-item">
                            <input type="text" class="bx--text-input" placeholder="Search Content" name="__text_search" value="<?php echo $_GET['__text_search']; ?>">
                        </div>
                        <button class="bx--btn bx--btn--primary bx--btn--icon-only bx--tooltip__trigger bx--tooltip--a11y bx--tooltip--bottom bx--tooltip--align-center  bx--btn--field sp__search_arrow">
                            <span class="bx--assistive-text">Search</span>
                            <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" class="bx--btn__icon" width="16" height="16" viewBox="0 0 32 32" aria-hidden="true">
                                <polygon points="18 6 16.57 7.393 24.15 15 4 15 4 17 24.15 17 16.57 24.573 18 26 28 16 18 6" />
                            </svg>
                        </button>
                    </div>

                    <br>
                    <br>
                    <div class="sp__filter_header">Filters</div>
                    <div class="sp__filter_criteria">Select filter criteria from the list,
                        then click <span class="sp__filter_criteria_bold">Apply filters</span>
                    </div>
                    <br>
                    <?php
                    $assetItems = BuildPostTypeFilters('assets');
                    foreach ($assetItems as $item) {
                        // Create the header of the section
                    ?>
                        <div class="sp__filter_section_header">
                            <div class="sp__fsh_item"><?php echo $item->label ?></div>
                            <div class="sp__fsh_icon"><img src="<?php echo get_template_directory_uri() . '/media/icons/chevron--down.svg' ?>" /></div>
                        </div>
                        <div class="sp__filter_section_panel">
                            <?php

                            // Now we need to print out all of the check box items
                            foreach ($item->choices as $pk => $pv) {
                            ?>
                                <div class="sp__filter_item">
                                    <input type="checkbox" name="<?php echo $item->name ?>[]" value="<?php echo $pv ?>" <?php if (IsValueChecked($item->name, $pv)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                    <label class="sp__filter_box_label"><?php echo $pk ?></label><br>
                                </div>
                            <?php
                            }
                            ?>
                        </div><br><?php
                                }

                                    ?>
                    <br>
                    <button class="bx--btn bx--btn--tertiary bx--btn--field" type="submit">
                        Apply Filters
                    </button>
                    <button class="bx--btn bx--btn--ghost bx--btn--field" onclick="location.href='<?php echo get_permalink(); ?>'" type="reset">
                        Reset
                        <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" class="bx--btn__icon" width="16" height="16" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M22.5,9A7.4522,7.4522,0,0,0,16,12.792V8H14v8h8V14H17.6167A5.4941,5.4941,0,1,1,22.5,22H22v2h.5a7.5,7.5,0,0,0,0-15Z" />
                            <path d="M26,6H4V9.171l7.4142,7.4143L12,17.171V26h4V24h2v2a2,2,0,0,1-2,2H12a2,2,0,0,1-2-2V18L2.5858,10.5853A2,2,0,0,1,2,9.171V6A2,2,0,0,1,4,4H26Z" />
                        </svg>
                    </button>

                </form>
            </div>
            <div class="bx--col-lg-9 sp__results-column">
                <div class="sp__results_listing">
                    <?php
                    if ($my_posts->have_posts()) {
                        echo "Showing 1-" . $my_posts->post_count . " of " . $my_posts->post_count . " results";
                    }
                    ?>
                </div>
                <?php
                if ($my_posts->have_posts()) {
                    while ($my_posts->have_posts()) {
                        $my_posts->the_post();
                ?>
                        <div class="bx--tile--clickable sp__asset_tile" onclick="location.href='<?php echo get_permalink(); ?>'">
                            <div class="sp__asset_thumbnail">
                                <?php if (has_post_thumbnail()) {
                                ?>
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                <?php
                                } else { ?>
                                    <img src="<?php echo get_template_directory_uri() . '/media/icons/document.svg' ?>" alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </div>
                            <div class="sp__tile_body">
                                <div class="sp__tile_header">
                                    <?php
                                    echo the_title();
                                    ?>
                                </div>
                                <div class="sp__tile_description">
                                    <!-- <?php echo wp_trim_words(get_field('asset_description', get_the_ID()), 20); ?> -->
                                    <?php echo get_field('asset_description', get_the_ID()); ?>
                                </div>
                                <p class="sp__asset_fake_link">Read more</p>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="sp__filter_header">There were no items found matching your search query.</div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    var i;

    // Run on page load
    var acc = document.getElementsByClassName("sp__filter_section_header");
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
            for (var j = 0; j < this.children.length; j++) {
                this.children[j].classList.toggle("active");
            }
        }
    }

    // Now, we need to see if any children for each accordion is checked. If it is, expand it.
    for (i = 0; i < acc.length; i++) {
        var checkboxes = acc[i].nextElementSibling.getElementsByTagName('input');
        var found = false;
        for (box of checkboxes) {

            if (box.hasAttribute('checked')) {
                found = true;
                break;
            }
        }
        if (found) {
            acc[i].classList.toggle("active");
            acc[i].nextElementSibling.classList.toggle("show");
        }
    }
</script>

<?php get_footer(); ?>