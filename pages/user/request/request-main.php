<!DOCTYPE html>
<html>
<head>
	<title>Request form page</title>

	<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #CFD3D6;
}

li {
  float: left;
}

li a {
  display: block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ddd;
}
img {
  position: absolute;
  object-fit: scale-down;
}
/*li a.active {
  color: white;
  background-color: #4CAF50;
}*/
.navRight {
  float: right;
}
form{
  margin: auto;
}
*{
    box-sizing: border-box;
  }
  .rform {
    padding: 10px;
    background-color: white;
    width: 50%;
    margin: auto;
    font-size: 20px;
    border-radius: 5px;
  }
.rform input[type=text] {
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: white;
}
.ra
{
  text-align: left;
  background-color: white;
}
.rform{
	background-color: white;
}

</style>
</head>
<body style="background-color: #5e80a1 ">
<ul>
<li><img src="Logo.png" alt="Logo.png" style="width:50px;height:50px;"></li>
<div class="navRight">
  <li><a href="#home">HEALTH STATUS</a></li>
  <li><a href="#request">REQUEST</a></li>
  <li><a href="#status">STATUS</a></li>
  <li><a href="#profile">PROFILE</a></li>
  <li><a href="#about">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #394d60; color: #394d60; margin-top: 0px;">lol</p>
<br>
<div class="rform">
	<form method="post" action="add.php" enctype="multipart/form-data">
		<h1 style="text-align: center;">REQUEST FORM</h1><br>
		1. Vehicle Registration No.: <input type="text" name="title" required>
  		<br><br>
    
  		
    2. Mode of Transport: <input type="text" name="author" required>
  		<br><br>
      
  
    3. Destination: <input type="text" name="price" step="0.01" min="0" required>
  		<br><br>
     
  4. Departure Date: <input type="text" name="author" required>
  		<br><br>
      
  
    5. Arrival Date: <input type="text" name="price" step="0.01" min="0" required>
  		<br><br>

  		  6. Reason: <input type="text" name="author" required>
  		<br>

      <br><br>  <input onclick="alert('Thank you for your submission. Your request will be processed soon.')" type="submit" value="Submit"><br><br>
</form>
</div>
</body>
</html>