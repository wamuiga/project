<?php

$connect = mysqli_connect("localhost", "root", "", "games");

?>
<html>  
      <head>  
          
     <style>
   
  
   .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #FFFFFFB3;;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 10px;
  text-align: center;
}
  </style>
      </head>  
      <body>  
    
          <div class="grid-container">
  <div class="grid-item"> 
          <form method="post">
  <div class="grid-item"><input type="checkbox" name="language[]" value="Height / weight check"> Height / weight check  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Blood pressure check">  Blood pressure check  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Cholesterol level check"> Cholesterol level check </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Blood sugar test"> Blood sugar test  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Throat check"> Throat check  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Ear check"> Ear check</div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Eye check"> Eye check  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Chest x-ray (for heavy smokers)"> Chest x-ray (for heavy smokers)  </div>

  <div class="grid-item"><input type="checkbox" name="language[]" value="Hemoglobin"> Hemoglobin  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Urinalysis"> Urinalysis  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Platelet count" > Platelet count </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Occult Blood in stool" > Occult Blood in stool  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Glucose Serum" > Glucose Serum   </div>
 <div class="grid-item"><input type="checkbox" name="language[]"  value="Electrocardiogram" > Electrocardiogram </div>
 <div class="grid-item"><input type="submit" name="submit" class="btn btn-info" value="Submit" /></div>
          </form>
</div>
</div>

<script>
    function calcTrans() {
        var c = parseFloat(document.getElementById('c').value);
        var calculateA =20 ;
        document.getElementById('resultsA').innerHTML = calculateA;

        var a = parseFloat(document.getElementById('a').value);
        var calculateB =  20 ;
        document.getElementById('resultsA').innerHTML = calculateB;

        var b = parseFloat(document.getElementById('b').value);
        var calculateC =  20 ;
        document.getElementById('resultsA').innerHTML = calculateC;

        var d = parseFloat(document.getElementById('d').value);
        var calculateD =  20 ;
        document.getElementById('resultsA').innerHTML = calculateD;

        var e = parseFloat(document.getElementById('e').value);
        var calculateE =  20 ;
        document.getElementById('resultsA').innerHTML = calculateE;

        var totalT = calculateE + calculateD + calculateC + calculateB + calculateA;
        document.getElementById('resultsT').innerHTML = totalT;

    }
    </script>

<?php
          if(isset($_POST["submit"]))
          {
           $for_query = '';
           if(!empty($_POST["language"]))
           {
            foreach($_POST["language"] as $language)
            {
             $for_query .= $language . ', ';
            }
            $for_query = substr($for_query, 0, -2);
            $query = "INSERT INTO tbl_language (name) VALUES ('$for_query')";
            if(mysqli_query($connect, $query))
            {
             echo '<h3>You have select following language</h3>';
                echo '<label class="text-success">' . $for_query . '</label>';
            }
           }
           else
           {
            echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
           }
          }
          ?>
           <button onclick="calcTrans()" >Get amount</button>
         <p id="resultsT">

      </body>  
 </html>