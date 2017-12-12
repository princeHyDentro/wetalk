           <?php $is_logged_in = $this->session->userdata('is_logged_in');
          // echo "<pre>"; print_r($is_logged_in); echo "</pre>";
           ?>
    
           <div class="w3-twothird">
            <div class="messages-list w3-container w3-card w3-white w3-margin-bottom">
                <div class="panel-body message">
                    <hr>
                    <p class="text-center">New Message</p>
                    <?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>
                    <form id="contact-form" method="post" action="<?php echo base_url($this->uri->uri_string()); ?>" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="to" class="col-sm-1 control-label">To:</label>
                            <div class="col-sm-12">

                                <!-- KBL -->
                                <?php if( $is_logged_in['cl_type_id'] == 2): ?>
                                    <select class="form-control" id="recipients" name="recipients">
                                        <option value="">Select In :</option>
                                            <optgroup label="Employees">
                                                <option value="KBL">KBL Employees</option>
                                                <option value="Admin">Admin</option>
                                            </optgroup>
                                        </select>
                                    <?php endif; ?>
                                    <!-- <input id="recipients" type="text" name="recipients" class="form-control "  placeholder="Type recipient" > -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc" class="col-sm-1 control-label">Subject:</label>
                                <div class="col-sm-12">
                                    <input id="privmsg_subject" type="text" name="privmsg_subject" class="form-control "  placeholder="Type Subject" tabindex="1">
                                </div>
                            </div>


                            <div class="col-sm-12 col-sm-offset-1">

                                <br>    

                                <div class="form-group">
                                    <textarea class="form-control"  id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>

                                </div>

                                <div class="form-group">    

                                    <button type="submit" name="btnSend" id="btnSend" value="Send message" class="w3-button w3-green">Send Message</button>
                                    <button type="submit" class="w3-button w3-purple" ><a style="color: #fff;  text-decoration: none;" href="<?php echo  base_url('/client_pm'); ?>"> Discard </a></button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            