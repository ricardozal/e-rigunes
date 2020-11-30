$(document).ready(function () {

    var url = $('#numBuyerH').val();
    var buyerContainer = $('#buyerNum');

    $.ajax({
        url: url,
        method : 'GET',
        dataType: "json",
        success: function (response) {
            console.log(response);
        },error:function(){
            console.log(response);
        }
    }).done(function (response) {
        buyerN = response.buyer;
        buyerContainer.append('<span class="h4 font-weight-bold mb-0" style="color: #1B4F72" name="numBuyer" id="numBuyer">'+ buyerN +'</span>');
    });

    var urlEntry = $('#entry').val();
    var entryContainer = $('#entryCont');

    $.ajax({
        url: urlEntry,
        method : 'GET',
        dataType: "json",
        success: function (response) {
            console.log(response);
        },error:function(){
            console.log(response);
        }
    }).done(function (response) {
        entryData = response.entryTotal;
        entryContainer.append('<span class="h4 font-weight-bold mb-0" style="color: #0B5345" name="numBuyer" id="numBuyer">'+ '$' +entryData +'</span>');
    });

    var urlExpenses = $('#expenses').val();
    var expensesContainer = $('#expensesCont');

    $.ajax({
        url: urlExpenses,
        method : 'GET',
        dataType: "json",
        success: function (response) {
            console.log(response);
        },error:function(){
            console.log(response);
        }
    }).done(function (response) {
        expensesData = response.expensesTotal;
        expensesContainer.append('<span class="h4 font-weight-bold mb-0" style="color: #641E16" name="numBuyer" id="numBuyer">'+ '$' +expensesData +'</span>');
    });


});
