 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "sales_ticket_for_enroll",
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
                        text: '<i class="fa fa-plus-circle"></i> New Ticket',
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


    $('#filter-status').on('change' , function(){
        // alert(this.value)
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
    var form = document.getElementById("form");
    clearForm(form);
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_enroll').modal("open");
    $('.modal-title').text('Create Applicant Ticket');
}


function save_ticket()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
   
    var url           = "ajax_add_enroll_ticket";
    var sale_id       = $("#sale-id").val();
    var sales_name    = $("#sales_name").val()
    var services_name = $("#services option:selected").text();
    var services_id   = $("#services").val();
    var encoder_name  = $("#encoder_name option:selected").text().split("||")[0];
    var encoder_id    = $("#encoder_name").val();
    var applicant_name    = $("#applicant_name").val();
    var ticket_format = tinyMCE.activeEditor.getContent(); //tinymce.get('#ticket-format').getContent();

    $.ajax({
        url : url,
        type: "POST",
        data: {
            'sale-id'       : sale_id,
            'sales-name'    : sales_name,
            'services_name' : services_name,
            'services_id'   : services_id,
            'encoder-name'  : encoder_name,
            'encoder-id'    : encoder_id,
            'ticket-format' : ticket_format,
            'applicant-name': applicant_name
        },
        success: function(data)
        {	
            if(data)
            {
                $('#modal_enroll').modal('close');
                reload_table();
                Materialize.toast('<i class="material-icons">notifications</i> Succesfully Added!', 3000, 'rounded')
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

function clearForm(frm_elements){

    for (i = 0; i < frm_elements.length; i++)
    {
        field_type = frm_elements[i].type.toLowerCase();
        
        switch (field_type)
        {
            // case "text":
            // case "password":
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
