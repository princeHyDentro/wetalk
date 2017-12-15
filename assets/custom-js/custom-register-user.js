
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    $('#deleted-staff-table').DataTable({ 
        
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
    

    table = $('#staff-table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_list_data",
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
                        text: '<i class="fa fa-plus-circle"></i> Add Staff',
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
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],

    });
    
    // $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');

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
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('open'); // show bootstrap modal
    $('.modal-title').text('Add Staff'); // Set Title to Bootstrap modal title
}
 
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            // if( data.user_rights == "J1") {
            //     $( ".permission1" ).prop( "checked", true );
            // }else if(data.user_rights == "Nursing"){
            //     $( ".permission2" ).prop( "checked", true );
            // }else if(data.user_rights == "KBL"){
            //     $( ".permission3" ).prop( "checked", true );
            // }else if(data.user_rights == "Admin"){
            //     $( ".permission4" ).prop( "checked", true );
            // }

            $('[name="id"]').val(data.id);
            $('[name="user_fname"]').val(data.fname);
            $('[name="user_lname"]').val(data.lname);
            $('[name="user_mname"]').val(data.middle);
            $('[name="user_username"]').val(data.username);
            $('[name="user_email"]').val(data.email);
            $('#permission').find('option[value="'+data.roles+'"]').prop('selected', true);
            console.log(data)
            //$('#assign-to-company').find('option[value="'+companyID+'"]').prop('selected', true);
            $("#permission").material_select();

            $('#modal_form').modal('open'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Staff'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "ajax_add";
    } else {
        url = "ajax_update";
    }

    var checkValues = $('#services option:selected').map(function(){
                    return $(this).val();
                }).get();

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {
            //'form' : $('#form').serialize() ,
            'user_fname'    : $('#user_fname').val(),
            'user_lname'    : $('#user_lname').val(),
            'user_mname'    : $('#user_mname').val(),
            'user_username' : $('#user_username').val(),
            'user_password' : $('#user_password').val(),
            'user_email'    : $('#user_email').val(),
            'permission'    : $('#permission').val(),
            'services' : checkValues
        },
        dataType: "JSON",
        success: function(data)
        {	
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('close');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_person(id){
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('close');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
