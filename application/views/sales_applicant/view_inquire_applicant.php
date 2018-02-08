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
.collection{
    padding-bottom: 22px;
}
.error{
    font-style: oblique;
    color: red;
}
</style>

<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>

<main>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col s12">
                <div class="panel panel-default">
                    <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                        <li class="active">
                            <div class="collapsible-header teal white-text task-list-data active" data-id="{{ $task_group['id']}}">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">Enroll Applicant List</span>
                            </div>
                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s12 m12 l12 ">
                                                <label class="active"><h5>Search Field : </h5></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6 ">
                                                <input class="validate" id="search_inquire_applicant" placeholder="Search for (ID ,Service, Encoder, Applicant, Email ,Date created)" type='search'>
                                            </div>
                                        </div> 
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="sales-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Applicant Name</th>
                                                    <th>Encoded By</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Action</th>
                                                    <th>Request Status</th>
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
<script src="<?php echo base_url('assets/custom-js/view_inquire_applicant.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/button-dropdown.js'); ?>"></script>
<script>
$(document).on("click",".applicant-delete",function(event) {
    event.preventDefault();
    var applicant_id         = $(this).attr('data-id');
    var requestor_ticket_id  = $(this).attr('requestor-id');

    swal({
      title: "Are you sure?",
      text: "Once deleted, only the administrator can restore the applicant data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    
    .then((willDelete) => {
        if (willDelete) {
            soft_delete_applicant_data(applicant_id , requestor_ticket_id);
        } else {
            swal({
                 title: "Applicant data is safe!",   
                    text: "I will close in 3 seconds.",   
                    timer: 3000,  
                    icon: "success", 
                    type: "success",
                    showConfirmButton: false 
            });
        }
    });
});

function soft_delete_applicant_data(applicant_id, requestor_ticket_id){
    var url             = "<?php echo base_url('ticket/soft_delete_applicant_data'); ?>"; 
    $.ajax({
        url : url,
        type: "POST",
        data:{
            'applicant_id'          : applicant_id,
            'requestor_ticket_id'   : requestor_ticket_id,
        },
        success: function(data)
        {   
            swal({   
                    title: "Poof! Applicant has been deleted!",   
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
            //console.log(errorThrown)
            swal("Error deleting data!", {
                icon: "success",
            });
        }
    });
    
}
</script>