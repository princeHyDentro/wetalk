 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({ 
        
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "ajax_enrolled_applicant_list_for_encoder",
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
    

    $('#search_enrolled_applicant').on('keyup' , function(){
        table.search( this.value ).draw();
    });


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

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

// function request(id , string){
//     alert(id);
// }


