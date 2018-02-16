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
                            <div class="collapsible-header white-text task-list-data active" data-id="{{ $task_group['id']}}">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">List of Service </span>
                            </div>

                            <div class="collapsible-body" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s12 m6 l6 ">
                                                <!-- <div class="">
                                                    <i class="material-icons search-icon"> search </i>
                                                </div> -->
                                                <input class="validate" id="search_service" placeholder="Search for (ID ,Service Name)" type='search'>
                                                <!-- <label for="first_name" class="active">First Name</label> -->
                                            </div>

                                        </div>
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="service-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Service Name</th>
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                    <th>Service Description</th>
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
<style type="text/css">
   .input-field.col label{
        font-size: 1.3rem;
   }
   .select-wrapper+label{
        top:-31px;
   }
</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" class="form-horizontal" id="form" name="form">
                    <input name="id" id="user_id" type="hidden" value="">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12 has-error">
                                <label>Service Name<i style="color:red;">*</i></label>
                                <input class="validate" id="service-name" name="service-name" placeholder="Enter First Name Here.." type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="input-field col s12 has-error">
                                <label id="desc" for="service-description">Service Description<i style="color:red;">*</i></label>
                                <textarea id="service-description" name="service-description" class="materialize-textarea"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="padding: 6px;">
                <button class="btn btn-primary " id="btnSave" onclick="save()" type="button">Save</button>
                <button class="btn btn-danger modal-action modal-close"  type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div id="modal_description" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Description</h4>
        <div class="modal-body form-description">

        </div>
    </div>
    <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-green btn-flat"  type="button">Close</button>
    </div>
</div>
<?php require_once(realpath(APPPATH.'views/template/_footer.php')); ?>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/new-js/add_service.js'); ?>"></script>
<script>

function descriptionClick(id){
    $.ajax({
        url : "services/description/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
           $(".form-description").html(data[0]['service_desc']);
           $("#modal_description").modal("open")
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(errorThrown);
        }
    });
}
</script>