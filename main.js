// Example starter JavaScript for disabling form submissions if there are invalid fields
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
      else {
        $.ajax({
          url: 'index.php',
          type: 'POST',
          data: $('#form').serialize(),
          beforeSend: function(){
            $('.loader').fadeIn();
          },
          success: function (response){
            $('.loader').fadeOut('slow', function(){
              let res = JSON.parse(response);
              if (res.answer == 'Ok'){
                $('#form').removeClass('was-validated').trigger('reset');
                $('#label-captcha').text(res.captcha);
                $('#answer').html(`<div class="alert alert-success" role="alert">Спасибо за обращение!</div>`);
              } else{
                $('#answer').html(`<div class="alert alert-danger" role="alert">${res.errors}</div>`);
              }
            });

          },
          error: function(){
            alert('ERROR');
          }
        })
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
