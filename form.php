<?php include('./assets/head.php') ?>
<body>
  
  <h2>PDMP project</h2>
  <div class="container-md">
  <div class="row">
    <div class="col">
      <form action="result.php" method="POST">
        <div class="mb-3">
          <p>Data of the pacient</p>
          <label for="patient_first_name" class="form-label">First name</label>
          <input type="text" class="form-control" id="patient_first_name" name="patient_first_name" >
          
        <div class="mb-3">
          <label for="patient_last_name" class="form-label">Last name</label>
          <input type="text" class="form-control" id="patient_last_name" name="patient_last_name">
        </div>

        <div class="mb-3">
          <label for="patient_gender" class="form-label">Gender</label>
          <select class="form-select" aria-label="Default select example" name="gender">
          <option selected>Select a Gender</option>
          <option value="M">Male</option>
          <option value="F">Female</option>
          
        </select>
        </div>

        <div class="mb-3">
          <label for="date_of_birth" class="form-label">Date of birth</label>
          <input type="date" class="form-control" id="date_of_birth"  name="date_of_birth" value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        

        <div class="mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city">
        </div>

        <div class="mb-3">
          <label for="state" class="form-label">State</label>
          <input type="text" class="form-control" id="state" name="state">
        </div>

        <div class="mb-3">
          <label for="zip_code" class="form-label">Zip Code</label>
          <input type="text" class="form-control" id="zip_code" name="zip_code">
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">phone</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>


        <div class="mb-3">
          <label for="effective_date" class="form-label">Effective date</label>
          <input type="date" class="form-control" id="effective_date" name="effective_date">
        </div>

        <div class="mb-3">
          <label for="expiration_date" class="form-label">Expiration date</label>
          <input type="date" class="form-control" id="expiration_date" name="expiration_date">
        </div>

        <div class="mb-3">
          <label for="patient_gender" class="form-label">Consent</label>
          <select class="form-select" aria-label="Default select example" name="consent">
          <option selected>Select a option</option>
          <option value="Y">Yes</option>
          <option value="N">No</option>
          
        </select>
        </div>

        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>  

    </div>
    
  </div>
</div>
  
  <?php include('./assets/script.php') ?>
</body>
</html>