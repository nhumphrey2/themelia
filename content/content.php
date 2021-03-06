<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

		<header class="entry-header">

			<div class="entry-byline small">
				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				<span class="post-by"><?php echo esc_html_x( 'by', 'post author', 'themelia' ) ?></span>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
				<?php themelia_comments_link(); ?>
				<?php themelia_edit_link(); ?>
			</div><!-- .entry-byline -->

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<?php themelia_post_thumbnail(); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer small">
			<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'sep' => '<span>,</span> ',  'text' => esc_html__( 'Posted in: %s', 'themelia' ) ) ); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'sep' => '<span>,</span> ', 'text' => esc_html__( 'Tagged: %s', 'themelia' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->

		<?php get_template_part( 'misc/author-box' ); ?>

	<?php else : // If not viewing a single post. ?>

		<header class="entry-header">

			<div class="entry-byline small">

				<?php
				if ( is_sticky() ) {
					echo '<div class="label label-large outline">' . esc_html_x( 'Featured Post', 'By Line', 'themelia' ) . '</div>';
				} else { ?>
					<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
                    <?php
				}
				?>
				<span class="post-by"><?php echo esc_html_x( 'by', 'post author', 'themelia' ) ?></span>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
				<?php themelia_comments_link(); ?>
				<?php themelia_edit_link(); ?>
			</div><!-- .entry-byline -->

			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

			<?php themelia_post_thumbnail(); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>

			<?php if ( 'full' == get_theme_mod( 'excerpt_or_content' ) ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->
