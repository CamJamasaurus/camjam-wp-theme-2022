<?php get_header();

$title = camjam_get_the_title();

?>

<main>
	<section class="nopad">
		<div class="cc-mainstage cj-lazyload-bg" data-bg-image="<?php echo get_bg_url(); ?>">
			<h1><?php echo $title; ?></h1>
			<span class="heading">Coming 11<span class="super-dot">.</span>11<span class="super-dot">.</span>2022</span>
			<!-- <p>
				<span class="color1">#0B2F1B</span><br>
				<span class="color2">#022C20</span><br>
				<span class="color3">#044027</span>
			</p> -->
			<a title="RSVP" class="cc-btn" href="<?php echo site_url('/rsvp/');?>">
				<span>RSVP</span>
			</a>
		</div>
	</section>


	<section id="our-story">
		<div class="about-us">
			<h2>Our Story</h2>
			<p>Lorem ipsum dolor lorem ipsum sit amet, etc.</p>
			<div class="about-us__grid">
				<div class="about-us__grid-item">
					<?php echo camjam_get_lazyload_image( 45 ); ?>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div class="about-us__grid-item">
					<?php echo camjam_get_lazyload_image( 45 ); ?>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div class="about-us__grid-item">
					<?php echo camjam_get_lazyload_image( 45 ); ?>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>
	</section>
	

	<section>
		<div class="nav-tiles">
			<h2>About Our Wedding</h2>
			<div class="nav-tiles--grid">
				<a title="The Venue" href="<?php echo site_url('/the-venue/'); ?>"><span>The Venue</span></a>
				<a title="Info" href="<?php echo site_url('/general-info/'); ?>"><span>Info</span></a>
				<a title="Gallery" href="<?php echo site_url('/gallery/'); ?>"><span>Gallery</span></a>
				<a title="Registry" href="<?php echo site_url('/registry/'); ?>"><span>Registry</span></a>
			</div>
		</div>
	</section>

	<section id="schedule">
		<h2 class="center">Weekend Schedule</h2>
		<div class="schedule__grid">

			<div class="schedule__grid-row">
				<div class="schedule__grid-col">
					<span class="heading theme-blue">Thursday, Nov 10<sup>th</sup></span>
				</div>
				<div class="schedule__grid-col">
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Drive RVs In</h4>
						<p class="schedule__item-body">Anyone with RVs must drive them into the farm and park them by 11am</p>
					</div>
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Rehearsal</h4>
						<p class="schedule__item-body">Members of the bridal party and immediate family members will do the rehearsal.</p>
					</div>
				</div>
			</div>

			<div class="schedule__grid-row">
				<div class="schedule__grid-col">
					<span class="heading theme-blue">Friday, Nov 11<sup>th</sup></span>
				</div>
				<div class="schedule__grid-col">
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Lorem ipsum</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Lorem ipsum</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
				</div>
			</div>

			<div class="schedule__grid-row">
				<div class="schedule__grid-col">
					<span class="heading theme-blue">Saturday, Nov 12<sup>th</sup></span>
				</div>
				<div class="schedule__grid-col">
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Lorem ipsum</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Lorem ipsum</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
				</div>
			</div>

			<div class="schedule__grid-row">
				<div class="schedule__grid-col">
					<span class="heading theme-blue">Sunday, Nov 13<sup>th</sup></span>
				</div>
				<div class="schedule__grid-col">
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Pack Up</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
					<div class="schedule__item">
						<h4 class="schedule__item-heading">Go Home</h4>
						<p class="schedule__item-body">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
					</div>
				</div>
			</div>

		</div>
	</section>
	
</main>

<?php get_footer();