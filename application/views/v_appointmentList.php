<div class="container">
    <div class="box main-div">
      <h2>APPOINTMENT DATA</h2>
      <p>Data Table HiPsikolog</p> 
      <?php if(!empty($this->session->flashdata('notif'))) { ?>
	    <div class="alert alert-<?php if(!empty($this->session->flashdata('type'))) { echo $this->session->flashdata('type');} else{ echo 'danger';} ?>" role="alert">
		    <?= $this->session->flashdata('notif'); ?>
	    </div>
	    <?php } ?>             
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
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
            <td><?php echo $d->clientName ?></td>
            <td><?php echo $d->psyName ?></td>
            <td><?php echo $d->counsellingName ?></td>
            <td><?php echo $d->date ?></td>
            <td><?php echo $d->time ?></td>
            <td><?php echo $d->status ?></td>
            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d->appointmentID ?>"><i class="fas fa-user-edit"></i></button></td>
            <td><a type="button" class="btn btn-danger"  href="<?= site_url('appointment/deleteClient/'.$d->appointmentID);?>" onClick="return confirm('Are you sure?')" ><i class="fas fa-user-times"></i></a></td>
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
          <input type="text" class="form-control" placeholder="Time" name="time" value="<?php echo $d->time ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Status</label>
          <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $d->status ?>" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Client Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="client" required>
            <?php foreach ($data_client as $d ) {?>
                <option value="<?= $d->clientID; ?>" ><?=$d->clientName ?></option>
            <?php } ?>
            </select>            
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Psychologist Name</label>
            <select class="form-control" id="formGroupExampleInput2" name="psychologist" required>
            <?php foreach ($data_psy as $d ) {?>
                <option value="<?= $d->psyID; ?>" ><?=$d->psyName ?></option>
            <?php } ?>
            </select>            
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Package</label>
            <select class="form-control" id="formGroupExampleInput2" name="counselling" required>
            <?php foreach ($data_package as $d ) {?>
                <option value="<?= $d->counsellingID; ?>" ><?=$d->counsellingName ?></option>
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


