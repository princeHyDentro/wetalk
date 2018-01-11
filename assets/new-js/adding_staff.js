 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
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
                    
                ]

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
    //$('#form')[0].reset(); // reset form on modals
    var form = document.getElementById("form");
    clearForm(form);
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('open'); // show bootstrap modal
    $('.modal-title').text('Add Staff'); // Set Title to Bootstrap modal title
}

function clearForm(frm_elements){

    for (i = 0; i < frm_elements.length; i++)
    {
        field_type = frm_elements[i].type.toLowerCase();
        
        switch (field_type)
        {
            case "text":
            case "password":
            case "textarea":
            // case "hidden":
            case "email":
            frm_elements[i].value = "";
            break;
            case "radio":
            case "checkbox":
            if (frm_elements[i].checked)
            {
                frm_elements[i].checked = false;
            }

            break;
            case "select-one":
            case "select-multi":
            frm_elements[i].selectedIndex = -1;
            break;
            default:
            break;
        }
    }
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
    var unselected;

    url = "ajax_add";
    

    if($('#permission').val() == "office-admin"){
        $.ajax({
            url : "ajax_add_all",
            type: "POST",
            data: {
                //'form' : $('#form').serialize() ,
                'id'            : $('#user_id').val(),
                'user_fname'    : $('#user_fname').val(),
                'user_lname'    : $('#user_lname').val(),
                'user_mname'    : $('#user_mname').val(),
                'user_username' : $('#user_username').val(),
                'user_password' : $('#user_password').val(),
                'user_email'    : $('#user_email').val(),
                'permission'    : $('#permission').val(),
            },
            dataType: "JSON",
            success: function(data)
            {   
     
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('close');
                    reload_table();
                    if(save_method == 'add') {
                        Materialize.toast('<i class="material-icons">notifications</i> Succesfully Added!', 3000, 'rounded')
                    } else {
                        Materialize.toast('<i class="material-icons">notifications</i> Succesfully Updated!', 3000, 'rounded')
                    }
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
    }else{
        var checkValues  = $('#services option:selected').map(function(){
                data = {
                        'service_id' : $(this).val(),
                        'primary_id' : $(this).attr('data-id')
                    }
                return data;
        }).get();


        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: {
                //'form' : $('#form').serialize() ,
                'id'            : $('#user_id').val(),
                'user_fname'    : $('#user_fname').val(),
                'user_lname'    : $('#user_lname').val(),
                'user_mname'    : $('#user_mname').val(),
                'user_username' : $('#user_username').val(),
                'user_password' : $('#user_password').val(),
                'user_email'    : $('#user_email').val(),
                'permission'    : $('#permission').val(),
                'services'      : checkValues,
            },
            dataType: "JSON",
            success: function(data)
            {   
     
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('close');
                    reload_table();
                    if(save_method == 'add') {
                        Materialize.toast('<i class="material-icons">notifications</i> Succesfully Added!', 3000, 'rounded')
                    } else {
                        Materialize.toast('<i class="material-icons">notifications</i> Succesfully Updated!', 3000, 'rounded')
                    }
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
                Materialize.toast('<i class="material-icons">notifications</i> Succesfully Deleted!', 3000, 'rounded')
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}