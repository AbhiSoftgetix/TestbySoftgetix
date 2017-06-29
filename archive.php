<?php get_header(); ?>

<div id="page-header" class="container-fluid">
<div class="row">
<div class="container">

	<!-- Add title for archive | Category | Tag  -->
	<h2 class="page-title"><?php if( is_category()):?> Category <small>"<?php single_term_title();?>"</small> <?php elseif( is_tag()):?> Tag <small>"<?php single_term_title();?>"</small> <?php else: ?> Archive <small>"<?php the_archive_title();?>"</small> <?php endif; ?> </h2>
	
	<!-- header breadcrumb --> 
	<ul class="breadcrumb">
		<li><a href="<?php echo site_url();?>">Home</a></li>
		<?php if( is_category()):?>
			<li class="active"> Category </li>
			<li class="active"> <?php single_term_title();?> </li>
			
		<?php elseif( is_tag()):?>
			<li class="active"> Tag </li>
			<li class="active"> <?php single_term_title();?>
		<?php else: ?> <li class="active"> Archive </li> <?php endif; ?>
	</ul>
</div>
</div>
</div>

<div class="container">

  <div class="row">
	<div class="col-md-8 articles-list">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="single-article">
		
			<?php 
				//  check featured image
				if ( has_post_thumbnail() ) {the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive') );}
			?>
			
			<h3 class="post_title"><a href="<?php the_permalink(); ?>" class="txt-secondary"><?php the_title(); ?></a></h3>
			<ul class="article-meta">
				<li> <span><i class="fa fa-user"></i> Posted By : <?php the_author_posts_link(); ?></span> </li>
				<li class="meta-divider">|</li>
				<li> <span><i class="fa fa-calendar"> </i> Posted On : <?php the_time('M j, Y'); ?></span> </li>
				<li class="meta-divider">|</li>
				<li> <span><i class="fa fa-comments"> </i> <a><?php comments_number( 'No Comments', '1 Comment', '% Comments'); ?></a></span> </li>
			</ul>
			<p class="excerpt"><?php the_excerpt(); ?></p>
			<a href="<?php the_permalink(); ?>" class="btn btn-secondary-o btn-ovl">Continue Reading <i class="fa fa-angle-double-right"></i></a>
		</div>
		
		    <?php endwhile; else: ?>
			
			<h2>No Posts Found</h2>
			
		<?php endif; ?>

	</div> <!-- /.articles-list-->
	
	
	<div id="right-sidebar" class="col-md-4 Sidebar hidden-sm hidden-xs">
		<?php get_sidebar(); ?>
	</div>
	
  </div>
</div>
<?php get_footer(); ?>
