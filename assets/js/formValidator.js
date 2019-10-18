var TabSpec = {"à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","è":"e","é":"e","ê":"e","ë":"e","ç":"c","ì":"i","í":"i","î":"i","ï":"i","ù":"u","ú":"u","û":"u","ü":"u","ÿ":"y","ñ":"n","-":" ","_":" "};

/***** listener **********/
$('#firstname').change(function() {
  updateLogin();
});

$('#lastname').change(function() {
  updateLogin();
});

$('#email').change(function() {
  let email = $(this).val();
  if(!validateFormEmail(email)) {
    $('#emailError').html('Email invalide');
  } else {
      $('#emailError').empty();
  }
})

$('#password').change(function() {
  if(!checkPassword()) {
    $('#passwordError').html('Vérifiez votre mot de passe');
  } else {
    $('#passwordError').empty();
  }
})

$('#password_again').change(function() {
  if(!checkPassword()) {
    $('#passwordError').html('Entrez 2 fois le même mot de passe');
  } else {
    $('#passwordError').empty();
  }
})

$('#submitButton').click(function(e) {


    if(!checkPassword()) {
        $('#passwordError').html('Entrez 2 fois le même mot de passe');
        e.preventDefault();
    }
    let email = $('#email').val();
    if(!validateFormEmail(email)) {
      $('#emailError').html('Email invalide');
      e.preventDefault();
    }

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

function validateFormEmail(email) {
  let filter = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
  if (filter.test(email)) {
    return true;
  } else {
      return false;
    }
}

function checkPassword()
{
  let p1 = $('#password').val();
  let p2 = $('#password_again').val();
  if( p1 == "" || p2 == "") { return true}
  if( p1 == p2) {
    return true;
  } else {
    return false;
  }
}
