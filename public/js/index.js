/*
let buyButton = document.getElementById('buy');

buyButton.addEventListener('click', async function (event) {
    let quantity = document.getElementById('qt').value;
    let token    = document.getElementById('token').value;
    let id       = event.target.getAttribute('data-product');

    let response = await fetch('/basket/add', {
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': token,
        },
        body: JSON.stringify({ id: id, quantity: quantity})
    });

    let result = await response.json();

    console.log(result);
});

console.log('abc');
*/

$('#buy').on('click', function (event) {
    let quantity = $('#qt').val();
    let token    = $('#token').val();
    let id       = $(event.target).attr('data-product');

    $.ajax('/basket/add', {
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: JSON.stringify({ id: id, quantity: quantity})
    }).done(function (result) {
        console.log(result.count);

        $('#count-cart').html(result.count);
    })
});


document.addEventListener('DOMContentLoaded', function(){
    $.ajax('/basket/count', {
        method: 'get',
    }).done(function (result) {
        console.log(result.count);

        $('#count-cart').html(result.count);
    })
})


$('#search').on('keyup', function (event) {
    let search = $(event.target).val();
    let token = $(event.target).attr('data-csrf');
    console.log(search);

    //if (search.length > 1) {
        $.ajax('/search', {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': token,
            },
            data: JSON.stringify({ search })
        }).done(function (result) {
            console.log(result);

            for (let i = 0; i < result.products.length; i++) {
                console.log(result.products[i].name);
            }
        })
    //}

});


$('.basket-qt-input').on('change', function (event) {
    let token = $('#token').val();
    let qt    = $(event.target).val();
    let id    = $(event.target).attr('data-product');

    console.log(token);
    $.ajax('/basket/update', {
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: JSON.stringify({ quantity: qt, id: id })
    }).done(function (result) {
        $('#total-sum').html(result.total_sum);
        $('#count-cart').html(result.count);
    })
});


$('.delete').on('click', function (event) {
    event.preventDefault();

    let id = $(event.target).attr('data-product');

    $.ajax('/basket/remove/' + id, {
    }).done(function (result) {
        console.log(result);

        if (result.message === 'success') {
            $(event.target).closest('tr').remove();

            $('#total-sum').html(result.total_sum);
            $('#count-cart').html(result.count);
        }
    })
});

$('#address').on('keyup', function (event) {

let search = $(event.target).val();

serachPlace(search);
})

function serachPlace(search) {
    var displaySuggestions = function(predictions, status) {
        if (status != google.maps.places.PlacesServiceStatus.OK) {
            alert(status);
            return;
        }

        document.getElementById('results').innerHTML = '';

        predictions.forEach(function(prediction) {
            var li = document.createElement('li');
            li.appendChild(document.createTextNode(prediction.description));

            $(li).on('click', function (event) {
                let address = $(event.target).html();

                $('#address').val(address);
            })


            document.getElementById('results').appendChild(li);
        });
    };

    var service = new google.maps.places.AutocompleteService();
    service.getQueryPredictions({ input: search }, displaySuggestions);
}





$('.check-required').on('click', function (event) {


    let form = $(event.target).closest('form');

    let inputs = form.find('input.required');

    for (let i = 0; i < inputs.length; i++) {
        console.log(inputs[i]);

        if ($(inputs[i]).val() === '') {
            event.preventDefault();

            $(inputs[i]).css('background-color', 'red');
        } else {
            $(inputs[i]).css('background-color', 'white');
        }
    }
});
