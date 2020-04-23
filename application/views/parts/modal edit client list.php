
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