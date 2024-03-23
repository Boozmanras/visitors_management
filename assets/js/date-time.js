/*
* Frontdesk - Visitor Management System
* URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
* Email: official.codefactor@gmail.com
* Version: 5.0
* Author: Brian Luna
* Copyright 2023 Codefactor
*/
(function() {
    "use strict";

    var elTime = document.getElementById('clock');

    var setTime = function() {
        // initialize clock with timezone
        var time = moment().tz(timezone);
        // set time in html
        if (timeformat == 1) {
            elTime.innerHTML = time.format("hh:mm:ss A");
        } else {
            elTime.innerHTML = time.format("kk:mm:ss");
        }
    }

    setTime();

    setInterval(setTime, 1000);
})();