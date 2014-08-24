			<div class="clearfix"></div>
		</div>
	</div>
</div><!--/#page-content-->

<footer class="footer content-info" id="page-footer" role="contentinfo">
	<div class="container">
		<nav class="nav-drawer" role="navigation">
			<?php
			if (has_nav_menu('mobile-menu')) :
				wp_nav_menu(array('theme_location' => 'mobile-menu', 'menu_class' => 'hidden-md hidden-lg', 'walker' => new drawer_nav()));
			endif;
			?>
		</nav>
		<?php //require_once(TEMPLATEPATH . '/templates/components/social-icons.php'); ?>

		<div class="footer-cols">
			<div class="row">
				<div class="col-md-2">
					<h4>who we are</h4>
				</div>
				<div class="col-md-2">
					<h4>join the family</h4>
				</div>
				<div class="col-md-2">
					<h4>join the mission</h4>
				</div>
				<div class="col-md-3 bg-danger">
					<h4>recent posts</h4>
					<ul class="list-unstyled">
						<?php
							$args = array('numberposts' => '5');
							$recent_posts = wp_get_recent_posts($args);
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
							}
						?>
					<li>
				</div>
				<div class="col-md-3 bg-warning">
					<h4>the village church</h4>
					<p>
						210 s. second st. <br />
						hamilton, oh <br />
						513.330.9118
					</p>

					<p>sign up for our monthly email to stay up to date with <strong>the village church</strong>.</p>

					<form action="http://myvillagechurch.us2.list-manage1.com/subscribe/post?u=5fb57d3da589671f6e1f6f346&amp;id=b836bd2f65" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" role="form" novalidate="">
						<div class="form-group">
							<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="email address" required="" class="form-control subscribeInput">
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="row">
				<div class="col-md-6 text-md-left">
					love &bull; live &bull; move
				</div>
				<div class="col-md-6 text-md-right">
					&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
				</div>
			</div>
		</div>
	</div>
</footer><!--/#page-footer-->

<!--Search Modal-->
<div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="search" method="get" id="modalSearchForm" class="form-search" action="<?php echo home_url('/'); ?>">
				<div class="modal-body">
					<input type="text" name="s" id="s" class="form-control" placeholder="<?php _e('Search', 'roots'); ?> <?php bloginfo('name'); ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-small pull-left" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary btn-small pull-right">Submit</button>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
</div><!--/#modalSearch-->

<?php wp_footer(); ?>
<?php
$googleAnalytics = get_option("roots_google_analytics");
if($googleAnalytics != "") { ?>
	<script>
	var _gaq=[['_setAccount','<?php echo $googleAnalytics?>'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
<?php } ?>