
<?php //index.php　header.php コードサンプル ?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>
<body>
<div id="nav_toggle" class="sponly">
	<div>
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>
<div id="spnavi" class="sponly">
	<ul>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">A</a></li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">B</a></li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">C</a>
			<ul>
				<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">D</a></li>
			</ul>
		</li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">E</a></li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">F</a></li>
		<li><a class="spnavi-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">G</a></li>
	</ul>
</div>

<header id="header" class="header">
	<section class="wrapper">
		<section class="header-section-wrapper">
			<section class="header-logo-wrapper">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a></h1>
			</section>
			<section class="header-nav-wrapper pconly">
				<section class="header-nav pconly">
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
						<li><a class="<?php if(!is_front_page() && is_page('A') || is_page('A/') ) echo 'active'; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">A</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">B</a></li>
					</ul>
                    <div class="searchBox">
						<?php get_search_form(); ?>
					<!--<form role="search" method="get" id="searchform" action="<?php //echo esc_url( home_url( '/' ) ); ?>search-result">
					        <div class="search">
					                <input type="text" value="" name="s" id="s">
					                <input type="submit" id="searchsubmit" value="Search">
					        </div>
					</form>-->
					</div>
					<section class="header-contact pconly">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>contact" class="btn btn--orange btn-contact">お問い合わせ</a>
					</section>
				</section>
			</section>
		</section>
	</section>
</header>