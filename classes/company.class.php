<?php

class CompanyClass
{
    public function __construct() {
        add_action( 'template_redirect', [$this, 'fs_company_add_cpt'] );
    }
    
    public function fs_company_add_cpt() {
        
        if (isset($_POST['frm_add_company']))
        {
            
            $_POST['acf']['_post_title'] = $_POST['acf']['field_6354c3f8595e2'];
            
            # process ACF form;
            ob_start();
            acf_form_head();
        }
        
    }
    
    public function fs_company_add_user($uuid) {
        
        if (!username_exists($uuid))
        {
            $companies = $this->get_companies_cpt($uuid);
            

            if (count($companies))
            {
                $args = [
                    'role' => 'company',
                    'first_name' => get_post_meta($companies[0]->ID, "company_name", true),
                    'display_name' => $companies[0]->post_title,
                    'user_pass' => get_post_meta($companies[0]->ID, "password", true),
                    'user_login' => $uuid,
                    'user_email' => get_post_meta($companies[0]->ID, "contact_person_email", true)

                ];

                $user_id = wp_insert_user( $args );
            }
            
        }
        else
        {
            //echo "do not create";
        }
    }
    
    public function get_companies_cpt($uuid = '')
    {
        $args = [
            'post_type' => 'companies',
            'post_status' => 'publish',
            'numberposts' => -1
        ];
        
        if( $uuid )
        {
            $args['meta_key'] = "uuid";
            $args['meta_value'] = $uuid;
        }
        
        $companies = get_posts($args);
        
        return $companies;
    }
    
}

global $objCompany;
$objCompany = new CompanyClass();