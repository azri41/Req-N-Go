function validateForm() {
    var x = document.forms["myForm"]["username"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    var y = document.forms["myForm"]["email"].value;
    if (y == "") {
      alert("Email must be filled out");
      return false;
    }

    var w = document.forms["myForm"]["comment"].value;
    if (w == "") {
      alert("Comment must be filled out");
      return false;
    }
  }