<?php

$show_form = true;
    
    acf_form_head();
    global $post, $makeuc, $objCompany;
    
    $uuid = $makeuc->generate_uuid();
                    
                    
                    if ($_GET['updated'] == "true")
                    {
                        
                            ?>
                            <script>jQuery(document).ready(function(){ showToast("<?php echo __("Company Registration successfull."); ?>", "");});</script>
                            <?php
                        # add company user;
                        $objCompany->fs_company_add_user($_GET['uuid']);
                        //$makeuc->fs_redirect("/wp-login.php");
                        
                        $show_form = false;
                        
                        ?>
                            
                            <div class="alert alert-success">
                                You have been successfully registered. 
                            </div>
                            
                            <br>
                            <center>
                                <a class="acf-button button button-primary button-large" href="/wp-login.php">Login Here</a>
                            </center>
                            
                            
                            <?php
                    }
                    ?>
                    
               
                    
<?php 

if ($show_form)
{
    $settings = array(
        'id' => 'add_company',
        //'post_id' => 'new_post',
        'new_post' => array(
            'post_type' => 'companies',
            'post_status' => 'publish'
        ),
        'field_groups' => array('group_6354c3f805052'),
        'form' => true,
        'post_title' => false,
        'html_after_fields' => '<input type="hidden" name="frm_add_company" value="'.$post->ID.'">'
    );
    
    $settings['post_id'] = 'new_post';
    $settings['submit_value'] = "Sign Up";
    $settings['return'] = add_query_arg([
        'uuid' => $uuid,
        'updated' => 'true'
    ], get_permalink($post->ID));
                
    acf_form( $settings );

    
?>
<script>
jQuery(document).ready(function(){
    
    jQuery('#acf-field_6354db584090f').val("<?php echo $uuid; ?>");
    
});
</script>
<style>
    
    .acf-field.acf-field-text.acf-field-6354db584090f,
    .acf-field.acf-field-textarea.acf-field-6354d1c695253,
    .acf-field.acf-field-select.acf-field-6354d1a195252 {
	display: none;
    }
</style>
<?php
}
?>