function printError(elemId, hintMsg) {
  document.getElementById(elemId).innerHTML = hintMsg;
}



function loginvalidate() {
  var username = document.loginform.username.value;
  var password = document.loginform.password.value;
  var usernameErr = passwordErr = true;
  if (username == '') {
    printError("usernameErr", "Please enter a valid username");
  } else {
    var regex = /^\S+@\S+\.\S+$/;
    if (username == "") {
      printError("usernameErr", "Please enter a valid username");

    } else if (regex.test(username) === false) {
      printError("usernameErr", "Invalid username");

    } else {
      printError("usernameErr", "");
      usernameErr = false;
    }
  }
  if (password == '') {
    printError("passwordErr", "Please enter a valid password");
  } else {
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}/;
    if (regex.test(password) === false) {
      printError("passwordErr", "Invalid Password");

    } else {
      printError("passwordErr", "");
      passwordErr = false;
    }
  }
  if ((usernameErr || passwordErr) == true) {
    return false;
  }
}

// Contacto Validate
function contactvalidate() {
  var name = document.contactform.Name.value;
  var email = document.contactform.Email.value;
  var subject = document.contactform.Subject.value;
  var message = document.contactform.Message.value;
  var contactnameErr = contactemailErr = contactsubjectErr = contactmessageErr = true;

  if (name == '') {
    printError("contactnameErr", "Please enter a valid Name");
  } else {
    printError("contactnameErr", "");
    contactnameErr = false;
  }

  if (email == '') {
    printError("contactemailErr", "Please enter a valid email address");
  } else {
    var regex = /^\S+@\S+\.\S+$/;
    if (email == "") {
      printError("contactemailErr", "Please enter a valid email address");

    } else if (regex.test(email) === false) {
      printError("contactemailErr", "Invalid email address");

    } else {
      printError("contactemailErr", "");
      usernameErr = false;
    }
  }

  if (subject == '') {
    printError("contactsubjectErr", "Please enter a valid subject");
  } else {
    var regex = /^.{1,100}$/;
    if (subject == "") {
      printError("contactsubjectErr", "Please enter a valid subject");
    } else if (regex.test(subject) === false) {
      printError("contactsubjectErr", "Subject limit is 100 letters");
    } else {
      printError("contactsubjectErr", "");
      contactsubjectErr = false;
    }
  }
  if (message == '') {
    printError("contactmessageErr", "Please enter a valid Message");
  } else {
    var regex = /^.{1,250}$/;
    if (message == "") {
      printError("contactmessageErr", "Please enter a valid message");
    } else if (regex.test(message) === false) {
      printError("contactmessageErr", "Message limit is 250 letters");
    } else {
      printError("contactmessageErr", "");
      contactmessageErr = false;
    }
  }


  if ((contactnameErr || contactemailErr || contactsubjectErr || contactmessageErr) == true) {
    return false;
  }
}

//! Registration Form Validation

function registerationvalidate() {
  var fullname = document.registrationform.registerfullname.value;
  var username = document.registrationform.registeremail.value;
  var password = document.registrationform.registerpassword.value;
  var repeatpassword = document.registrationform.registerrepeatpassword.value;
  var address = document.registrationform.registeraddress.value;
  var fullnameErr = usernameErr = registerpasswordErr = repeatpasswordErr = addressErr = true;
  if (fullname == '') {
    printError("fullnameErr", "Please enter a valid Name");
  } else {
    printError("fullnameErr", "");
    fullnameErr = false;
  }


  if (username == '') {
    printError("emailErr", "Please enter a valid username");
  } else {
    var regex = /^\S+@\S+\.\S+$/;
    if (username == "") {
      printError("emailErr", "Please enter a valid username");

    } else if (regex.test(username) === false) {
      printError("emailErr", "Invalid username");
    } else {
      printError("emailErr", "");
      usernameErr = false;
    }
  }

  if (password == '') {
    printError("registerpasswordErr", "Please enter a valid password");
  } else {
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}/;
    if (regex.test(password) === false) {
      printError("registerpasswordErr", "Invalid Password");
    } else {
      printError("registerpasswordErr", "");
      registerpasswordErr = false;
    }
  }


  if (repeatpassword == '') {
    printError("repeatpasswordErr", "Passwords doesn't match.");
  } else {
    if (password == repeatpassword) {
      printError("repeatpasswordErr", "");
      repeatpasswordErr = false;
    } else {
      printError("repeatpasswordErr", "Passwords don't match.");
    }
  }

  if (address == '') {
    printError("addressErr", "Please enter a valid address");
  } else {
    printError("addressErr", "");
    addressErr = false;
  }
  if ((fullnameErr || usernameErr || registerpasswordErr || repeatpasswordErr || addressErr) == true) {
    return false;
  }
}



function getQuantity() {
  return document.getElementById("menuitemquantity").value;
}

function navbarfunction() {
  var x = document.getElementById("myTopnav");
  var logo = document.getElementById("navbaricon");
  if (x.className === "topnav") {
    x.className += " responsive";
    logo.style.display = 'none';

  } else {
    x.className = "topnav";
    logo.style.display = 'block';
  }
}

function alertpop() {
  var x = document.getElementById("alertpopup");
  x.style.display = "block";
}

function alertpoporder() {
  var x = document.getElementById("alertpopuporder");
  x.style.display = "block";
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  var y = document.getElementsByClassName("navbarhiddenfields")[0];
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function dropdownvisible() {
  var x = document.getElementsByClassName("dropdown-content")[0];
  console.log(x.style.display);
  if (x.style.display === 'none') {
    x.style.display = 'block';
  } else if (x.style.display === 'block') {
    x.style.display = 'none';
  }
}


function updatebuttonredirect() {
  document.getElementById("updatemenumyModal").style.display = "block";
}

function enablePopUp() {
  document.getElementById('id01').style.display = 'block';
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function enableRegisterPopUp() {
  document.getElementById('registropopupmargin').style.display = 'block';
}




var myInput = document.getElementById("loginpassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function () {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if (myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if (myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}


// Get the modal
var menumodal = document.getElementById("menumyModal");

// Get the button that opens the modal
var menubtn = document.getElementById("menumyBtn");

// Get the <span> element that closes the modal
var menuspan = document.getElementsByClassName("menuclose")[0];

// When the user clicks the button, open the modal 
menubtn.onclick = function () {
  menumodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
menuspan.onclick = function () {
  menumodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == menumodal) {
    menumodal.style.display = "none";
  }
}

// Edit Item
// Get the modal
var updatemenumodal = document.getElementById("updatemenumyModal");

// Get the button that opens the modal
var updatemenubtn = document.getElementById("menuitemedit");

// Get the <span> element that closes the modal
var updatemenuspan = document.getElementsByClassName("updatemenuclose")[0];

// When the user clicks the button, open the modal 
updatemenubtn.onclick = function () {
  updatemenumodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
updatemenuspan.onclick = function () {
  updatemenumodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == updatemenumodal) {
    updatemenumodal.style.display = "none";
  }
}