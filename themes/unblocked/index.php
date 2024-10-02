<?php

$title = \helper\options::options_by_key_type('site_name');
$enable_ads = true;

$custom = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', array('custom' => $custom, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('sidebar', array('slug' => "/"));
echo \helper\themes::get_layout('game_item_home', array('title' => $title, 'field_order' => 'views', 'is_home2' => true, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
echo \helper\themes::get_layout('footer');