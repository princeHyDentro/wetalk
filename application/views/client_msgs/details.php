<div class="w3-twothird">
    <div class="messages-list w3-container w3-card w3-white w3-margin-bottom">
        <div class="panel panel-default">
                <div class="panel-body message">
                    <?php if(count($message)>0): ?>
                        <div class="message-title"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $message[TF_PM_SUBJECT]; ?></div>
                        <div class="header">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <div class="from">
                                <span><?php echo $message[PM_FULLNAME]; ?></span>
                                <!-- lukasz@holeczek.pl -->
                            </div>
                            <div class="date"><span class="fa fa-paper-clip"></span>
                                <b>
                                    <?php 
                                    $old_date = date($message[TF_PM_DATE]); 
                                    $middle     = strtotime($old_date); 

                                    $new_date = date("F j, Y - g:i A", $middle);
                                    echo '<i class="fa fa-calendar" aria-hidden="true"></i> '.$new_date;
                                    ?>
                                </b>
                            </div>
                            <div class="menu"></div>
                        </div>

                        <div class="content">
                            <p>
                                <?php echo $message[TF_PM_BODY]; ?>
                            </p>
                        </div>
                        <hr>
                        <form id="contact-form" method="post" action="<?php echo base_url('pm/send'); ?>" role="form">

                            <input id="recipients" type="hidden" value="<?php echo $message[TF_PM_AUTHOR];  ?>" name="recipients" class="form-control col-md-5" placeholder="Please enter your recipients" required="required" >


                            <input id="privmsg_subject" type="hidden" name="privmsg_subject" class="col-md-5 form-control" value="<?php echo $message[TF_PM_SUBJECT]; ?>" placeholder="Please enter your recipients" required="required" >
                            <div class="form-group">

                                <textarea class="form-control" id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>

                            </div>

                            <div class="form-group">    
                                <input type="submit" class="btn btn-success btn-send "  name="btnSend" id="btnSend" value="Reply ">
                            </div>  
                        </form>

                    </div>  
                <?php else:?>
                    <h1>No message found.</h1>
                <?php endif;?>
            </div> 
    </div>
</div>