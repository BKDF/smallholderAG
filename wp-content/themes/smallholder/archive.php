<?php get_header(); ?>

<section class="main">
	<div class="content content-post">
		<section>
<?php
	// Author profile
	$author = get_userdata(get_query_var("author"));
	if ($author != null) {
		get_template_part("includes/author-profile");
		author_profile($author);
	}

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
?>
			<article class="margin-bottom width-100">
				<hgroup>
					<h2 class="title-label">
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					</h2>
					<div class="date-box">
						<p class="author-name">
							<?php the_author(); ?>
						</p>
						<p>
							<?php the_time("F dS Y"); ?>
						</p>
					</div>
			<?php
				if ( has_post_thumbnail() ) {
			?>
					<div class="archive-thumbnail center-content">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="thumbnail">
					</div>
			<?php
				}
			?>
					<div>
						<?php
							$excerpt = string_limit_letters(wp_strip_all_tags(get_the_content()),550);
							echo $excerpt;
						?>
					</div>
					<div class="read-more margin-divider">
						<a href="<?php the_permalink(); ?>" class="bold">Continue Reading >></a>
					</div>
				</hgroup>
			</article>
<?php
		}
	}
?>
		</section>
<?php
		get_sidebar();
?>
	</div>
</section>

<?php get_footer(); ?>