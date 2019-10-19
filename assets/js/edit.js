var formIsValid = 0;


$('#submitButton').click(function(e) {

    let cpt = 0;
    if(validateSlug()) { $cpt++ ;};
    if(validateName()) { $cpt++ ;};

    if(cpt < 2) {
      e.preventDefault();
      return false;
    }
    return true;


})

$('#slug').change(function() {
    validateSlug();
})

$('#name').change(function() {
  validateName();
})

function validateName() {
  let name = $('#name').val();
  if(name.length < 3) {
    $('#nameError').html('3 caractères minimum');
    formIsValid = 0;
    return false;
  } else {
    $('#nameError').empty();
    formIsValid = 1;
    return true;
  }
}

function validateSlug() {
  let slug = $('#slug').val();
  if(slug.length < 3) {
      formIsValid = 0;
      $('#slugError').html('Le nom est trop court');
      return false;
  } else {
      $('#slugError').empty();
      $.ajax({
        method: "POST",
        url: HOST+"validateSlug",
        data: { slug: slug }
        })
        .done(function( result ) {
          console.log(result);
          if(result == "1") {
              $('#slugError').html('Cette url existe déjà');
              formIsValid = 0;
          } else {
            $('#slugError').empty();
            formIsValid = 1;
          }
      });
  }
  return formIsValid;
}
