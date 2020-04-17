<div class="container">
    <div class="box main-div">
      <h2>CLIENT DATA</h2>
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
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data_client as $d ) {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->clientName ?></td>
            <td><?php echo $d->clientEmail ?></td>
            <td><?php echo $d->clientPassword ?></td>
            <td><?php echo $d->clientPhoneNumber ?></td>
            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d->clientID ?>"><i class="fas fa-user-edit"></i></button></td>
            <td><a type="button" class="btn btn-danger"  href="<?= site_url('client/deleteClient/'.$d->clientID);?>" onClick="return confirm('Are you sure?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>
<br/>

<!-- Modal Edit Client -->

<?php $no=1; foreach ($data_client as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->clientID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA <?php echo $d->clientName ?> </h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('client/editClient/'.$d->clientID);?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" placeholder="Client ID" name="clientID" value="<?php echo $d->clientID ?>"  required>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Name</label>
          <input type="text" class="form-control" placeholder="Client Name" name="clientName" value="<?php echo $d->clientName ?>" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Email</label>
          <input type="text" class="form-control" placeholder="Client Email" name="clientEmail" value="<?php echo $d->clientEmail ?>"required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Password</label>
          <input type="text" class="form-control" placeholder="Client Password" name="clientPassword" value="<?php echo $d->clientPassword ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Phone Number</label>
          <input type="text" class="form-control" placeholder="Client Phone Number" name="clientPhoneNumber" value="<?php echo $d->clientPhoneNumber ?>" required>
        </div>
        <div class="form-group">
                <label for="formGroupExampleInput2">Ignore it, if don't want to change it</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Profile Picture</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*'>
                  <label class="custom-file-label text-left" for="uploadImage">Choose file</label>
                </div>
                </div>
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


