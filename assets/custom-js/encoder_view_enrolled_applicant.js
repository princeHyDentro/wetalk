 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
    // $('#sales-table').append('<caption style="caption-side: bottom; float:right;">Applicant Data</caption>');
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
        dom: 'Bfrtip',

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
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ],
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
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        },
                        messageTop: 'TLC WETALK REPORT'

                    },
                    {
                        extend: 'copy',
                        text: 'Copy Data',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        },
                       

                    }
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


