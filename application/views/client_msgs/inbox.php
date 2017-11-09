<div class="w3-twothird">
    <div class="messages-list w3-container w3-card w3-white w3-margin-bottom">
        <div class="panel-body" style="text-align: left;">

            <ul class="messages-list">
                <?php  if(count($messages)>0):?>
                    <?php $segment = $this->uri->segment(3, 0); ?>
                    <?php for ($i=0; $i<count($messages); $i++): ?>

                        <?php if($messages[$i]['read_unread']['pmto_read'] == 1 || $segment == 2): ?>
                            <hr>
                            <li class="read">
                                <a href="<?php echo site_url().'client_pm/message/'.$messages[$i][TF_PM_ID]; ?>">
                                    <div class="header">
                                        <span class="action"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span> 
                                        <span class="from">
                                            <?php
                                            if($type != MSG_SENT) echo $messages[$i][PM_FULLNAME];
                                            else
                                            {
                                                $recipients = $messages[$i][PM_RECIPIENTS];
                                                foreach ($recipients as $recipient)
                                                    echo (next($recipients)) ? $recipient.', ' : $recipient;
                                            }
                                            ?>
                                        </span>
                                        <span class="date"><span class="fa fa-paper-clip"></span>
                                        <?php 
                                            $old_date = date($messages[$i][TF_PM_DATE]);            // works
                                            $middle = strtotime($old_date);             // returns bool(false)

                                            $new_date = date("F j, Y - g:i A", $middle);   // returns 1970-01-01 00:00:00

                                            echo $new_date;

                                            ?>
                                        </span>
                                    </div>
                                    <div class="title">
                                        <span class="action"><i class="fa fa-star-o"></i></span>
                                        <?php echo $messages[$i][TF_PM_SUBJECT] ?>
                                    </div>  
                                    <div class="description">
                                        <?php echo $messages[$i][TF_PM_BODY] ?>
                                    </div>
                                    <div style="text-align: right;">
                                        <?php 
                                        if($type != MSG_DELETED)
                                            echo '<a href="'.site_url().'pm/delete/'.$messages[$i][TF_PM_ID].'/'.$type.'"> <i class="fa fa-trash-o"></i> Delete</a>';
                                        else
                                            echo '<a href="'.site_url().'pm/restore/'.$messages[$i][TF_PM_ID].'"> <i class="fa fa-undo" aria-hidden="true"></i> Restore </a>'; 
                                        ?>              
                                    </div>
                                </a>        
                            </li>
                            <hr>
                        <?php else:  ?>
                            <hr>
                            <li class="unread">
                                <a href="<?php echo site_url().'pm/message/'.$messages[$i][TF_PM_ID]; ?>">
                                    <div class="header">
                                        <span class="action"><i class="fa fa-envelope" aria-hidden="true"></i><!-- <i class="fa fa-square-o"></i> --></span> 
                                        <span class="from">
                                            <?php
                                            if($type != MSG_SENT) echo $messages[$i][PM_FULLNAME];
                                            else
                                            {
                                                $recipients = $messages[$i][PM_RECIPIENTS];
                                                foreach ($recipients as $recipient)
                                                    echo (next($recipients)) ? $recipient.', ' : $recipient;
                                            }
                                            ?>

                                        </span>
                                        <span class="date"><span class="fa fa-paper-clip"></span> 
                                        <?php 
                                                $old_date = date($messages[$i][TF_PM_DATE]);            // works
                                                $middle = strtotime($old_date);             // returns bool(false)

                                                $new_date = date("F j, Y - g:i A", $middle);   // returns 1970-01-01 00:00:00

                                                echo $new_date;

                                                ?>
                                            </span>
                                        </div>
                                        <div class="title">
                                            <span class="action"><i class="fa fa-star-o"></i></span>
                                            <?php echo $messages[$i][TF_PM_SUBJECT] ?>
                                        </div>  
                                        <div class="description">
                                            <?php echo $messages[$i][TF_PM_BODY] ?>
                                        </div>
                                        <div style="text-align: right;">
                                            <?php 
                                            if($type != MSG_DELETED)
                                                echo '<a href="'.site_url().'pm/delete/'.$messages[$i][TF_PM_ID].'/'.$type.'"> <i class="fa fa-trash-o"></i> Delete</a>';
                                            else
                                                echo '<a href="'.site_url().'pm/restore/'.$messages[$i][TF_PM_ID].'"> <i class="fa fa-undo" aria-hidden="true"></i> Restore </a>'; 
                                            ?>              
                                        </div>
                                    </a>        
                                </li>
                            <?php endif; ?>


                        <?php endfor;?>

                    <?php else:?>
                        <h1>No messages found.</h1>
                    <?php endif;?> 

                </ul>

            </div>  
    </div>
</div>