<?php get_header(); ?>

    <h1>This is the intro to the carbon theme</h1>
    <h2>We can include headers and footers and customize this base template</h2>

    <?php
        $post_data = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'assets'
        ));

        // echo '<pre>';
        // var_dump ($post_data);
        // echo '</pre>';

        
        echo get_the_ID();

        echo '<pre>';
        var_dump (get_fields());
        echo '</pre>';

        ?>
    

<?php get_footer(); ?>
