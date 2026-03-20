<?php
/**
 * Block template for HUB Icon Full Width.
 *
 * @package hub-sipco2026
 */

defined( 'ABSPATH' ) || exit;

$background = get_field( 'background' );
$bg         = ! empty( $background ) && 'Yes' === $background[0] ? 'has-lightest-gold-background-color py-5' : '';

// Get Gutenberg classes.
$classes = isset( $block['className'] ) ? $block['className'] : '';
if ( empty( $classes ) ) {
	$classes = '';
}

$presentation = get_field( 'presentation' );
if ( 'Logo' === $presentation ) {
	$col_one   = 'col-md-3';
	$col_two   = 'col-md-9';
	$img_class = 'full-width__logo';
	$alignment = 'align-items-start';
	$padding   = '';
} else {
	$col_one = 'col-md-1';
	$col_two = 'col-md-11';
	$img_class = 'full-width__icon my-auto';
	$alignment = 'align-items-center';
	$padding   = 'ps-4';
}

?>
<section class="full-width <?= esc_attr( $classes ); ?>">
    <div class="container <?= esc_attr( $bg ); ?>">
		<div data-aos="fade-up" class="<?= esc_attr( $padding ); ?>">
			<div class="row <?= esc_attr( $alignment ); ?>">
				<div class="<?= esc_attr( $col_one ); ?> mb-4 mb-md-0 ps-0 text-center">
					<?php
					if ( get_field( 'icon' ) ) {
						echo wp_get_attachment_image(
							get_field( 'icon' ) ?? '',
							'full',
							false,
							array(
								'class' => esc_attr( $img_class ),
								'alt'   => esc_attr( get_field( 'title' ) . ' Icon' ),
							)
						);
					}
					?>
				</div>
				<div class="<?= esc_attr( $col_two ); ?> <?= ! get_field( 'title' ) ? 'no-title' : ''; ?>">
					<?php
					if ( get_field( 'title' ) ) {
						?>
					<h2 class="has-h-3-font-size mb-4 mb-md-0"><?= esc_html( get_field( 'title' ) ); ?></h2>
						<?php
					}
					?>
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
			</div>
		</div>	
    </div>
</section>