<?php

/**
 * Retrieve an array of values to be used in the header.
 *
 * site_name
 * site_tagline
 * page_title
 * post_title
 * section_title
 * subsection_title
 * posts_page_title
 * sup_header_default
 * sub_header_default
 * sup_header_alternate
 * sub_header_alternate
 */
$spine_main_header_values = spine_get_main_header();

if ( true === spine_get_option( 'main_header_show' ) ) :

?>
<div class="main-header">
  <div class="header-wrap"> <!-- This way we can keep a width on the items so that they may not exceed off the screen -->
    <header role="banner" data-section="<?php echo esc_attr( $spine_main_header_values['section_title'] ); ?>" data-pagetitle="<?php echo esc_attr( $spine_main_header_values['page_title'] ); ?>" data-posttitle="<?php echo esc_attr( $spine_main_header_values['post_title'] ); ?>" data-default="<?php echo esc_html( $spine_main_header_values['sup_header_default'] ); ?>" data-alternate="<?php echo esc_html( $spine_main_header_values['sup_header_alternate'] ); ?>">
      <a href="/">
<?php echo wp_kses_post( strip_tags( $spine_main_header_values['sup_header_default'] ) ); ?></a>
    </header>
    <nav class="utility">
	<?php
	$spine_site_args = array(
		'theme_location'  => 'site',
		'menu'            => 'utility',
		'container'       => false,
		'container_class' => false,
		'container_id'    => false,
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 2,
	);
	wp_nav_menu( $spine_site_args ); ?>
    </nav>
  </div>
</div>
<?php
endif;

if ( is_front_page() && ! is_home() && true === spine_get_option( 'front_page_title' ) ) :
?>
<section class="row single gutter pad-ends">
	<div class="column one">
		<h1><?php the_title(); ?></h1>
	</div>
</section>
<?php
endif;

if ( is_home() && ! is_front_page() && true === spine_get_option( 'page_for_posts_title' ) ) :
	$page_for_posts_id = get_option( 'page_for_posts' );
	if ( $page_for_posts_id ) {
		$page_for_posts_title = get_the_title( $page_for_posts_id );
	} else {
		$page_for_posts_title = '';
	}
	?>
<section class="row single gutter pad-ends">
	<div class="column one">
		<h1><?php echo esc_html( $page_for_posts_title ); ?></h1>
	</div>
</section>
<?php
endif;
