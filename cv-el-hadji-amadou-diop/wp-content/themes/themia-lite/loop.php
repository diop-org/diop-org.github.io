<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--Start Post-->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="post_title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <ul class="post_info">
                <li class="postedon"><?php _e( 'Posted on', 'themia' ); ?>
                    <?php the_date(); ?>
                </li>
                <li class="postedin"><?php _e( 'in', 'themia' ); ?>
                    <?php the_category(', '); ?>
                </li>
                <li class="postedby"><?php _e( 'by', 'themia' ); ?>
                    <?php the_author_posts_link(); ?>
                </li>
            </ul>
            <hr/>
            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg')); ?>
                </a>
                <?php
            } else {
                ?>
                <a href="<?php the_permalink(); ?>"> <?php echo inkthemes_main_image(); ?> </a>
                <?php
            }
            ?>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="continue"><?php _e('Continue reading...', 'themia' ); ?></a> </div>
        <div class="shadow"> </div>
        <!--End Post-->
    <?php endwhile;
else: ?>
    <div class="post">
        <p>
    <?php _e('Sorry, no posts matched your criteria.', 'themia'); ?>
        </p>
    </div>
<?php endif; ?>
