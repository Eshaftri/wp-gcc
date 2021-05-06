<?php
/* Template Name: View All Assets */

get_header(); ?>

<h1>View all Assets Page</h1>


<pre>
<?php



function BuildPostTypeFilters($post_type)
{
    // Grab the groups based on post type
    $groups = acf_get_field_groups(array('post_type' => $post_type));

    // Now grab the fields for that group
    $fields = acf_get_fields($groups[0]['key']);

    // Debug and print fields
    // echo "Post type: $post_type <BR>";
    // print_r($fields);

    // Now get all fields with selectable values (which should be queryable)
    // For each, we need to store the label and the key
    $items = array();
    foreach ($fields as $field) {
        if ($field['type'] == 'select')
            array_push($items, (object) [
                "label" => $field['label'],
                "name" => $field['name'],
                "choices" => $field['choices']
            ]);
    }

    // Debug results
    print_r($items);

    return $items;
}






BuildPostTypeFilters('assets');

// BuildPostTypeFilters('industries');




$args = array(
    'numberposts'    => -1,
    'post_type' => 'assets',
    'meta_query' => array(
        array(
            'key' => 'asset_technologies',
            'value' => 'Automation',
            'compare'    => 'LIKE'
        )
    ),
);

echo "<br>";
echo "<br>";
echo "Custom query<br>";
$my_posts = new WP_Query($args);

if ($my_posts->have_posts()) {

    while ($my_posts->have_posts()) : $my_posts->the_post();

        echo "Title - " . get_the_title() . "</br>";
    // echo "Price - " . get_field("price", get_the_ID()) . "</br>";
    // echo "Length - " . get_field("length", get_the_ID()) . "</br>";
    // echo "Year built - " . get_field("year_built", get_the_ID()) . "</br>";
    // echo "Capacity - " . get_field("capacity", get_the_ID()) . "</br>";

    endwhile;
}



?>
</pre>


<?php

$posts = get_posts(array(
    'posts_per_page'    => -1,
    'post_type'            => 'assets'
));

if ($posts) : ?>

    <ul>

        <?php foreach ($posts as $post) :

            setup_postdata($post);

        ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>

        <?php endforeach; ?>

    </ul>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>


<?php get_footer(); ?>