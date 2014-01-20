<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Home Word
 */
?>
	<aside class="sidebar-section">
		<?php
			if ($_SESSION['cat'] === 'families') {
				wp_nav_menu( array( 'theme_location' => 'families', 'menu_class' => 'sidebar-nav', 'container' => false) );
			} elseif ($_SESSION['cat'] === 'church') {
				wp_nav_menu( array( 'theme_location' => 'church', 'menu_class' => 'sidebar-nav', 'container' => false) );
			}
		?>
		<!--<ul class="sidebar-nav">
			<li class="current-menu-item">
				<a href = "#">Families Overview</a>
			</li>
			<li>
				<a href = "#">Articles & Media</a>
			</li>
			<li>
				<a href = "#">Culture Blog</a>
			</li>
			<li>
				<a href = "#">Devotionals</a>
			</li>
			<li>
				<a href = "#">Upcoming Events</a>
			</li>
		</ul>-->
		<div class="sidebar-content">

		</div>
	</aside>