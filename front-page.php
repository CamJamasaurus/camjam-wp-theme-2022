<?php get_header();

$title = camjam_get_the_title();

?>

<div class="hamburger-helper--wrap">
	<div class="hamburger-helper unspin">
		<!-- Regular Hamburger
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License)<path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg>
		-->

		<!-- Real Hamburger -->
		<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> -->
		<!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
		<!-- <path d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"/></svg> -->

		<!-- D20 Hamburger -->
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M106.75 215.06L1.2 370.95c-3.08 5 .1 11.5 5.93 12.14l208.26 22.07-108.64-190.1zM7.41 315.43L82.7 193.08 6.06 147.1c-2.67-1.6-6.06.32-6.06 3.43v162.81c0 4.03 5.29 5.53 7.41 2.09zM18.25 423.6l194.4 87.66c5.3 2.45 11.35-1.43 11.35-7.26v-65.67l-203.55-22.3c-4.45-.5-6.23 5.59-2.2 7.57zm81.22-257.78L179.4 22.88c4.34-7.06-3.59-15.25-10.78-11.14L17.81 110.35c-2.47 1.62-2.39 5.26.13 6.78l81.53 48.69zM240 176h109.21L253.63 7.62C250.5 2.54 245.25 0 240 0s-10.5 2.54-13.63 7.62L130.79 176H240zm233.94-28.9l-76.64 45.99 75.29 122.35c2.11 3.44 7.41 1.94 7.41-2.1V150.53c0-3.11-3.39-5.03-6.06-3.43zm-93.41 18.72l81.53-48.7c2.53-1.52 2.6-5.16.13-6.78l-150.81-98.6c-7.19-4.11-15.12 4.08-10.78 11.14l79.93 142.94zm79.02 250.21L256 438.32v65.67c0 5.84 6.05 9.71 11.35 7.26l194.4-87.66c4.03-1.97 2.25-8.06-2.2-7.56zm-86.3-200.97l-108.63 190.1 208.26-22.07c5.83-.65 9.01-7.14 5.93-12.14L373.25 215.06zM240 208H139.57L240 383.75 340.43 208H240z"/></svg>
	</div>
</div>

<div class="dropdown hide">
	<?php echo wp_nav_menu(array('menu'=>5,'menu_class'=>'dropdown-menu')); ?>
</div>

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
					<span class="heading">Thursday, Nov 10<sup>th</sup></span>
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
					<span class="heading">Friday, Nov 11<sup>th</sup></span>
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
		</div>
	</section>
	
</main>

<?php get_footer();