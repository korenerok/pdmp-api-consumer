<?php include_once('./process.php')?>


<?php include('./assets/head.php') ?>

<body>
  <?php if($patientInfo && $medicationDispensed ) { ?>
  
  <div class="container-sm">
    <div class="row">
      <div class="col">
        
        <h1>Patient Information:</h1>
        <br><strong>Name: </strong> <?php echo($patientInfo->Name->FirstName) ?></br>
        <strong>Last Name: </strong> <?php echo($patientInfo->Name->LastName) ?></br>
        <strong>Date of birth: </strong> <?php echo(date("m-d-Y",strtotime($patientInfo->DateOfBirth->Date))) ?></br>
        <strong>Address: </strong> <?php echo($patientInfo->Address->AddressLine1.', '.$patientInfo->Address->City.', '.$patientInfo->Address->State .', '.$patientInfo->Address->ZipCode)   ?></br> 
        <strong>Gender: </strong>
          <?php echo( $patientInfo->Gender == "M" ? 'Male': ($patientInfo->Gender == "F" ? 'Female' : "-")) ?>
        </p>

      </div>
    </div>
    

     
  

    <div>
    <table class="table table-striped table-bordered" id="table">
      <thead>
        <tr class="text-center table-header">
          <th scope="col">Medication</th>
          <th scope="col">State</th>
          <th scope="col">Date Filled</th>
          <th scope="col">Date Written</th>
          <th scope="col">Date Supply</th>
          <th scope="col">Quatity Dispensed </th>
          <th scope="col">Refilis Remaining </th>
          <th scope="col">Prescriber </th>
          <th scope="col">Pharmacy Name </th>

        </tr>
      </thead>
      <tbody>
      <?php

        foreach ($medicationDispensed  as $value) {
        ?>
        <tr  class="text-center">

          <td class="medication"><?php echo(!empty($value->DrugDescription) ? $value->DrugDescription  : "-")  ?></td>

          <td><?php echo(!empty($value->Pharmacy->Address->State) ? $value->Pharmacy->Address->State  : "-")  ?></td>

          <td><?php echo(!empty($value->LastFillDate->Date) ? $value->LastFillDate->Date  : "-")  ?></td>

          <td><?php echo(!empty($value->WrittenDate->Date) ? $value->WrittenDate->Date : "-")  ?></td>


          <td><?php echo(!empty($value->DaysSupply) ? $value->DaysSupply  : "-")  ?></td>

          <td><?php echo(!empty($value->Quantity->Value) ? $value->Quantity->Value  : "-")  ?></td>

          <td><?php echo(!empty($value->Refills->Value) ? $value->Refills->Value  : "0")  ?></td>



          <td><?php echo(!empty($value->Prescriber->Name->FirstName) &&!empty($value->Prescriber->Name->LastName)  ? $value->Prescriber->Name->FirstName.' '. $value->Prescriber->Name->LastName : "-")  ?></td>

          <td><?php echo(!empty($value->Pharmacy->StoreName) ? $value->Pharmacy->StoreName  : "-")  ?></td>

        </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
<!--   <nav class="pagination-container">
    <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
      &lt;
    </button>

    <div id="pagination-numbers" class="pagination">
    </div>

    <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
      &gt;
    </button>
  </nav> -->


  </div>
 
  <?php } ?>  
  

  <?php if($error) { ?>
    <div class="container-sm">
      <div class="row">
        <div class="col">
          <h1>Error:</h1>
          
          <p><br> <?php echo($error->Code) ?> 
           <?php echo( $error->Description) ?></br>
          
          </p>

        </div>
      </div>
    </div>

    <?php } ?>  
  <?php include('./assets/script.php') ?>
  
</body>

</html>
