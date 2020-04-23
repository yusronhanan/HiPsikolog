
<!-- Modal Edit Psychologist -->

<?php $no=1; foreach ($data_psy as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->psyID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA <?php echo $d->psyName ?> </h2>
        </div>
        <form method="post" action="<?= site_url('psychologist/editPsychologist/'.$d->psyID);?>" enctype="multipart/form-data">

          <div class="modal-body">
            <!-- <input type="hidden" class="form-control" placeholder="psy ID" name="psyID" value="<?php echo $d->psyID ?>"  required> -->
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Name</label>
              <input type="text" class="form-control" placeholder="psy Name" name="psyName" value="<?php echo $d->psyName ?>" required >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Email</label>
              <input type="text" class="form-control" placeholder="psy Email" name="psyEmail" value="<?php echo $d->psyEmail ?>"required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Password</label>
              <input type="text" class="form-control" placeholder="psy Password" name="psyPassword" value="<?php echo $d->psyPassword ?>" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Phone Number</label>
              <input type="text" class="form-control" placeholder="psy Phone Number" name="psyPhoneNumber" value="<?php echo $d->psyPhoneNumber ?>" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Description</label>
              <textarea class="form-control" placeholder="Psychologist Description" name="psyDesc" required><?php echo $d->psyDesc ?></textarea>
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