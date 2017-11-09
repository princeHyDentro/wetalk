<!-- Page Container -->
<?php
$is_logged_in = $this->session->userdata('is_logged_in');
echo "<pre>";
print_r($is_logged_in);
echo "</pre>";
?>

<!-- Right Column -->
    <?php 
        if($is_logged_in['cl_type_id'] == 2){
            require_once(APPPATH."views/client_template/kbl_template.php");
        }
    ?>
<!-- End Grid -->
