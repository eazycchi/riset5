var baseUrl ="http://localhost/riset5";

//Ajax Detail App
$('.app_detail').on('click', function() {
    var appID = $(this).attr("data-id");
    var url = '/riset5/api/ajax_edit';  //adjust according to your site/setup

    $.post(url,
        {
            id: appID,
        },
        function (data, status) {
            if (status == 'success') {
                data = $.parseJSON(data);
                $('#staticBackdropApp').modal('show');          
                $('#staticBackdropApp').attr('data-id',data.id);
                $('#nama_app').text(data.nama_app);
                $('#deskripsi_app').text(data.deskripsi);
                $('#username_app').text(data.Uid);
                $('#redirect_app').text(data.redirect);
                $('#date_app').text(data.req_date);
                
                switch(data.status){
                    case 'review': $('#status_app').text('Waiting for review');break;
                    case 'diterima': $('#status_app').text('Accepted');break;
                    case 'ditolak': $('#status_app').text('Rejected');break;
                };        

            } else {
                alert('No message available');
            }
        },
    );
});

//ajax delete
$('.btn_cancel').on('click', function(){
    var url = '/riset5/api/delete'
    var appID = $('#staticBackdropApp').attr("data-id");
    if(confirm('Cancel request?')){
        $.post(url,{
            id_app: appID
        },
        function(data, status){
            if (status == 'success') alert('request dihapus!');
            else alert('gagal dihapus');
            $(location).attr('href', baseUrl+'/api');    
        })

    } else {
        $(location).attr('href', baseUrl+'/api');

    }    
})
