<?php 
$description = apply_filters("the_description","this is description");

?>


<?php do_action("html_head","title according to arguments passed");?>
<body>
    
<h1><?php do_action("test_action");?></h1>

<p><? echo apply_filters("paragraph_filter","default paragraph content")?></p>
<p><?php echo(esc_html($description)) ;?></p>
</body>
</html>