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

    $('.datatables-table').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        searching: false,
        ordering: true
    });
})();