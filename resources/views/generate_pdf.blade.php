<!DOCTYPE html>
<html>
<head>
  
    <title>Cozafood job application</title>
</head>
<body>
  
  <h1>{{ $heading}}</h1>
  <div>
     <p>{{$content}}</p>
  </div>
  
<!-- info that will be generated  -->
<form action="">
<table border="0" cellpadding="5" cellspacing="0">
  <tr> <td style="width: 50%">
  <label for="First_Name"><b>First name *</b></label><br />
  <input name="First_Name"  value="-" type="text" maxlength="50" style="width:100%;max-width: 260px" />
  </td> <td style="width: 50%">
  <label for="Last_Name"><b>Last name *</b></label><br />
  <input name="Last_Name" type="text"value="-"  maxlength="50" style="width:100%;max-width: 260px" />
  </td> </tr> <tr> <td colspan="2">
  <label for="Email_Address"><b>Email *</b></label><br />
  <input name="Email_Address" value="-" type="text" maxlength="100" style="width:100%;max-width: 535px" />
  </td> </tr> <tr> <td colspan="2">
  <label for="Portfolio"><b>CIN</b></label><br/>
  <input  type="text" maxlength="255" value="-" style="width:100%;max-width: 535px" />
  </td> </tr> <tr> <td colspan="2">
  <label for="Position"><b>Position you are applying for *</b></label><br />
  <input name="Position" value="Food delivering" type="text" maxlength="100" style="width:100%;max-width: 535px" />
  </td> </tr> <tr> <td>
  <label for="Salary"><b>Salary requirements</b></label><br />
   <input value="-"  name="Salary" type="text" maxlength="50" style="width:100%;max-width: 260px" /> </td> <td>
  <label for="StartDate"><b>When can you start?</b></label><br />
  <input name="StartDate" value="-" type="text" maxlength="50" style="width:100%;max-width: 260px" />
  </td> </tr> <tr> <td>
  <label for="Phone"><b>Phone *</b></label><br />
  <input name="Phone" value="-" type="text" maxlength="50" style="width:100%;max-width: 260px" />
  </td> <td>
  <label for=""><b>address</b></label><br />
  <input  type="text" maxlength="50" value="-" style="width:100%;max-width: 260px" />
  </td> </tr> <tr> <td colspan="2">
  <label for="Relocate"><b>Have you ever been fired from a job ?</b></label><br />
  <input name="Relocate" type="radio" value="Yes" /> Yes      
  <input name="Relocate" type="radio" value="No" /> No      
  </td> </tr> <tr> <td colspan="2">
  <label for="Organization"><b>Last company you worked for</b></label><br />
  <input value="-" name="Organization" type="text" maxlength="100" style="width:100%;max-width: 535px" />
  </td> </tr> <tr> <td colspan="2">
  
  <label for="Reference"><b></b></label><br />
  ----------------------DO NOT WRITE IN THE SPACE BELOW------------------- <br><br>
  <textarea name="Reference" rows="7" cols="40" style="width:100%;max-width: 535px"></textarea>
  </td> </tr> <tr> <td colspan="2" style="text-align: center;">
 
  </td> </tr>
  </table>
  <h5>Signature of the appliant : </h5>
  <h5>Date hired : </h5>
  </form>

  
</body>
</html>