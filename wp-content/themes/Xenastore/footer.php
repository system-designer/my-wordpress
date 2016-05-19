<div class='clear'></div>
</div>

<div id="bottom">
	<div class="bottomcover">
	<ul>

	<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar("Footer") ) : ?>  
	
	<?php endif; ?>
	
	</ul>
	<div class='clear'></div>
	</div>
</div>

<div id="footer">
	<div class="fcred">
	Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br />
<?php fflink(); ?> | <a href="http://fabthemes.com/<?php echo FT_scope::tool()->themeName ?>/" ><?php echo FT_scope::tool()->themeName ?> WordPress Theme</a>

	</div>	
<div class='clear'></div>	
<?php wp_footer(); ?>
</div>
<div class='clear'></div>	
</div>
</body>
</html>      
