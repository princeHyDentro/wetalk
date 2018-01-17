 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({ 
        
        "processing": true, 
        "serverSide": true,
        "order": [],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_all_pending_ticket_for_encoder",
            "type": "POST",

        },
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
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
    
    $('#filter-status').on('change' , function(){
        // alert(this.value)
        table.search( this.value ).draw();
    });
    $('#search_tickets').on('keyup' , function(){
        table.search( this.value ).draw();
    });
});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}



