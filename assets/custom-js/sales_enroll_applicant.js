 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_enroll_applicant_list_data_ticket",
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
                        text: '<i class="fa fa-plus-circle"></i> Enroll Applicant',
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


    // $('#admin_search_privilege').on('change' , function(){
    //     table.search( this.value ).draw();
    // });
    // $('#search_register_account_by_name').on('keyup' , function(){
    //     table.search( this.value ).draw();
    // });

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
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_enroll').modal("open"); // show bootstrap modal
    $('.modal-title').text('Enroll Applicant Form'); // Set Title to Bootstrap modal title
}


function save_ticket()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "ajax_add_enroll_ticket";
    } else {
        url = "ajax_update";
    }
    var sale_id       = $("#sale-id").val();
    var sales_name    = $("#sales-name").val()
    var services_name = $("#services option:selected").text();
    var services_id   = $("#services").val();
    var encoder_name  = $("#encoder-name option:selected").text();
    var encoder_id    = $("#encoder-name").val();
    var ticket_format = tinyMCE.activeEditor.getContent(); //tinymce.get('#ticket-format').getContent();

    // ajax adding data to database
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
            'ticket-format' : ticket_format
        },
      //  dataType: "JSON",
        success: function(data)
        {	
            console.log(data);
            // if(data.status) //if success close modal and reload ajax table
            // {
            //     $('#modal_form').modal('hide');
            //     reload_table();
            // }
            // else
            // {
            //     for (var i = 0; i < data.inputerror.length; i++) 
            //     {
            //         $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
            //         $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
            //     }
            // }
            // $('#btnSave').text('save'); //change button text
            // $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(errorThrown)
            // alert('Error adding / update data');
            // $('#btnSave').text('save'); //change button text
            // $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

// function save()
// {
//     $('#btnSave').text('saving...'); //change button text
//     $('#btnSave').attr('disabled',true); //set button disable 
//     var url;
 
//     if(save_method == 'add') {
//         url = "ajax_add";
//     } else {
//         url = "ajax_update";
//     }

//     // ajax adding data to database
//     $.ajax({
//         url : url,
//         type: "POST",
//         data: $('#form').serialize(),
//         dataType: "JSON",
//         success: function(data)
//         {	
 
//             if(data.status) //if success close modal and reload ajax table
//             {
//                 $("#modal_enroll").removeClass("in");
// 				$(".modal-backdrop").remove();
//                 $("#modal_enroll").hide();
//                 reload_table();
//             }
//             else
//             {
//                 for (var i = 0; i < data.inputerror.length; i++) 
//                 {
//                     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
//                     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
//                 }
//             }
//             $('#btnSave').text('save'); //change button text
//             $('#btnSave').attr('disabled',false); //set button enable 
 
 
//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error adding / update data');
//             $('#btnSave').text('save'); //change button text
//             $('#btnSave').attr('disabled',false); //set button enable 
 
//         }
//     });
// }



