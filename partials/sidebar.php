<?php
ob_start();
dynamic_sidebar('sidebar');
$sidebar = ob_get_clean();
?>
<aside class="sidebar">
    <?php echo apply_filters('hypercore_sidebar_html', $sidebar); ?>
</aside>