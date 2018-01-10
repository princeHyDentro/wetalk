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

<main>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col s12">
                <div class="panel panel-default">
                    <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                        <li class="active">
                            <div class="collapsible-header teal white-text task-list-data active">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">List of Enrolled Applicants </span>
                            </div>

                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                    	<center><h5>Page Under Construction!</h5></center>
                                        <!-- <div class="row">
                                            <div class="input-field col s12 m6 l6 ">
                                                
                                                <input class="validate" id="search_service" placeholder="Search for (ID ,Service Name)" type='search'>
                                            
                                            </div>

                                        </div> -->
                                    </li>   
                                   <div class="table-responsive">
                                        <!-- <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="service-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Ticket ID</th>
                                                    <th>Requestor Name</th>
                                                    <th>Subject By Service</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table> -->
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