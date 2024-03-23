/*
 * Frontdesk - Visitor Management System
 * URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
 * Email: official.codefactor@gmail.com
 * Version: 5.0
 * Author: Brian Luna
 * Copyright 2023 Codefactor
 */
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()