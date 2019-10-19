var TabSpec = {"à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","è":"e","é":"e","ê":"e","ë":"e","ç":"c","ì":"i","í":"i","î":"i","ï":"i","ù":"u","ú":"u","û":"u","ü":"u","ÿ":"y","ñ":"n","-":" ","_":" "};
var formIsValid = 0;


/***** listener **********/
$('#firstname').change(function() {
    if(validateFirstname()) {
        updateLogin();
    }
});

$('#lastname').change(function() {
    if(validateLastname()) {
        updateLogin();
    }
});

$('#login').change(function() {
  validateLogin();
})

$('#email').change(function() {
    validateEmail();
})

$('#password').change(function() {
  validatePassword();
})

$('#password_again').change(function() {
  validatePassword();
})

$('#submitButton').click(function(e) {

    let cpt = 0;

    if(validateEmail()) { cpt++};
    if(validatePassword()) { cpt++};
    if(validateLogin()) { cpt++};
    if(validateFirstname()) { cpt++};
    if(validateLastname()) { cpt++};

    console.log(cpt);
    if(cpt < 5) {
      e.preventDefault();
      return false;
    }

    return true;

})

/******** functions ******/
function updateLogin() {
  let firstname = $('#firstname').val();
  let lastname = $('#lastname').val();

  if( firstname != "" && lastname != "") {
    firstname = replaceSpec(firstname);
    lastname  = replaceSpec(lastname);
    let surname = firstname+'.'+lastname;
    $('#login').val(surname);
  }
}

function replaceSpec(Texte){
	var reg=/[àáäâèéêëçìíîïòóôõöøùúûüÿñ_-]/gi;
	return Texte.replace(reg,function(){
    return TabSpec[arguments[0].toLowerCase()];}).toLowerCase();
}


function validateFirstname() {
  let firstname = $('#firstname').val();
  if(firstname.length < 3) {
    $('#firstnameError').html('3 caractères minimum');
    formIsValid = 0;
    return false;
  } else {
    $('#firstnameError').empty();
    formIsValid = 1;
    return true;
  }
}

function validateLastname() {
  let lastname = $('#lastname').val();
  if(lastname.length < 3) {
    $('#lastnameError').html('3 caractères minimum');
    formIsValid = 0;
    return false;
  } else {
    $('#lastnameError').empty();
    formIsValid = 1;
    return true;
  }
}

function validateLogin() {
  let login = $('#login').val();
  $.ajax({
    method: "POST",
    url: HOST+"validateLogin",
    data: { login: login }
    })
    .done(function( result ) {
      if(result == "1") {
          $('#loginError').html('Cet identifiant existe déjà');
          formIsValid = 0;
      } else {
        $('#loginError').empty();
        formIsValid = 1;
      }
  });
  return formIsValid;
}

function validateEmail() {
  let email = $('#email').val();
  let filter = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
  if (filter.test(email)) {
      $('#emailError').empty();
      formIsValid = 1;
      return true;
  } else {
      $('#emailError').html('Email invalide');
      formIsValid = 0;
      return false;
    }
}

function validatePassword()
{
  let p1 = $('#password').val();
  let p2 = $('#password_again').val();
  if( p1 == "" || p2 == "") {
    $('#passwordError').html('Saisissez un mot de passe');
    formIsValid = 0;
    return false;
  }
  if( p1 == p2) {
    $('#passwordError').empty();
    formIsValid = 1;
    return true;
  } else {
    $('#passwordError').html('Vérifiez votre mot de passe');
    formIsValid = 0;
    return false;
  }
}
