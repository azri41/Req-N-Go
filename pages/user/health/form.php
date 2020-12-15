<!DOCTYPE html>
<html>
<head>
	<title>Health Status Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">

     <script type="text/javascript">
     function myConfirm(){
          var answer = window.alert("Please ensure all details are accurate before submitting");
     }
     </script>

</head>
<body>
     <form action="form-check.php" method="post">
     	<h2>Health Status Form</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>1. Have you been to see any area or countries of COVID-19 as indicated by WHO over the past 14 days?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Choice</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Yes</td>
                         <td><input type="radio" id="Yes" name="area" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>No</td>
                         <td><input type="radio" id="No" name="area" value="No"></td>
                    </tr>
               </table>
          <br>
          <label>2. Have you had any of the following sysmtoms over the past 14 days? Please tick if yes</label><br>
               <br>
               <table class="center"> 
                    <tr>
                         <th>Symtoms</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Fever</td>
                         <td><input type="checkbox" id="Fever" name="fever" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Difficulty in breathing</td>
                         <td><input type="checkbox" id="Breath" name="breath" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Cough</td>
                         <td><input type="checkbox" id="Cough" name="cough" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Sore throat</td>
                         <td><input type="checkbox" id="Throat" name="throat" value="Yes"></td>
                    </tr>
               </table>
               <label>Other symtoms (please specify)</label>
               <input type="text" name="symtoms" placeholder="Other symtoms"><br>
          
               <label>3. Have you been in close contact with person suspected to have COVID-19?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Choice</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Yes</td>
                         <td><input type="radio" id="Yes" name="contact" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>No</td>
                         <td><input type="radio" id="No" name="contact" value="No"></td>
                    </tr>
               </table><br>

               <label>If the answer is yes to either of the question above, please report to the Health Screening Area.</label>
               <br><br><br>
               <h3>Definition close contact:</h3>
               <h4>- Health care associated exposure, include providing direct care for COVID-19 patients, working with health care workers infected with COVID-19, visiting patients or staying in the same close environment of a COVID-19 patient.</h4>
               <h4>- Working together in close proximity or sharing same classroom environment with a COVID-19 patient.</h4>
               <h4>- Traveling together with COVID-19 patient in any kind of conveyance</h4>
               <h4>- Living in the same household as a COVID-19 patient</h4>

     	<button class="button" type="submit" onClick="myConfirm()">Submit</button>
     </form>
     <br>
</body>
</html>
