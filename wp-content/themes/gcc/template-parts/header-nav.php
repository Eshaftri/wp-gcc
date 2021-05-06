<?php
/**
 * Header Navigation template.
 *
 * @package GCC
 */
$menu_class = \GCC_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'gcc-header-menu' );
$header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<header class="bx--header gcc-header" role="banner" aria-label="IBM Platform Name" data-header>
  <a class="bx--header__name" href="<?php echo site_url() ?>">
    <span class="bx--header__name--prefix">
      IBM
      &nbsp;
    </span>
    Client Centers Resource Repository
  </a>
  <nav class="bx--header__nav" aria-label="Platform Name" data-header-nav>
  <?php
			if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
        ?>
         <ul class="bx--header__menu-bar" aria-label="Platform Name">
          <?php 
              foreach ( $header_menus as $menu_item ) {
                if ( ! $menu_item->menu_item_parent ) {
          ?>        
          <li>
            <a class="bx--header__menu-item" href="<?php echo esc_url( $menu_item->url ); ?>">
            <?php echo esc_html( $menu_item->title ); ?>
            </a>
          </li>
          <?php 
              }
            }
          ?>
        </ul>
  <?php
      }
	?>

  </nav>
</header>

