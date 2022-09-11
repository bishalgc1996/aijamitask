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
        add_filter('mod_rewrite_rules', array($this, 'fix_cache'));

       

    }

    /**
     * Create the Admin menu and submenu and assign their links to global varibles.
     *
     * @since 1.0
     * @return void
     */
    public function add_menu_pages()
    {
        add_menu_page(__('Analytique', 'aijammitask'), __('Analytique', 'aijammitask'), 'manage_options', 'home_marketing_page', array($this, 'home_marketing_page'), 'dashicons-dashboard', '30');
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

    public function fix_cache($rules)
    {

      $new_rules = '# TN - START EXPIRES CACHE 
      ExpiresActive On
      ExpiresByType text/css "access 1 month"
      ExpiresByType text/html "access 1 month"
      ExpiresByType image/gif "access 1 year"
      ExpiresByType image/png "access 1 year"
      ExpiresByType image/jpg "access 1 year"
      ExpiresByType image/jpeg "access 1 year"
      ExpiresByType image/svg "access 1 year"
      ExpiresByType image/x-icon "access 1 year"
      ExpiresByType application/pdf "access 1 month"
      ExpiresByType application/xhtml-xml "access 1 month"
      ExpiresByType application/javascript "access 1 month" 
      ExpiresByType text/x-javascript "access 1 month"
      ExpiresByType application/x-shockwave-flash "access 1 month"
      ExpiresDefault "access 1 month"
      # TN - END EXPIRES CACHE
      
      
      # TN - BEGIN Cache-Control Headers
      <ifModule mod_headers.c>
      <filesMatch "\.(ico|jpeg|jpg|png|gif|swf|pdf|svg)$">
      Header set Cache-Control "public"
      </filesMatch>
      <filesMatch "\.(css)$">
      Header set Cache-Control "public"
      </filesMatch>
      <filesMatch "\.(js)$">
      Header set Cache-Control "private"
      </filesMatch>
      <filesMatch "\.(x?html?|php)$">
      Header set Cache-Control "private, must-revalidate"
      </filesMatch>
      </ifModule>
      # TN - END Cache-Control Headers
      
      
      # TN - BEGIN Turn ETags Off
      FileETag None
      # TN - END Turn ETags Off';
        return $rules . $new_rules;
    
    }
}