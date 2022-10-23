<?php
wp_enqueue_style( 'bootstrap' );
wp_enqueue_style( 'datatable_style' );
wp_enqueue_script( 'datatable_script' );

$status = $atts['status'];

global $objJob;
$jobs = $objJob->get_jobs($status);

$current_user = wp_get_current_user();


?>
<table id="tbl_jobs" class="table table-stripped">
    <thead id="tbl_jobs_head">
        <tr>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jobs as $job) { ?>
        <tr>
            <td>
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="job_title">
                            <a class="job_title_link" href="javascript:;"><?php echo $job->post_title; ?></a>
                        </h2>
                        <div class="job_description"><?php echo get_field("job_description", $job->ID); ?></div>
                    </div>
                    <div class="col-lg-4">
                        <div align="right">
                            <?php 
                            $show_interested = false;
                            $interested_interns = get_post_meta($job->ID, "interested_interns", true);
                            if (is_array($interested_interns))
                            {
                                echo count($interested_interns);
                            }
                            else
                            {
                                echo "0";
                            }
                            
                            ?> Interested
                            <?php
                            
                            if (is_array($interested_interns))
                            {
                                if (!in_array($current_user->ID, $interested_interns))
                                {
                                    $show_interested = true;
                                }
                            }
                            else
                            {
                                $show_interested = true;
                            }
                            
                            if ($show_interested)
                            {
                                ?>
                                    <br>
                                    <a data-jobid="<?php echo $job->ID; ?>" data-userid="<?php echo $current_user->ID; ?>" class="badge badge-success interested_link" href="javascript:;">I am interested</a>
                                    <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
jQuery(document).ready(function(){
    jQuery('#tbl_jobs').DataTable();
    jQuery('#tbl_jobs_head').css({
        display: 'none'
    });
});
</script>