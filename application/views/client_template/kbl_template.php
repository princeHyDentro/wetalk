<div class="w3-twothird">

    <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>DETAILS</h2>
        <div class="w3-container">
            <div class="w3-row">
              <div class="w3-col m4 l4">
                <h5 class="w3-opacity"><b>BirthDate</b></h5>
                <h6 class="w3-text-teal"><i class="fa fa-calendar-o fa-fw w3-margin-right"></i><?php echo $is_logged_in['client_birthdate']; ?></h6>
              </div>
              <div class="w3-col m4 l4">
                <h5 class="w3-opacity"><b>Age</b></h5>
                <h6 class="w3-text-teal"><i class="fa fa-birthday-cake fa-fw w3-margin-right"></i><?php echo $is_logged_in['client_age']; ?> years old</h6>
              </div>
               <div class="w3-col m4 l4">
                <h5 class="w3-opacity"><b>Gender</b></h5>
                <h6 class="w3-text-teal">
                    <?php
                        if($is_logged_in['gender_id'] == 1){
                            echo '<span class="fa fa-male fa-fw w3-margin-right"></span> Male';
                        }else{
                            echo '<span class="fa fa-female fa-fw w3-margin-right"></span> Female';
                        }
                    ?>
                </h6>
              </div>
            </div>
            <hr>
        </div>
        <div class="w3-container">
            <h5 class="w3-opacity"><b>Purpose in Enrollment</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-search-minus fa-fw w3-margin-right"></i>
                <?php
                    echo $is_logged_in['client_enrolled'];
                ?>
            </h6>
            <hr>
        </div>
        <div class="w3-container">
            <h5 class="w3-opacity"><b>Referral</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa fa-user fa-fw w3-margin-right"></i>
                <?php
                    echo $is_logged_in['client_referredby'];
                ?>
            </h6><br>
        </div>
    </div>

    <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
            <h5 class="w3-opacity"><b>Educational Attainment</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-university fa-fw w3-margin-right"></i>
                <?php
                echo $is_logged_in['client_educationalattainment'];
                ?>
            </h6>
            <hr>
        </div>
        <div class="w3-container">
            <h5 class="w3-opacity"><b>School</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-university fa-fw w3-margin-right"></i>
                <?php
                    echo $is_logged_in['client_school'];
                ?>
            </h6>
            <hr>
        </div>
        <div class="w3-container">
            <h5 class="w3-opacity"><b>Course</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa fa-folder-open-o fa-fw w3-margin-right"></i>
                <?php
                    echo $is_logged_in['client_course'];
                ?>
            </h6><br>
        </div>
    </div>
    <br>
     <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Remarks</h2>
        <div class="w3-container">
            <h5 class="w3-opacity"><b></b></h5>
            <p>
                <?php
                    echo $is_logged_in['client_remarks'];
                ?>
            </p><br>
        </div>
    </div>

    <!-- End Right Column -->
</div>