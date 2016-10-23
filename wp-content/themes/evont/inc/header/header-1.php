<?php //Header-1 

	$evont_data =  evont_globals();
	
	$sticky_class='';
	$header_class='';
	
	if(is_page_template('template-home.php')):
		$header_class='jx-evont-header-transparent';
	endif;
	
	if (!wp_is_mobile()):
		if ($evont_data['check_sticky_header']):
		$sticky_class='jx-evont-sticky';
		endif;
	endif;
	
	
?>
  <header class="jx-evont-header jx-header-1 header <?php echo esc_attr($sticky_class);?>">
    
    <?php
						
		if ( class_exists( 'WooCommerce' ) ) {
		
			global $woocommerce;
			
			// get cart quantity
			$qty = $woocommerce->cart->get_cart_contents_count();
			
			// get cart total
			$total = $woocommerce->cart->get_cart_total();
			
			// get cart url
			$cart_url = $woocommerce->cart->get_cart_url();
		}
		?>	
    
    <!--/header start-->
    <nav class="navbar navbar-default  navbar-fixed-top">
      <div class="container relative">
        <?php if ( class_exists( 'WooCommerce' ) ) : ?>
        <div class="shopping-cart">
          <div class="relative"><a href="<?php echo esc_url($cart_url);?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <div class="value"><a href="<?php echo esc_url($cart_url);?>"><?php echo esc_attr($qty); ?></a></div>
          </div>
        </div>
        <?php endif; ?>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          
        
			 <?php if($evont_data['evont_logo'] != ""): ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><img src="<?php echo esc_url($evont_data['evont_logo']); ?>" alt="<?php bloginfo('name'); ?>" class="logo_standard"/></a>
                <?php if($evont_data['logo_retina'] != '') : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  class="navbar-brand"><img src="<?php echo esc_url($evont_data['logo_retina']); ?>" width="<?php echo esc_attr($evont_data['logo_width']); ?>" height="<?php echo esc_attr($evont_data['logo_height']); ?>" alt="<?php bloginfo('name'); ?>" class="logo_retina"/></a>				
                <?php endif; ?>
                <!-- EOF Retina -->                    
            <?php endif ?> 
        
         </div>
          
          
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
			<?php								
                
            $default = array(
                'theme_location'  => 'primary_navigation',
                'menu'            => '',
                'container'       => 'div',
                'menu_class'      => 'jx-evont-mainmenu navbar-right',
                'echo'            => true,
                'fallback_cb'     => '__return_false',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new evont_mega_menu()
            );
            
            wp_nav_menu($default);									
            
            
        ?>                
        
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!--/header end-->
  </header>
  
  <?php get_template_part('inc/ajax', 'auth'); ?>
  <?php get_template_part('inc/titlebar'); ?>

