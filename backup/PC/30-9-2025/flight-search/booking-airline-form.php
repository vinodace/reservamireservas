<div class="col-sm-12">
      <form action="#confirm-booking.php" method="post">
        <div class="flight-result-box">
          <h1 class="main-subhding mt-0 pt-0 pb-2">Passenger Information</h1>
          <p class="note"><strong>Important</strong>: Each passenger's full name must be entered as it appears on their passport or government issued photo ID. Name changes are not permitted after booking</p>

          <div class="table-responsive">
            <table class="table passenger_table_web2" id="traveller-table">
              <tbody>
                <?php for($i=1; $i < 1; $i++) ?>
                <tr>
                  <td align="middle">
                    Traveler  <?= $i ?>
                    <div class="auto-increament-tr"></div>
                  </td>
                  <td width="150">
                    <label class="traveller-form-lbl">First Name</label>
                    <input type="text" name="first-name" class="traveller-form_field_web2">
                  </td>
                  <td width="150">
                    <label class="traveller-form-lbl">Middle Name</label>
                    <input type="text" name="middle-name" class="traveller-form_field_web2">
                  </td>
                  <td width="150">
                    <label class="traveller-form-lbl">Last Name</label>
                    <input type="text" name="last-name" class="traveller-form_field_web2">
                  </td>
                  <td>
                    <label class="traveller-form-lbl">Gender</label>
                    <select name="gender" class="traveller-form_field_web2">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </td>
                  <td>
                    <label class="traveller-form-lbl">Date of Birth</label>
                    <select name="gender" class="traveller-form_field_web2">
                      <?php 
                        for($i =1; $i <=10; $i++) {
                          echo "<option value='$i'>$i</option>";    
                        }
                      ?>
                    </select>
                  </td>
                  <td>
                    <label class="traveller-form-lbl">Month</label>
                    <select name="month" class="traveller-form_field_web2">
                      <option>Jan</option>
                      <option>Feb</option>
                    </select>
                  </td>
                  <td>
                    <label class="traveller-form-lbl">Year</label>
                    <select name="month" class="traveller-form_field_web2">
                      <?php 
                        for($b=1980; $b <=2025; $b++) {
                          echo "<option value='$b'>$b</option>";
                        }
                      ?>
                    </select>
                  </td>
                  <td ></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end">
            <div class="add-traveller_btn_web2"><i class="fa-solid fa-plus"></i></div>
          </div>  
        </div>
        
          <div class="flight-result-box">
            <h1 class="main-subhding pb-4">Billing Information</h1>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form_lbl_web2">Address 1</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">Address 2</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">Country</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">State</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">City</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">Zip Code</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
            </div>
          </div>
          <div class="flight-result-box">
            <h1 class="main-subhding pb-4">Contact Information</h1>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form_lbl_web2">Phone Number</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">Email</label>
                  <input type="text" class="form_field_web2">
                </div>  
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label class="form_lbl_web2">&nbsp;</label>
                  <!-- <input type="hidden" name="offerId" value="<?= htmlspecialchars($_GET['offerId']) ?>"> -->
                  <button type="submit" class="submit_btn_web2 bg-success outline-success text-white">Proceed to Payment</button>
                </div>  
              </div>
            </div>
          </div>
        </form>
      </div>