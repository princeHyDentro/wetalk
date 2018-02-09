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
                                <span class="right">List of Iquired Applicants </span>
                            </div>

                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s12 m12 l12 ">
                                                <label class="active"><h5>Search Field : </h5></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6 ">
                                                <input class="validate" id="applicant_inquire" placeholder="Search for (ID ,Service, Encoder, Applicant, Email ,Date created)" type='search'>
                                            </div>
                                        </div>   
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="inquire-table" width="100%">
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
    
    table = $('#inquire-table').DataTable({ 
        
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo base_url('applicant/get_all_inquire_applicant_ajax');?>",
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
                    {
                        extend: 'print',
                        header: true,
                        footer: false,
                        text: 'Print Report',
                        autoPrint: true,
                        exportOptions: {
                            columns: ':visible',
                        },
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ],
                        },
                        messageTop: function () {
                            return '<div style="text-align:right;"><img src="http://localhost/wetalk/assets/logo/logo2.png" style="height: 56px;margin-top: 5px;" alt="" class="responsive-img valign profile-image-login"></div>';
                        },
                        customize: function (win) {
                            $(win.document.body).find('table').addClass('display').css('font-size', '12px');
                            $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                $(this).css('background-color','#D0D0D0');
                            });
                            
                            $(win.document.body).find('h1').css('text-align','center');
                            $(win.document.body).find('h1').text('TLC WETALK REPORT');
                            $(win.document.body).find('h1').addClass('display').css('font-variant', 'all-petite-caps');
                            $(win.document.body).find('h1').addClass('display').css('font-weight', '500');


                        },
                        messageBottom: null
                    },
                    {
                        extend: 'excel',
                        text: 'Download Excel Report',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ],
                        },
                        messageTop: 'TLC WETALK REPORT'

                    },
                    {
                        extend: 'copy',
                        text: 'Copy Data',
                        exportOptions: {
                           columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ],
                        },
                    }
                ]
    });
    

    $('#applicant_inquire').on('keyup' , function(){
        table.search( this.value ).draw();
    });
});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>