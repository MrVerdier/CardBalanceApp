$(document).ready(function(){

    const mainBalance = $('.balance').html()
    const historyBalance = $('.history-balance').html()
    console.log(mainBalance)
    console.log(historyBalance)

    if ( mainBalance > 0) { 
        $(".balance").addClass('positive-account')
    } else if (mainBalance < 0) {
        $(".balance").addClass('negative-account')
    }
})

$('#addMoney').submit(function(){
    $.ajax({
        method: 'POST',
        url: 'apis/api-add-money.php',
        data: $('#addMoney').serialize()
    }).done(function(response){
        console.log(response)
        console.log('Added money')
        checkbalance()
        checkTransactions()
        document.getElementById("addMoney").reset();
    }).fail(function(error){
        console.log(error)
        console.log('error')
    })
    return false
})


  $('#spentMoney').submit(function(){
    $.ajax({
        method: 'POST',
        url: 'apis/api-remove-money.php',
        data: $('#spentMoney').serialize()
    }).done(function(response){
        console.log(response)
        console.log('Removed money')
        checkbalance()
        checkTransactions()
        document.getElementById("spentMoney").reset();
    }).fail(function(error){
        console.log(error)
        console.log('error')
    })
    return false
})


function checkbalance(){
    $.ajax({
      method: 'GET',
      url: 'apis/api-display-balance.php',
  }).done(function(response){

      if(response != $('#accountStatus')){
          $('#accountStatus').html(response)
      }

  }).fail(function(){
      console.log('fail')
  })
  return false
  }


  function checkTransactions(){
    $.ajax({
      method: 'GET',
      url: 'apis/api-add-transaction.php',
  }).done(function(response){

          $('#transactionHistory tbody').prepend(response)
          
      

  }).fail(function(){
      console.log('fail')
  })
  return false
  }

