$(document).ready(function() {
    $('.forms_selection').val('Perday-Form');
    $('.forms_selection').on('change', function() {

        $value = $(this).val();
        if ($value == "Party-Form") {
            $('.perday-form').hide();
            $('.thekedar-form').hide();
            $('.office-form').hide();
            $('.party-form').fadeIn(500);
        }

        if ($value == "Perday-Form") {
            $('.party-form').hide();
            $('.thekedar-form').hide();
            $('.office-form').hide();
            $('.perday-form').fadeIn(500);
        }
        if ($value == "Thekedar-Form") {
            $('.party-form').hide();
            $('.perday-form').hide();
            $('.office-form').hide();
            $('.thekedar-form').fadeIn(500);
        }

        if ($value == "Office-Form") {
            $('.party-form').hide();
            $('.perday-form').hide();
            $('.thekedar-form').hide();
            $('.office-form').fadeIn(500);
        }

    });
    $(".form-horizontal1").submit(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'home1',
            data: $(this).serialize(),
            success: function(data) {
                if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
                $('#party_total').hide();
                $('.recieve_total').hide();
                $('.party_header_total').hide();
                 $('.party_searchs').html('');
                 $('.perdaytable1').addClass('single_data');
                 $('.perdaytable1').removeClass('party_searchs');
                $('.submit').prop("disabled", false);
                if (data.errors) {
                    if (data.errors.plot) {
                        alert('Error:Add Plot');
                        return false;
                    }
                    if (data.errors.client_name) {
                        alert('Add Name' + data.client_name);
                        return false;
                    }
                } else {
                    
                    $('.party_hid').css('display', 'block');
                    $('.perdaytable1').append(
                        '<tr>' +

                        '<td class=id'+data.id+'>' + data.id + '</td>' +
                        '<td class=plot'+data.id+'>' + data.plot + '</td>' +
                        '<td class=client_name'+data.id+'>' + data.client_name + '</td>' +
                        '<td class=payment_recieve'+data.id+'>' + data.payment_recieve + '</td>' +
                        '<td class=donation'+data.id+'>' + data.donation + '</td>' +
                        '<td class=reason'+data.id+'>' + data.reason + '</td>' +
                        '<td class=feedback'+data.id+'>' + data.feedback + '</td>' +
                        '<td class=total_payment'+data.id+'>' + data.total_payment + '</td>' +
                        '<td class=date'+data.id+'>' + data.date + '</td>' +
                        '<td class="dispare">' +
                        '<a href="home/shows/' + data.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="fas fa-eye">' +
                        '</i></a>' +
                        '<a class="editperday"' +
                        'title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                        '<a href="home/deletes/' + data.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +
                        '</td></tr>'
                    );
                    toastr.success('Success');
                }
                $('.editperday').click(function() {
                        // alert(val.Date);return false;s
                        $('#party_form').hide();
                        $('.edit_party').show();
                        $('.update_id').val(data.id);
                        $('.update_client_name').val(data.client_name);
                        $('.update_pltno').val(data.plot);
                        $('.update_payment_recieve').val(data.payment_recieve);
                        $('.update_reason').val(data.reason);
                        $('.update_feedback').val(data.feedback);
                        $('.update_date').val(data.date);
                        $('.update_total_payment').val(data.total_payment);
                        // $('.id'+data.id).css('background-color','yellow');
                        // $('.plot'+data.id).css('background-color','yellow');
                        // $('.client_name'+data.id).css('background-color','yellow');
                        // $('.total_payment'+data.id).css('background-color','yellow');
                        // $('.payment_recieve'+data.id).css('background-color','yellow');
                        // $('.date'+data.id).css('background-color','yellow');
                    });
            },
        });
    });

    $('.per_search').submit(function(e) {

        e.preventDefault();

        $('#perday_tbl').DataTable().destroy();
        $.ajax({
            type: 'post',
            url: 'search',
            data: $(this).serialize(),
            success: function(data) {

                // alert(data.success);
                // return false;

                // $('.perdaytable').html('');
        $('.single_data').html('');
        $('.perday_searchs').html('');
        $('.perdaytables').addClass('perday_searchs');
        $('.perdaytables').removeClass('single_data');
                $.each(data.success, function(key, val) {
                    $('.perdaytables').append(
                        '<tr>' +
                        '<td class=id'+val.id+'>' + val.id + '</td>' +
                        '<td class=PlotNo'+val.id+'>' + val.PlotNo + '</td>' +
                        '<td class=Items'+val.id+'>' + val.Items + '</td>' +
                        '<td class=Quantity'+val.id+'>' + val.Quantity + '</td>' +
                        '<td class=Date'+val.id+'>' + val.Date + '</td>' +
                        '<td class=Price'+val.id+'>' + val.Price + '</td>' +
                        '<td class"perday_hid dispare">' +
                        '<a href="home/show/' + val.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="fas fa-eye">' +
                        '</i></a>' +
                        '<a  class="editperday' + val.id + '" title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                        '<a href="home/delete/' + val.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +

                        '</td></tr>'

                    );
                    $('.editperday' + val.id).click(function() {
                        // alert(val.Date);return false;s
                        $('#perday_form').hide();
                        $('.edit_perday').show();
                        $('.update_id').val(val.id);
                        $('.update_Items').val(val.Items);
                        $('.update_pltno').val(val.PlotNo);
                        $('.update_quantityy').val(val.Quantity);
                        $('.update_datee').val(val.Date);
                        $('.update_pricee').val(val.Price);
                        // $('td').css('background-color','white');
                        // $('.id'+val.id).css('background-color','yellow');
                        // $('.PlotNo'+val.id).css('background-color','yellow');
                        // $('.Items'+val.id).css('background-color','yellow');
                        // $('.Quantity'+val.id).css('background-color','yellow');
                        // $('.Date'+val.id).css('background-color','yellow');
                        // $('.Price'+val.id).css('background-color','yellow');
                    });
                });
                // $('.dataTables_empty').css('display', 'none');
                $('#perday_tbl').DataTable();
                $('#search_total').html(data.total);
                $('#add_total').html('');
                $('.perday_table').css('border', '1px solid blue');
                $('.perday_print').show();
                $('.perday_action').show();

                $('.perday_print').click(function() {
                    window.print();
                });
                // $('.perdaytables').append(

                //     '<tr>' +
                //     '<td></td>' +
                //     '<td></td>' +
                //     '<td></td>' +
                //     '<td></td>' +
                //     '<td></td>' +
                //     '<td></td>' +
                //     '<td>' +

                //     '</td></tr>'

                // );
                $('.header_total').html('Total:' + data.total);


            },

        });

    });

    $('.party_search').submit(function(e) {

        e.preventDefault();
        $('#party_table').DataTable().destroy();
        $.ajax({
            type: 'post',
            url: 'searchs',
            data: $(this).serialize(),
            success: function(data) {
                 $('.single_data').html('');
                 $('.party_searchs').html('');
                 $('.perdaytable1').addClass('party_searchs');
                 $('.perdaytable1').removeClass('single_data');
                


                $.each(data.success, function(key, val) {

                    $('.perdaytable1').append(

                        '<tr>' +

                        '<td class=id'+val.id+'>' + val.id + '</td>' +
                        '<td class=plot'+val.id+'>' + val.plot + '</td>' +
                        '<td class=client_name'+val.id+'>' + val.client_name + '</td>' +
                        '<td class=payment_recieve'+val.id+'>' + val.payment_recieve + '</td>' +
                        '<td class=donation'+val.id+'>' + val.donation + '</td>' +
                        '<td class=reason'+val.id+'>' + val.reason + '</td>' +
                        '<td class=feedback'+val.id+'>' + val.feedback + '</td>' +
                        '<td class=total_payment'+val.id+'>' + val.total_payment + '</td>' +
                        '<td class=date'+val.id+'>' + val.date + '</td>' +
                        '<td class="party_hids dispare">' +
                        '<a href="home/shows/' + val.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="fas fa-eye">' +
                        '</i></a>' +
                        '<a  class="editperday' + val.id + '"' +
                        'title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                        '<a href="home/deletes/' + val.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +
                        '</td></tr>'

                    );
                    $('.party_hid').css('display', 'none');
                    $('.editperday' + val.id).click(function() {
                        // alert(val.Date);return false;s
                        $('#party_form').hide();
                        $('.edit_party').show();
                        $('.update_id').val(val.id);
                        $('.update_client_name').val(val.client_name);
                        $('.update_pltno').val(val.plot);
                        $('.update_payment_recieve').val(val.payment_recieve);
                        $('.update_reason').val(val.reason);
                        $('.update_feedback').val(val.feedback);
                        $('.update_date').val(val.date);
                        $('.update_total_payment').val(val.total_payment);
                        // $('.id'+val.id).css('background-color','yellow');
                        // $('.plot'+val.id).css('background-color','yellow');
                        // $('.client_name'+val.id).css('background-color','yellow');
                        // $('.total_payment'+val.id).css('background-color','yellow');
                        // $('.payment_recieve'+val.id).css('background-color','yellow');
                        // $('.date'+val.id).css('background-color','yellow');
                    });
                });
                $('#party_table').DataTable();
                // $('#party_total').html(

                //              '<tr>'+
                //                   '<td></td>'+
                //                   '<td></td>'+
                //                   '<td>Payment Recieve</td>'+
                //                   '<td>'+data.total_amount+'</td>'+
                //                   '<td></td>'+
                //                   '<td>'+
                //                  '</td>'+
                //                   '<td class="party_hid">'+

                //                   '</td></tr>'

                //   );
                $('.party_span').show();
                $('.party_print').show();
                $('.party_action').show();
                $('#party_total').html('Total:' + data.total);
                $('.recieve_total').html('Total:' + data.total_amount);
                $('.party_header_total').html('Remaining:' + data.remaining);
                $('.party_action').click(function() {
                    $('.party_hid').show();
                });
                $('.party_print').click(function() {
                    window.print();
                });


            },
        });
    });


