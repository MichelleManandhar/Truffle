$(document).on('click','.view-member-birthday',function (e) {
    e.preventDefault();
    $.ajax({
        type : 'POST',
        url  : baseUrl+'/member/birthdays',
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            var content = '';
            
            $.each(res.birthdays,function (i,member) {
                content +=  '<tr id="tr-'+member.id+'">'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+member.name+'</td>'+
                                '<td>'+member.date_of_birth+'</td>'+
                            '</tr>';
            });

            $table = $('.member-birthday-list');
            $table.dataTable().fnDestroy();
            $table.find('tbody').html(content);
            $table.dataTable({ "bDestroy": true });

            $table.find('tbody').find('tr').each(function () {
                var $this = $(this);
                $.each(res.birthdays,function (i,member) {
                    if(+member.birthday_coming > 0 && "tr-"+member.id === $this.attr('id')) {
                        $this.addClass("bg-red-600 color-white");
                    }
                });
            });

            $('.modal-view-member-birthday').modal('show');
        }
    });
});