<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){
		echo '<div class="wrap">
		<div id="icon-options-general" class="icon32"><br></div>
		<h2>Theme Documentation</h2>
		
		<div class="metabox-holder">
		<div class="postbox-container" style="width:70%;">
		
		
		
				<div class="postbox"> <!-- postbox begin -->
				' . file_get_contents(dirname(__FILE__) . '/FT/license-html.php') . '
				</div> <!-- postbox end -->
				
				
				<div class="postbox"> <!-- postbox begin -->
						<h3 class="hndle"> <span> About the theme </span> </h3>
						
						<div class="inside">
						<p>	Xenastore is an ecommerce WordPress theme. This theme depends on an ecommerce plugin called <a href="http://cart66.com/lite/">  Cart66</a> to function as an e-commerce portal. This is a free plugin with an option to upgrade to a paid pro version. The theme is feature rich with custom post types, taxonomies, metaboxes, Theme options etc.   </p>
  						
  						
						</div>
				</div> <!-- postbox end -->
				
				
				<div class="postbox"> <!-- postbox begin -->
						<h3 class="hndle"> <span> How to sell using Xenastore theme? </span> </h3>
						
						<div class="inside">
						<b> Step1: Configure Cart66 plugin</b>
						<p>Once installed and activated you can configure your Cart66 shop settings. You can refer the  <a href="http://cart66.com/cart66lite-documentation.pdf"> PDF manual </a> that is available for the plugin. You will be able to set your Payment gateways, Tax rates, Shipping rates etc that will be applied for your store.  </p>
						
						<b> Step2: Add products to the inventory</b>
						<p>Inorder to start selling your products, you will have to first list them in the Cart66 inventory. Go to the Cart66 menu and click on the "Products" menu item.</p>
						<img src="https://web2feel.files.wordpress.com/2012/05/prod.jpg" alt="" />
						
						<P> This will open the product listing window of the plugin, you will be able to enter your product details, like Product name, Unique Product ID, Price , other options etc here. </P>
						<img src="https://web2feel.files.wordpress.com/2012/05/prod2.jpg" alt="" />
  					
						<p>Once the product is listed in the Cart66 database you can start selling it. With Xenastore you will be able to create a product post where you can showcase the product. Give the product post a title and enter the product description in the post editor. Use the product image as the post thumbnails and you can use the Cart66 shortcode to generate the  <em>Add to Cart</em> button.</p>
						<p> The following video screencast explains the process.</p>	
						
						<iframe src="http://www.screenr.com/embed/bsA8" width="650" height="396" frameborder="0"></iframe>

						</div>
				</div> <!-- postbox end -->
		
		</div>
		</div>
		
		
		
		</div>';
}

 ?>
