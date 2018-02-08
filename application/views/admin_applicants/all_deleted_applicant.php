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
                                <span class="right">List of Deleted Applicants </span>
                            </div>

                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                       <div class="row">
                                            <div class="input-field col s12 m12 l12 ">
                                                <label class="active"><h5>Search Field : </h5></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6 ">
                                                <input class="validate" id="applicant_deleted" placeholder="Search for (ID ,Service, Encoder, Applicant, Email ,Date deleted)" type='search'>
                                            </div>
                                        </div>   
                                    </li>   
                                   <div class="table-responsive">
                                       <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="deleted-table" width="100%">
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
<script>
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
    table = $('#deleted-table').DataTable({ 
        
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo base_url('applicant/get_all_deleted_applicant_ajax');?>",
            "type": "POST",

        },
        "columnDefs": [
            { 
                "targets": [ -1 ],
                "orderable": false,
            },
        ],
        dom: '<"toolbar">Bfrtip',
        buttons: [
                    {
                        text: '<i class="fa fa-refresh"></i> Reload List',
                        action: function ( e, dt, node, config ) {
                           reload_table();
                        }
                    },
                ]
    });
    

    $('#applicant_deleted').on('keyup' , function(){
        table.search( this.value ).draw();
    });


});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}


function restore(id){
    swal({
        title: "Are you sure restore this data?",
        text: "Once restored, you will not see this applicant on deleted page!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
                $.ajax({
                    url : "<?php echo base_url('applicant/ajax_restore_applicant');?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        swal("Poof! Applicant data has been restored!", {
                            icon: "success",
                        });
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
           
        } else {
            swal("Restore action has been cancelled!");
        }
    });
}
</script>