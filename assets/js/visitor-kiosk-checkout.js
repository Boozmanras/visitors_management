
(function() {
    'use strict';

    // elements day, time, date
    var elOutTime = document.getElementById('show_outtime');

    // time function to prevent the 1s delay
    var setTime = function() {
        // initialize clock with timezone
        var time = moment().tz(timezone);

        // set time in html
        if (timeformat == 1) {
            elOutTime.value = time.format("hh:mm:ss A");
        } else {
            elOutTime.value = time.format("kk:mm:ss");
        }
    }

    setTime();
    setInterval(setTime, 1000);

    $('.btn-kiosk').on("click", function() {
        $('.btn-kiosk').removeClass('active');

        $(this).toggleClass('active');
    });

    $('select[name="visitorname"]').on("change", function(e) {
        e.preventDefault();
        var data = $(this).val();

        $.ajax({
            url: url + '/visitor-kiosk/get',
            type: 'get',
            dataType: 'json',
            data: { id: data },
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                $('input[name="id"]').val(response['id']);
                $('input[name="name"]').val(response['firstname'] + " " + response['lastname']);
                $('input[name="reasonforvisit"]').val(response['reasonforvisit']);
                $('input[name="tag_no"]').val(response['tag_no']);
                $('input[name="date"]').val(response['date']);
                $('input[name="checkin"]').val(response['timein']);

                $('.check-out-message').toggleClass('hidden').slideDown("200");
                $('.btn-submit').toggleClass('hidden');
            }
        })
    });
    
})();