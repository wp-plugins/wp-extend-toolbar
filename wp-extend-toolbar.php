<?php
/*
 Plugin Name: WP Extend Toolbar
 Plugin URI: https://github.com/michouse/wp-extend-toolbar
 Description: Adds a page information to the admin bar.
 Author: Michinari Odajima
 Version: 1.0.0
 Author URI: http://piece-web.jp/
 Domain Path: /language
 Text Domain: wp-extend-toolbar
 */

class WP_Extend_Toolbar {

	function WP_Extend_Toolbar() {
		
		add_action( 'admin_bar_init', array( $this, 'admin_bar_init' ) );
		
	}
	
	function admin_bar_init() {

		if ( ! is_admin() && is_admin_bar_showing() && is_user_logged_in() ) {

			add_action( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 100 );
			
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 100 );
		
		}
	}
	
	function admin_bar_menu() {
		
		global $wp_admin_bar, $template;
		
		$wp_admin_bar->add_group( array(
			'id'     => 'extend-toolbar',
			'meta'   => array(
				'class' => 'ab-extend-toolbar',
			),
		) );
		
		$wp_admin_bar->add_menu( array(
			'parent' => 'extend-toolbar',
			'id'     => 'extend-toolbar-title',
			'title'  => '',
			'meta'   => array(),
		) );
		
		$wp_admin_bar->add_menu( array(
			'parent' => 'extend-toolbar',
			'id'     => 'extend-toolbar-description',
			'title'  => '',
			'meta'   => array(),
		) );
		
		$title = sprintf(
			'<span class="" style="font-size:13px;">テンプレート : </span> <span class="ab-label">%s</span>',
			basename( $template )
		);
		
		$wp_admin_bar->add_menu(
			array(
				'id'    => 'admin_bar_template_name',
				'meta'  => array(),
				'title' => $title,
			)
		);
	}
	
	function enqueue() {
		
		wp_enqueue_style( 'wp-extend-toolbar', plugins_url( "css/wp-extend-toolbar.css", __FILE__ ), array(), '0.1.0' );

		wp_enqueue_script( 'wp-extend-toolbar', plugins_url( "js/wp-extend-toolbar.js", __FILE__ ), array( 'jquery' ), '0.1.0', true );
		
	}
}

$GLOBALS['wp_extend_toolbar'] = new WP_Extend_Toolbar();