<?php

$show_form = true;
    
    acf_form_head();
    global $post, $makeuc, $intern;
    
    $uuid = $makeuc->generate_uuid();
                    
                    
                    if ($_GET['updated'] == "true")
                    {
                        
                            ?>
                            <script>jQuery(document).ready(function(){ showToast("<?php echo __("Registration successfull."); ?>", "");});</script>
                            <?php
                        # add intern user;
                        $intern->fs_intern_add_user($_GET['uuid']);
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
        'id' => 'add_intern',
        //'post_id' => 'new_post',
        'new_post' => array(
            'post_type' => 'interns',
            'post_status' => 'publish'
        ),
        'field_groups' => array('group_6354c38ec86ec'),
        'form' => true,
        'post_title' => false,
        'html_after_fields' => '<input type="hidden" name="frm_add_intern" value="'.$post->ID.'">'
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
    
    jQuery('#acf-field_6354db44a7961').val("<?php echo $uuid; ?>");
    
});
</script>
<style>
    
    .acf-field.acf-field-text.acf-field-6354db44a7961 {
	display: none;
    }
</style>
<?php
}
?>