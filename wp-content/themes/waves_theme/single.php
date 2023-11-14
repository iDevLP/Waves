<?php
$post = $wp_query->post;
if ( in_category('blogs') ) {
include(TEMPLATEPATH . '/single_blogs.php'); } 
elseif ( in_category('galerias') ) {
include(TEMPLATEPATH . '/single_galerias.php'); }
else {
include(TEMPLATEPATH . '/single_default.php');
}
?>