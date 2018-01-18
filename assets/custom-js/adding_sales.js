 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_enroll_applicant_list_data",
            "type": "POST",
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
        ],
        dom: '<"toolbar">Bfrtip',
        buttons: [
                    {
                        text: '<i class="fa fa-plus-circle"></i> Add Sales',
                        action: function ( e, dt, node, config ) {
                            add_person();
                        }
                    },
                    {
                        text: '<i class="fa fa-refresh"></i> Reload List',
                        action: function ( e, dt, node, config ) {
                           reload_table();
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                    }
                ]
    });

    $('#admin_search_privilege').on('change' , function(){
        table.search( this.value ).draw();
    });
    $('#search_register_account_by_name').on('keyup' , function(){
        table.search( this.value ).draw();
    });
    $('#admin_search_status').on('change' , function(){
        table.search( this.value ).draw();
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
});
