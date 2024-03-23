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

    var chart1 = document.getElementById("linechart");
    var chart2 = document.getElementById("piechart");

    var myChart = new Chart(chart1, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Visitors',
                data: visitorcounts,
                backgroundColor: '#1e88e5',
                hoverBackgroundColor: '#42a5f5',
                borderRadius: 4,
                borderWidth: 1,
            }]
        },
        options: {
            animation: {
                duration: 1000,
                easing: 'easeOutBack',
            },
            plugins: {
                legend: {
                    display: false,
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Number of Visitors',
                    position: 'left',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        }
    });

    var myChart2 = new Chart(chart2, {
        type: 'pie',
        data: {
            labels: topreasonlabels,
            datasets: [{
                data: topreasons,
                backgroundColor: ["#009688", "#795548", "#673AB7", "#2196F3", "#6da252", "#F44336", "#f39c12"],
                hoverOffset: 4,
            }]
        },
        options: {
            animation: {
                duration: 2000,
                easing: 'easeOutQuart',
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Total Value',
                    position: 'left',
                },
            },
        },
    });

})();