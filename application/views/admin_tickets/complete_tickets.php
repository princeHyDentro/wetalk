<style type="text/css" media="screen">
	.search-icon{
		position           : absolute;
		padding-top        : 9px;
		text-decoration    : none;
		color              : #fff;
		background-color   : #26a69a;
		text-align         : center;
		letter-spacing     : .5px;
		-webkit-transition : .2s ease-out;
		transition         : .2s ease-out;
		cursor             : pointer;
		padding-left       : 5px;
		padding-bottom     : 7px;
		border-top-left-radius: 4px;
		border-bottom-left-radius: 4px;
	}   
	.filter{
		margin-left        : 30px;
	}
	th{
		width: auto !important;
	}
	.dataTables_filter{
		display: none !important;
	}
	span.badge.new {
		font-weight: 300;
		font-size: 0.8rem;
		color: #fff;
		background-color: #26a69a;
		border-radius: 2px;
		float: left;
	}
        /* bootstrap dropdown button */
.grouped-button{
    position: relative;
    display: inline-block;
    vertical-align: middle;
}

.grouped-button>.btn:first-child {
    margin-left: 0;
}
.grouped-button>.button {
    position: relative;
    float: left;
}

.button{
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.button-default{
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.grouped-button>.button+.dropdown-toggle {
    padding-right: 8px;
    padding-left: 8px;
}
.grouped-button>.button:first-child:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.grouped-button>.button:last-child:not(:first-child), .grouped-button>.dropdown-toggle:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.grouped-button .button+.button, .grouped-button .button+.grouped-button, .grouped-button .grouped-button+.button, .grouped-button .grouped-button+.grouped-button {
    margin-left: -1px;
}
.button .caret {
    margin-left: 0;
}

.button-dropdown-menu{
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.button-dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}
.button-dropdown-menu .divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #e5e5e5;
}
.caret > .material-icons{
    font-size: 18px !important;
}
.open>.button-dropdown-menu {
    display: block;
}
.button{
    outline: none;
    background-color: #fff !important;
}
.c
</style>

<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>

<main>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col s12">
                <div class="panel panel-default">
                    <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                        <li class="active">
                            <div class="collapsible-header white-text task-list-data active">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">List of Completed Tickets </span>
                            </div>

                            <div class="collapsible-body" style="display: none;">
                                <ul class="collection">
  
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="admin-complete-ticket-table" width="100%">
                                            <thead>
                                                <tr>
                                                     <th>Ticket ID</th>
                                                    <th>Requestor Name</th>
                                                    <th>Subject By Service</th>
                                                    <th>Applicant</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Request Type</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/new-js/admin_ticket_complete.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/button-dropdown.js'); ?>"></script>

<script>
    $(document).on('click', '.change-status', function(event) {
        event.preventDefault();

        var applicant_id = $(this).attr('applicant-id');
        var requestor_id = $(this).attr('requestor-id');
        var ticket_id    = $(this).attr('ticket-id');
        var request_for  = $(this).attr('request-for');

        $("#applicant-id").attr('applicant_id', applicant_id);
        $("#requestor-id").attr('requestor_id', requestor_id);
        $("#ticket-id").attr('ticket_id', ticket_id);
        $("#request-for-type").attr('request_for_type', request_for);

        swal({
            title: "Are you sure?",
            text: "Once changed, the data will move back to pending page!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var url             = "<?php echo base_url('ticket/roll_back_ticket'); ?>"; 
                $.ajax({
                    url : url,
                    type: "POST",
                    data:{
                        'ticket_id'     : ticket_id,
                        'applicant_id'  : applicant_id,
                        'requestor_id'  : requestor_id,
                        'request_for'   : request_for
                    },
                    success: function(data)
                    {   
                        swal({   
                                title: "Ticket request has been moved back to pending page!",   
                                text: "I will close in 2 seconds.",   
                                timer: 2000,  
                                icon: "success", 
                                type: "success",
                                showConfirmButton: false 
                        })
                        .then(function() {
                               reload_table();
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Error deleting data!", {
                            icon: "success",
                        });
                    }
                });
            } else {
                swal("No change being made.");
            }
        });
    });
</script>