$( ".edit_party").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',

        url:'party_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
            if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
            $('.plot'+data.data.id).html(data.data.plot);
            $('.client_name'+data.data.id).html(data.data.client_name);
            $('.payment_recieve'+data.data.id).html(data.data.payment_recieve);
            $('.donation'+data.data.id).html(data.data.donation);
            $('.reason'+data.data.id).html(data.data.reason);
            $('.feedback'+data.data.id).html(data.data.feedback);
            $('.date'+data.data.id).html(data.data.date);
            $('.total_payment'+data.data.id).html(data.data.total_payment);
            $('.party_header_total').html('Remaining:'+data.remaining);
            $('.recieve_total').html('Total:'+data.total);
            $('#party_total').html('Total:'+data.total_payment);
            $('#total').html('Total:'+data.total);
            $('td').css('background-color','white');
            toastr.success('Updated');
        },
        
    });

 });

    // Thekedar Ajax


    $('.thekedar_search').submit(function(e) {

        e.preventDefault();
        $('#thekedar_table').DataTable().destroy();
        $.ajax({
            type: 'post',
            url: 'searches',
            data: $(this).serialize(),
            success: function(data) {
                 $('.single_data').html('');
                 $('.thekedar_searchs').html('');
                 $('.perdaytable2').addClass('thekedar_searchs');
                 $('.perdaytable2').removeClass('single_data');

                $.each(data.data, function(key, val) {
                    $('.perdaytable2').append(

                        '<tr>' +

                        '<td class=id'+val.id+'>' + val.id + '</td>' +
                        '<td class=plots'+val.id+'>' + val.plots + '</td>' +
                        '<td class=thekedar_name'+val.id+'>' + val.thekedar_name + '</td>' +
                        '<td class=payments_recieve'+val.id+'>' + val.payments_recieve + '</td>' +
                        '<td class=totals_payment'+val.id+'>' + val.totals_payment + '</td>' +
                        '<td class=dates'+val.id+'>' + val.dates + '</td>' +
                        '<td class="party_hid dispare">' +
                        '<a href="home/showss/' + val.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="fas fa-eye">' +
                        '</i></a>' +
                        '<a  class="editperday' + val.id + '" title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                       '<a href="home/deletess/' + val.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +
                        '</td></tr>'

                    );
                    if(data.data.length>0){
                        $('.thekedar_print').show();
                    }

                    $('.editperday'+val.id).click(function() {
                        // alert(val.Date);return false;s
                        $('.thekedar-forms').hide();
                        $('.edit_thekedar').show();
                        $('.update_id').val(val.id);
                        $('.update_thekedar_name').val(val.thekedar_name);
                        $('.update_pltno').val(val.plots);
                        $('.update_payments_recieve').val(val.payments_recieve);
                        $('.update_dates').val(val.dates);
                        $('.update_totals_payment').val(val.totals_payment);
                        $('.id'+val.id).css('background-color','yellow');
                        $('.plots'+val.id).css('background-color','yellow');
                        $('.thekedar_name'+val.id).css('background-color','yellow');
                        $('.totals_payment'+val.id).css('background-color','yellow');
                        $('.payments_recieve'+val.id).css('background-color','yellow');
                        $('.dates'+val.id).css('background-color','yellow');
                    });
                });
                $('#thekedar_table').DataTable();
                $('.thekedar_print').click(function(){
                    window.print();
                });
                $('.thekedar_header_total').html('Remainig:' + data.total);
                $('#total_payment').html('Total:' + data.total_amount);
                $('#total_recieve').html('Total:' + data.total_recieve);
            },
        });
    });
    $(".thekedar-forms").submit(function(e) {
        // alert('asd');
        // return false;
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'searchees',
            data: $(this).serialize(),
            success: function(data) {
               if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
                $('.thekedar_header_total').hide();
                $('#total_payment').hide();
                $('#total_recieve').hide();
                 $('.thekedar_searchs').html('');
                 $('.perdaytable2').addClass('single_data');
                 $('.perdaytable2').removeClass('thekedar_searchs');
                if (data.errors) {
                    if (data.errors.plots) {
                        alert('Error:Add Plot');
                        return false;
                    }
                    if (data.errors.thekedar_name) {
                        alert('Add Name' + data.thekedar_name);
                        return false;
                    }
                } else {
                    $('.perdaytable2').append(
                        '<tr>' +

                        '<td class=id'+data.id+'>' + data.id + '</td>' +
                        '<td class=plots'+data.id+'>' + data.plots + '</td>' +
                        '<td class=thekedar_name'+data.id+'>' + data.thekedar_name + '</td>' +
                        '<td class=payments_recieve'+data.id+'>' + data.payments_recieve + '</td>' +
                        '<td class=totals_payment'+data.id+'>' + data.totals_payment + '</td>' +
                        '<td class=dates'+data.id+'>' + data.dates + '</td>' +
                        '<td class="dispare">' +
                        '<a href="home/showss/' + data.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="fas fa-eye">' +
                        '</i></a>' +
                        '<a  class="editperday" title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                       '<a href="home/deletess/' + data.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +
                        '</td></tr>'

                    );
                    toastr.success('Success');

                }
                $('.editperday').click(function() {
                        // alert(val.Date);return false;s
                        $('.thekedar-forms').hide();
                        $('.edit_thekedar').show();
                        $('.update_id').val(data.id);
                        $('.update_thekedar_name').val(data.thekedar_name);
                        $('.update_pltno').val(data.plots);
                        $('.update_payments_recieve').val(data.payments_recieve);
                        $('.update_datee').val(data.dates);
                        $('.update_totals_payment').val(data.totals_payment);
                        $('.id'+data.id).css('background-color','yellow');
                        $('.plots'+data.id).css('background-color','yellow');
                        $('.thekedar_name'+data.id).css('background-color','yellow');
                        $('.totals_payment'+data.id).css('background-color','yellow');
                        $('.payments_recieve'+data.id).css('background-color','yellow');
                        $('.dates'+data.id).css('background-color','yellow');
                    });
            },
        });
    });

