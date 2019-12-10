<?php
/*Get The SVG code  use textarea for insert svg code*/

$catIcon = html_entity_decode(get_field('category_icon', 'product_cat_' . $termId ), ENT_QUOTES, 'UTF-8'); 
echo $catIcon; 
?> 