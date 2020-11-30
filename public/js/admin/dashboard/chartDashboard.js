$(document).ready(function () {
    var url = $('#chartSales').val();

    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(response) {
            console.log(response);
        },
        error: function(xhr) {
            console.log("ERROR"+xhr); // Debug errors.
        }
    }).done(function (response) {
        var salesPrice = [];
        var saleDate = [];

        var elementsPrice = response.sales;
        elementsPrice.forEach(element => salesPrice.push(element['total_price']));

        var elementsDates = response.sales;
        elementsDates.forEach(element => saleDate.push(element['date']));

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: saleDate,
                datasets: [{
                    label: '$',
                    data: salesPrice,
                    backgroundColor: [
                        '#BB8FCE'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })
});
