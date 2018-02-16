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
                                                <input class="validate" id="search_register_account_by_name" placeholder="Search for (ID ,Full Name , Username , Email , Roles)" type='search'>
                                                <!-- <label for="first_name" class="active">First Name</label> -->
                                            </div>
                                        </div>
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="dlservice-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Service Name</th>
                                                    <th>Service Desc</th>
                                                    <th>Date Deleted</th>
                                                    <th>Restore</th>
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
<script src="<?php echo base_url('assets/new-js/restore_service.js'); ?>"></script>