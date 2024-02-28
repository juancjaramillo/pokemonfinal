$(function() {
    if ($('.owl-2').length > 0) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                600: {
                    margin: 20,
                    nav: true,
                    items: 2
                },
                1000: {
                    margin: 20,
                    stagePadding: 0,
                    nav: true,
                    items: 3
                }
            }
        });
    }

 // Agrega el código para manejar el clic en el botón de guardar
    $(document).on('click', '.btn-transfer', function () {

        // Obtén los datos del Pokemon que deseas guardar
          const pokemonData = {
            nombre: $('#update_name').text(),
            tipo: $('#update_type').text(),
            stardus: $('#update_stardust').text(),
			weight: $('#update_weight').text(),
			height: $('#update_height').text(),
			
			
        };

        // Realiza una solicitud AJAX para guardar los datos en Laravel
        $.ajax({
            url: 'http://localhost/pokeservices/public/guardar-pokemon', // Ajusta la URL según tu estructura
            method: 'POST',
            data: pokemonData,
			  headers: {
        'Access-Control-Allow-Origin': '*',
        // Otros encabezados si son necesarios
    },
            success: function (response) {
                // Manejar la respuesta del servidor
              	
				'use strict';

  swal({
  title: 'Pokemon Registrado!',
  text: 'Gracias por su proceso',
  button: {
  text: "OK",
  value: true,
  visible: true,
  className: "btn btn-primary"
  }
  })

				
				
            },
            error: function (error) {
        console.error(error.responseJSON); // Muestra los errores en la consola
    }
        });
    });
});



