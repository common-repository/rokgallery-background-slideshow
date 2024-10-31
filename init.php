<?php
/*
Plugin Name:    RokGallery Background Slideshow
Description:    An extension to the mighty RokGallery plugin, this plugin enables you to build a fullscreen background slideshow from your RokGallery images.
Author:         Hassan Derakhshandeh
Version:        0.1.1

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( '-1' );

class RokGallery_Background_Slideshow_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_background_slideshow', 'description' => 'Create a fullscreen background slideshow out of your RokGallery images.' );
		parent::__construct( 'background_slideshow', 'RokGallery Background Slideshow', $widget_ops, null );
		self::hooks();
		self::register_position();
	}

	public static function hooks() {
		if( ! is_admin() ) {
			add_action( 'wp_print_styles', array( __CLASS__, 'enqueue' ) );
			add_action( 'wp_footer', array( __CLASS__, 'display' ) );
		}
	}

	function widget( $args, $instance ) {
		extract( $args );
		$instance = wp_parse_args( $instance, $this->get_defaults() );
		if( $instance['gallery_id'] < 1 )
			return;

		$instance['widget_id'] = $this->number;
		$widget_slices = new RokGallery_Widgets_Slices();
		$slices = $widget_slices->getSlices( $instance );
		include( $this->get_view( 'widget' ) );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->get_defaults() );
		$instance['id_base'] = $this->id_base;
		$instance['number'] = $this->number;
		require( $this->get_view( 'form' ) );
	}

	/**
	 * Default widget options
	 *
	 * @return array
	 */
	function get_defaults() {
		return array(
			'gallery_id' => 0,
			'sort_by' => 'gallery_ordering',
			'sort_direction' => 'ASC',
			'limit_count' => 10,
			'autoplay_delay' => 5000,
		);
	}

	/**
	 * Register the widget class
	 *
	 * The widget is not registered if it's loading inside a RokBox popup
	 * used by RokGallery Pages List plugin.
	 * @link http://wordpress.org/extend/plugins/rokgallery-pages-list/
	 *
	 * @since 0.1
	 */
	function register() {
		if( ! isset( $_GET['rokgallery_rokbox'] ) ) {
			register_widget( __CLASS__ );
		}
	}

	function get_view( $template ) {
		// whether or not .php was added
		$template_slug = rtrim( $template, '.php' );
		$template = $template_slug . '.php';

		if ( $theme_file = locate_template( array( 'html/rokgallery-background-slideshow/' . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = 'views/' . $template;
		}
		return $file;
	}

	public static function enqueue() {
		if( is_active_sidebar( 'rokgallery-background-slideshow' ) ) {
			wp_enqueue_script( 'vegas', plugins_url( 'assets/jquery.vegas.js', __FILE__ ), array( 'jquery' ), '1.3.1' );
			wp_enqueue_style( 'vegas', plugins_url( 'assets/jquery.vegas.css', __FILE__ ), array(), '1.3.1' );
		}
	}

	public static function register_position() {
		register_sidebar( array(
			'name' => 'RokGallery Background Slideshow',
			'id' => 'rokgallery-background-slideshow',
		) );
	}

	public static function display() {
		if( is_active_sidebar( 'rokgallery-background-slideshow' ) ) {
			dynamic_sidebar( 'rokgallery-background-slideshow' );
		}
	}
}

add_action( 'widgets_init', array( 'RokGallery_Background_Slideshow_Widget', 'register' ), 100 );