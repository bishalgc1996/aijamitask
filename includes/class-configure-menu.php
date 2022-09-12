<?php
/**
 * Class for Register and manage Menu.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    AI JAMI TASK
 * @subpackage AI JAMI TASK/includes
 */

// Exit if accessed directly

if (!defined('ABSPATH')) {
    exit;
}

class Configure_Menu
{

    /**
     * Admin page URL
     *
     * @var string
     */
    public $adminpage_url;

    public function __construct()
    {

        $this->adminpage_url = admin_url('admin.php?page=home_marketing_page');
        add_action('admin_menu', array($this, 'add_menu_pages'));
        add_action('admin_menu', array($this, 'post_remove'));
        add_action('plugins_loaded', array($this, 'fix_cache'));
        add_action( 'plugins_loaded', array($this, 'load_plugin_textdomain') );

    }

    /**
     * Create the Admin menu and submenu and assign their links to global varibles.
     *
     * @since 1.0
     * @return void
     */
    public function add_menu_pages()
    {
        add_menu_page(__('Analytics', 'aijammitask'), __('Analytics', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-dashboard', '30');
        add_menu_page(__('Ordres', 'aijammitask'), __('Ordres', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-cloud-saved', '31');
        add_menu_page(__('des produits', 'aijammitask'), __('des produits', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-products', '32');
        add_menu_page(__('clients', 'aijammitask'), __('clients', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-admin-users', '33');
        add_menu_page(__('remise', 'aijammitask'), __('remise', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-tide', '34');
        add_menu_page(__('Mon magasin', 'aijammitask'), __('Mon magasin', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-admin-home', '35');
        add_menu_page(__('Home and Marketing', 'aijammitask'), __('Commercialisation', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-visibility', '36');
        add_menu_page(__('Applications', 'aijammitask'), __('Applications', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-block-default', '37');
        add_menu_page(__('Performance', 'aijammitask'), __('Performance', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-dashboard', '38');
        add_menu_page(__('Support', 'aijammitask'), __('Support', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-superhero', '39');
    }

    public function home_marketing_page()
    {
        ?>
<div style="text-align: center; background: white;" class="simple-text">
  <h2><?php esc_html_e('Simple Text', 'aijammitask');?></h2>
  <ul>
    <li style="display:inline-block; margin: 0 0.1rem; "><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'edit.php' ?>">Posts</a> </li>
    <li style="display:inline-block; margin: 0 0.1rem;"><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'edit.php?post_type=page' ?>">Pages</a> </li>
    <li style="display:inline-block; margin: 0 0.1rem;"><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'edit-comments.php' ?>">Comments</a> </li>
    <li style="display:inline-block; margin: 0 0.1rem;"><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'upload.php' ?>">Media</a> </li>
    <li style="display:inline-block; margin: 0 0.1rem;"><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'themes.php' ?>">Themes</a> </li>
    <li style="display:inline-block; margin: 0 0.1rem;"><a style="text-decoration:none; font-size:1rem;"
        class="aijami-link" href="<?php echo admin_url() . 'users.php' ?>">Users</a> </li>

  </ul>
</div>
<?php
}

    public function post_remove()
    {
        remove_menu_page('edit.php');
        remove_menu_page('edit.php?post_type=page');
        remove_menu_page('edit-comments.php');
        remove_menu_page('upload.php');
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('tools.php');
        remove_menu_page('users.php');
    }

    public function fix_cache()
    {

        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

    }

    public function  load_plugin_textdomain() {
        load_plugin_textdomain( 'aijammitask', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
        
    }
}