<?php

class InternClass
{
    public function __construct() {
        add_action( 'template_redirect', [$this, 'fs_intern_add_cpt'] );
    }
    
    public function fs_intern_add_cpt() {
        
        if (isset($_POST['frm_add_intern']))
        {
            
            $_POST['acf']['_post_title'] = $_POST['acf']['field_6354c390dad05'] . ' ' . $_POST['acf']['field_6354c3a7dad06'];
            
            # process ACF form;
            ob_start();
            acf_form_head();
        }
        
    }
    
    public function fs_intern_add_user($uuid) {
        
        if (!username_exists($uuid))
        {
            $intern = $this->get_interns_cpt($uuid);
            

            if (count($intern))
            {
                $args = [
                    'role' => 'intern',
                    'first_name' => get_post_meta($intern[0]->ID, "first_name", true),
                    'last_name' => get_post_meta($intern[0]->ID, "last_name", true),
                    'display_name' => $intern[0]->post_title,
                    'user_pass' => get_post_meta($intern[0]->ID, "password", true),
                    'user_login' => $uuid,
                    'user_email' => get_post_meta($intern[0]->ID, "email_address", true)

                ];

                $user_id = wp_insert_user( $args );
            }
            
        }
        else
        {
            //echo "do not create";
        }
        
        /*
        
                
                if ( is_wp_error( $user_id ) ) 
                {
                    write_log("Error creating wp user: " . $user_id->get_error_message());
                }
                else
                {
                    write_log("Service provider added: " . $user_id);
                }
                */
        
    }
    
    public function get_interns_cpt($uuid = '')
    {
        $args = [
            'post_type' => 'interns',
            'post_status' => 'publish',
            'numberposts' => -1
        ];
        
        if( $uuid )
        {
            $args['meta_key'] = "uuid";
            $args['meta_value'] = $uuid;
        }
        
        $interns = get_posts($args);
        
        return $interns;
    }
    
}

global $objIntern;
$objIntern = new InternClass();