$( ".edit_thekedar").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',

        url:'thekedar_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
            if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
            $('.plots'+data.data.id).html(data.data.plots);
            $('.thekedar_name'+data.data.id).html(data.data.thekedar_name);
            $('.payments_recieve'+data.data.id).html(data.data.payments_recieve);
            $('.dates'+data.data.id).html(data.data.dates);
            $('.totals_payment'+data.data.id).html(data.data.totals_payment);
            $('.thekedar_header_total').html('Remainig:'+data.remaining);
            $('#total_recieve').html('Total:'+data.total);
            $('#total_payment').html('Total:'+data.total_payment);
            $('#total').html('Total:'+data.total);
            $('td').css('background-color','white');
            toastr.success('Updated');
        },
        
    });

 });

    // Office Ajax

    $('.office_search').submit(function(e) {

        e.preventDefault();
        $('#office_table').DataTable().destroy();
        $.ajax({
            type: 'post',
            url: 'office_search',
            data: $(this).serialize(),
            success: function(data) {
                // alert(data.success);
                // return false;

                $('.office_perdaytable2').html('');
                $('.office_perdaytable21').html('');

                $.each(data.data, function(key, val) {
                    $('.office_perdaytable2').append(

                        '<tr>' +

                        '<td class=id'+val.id+'>' + val.id + '</td>' +
                        '<td class=expense'+val.id+'>' + val.expense + '</td>' +
                        '<td class=amount'+val.id+'>' + val.amount + '</td>' +
                        '<td class=dates'+val.id+'>' + val.dates + '</td>' +
                        '<td class="party_hid dispare">' +
                        '<a href="home/showss/' + val.id + '" class="delete" title="Show"' +
                        'data-toggle="tooltip"><i class="material-icons">&#xE417;' +
                        '</i></a>' +
                        '<a class="editperday' + val.id + '"' +
                        'title="Edit"' +
                        'data-toggle="tooltip"><i' +
                        ' class="fas fa-pencil-alt"></i></a>' +
                        '<a href="home/deletess/' + val.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="fas fa-trash">' +
                        '</i></a>' +
                        '</td></tr>'

                    );
                    $('.editperday'+val.id).click(function() {
                        // alert(val.Date);return false;s
                        $('.office-forms').hide();
                        $('.edit_office').show();
                        $('.update_id').val(val.id);
                        $('.update_expense').val(val.expense);
                        $('.update_amount').val(val.amount);
                        $('.update_dates').val(val.dates);
                        $('.id'+val.id).css('background-color','yellow');
                        $('.expense'+val.id).css('background-color','yellow');
                        $('.amount'+val.id).css('background-color','yellow');
                        $('.dates'+val.id).css('background-color','yellow');
                        
                    });
                });
                $('#office_table').DataTable();
                $('.office_perdaytable2').append(

                    '<tr>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td class="party_hid">' +

                    '</td>' +
                    '</tr>'

                );
                $('.office_header_total').html('Total:' + data.total);
            },
        });
    });
    $(".office-forms").submit(function(e) {
        // alert('asd');
        // return false;
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'add_office_expense',
            data: $(this).serialize(),
            success: function(data) {
                if (data.errors) {

                } else {
                    $('.office_perdaytable2').append(
                        '<tr>' +

                        '<td class=id'+data.id+'>' + data.id + '</td>' +
                        '<td class=expense'+data.id+'>' + data.expense + '</td>' +
                        '<td class=amount'+data.id+'>' + data.amount + '</td>' +
                        '<td class=dates'+data.id+'>' + data.dates + '</td>' +
                        '<td class="dispare">' +
                        '<a  class="editperday"' +
                        'title="Edit"' +
                        'data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                        '<a href="home/deletess/' + data.id + '" class="delete" title="Delete"' +
                        'data-toggle="tooltip"><i class="material-icons">&#xE872;' +
                        '</i></a>' +
                        '</td></tr>'

                    );
                    toastr.success('Success');
                }
                $('.editperday').click(function() {
                        // alert(val.Date);return false;s
                        $('.office-forms').hide();
                        $('.edit_office').show();
                        $('.update_id').val(data.id);
                        $('.update_expense').val(data.expense);
                        $('.update_amount').val(data.amount);
                        $('.update_dates').val(data.dates);
                        $('.id'+data.id).css('background-color','yellow');
                        $('.expense'+data.id).css('background-color','yellow');
                        $('.amount'+data.id).css('background-color','yellow');
                        $('.dates'+data.id).css('background-color','yellow');
                       
                    });
            },
        });
    });



$( ".edit_office").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',

        url:'office_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
            // alert(data.data.id);return false;
            $('.expense'+data.data.id).html(data.data.expense);
            $('.amount'+data.data.id).html(data.data.amount);
            $('.dates'+data.data.id).html(data.data.dates);
            $('td').css('background-color','white');
            toastr.success('Updated');
        },
        
    });

 });
    // $('.btn_print').printPage();
    $('.amou').on('change', function() {

        $value = $(this).val();
        if ($value == "Total") {
            $('.total_pay').css('display', 'block');

        }

        if ($value == "Amount") {
            $('.total_pay').css('display', 'none');
        }
    });
    $('.amou_t').on('change', function() {

        $value = $(this).val();
        if ($value == "Total") {
            $('.tot_amo').css('display', 'block');

        }

        if ($value == "Amount") {
            $('.tot_amo').css('display', 'none');
        }
    });
});