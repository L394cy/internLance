<?php

$show_form = true;
    
    acf_form_head();
    global $post, $makeuc, $objJob;
    
    $uuid = $makeuc->generate_uuid();
    $current_user = wp_get_current_user();
                    
                    if ($_GET['updated'] == "true")
                    {
                        
                            ?>
                            <script>jQuery(document).ready(function(){ showToast("<?php echo __("Job submitted successfully."); ?>", "");});</script>
                            <?php
                        
                        $show_form = false;
                        
                        ?>
                            
                            <div class="alert alert-success">
                                Job has been successfully submitted. 
                            </div>
                            
                            
                            
                            <?php
                    }
                    ?>
                    
               
                    
<?php 

if ($show_form)
{
    $settings = array(
        'id' => 'add_job',
        //'post_id' => 'new_post',
        'new_post' => array(
            'post_type' => 'jobs',
            'post_status' => 'publish'
        ),
        'field_groups' => array('group_6354c41ba8302'),
        'form' => true,
        'post_title' => false,
        'html_after_fields' => '<input type="hidden" name="frm_add_job" value="'.$post->ID.'">'
    );
    
    $settings['post_id'] = 'new_post';
    $settings['submit_value'] = "Submit Job";
    $settings['return'] = add_query_arg([
        'uuid' => $uuid,
        'updated' => 'true'
    ], get_permalink($post->ID));
                
    acf_form( $settings );

    
?>
<script>
jQuery(document).ready(function(){
    
    jQuery('#acf-field_6354dd3c23652').val("<?php echo $uuid; ?>");
    jQuery('#acf-field_63553e324b88c').val("<?php echo $current_user->user_login; ?>");
    
});
</script>
<style>
    
    .acf-field.acf-field-post-object.acf-field-6354dd3723651,
    .acf-field.acf-field-text.acf-field-6354dd3c23652,
    .acf-field.acf-field-text.acf-field-63553e324b88c {
	display: none;
    }
</style>
<?php
}
?>