var pass;
var sub = 0;

function valid12() {
  if (!name1()) {
    return false;
  }
  if (!name12()) {
    return false;
  }
  if (!check1()) {
    return false;
  }
  if (!confirm1()) {
    return false;
  }
  if (!mobile1()) {
    return false;
  }
  if (!ans1()) {
    return false;
  }
}

// password validation
function check1() {
  var c = document.forms["signup"]["psd"].value;
  if (c.length < 4) {
    document.getElementById("ps").innerHTML =
      "<br/><font color=red>password must be atleast 4 char long</font>";
    return false;
  } else {
    document.getElementById("ps").innerHTML = "";
    pass = c;
    return true;
  }
}

// confirm password
function confirm1() {
  var c = document.forms["signup"]["cpsd"].value;
  if (c != pass) {
    document.getElementById("cps").innerHTML =
      "<br/><font color=red>password not match </font>";
    return false;
  } else {
    document.getElementById("cps").innerHTML = "";
    return true;
  }
}

//validation for name
function name1() {
  var c = document.forms["signup"]["fname"].value;
  var charat = c.charAt(0);
  if (charat < 65 || charat > 91 || charat < 97 || charat > 123) {
    document.getElementById("fn").innerHTML =
      "<br/><font color=red>Name must be not start with number</font>";
    return false;
  } else if (c.length < 5) {
    document.getElementById("fn").innerHTML =
      "<br/><font color=red>Name must be atleast 5 - 32 char long</font>";
    return false;
  } else {
    document.getElementById("fn").innerHTML = "";
    sub++;
    return true;
  }
}

function name12() {
  var c = document.forms["signup"]["lname"].value;
  var charat = c.charAt(0);

  if (charat < 65 || charat > 91 || charat < 97 || charat > 123) {
    document.getElementById("ln").innerHTML =
      "<br/><font color=red>Name must be not start with number</font>";
    return false;
  } else if (c.length < 5) {
    document.getElementById("ln").innerHTML =
      "<br/><font color=red>Name must be atleast 5 - 32 char long</font>";
    return false;
  } else {
    document.getElementById("ln").innerHTML = "";
    return true;
  }
}

// mobile number validation
function mobile1() {
  var nn = document.forms["signup"]["mobile"].value;
  var n1 = parseInt(nn);
  var r = nn.charAt(0) - 0;
  var flag = 0,
    flag1 = 0;

  if (nn.length == 10) {
    flag = 1;
  }
  if (nn != n1 || r < 6) {
    document.getElementById("mn").innerHTML =
      "<br/><font color=red>Mobile No. is not valid</font>";
    return false;
  }
  else if (flag != 1) {
    document.getElementById("mn").innerHTML =
      "<br/><font color=red>Mobile No. must be 10 digit</font>";
    return false;
  } else if (flag == 1) {
    document.getElementById("mn").innerHTML = "";
    return true;
  }
}

// validation for answer of security question
function ans1() {
  var c = document.forms["signup"]["ans"].value;
  //alert(c.length);
  if (c.length < 1) {
    document.getElementById("an").innerHTML =
      "<br/><font color=red>Enter the answer</font>";
    return false;
  } else {
    document.getElementById("an").innerHTML = "";
    return true;
  }
}

function nestop() {
  var c = document.getElementById("marq");
  c.stop();
}

function nestrt() {
  var c = document.getElementById("marq");
  c.start();
}
