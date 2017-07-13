<?php
/**
 * Template Name: Home Page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package sos-knowledge-base
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-search">
	<div class="home-search row justify-content-sm-center">
		<div class="col-sm-7">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row site-main" id="main" role="main">

			<div class="col-md-8">
	
				<div class="row">
					<div class="col-sm-12">
						<h3>Help Topics</h3>
						<hr/>
						<br/>
					</div>
				</div>

				<div class="row">

					<div class="col-md-6">
						<?php 
						get_sidebar( 'home_left' );
						?>
					</div>

					<div class="col-md-6">
						<?php 
						get_sidebar( 'home_middle' );
						?>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<?php 
				get_sidebar( 'home_right' );
				?>
			</div>


		</div>

	</main><!-- #main -->

</div><!-- #primary -->


</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
