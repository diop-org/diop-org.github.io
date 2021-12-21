<?php get_header(); ?>
<?php
	if(isset($_GET['orderby'])) $orderby = $_GET['orderby'];
	if(isset($_GET['order'])) $order = $_GET['order'];
	if(!isset($orderby)) {
		$orderby = 'date';
	}
	if(!isset($order)) {
		$order = 'ASC';
	}
	switch($order) {
		case 'ASC':
			$flip = 'DESC';
			break;
		case 'DESC':
			$flip = 'ASC';
			break;
		default:
			$flip = 'ASC';
			break;
	}
	
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$args = array(
		'post_type'=>'project',
		'portfolio' => $term->slug,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => '-1'
	);
	
	$mantle = $term->description;
	if(empty($mantle)) {
		$mantle = get_option('sc_uni_mantle');
	}
?>
	<section>
		<div id="mantle-wrap">
			<div class="clear"></div>
			<div id="mantle" class="row">
				<p><?php echo $mantle; ?></p>
			</div>
		</div>
	</section>
	<section>
		<div class="content-wrap">
			<div class="clear"></div>
			<div id="content" class="row">
				<div class="column grid_12">
					<?php $work = new WP_Query($args); ?>
					<?php if ( $work->have_posts() ) : ?>
					<section>
						<div class="projects">
							<div class="right header-right sort">
								<?php if($work->post_count > 1): ?>
								Sort projects by:
								<?php if($orderby == 'date'): ?>
								<a href="?portfolio=<?php echo $term->slug; ?>&orderby=date&order=<?php echo $flip; ?>">Date</a> |
								<a href="?portfolio=<?php echo $term->slug; ?>&?orderby=title&order=ASC">Name</a>
								<?php elseif($orderby == 'title'): ?>
								<a href="?portfolio=<?php echo $term->slug; ?>&?orderby=date&order=DESC">Date</a> |
								<a href="?portfolio=<?php echo $term->slug; ?>&?orderby=title&order=<?php echo $flip; ?>">Name</a>
								<?php else: ?>
								<a href="?portfolio=<?php echo $term->slug; ?>&?orderby=date&order=DESC">Date</a> |
								<a href="?portfolio=<?php echo $term->slug; ?>&?orderby=title&order=ASC">Name</a>
								<?php endif; ?>
								<?php endif; ?>
							</div>
							<h2><?php echo $term->name; ?></h2>
							<div class="row">
								<?php while ( $work->have_posts() ) : $work->the_post(); ?>
									<div class="column grid_4 project">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(array(300,168)); ?>
											<div><?php the_title(); ?></div>
										</a>
									</div>
								<?php endwhile; endif; ?>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>