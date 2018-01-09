
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {

    dl_table = $('#deleted-staff-table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_list_dl_data",
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
            
        ],
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
});

function reload_delete_table(){
    dl_table.ajax.reload(null,false); //reload datatable ajax 
}

function restore(id){
    if(confirm('Are you sure restore this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "ajax_restore/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('close');
               
                reload_delete_table();
                Materialize.toast('<i class="material-icons">notifications</i> Succesfully Restored!', 3000, 'rounded')
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
 }