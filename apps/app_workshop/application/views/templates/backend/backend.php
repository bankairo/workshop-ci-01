<?php
$_wad_template_config = array(
    'name'        => 'backend',
    'desc'        => 'Template-AdminLTE',
    'version'     => '1.0.0',
    'init_before_view'  => array(/*'html_header' => '_data_header',*/'menu_header' => '_data_menu_header','menu_sidebar' => '_data_menu_sidebar'),
    'init_after_view'   => array(/*'layout_footer' => '_data_layout_footer', 'config_sidebar' => '_data_config_sidebar',*/ 'html_footer' => '_data_footer')
);