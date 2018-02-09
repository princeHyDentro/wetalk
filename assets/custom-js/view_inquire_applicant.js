 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    
	table = $('#sales-table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        "ajax": {
            "url": "sales_inquire_list",
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

    $('#search_inquire_applicant').on('keyup' , function(){
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


function add_person(){
    
	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_enroll').modal("open"); // show bootstrap modal
    $('.modal-title').text('Enroll Applicant Form'); // Set Title to Bootstrap modal title
}


function save(){

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "ajax_add_enroll";
    } else {
        url = "ajax_update";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {	
 
            if(data.status)
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
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

function reload_table(){
    table.ajax.reload(null,false);
}


