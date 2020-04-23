<section class="py-5">
  <div class="container col-lg-9">
  <div class="box main-div">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="<?php echo base_url().'assets/img/'.$data_psy->psyPhoto ?>" width="200px" alt="foto Psychologist">
            <h3><?php echo $data_psy->psyName ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Psychologist ID:</strong><?php echo $data_psy->psyID ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="fa fa-user"></i> My Profile</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="27%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $data_psy->psyName ?></td>
              </tr>
              <tr>
                <th>E-mail</th>
                <td>:</td>
                <td><?php echo $data_psy->psyEmail ?></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td>:</td>
                <td><?php echo $data_psy->psyPhoneNumber ?></td>
              </tr>
              <tr>
                <th>Specialist</th>
                <td>:</td>
                <td><?php echo $data_psy->psyDesc ?></td>
              </tr>
            </table>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data_psy->psyID ?>"><i class="fas fa-user-edit"></i></button></th>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<!-- Modal Edit Client -->

<div class="modal fade" id="edit<?php echo $data_psy->psyID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA <?php echo $data_psy->psyName ?> </h2>
        </div>
        <form method="post" action="<?= site_url('psychologist/editPsychologist/'.$data_psy->psyID);?>" enctype="multipart/form-data">

          <div class="modal-body">
            <!-- <input type="hidden" class="form-control" placeholder="psy ID" name="psyID" value="<?php echo $data_psy->psyID ?>"  required> -->
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Name</label>
              <input type="text" class="form-control" placeholder="psy Name" name="psyName" value="<?php echo $data_psy->psyName ?>" required >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Email</label>
              <input type="text" class="form-control" placeholder="psy Email" name="psyEmail" value="<?php echo $data_psy->psyEmail ?>"required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Password</label>
              <input type="text" class="form-control" placeholder="psy Password" name="psyPassword" value="<?php echo $data_psy->psyPassword ?>" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Phone Number</label>
              <input type="text" class="form-control" placeholder="psy Phone Number" name="psyPhoneNumber" value="<?php echo $data_psy->psyPhoneNumber ?>" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Description</label>
              <textarea class="form-control" placeholder="Psychologist Description" name="psyDesc" required><?php echo $data_psy->psyDesc ?></textarea>
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