/*
* Frontdesk - Visitor Management System
* URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
* Email: official.codefactor@gmail.com
* Version: 5.0
* Author: Brian Luna
* Copyright 2023 Codefactor
*/
(function() {
    'use strict';

    // elements day, time, date
    var elTime = document.getElementById('show_time');
    var elDate = document.getElementById('show_date');

    // time function to prevent the 1s delay
    var setTime = function() {
        // initialize clock with timezone
        var time = moment().tz(timezone);

        // set time in html
        if (timeformat == 1) {
            elTime.value = time.format("hh:mm:ss A");
        } else {
            elTime.value = time.format("kk:mm:ss");
        }

        // set date in html
        elDate.value = time.format('YYYY-MM-DD');

        // set day in html
        // elDay.innerHTML = time.format('dddd');
    }

    setTime();
    setInterval(setTime, 1000);

    $('.btn-kiosk').on("click", function() {
        $(this).removeClass('active');

        $(this).toggleClass('active');
    });
})();