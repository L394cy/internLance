<?php
class FS_Shortcodes {
    
    private $child_theme;
    
    private $shortcodes = array(
        'intern-signup'         => 'fs_intern_signup',
        'company-signup'         => 'fs_company_signup',
        'submit-job'            => 'fs_submit_job',
        'jobs-listing'            => 'fs_jobs_listing'
    );
    
    function __construct() {
        
        $this->child_theme = "makeuc22";
        
        foreach ($this->shortcodes as $shortcode => $callback)
        {
            add_shortcode($shortcode, array($this, $callback));
        }
    }
    
    function fs_intern_signup($atts = '') {
        ob_start();
        include(ABSPATH . 'wp-content/themes/'.$this->child_theme.'/views/intern_signup.php');
        return ob_get_clean();
    }
    
    function fs_company_signup($atts = '') {
        ob_start();
        include(ABSPATH . 'wp-content/themes/'.$this->child_theme.'/views/company_signup.php');
        return ob_get_clean();
    }
    
    function fs_submit_job($atts = '') {
        ob_start();
        include(ABSPATH . 'wp-content/themes/'.$this->child_theme.'/views/submit_job.php');
        return ob_get_clean();
    }
    
    function fs_jobs_listing($atts = '') {
        ob_start();
        include(ABSPATH . 'wp-content/themes/'.$this->child_theme.'/views/jobs_listing.php');
        return ob_get_clean();
    }
    
}

global $fs_shortcodes;
$fs_shortcodes = new FS_Shortcodes();