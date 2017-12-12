<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php require_once(APPPATH."views/template/nav.php"); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                </li>
                <li  class="breadcrumb-item active">Compose New Message</li>
            </ol>
            <section id="contact" class="" style="padding-top: 0px;">
                <div class="section-content">
                    <br>
                    <!-- start: Content -->
                    <div class="col-md-10 col-sm-11 main ">
                        <div class="row inbox">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">

                                <div class="panel panel-default">

                                    <div class="panel-body" style="text-align: left;">

                                        <div class="messages-list">
                                            <div class="panel-body message">
                                                <hr>
                                                <p class="text-center">New Message</p>
                                                <form id="contact-form" method="post" action="" class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label for="to" class="col-sm-1 control-label">To:</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="recipients" name="recipients">
                                                                <option value="10">Defaulf</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc" class="col-sm-1 control-label">Subject:</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="privmsg_subject" name="privmsg_subject">
                                                                <option value="NCLEX">NCLEX</option>
                                                                <option value="J1">J1</option>
                                                                <option value="KOREAN">J1</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12 col-sm-offset-1">

                                                        <br>

                                                        <div class="form-group">
                                                            <textarea class="form-control" id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>

                                                        </div>

                                                        <div class="form-group">
                                                            <button type="button" name="btnSend" id="btnSend" value="Send message" class="btn btn-success">Send Message</button>
                                                            <button type="submit" class="btn btn-danger"><a style="color: #fff;  text-decoration: none;" href="http://localhost/wetalk/pm"> Discard </a>
                                                            </button>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </section>
        </div>
    </div>
    <?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>