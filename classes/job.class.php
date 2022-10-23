<?php

class JobClass
{
    public function __construct() {
        add_action( 'template_redirect', [$this, 'fs_job_add_cpt'] );
    }
    
    public function fs_job_add_cpt() {
        
        if (isset($_POST['frm_add_job']))
        {
            
            $_POST['acf']['_post_title'] = $_POST['acf']['field_6354c41c496c3'];
            
            # process ACF form;
            ob_start();
            acf_form_head();
        }
        
    }
    
    public function get_jobs($status = '')
    {
        $args = [
            'post_type' => 'jobs',
            'post_status' => 'publish',
            'numberposts' => -1,
        ];
        
        if( $status )
        {
            $args['meta_key'] = "status";
            $args['meta_value'] = $status;
        }
        
        $jobs = get_posts($args);
        
        return $jobs;
    }
    
}

global $objJob;
$objJob = new JobClass();