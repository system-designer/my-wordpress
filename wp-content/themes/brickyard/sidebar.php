<?php
/**
 * The sidebar template file.
 * @package BrickYard
 * @since BrickYard 1.0.0
*/
?>
<?php global $brickyard_options_db; ?>
<?php if ($brickyard_options_db['brickyard_display_sidebar'] != 'Hide') { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>