<div class="container">
    <div class="box main-div">
      <h2>APPOINTMENT DATA</h2>
      <p>Data Table HiPsikolog</p> 
               
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAppointment">Add Appointment</button>
<br>
<br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Client Name</th>
            <th>Psychologist name</th>
            <th>Package Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data_appointment as $d ) {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->appointmentID ?></td>
            <td><?php echo $d->clientName ?></td>
            <td><?php echo $d->psyName ?></td>
            <td><?php echo $d->counsellingName ?> (<?php echo $d->counsellingDuration ?> minutes)</td>
            <td><?php echo date_format(date_create($d->date),"d/m/Y") ?></td>
            <td><?php echo $d->time ?></td>
            <td><?php echo $d->status ?></td>
            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d->appointmentID ?>"><i class="fas fa-user-edit"></i></button></td>
            <td><a type="button" class="btn btn-danger"  href="<?= site_url('appointment/deleteAppointment/'.$d->appointmentID);?>" onClick="return confirm('Are you sure?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>
<br/>

<!-- Modal Edit Client -->

<?php $no=1; foreach ($data_appointment as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->appointmentID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA</h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('Appointment/editAppointment/'.$d->appointmentID);?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" placeholder="Appointment ID" name="appointmentID" value="<?php echo $d->appointmentID ?>"  required>
        <div class="form-group">
          <label for="formGroupExampleInput2">Date</label>
          <input type="date" class="form-control" placeholder="Date" name="date" value="<?php echo $d->date ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Time</label>
            <select class="form-control" id="formGroupExampleInput2" name="time" required>
            <?php for ($i=0; $i < count($arrTime); $i++) { 
                          if($arrTime[$i] == $d->time) {?>
                      <option value="<?= $arrTime[$i]; ?>" selected><?= $arrTime[$i] ?></option>
                      <?php } else { ?>
                      <option value="<?= $arrTime[$i]; ?>"  ><?= $arrTime[$i] ?></option>
                       <?php } ?>

            <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Status</label>
          <select class="form-control" id="formGroupExampleInput2" name="status" required>
            <?php for ($i=0; $i < count($arrStatus); $i++) { 
                          if($arrStatus[$i] == $d->status) {?>
                      <option value="<?= $arrStatus[$i]; ?>" selected><?= $arrStatus[$i] ?></option>
                      <?php } else { ?>
                      <option value="<?= $arrStatus[$i]; ?>"  ><?= $arrStatus[$i] ?></option>
                       <?php } ?>

            <?php } ?>
            </select>
         </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Client Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="clientID" required>
            <?php foreach ($data_client as $dc )  { 
                          if($dc->clientID == $d->clientID) {?>
                          <option value="<?= $dc->clientID; ?>" selected>#<?= $dc->clientID; ?> - <?=$dc->clientName ?></option>
                      <?php } else { ?>
                        <option value="<?= $dc->clientID; ?>" >#<?= $dc->clientID; ?> - <?=$dc->clientName ?></option>
                       <?php } ?>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Psychologist Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="psyID" required>
            <?php foreach ($data_psy as $dp ) { 
                          if($dp->psyID == $d->psyID) {?>
                <option value="<?= $dp->psyID; ?>" selected>#<?= $dp->psyID; ?> - <?=$dp->psyName ?></option>
                      <?php } else { ?>
                <option value="<?= $dp->psyID; ?>" >#<?= $dp->psyID; ?> - <?=$dp->psyName ?></option>
                    
                       <?php } ?>
            <?php } ?>
            </select>            
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Package Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="counsellingID" required>
            <?php foreach ($data_package as $dp ) { 
                          if($dp->counsellingID == $d->counsellingID) {?>
                          <option value="<?= $dp->counsellingID; ?>" selected><?=$dp->counsellingName ?></option>
                      <?php } else { ?>
                        <option value="<?= $dp->counsellingID; ?>" ><?=$dp->counsellingName ?></option>
                    
                       <?php } ?>
            <?php } ?>
                
         
            </select>            
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <input  type="submit" class="btn btn-primary" value="Submit">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Modal Add Client -->

<div class="modal fade" id="addAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>ADD DATA</h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('Appointment/addAppointment/');?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" placeholder="Appointment ID" name="appointmentID" value="<?php echo $d->appointmentID ?>"  required>
        <div class="form-group">
            <label for="formGroupExampleInput2">Client Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="clientID" required>
            <?php foreach ($data_client as $dc )  { ?>
                        <option value="<?= $dc->clientID; ?>" >#<?= $dc->clientID; ?> - <?=$dc->clientName ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Psychologist Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="psyID" required>
            <?php foreach ($data_psy as $dp ) {?>
                <option value="<?= $dp->psyID; ?>" >#<?= $dp->psyID; ?> - <?=$dp->psyName ?></option>
                    
            <?php } ?>
            </select>            
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Package Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="counsellingID" required>
            <?php foreach ($data_package as $dp ) { ?>
                        <option value="<?= $dp->counsellingID; ?>" ><?=$dp->counsellingName ?></option>
            <?php } ?>
            </select>            
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Date</label>
          <input type="date" class="form-control" placeholder="Date" name="date" value="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Time</label>
            <select class="form-control" id="formGroupExampleInput2" name="time" required>
            <?php for ($i=0; $i < count($arrTime); $i++) {?>
                      <option value="<?= $arrTime[$i]; ?>"  ><?= $arrTime[$i] ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Status</label>
          <select class="form-control" id="formGroupExampleInput2" name="status" required>
            <?php for ($i=0; $i < count($arrStatus); $i++) { ?>
                      <option value="<?= $arrStatus[$i]; ?>"  ><?= $arrStatus[$i] ?></option>
            <?php } ?>
            </select>
         </div>
       
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <input  type="submit" class="btn btn-primary" value="Submit">
        </div>
        </form>
      </div>
    </div>
  </div>


