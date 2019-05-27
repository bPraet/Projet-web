function openCart(){
    var toDisplay = document.getElementById("cart");
    if (toDisplay.style.display === "") {
        toDisplay.style.display = "block";
    } else {
        toDisplay.style.display = "";
    }
}
function addCart(){
    $(".card-link").click(function(){
        $.ajax({
            type: 'POST',
            url: 'addCart',
            data: {idProduct: $(this).prop('id')},
            dataType: 'JSON',
            success: function(data){
                $('#cart').append('<li class="list-group-item item" id="'+data['name']+'">'+data['name']+' '+data['price']+'€<span class="close">&#10006</span></li>');
                if($total = parseFloat($('#total').text()))
                    $('#total').html(($total + parseFloat(data['price'])).toFixed(2) + '€');
                else
                    $('#total').html(parseFloat(data['price']).toFixed(2) + '€');
            }
        });
        $('#cartValidButton').show();
    });
}
function rmCart(){
    $('#cart').on('click', '.close', function() {
        $.ajax({
            type: 'POST',
            url: 'rmCart',
            data: {nameProduct: this.parentNode.id},
            success: function(data){
                $total = parseFloat($('#total').text());
                $('#total').html(($total - parseFloat(data)).toFixed(2) + '€');
            }
        });
        var element = document.getElementById(this.parentNode.id);
        element.parentNode.removeChild(element);
        if($('.item').length == 0){
            $('#cartValidButton').hide();  
        }
    });
}

function modifyBestProduct1(){
    $('#bestProduct1').change(function(){
        $.ajax({
            type: 'POST',
            url: 'modifyBestProducts',
            data:  {idNewBest: $('#bestProduct1').val(), idOldBest: 1},
        });
    });
}
function modifyBestProduct2(){
    $('#bestProduct2').change(function(){
        $.ajax({
            type: 'POST',
            url: 'modifyBestProducts',
            data:  {idNewBest: $('#bestProduct2').val(), idOldBest: 2},
        });
    });
}
function modifyBestProduct3(){
    $('#bestProduct3').change(function(){
        $.ajax({
            type: 'POST',
            url: 'modifyBestProducts',
            data:  {idNewBest: $('#bestProduct3').val(), idOldBest: 3},
        });
    });
}
function adminmenu(){
    var element = document.getElementById("container");
    element.classList.remove("wrapper");
}

$(document).ready(function () {
    $('select').select2();
    modifyBestProduct1();
    modifyBestProduct2();
    modifyBestProduct3();
    addCart();
    rmCart();
    if($('.item').length == 0)
        $('#cartValidButton').hide();  
    else
        $('#cartValidButton').show();
});