<?php

/*
 * Plugin Name: AI JAMI TASK
 * Plugin URI: #
 * Description: It is a simple plugin developed for task
 * Version: 1.0
 * Requires at least: 5.0
 * Requires PHP:  7.2
 * Author: Bishal GC
 * Author URI: bishalgc.com
 * Text Domain: aijammitask
 * Domain Path: /languages
 */

/* Copyright Bishal GC (email : gcbishal03@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AI_JAMI_TASK')):

    /**
     * Main  AI_JAMI_TASK  class
     */
    class AI_JAMI_TASK
{

        /** Singleton *************************************************************/

        private static $instance;

        public static function instance()
    {

            if (!isset(self::$instance)
            && !(self::$instance instanceof AI_JAMI_TASK)
        ) {
                self::$instance = new AI_JAMI_TASK();
                self::$instance->setup_constants();

               add_action('wp_enqueue_scripts', array(self::$instance, 'ai_jami_enqueue_style'));
            
                self::$instance->includes();
                self::$instance->configuremenu = new Configure_Menu();

                

            }

            return self::$instance;
        }

        private function __construct()
    {
            /* Do nothing here */
        }

        /**
         * Setup plugins constants.
         *
         * @access private
         * @return void
         * @since  1.0.0
         */
        private function setup_constants()
    {
            // Plugin version.
            if (!defined('AI_JAMI_VERSION')) {
                define('AI_JAMI_VERSION', '1.0');
            }

            // Plugin folder Path.
            if (!defined('AI_JAMI_PLUGIN_DIR')) {
                define('AI_JAMI_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin folder URL.
            if (!defined('AI_JAMI_PLUGIN_URL')) {
                define('AI_JAMI_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin root file.
            if (!defined('AI_JAMI_PLUGIN_FILE')) {
                define('AI_JAMI_PLUGIN_FILE', __FILE__);
            }

            // Options.
            if (!defined('AI_JAMI_OPTIONS')) {
                define('AI_JAMI_OPTIONS', 'display_options');
            }
        }

        /**
         * Include required files.
         *
         * @access private
         * @return void
         * @since  1.0.0
         */

        private function includes()
    {
            require_once AI_JAMI_PLUGIN_DIR . 'includes/class-configure-menu.php';
          
        }

        public function ai_jami_enqueue_style()
    {
            $css_dir = AI_JAMI_PLUGIN_URL . 'assets/css/';
            wp_enqueue_style('import-front', $css_dir . 'main.css', false, '');
         
        }

        /**
         * Enqueue script front-end
         *
         * @access public
         * @return void
         * @since  1.0.0
         */
        public function ai_jami_enqueue_script()
    {

            $js_dir = AI_JAMI_PLUGIN_URL . 'assets/js/';

         /*
            wp_localize_script('import-filter-js', 'my_ajax_url', array(
                'ajax_url' => admin_url('admin-ajax.php'),
            ));
            */

        }

    }

endif;

function run_display()
{
    return AI_JAMI_TASK::instance();
}

global $ai_jami_task;
$ai_jami_task = run_display();

// var_dump($ai_jami_task);