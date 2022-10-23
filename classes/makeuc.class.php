<?php
use Ramsey\Uuid\Uuid;

class MakeUC
{
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'fs_custom_styles'] );
    }
    
    public function fs_custom_styles() {
        
        wp_enqueue_style( 'toastr_style', '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' );
        wp_register_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css' );
        wp_register_style( 'datatable_style', 'https://cdn.datatables.net/v/dt/dt-1.12.1/rr-1.2.8/datatables.min.css' );
        wp_enqueue_style( 'fs_style', get_stylesheet_directory_uri() . '/css/style.css?t='.time() );
        
        
        wp_enqueue_script( 'toastr_script', '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js', array('jquery') );
        wp_register_script( 'datatable_script', 'https://cdn.datatables.net/v/dt/dt-1.12.1/rr-1.2.8/datatables.min.js', array('jquery') );
        wp_enqueue_script( 'fs_script', get_stylesheet_directory_uri() . '/js/script.js?t='.time(), array('jquery'), '1.0.0', true );
        wp_localize_script('fs_script', 'ajax_var', array(
            'user_id' => get_current_user_id(),
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }
    
    function generate_uuid() {
        $uuid = Uuid::uuid4();
        return $uuid->toString();
    }
    
    function fs_redirect($url){
        if (!headers_sent()){
            header('Location: '.$url); exit;
        }else{
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>';
            exit;
        }
    }
}

global $makeuc;
$makeuc = new MakeUC();
 
 