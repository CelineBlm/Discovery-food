<html>
    <head>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class() ?>>
    <header>

		<div class="middle-menu center-text"><a href="#" class="logo">
            
            <?php the_custom_logo('thumbnail'); ?>
            
            </a></div>

		<ul id="main-menu"><li>
                    <?php wp_nav_menu(array('menu' => 'menu-top')); ?>
                    </li>
                    </ul>
		<!-- conatiner -->
		
</header>