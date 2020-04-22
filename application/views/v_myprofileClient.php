<div class="py-1"></div>
<section class="py-5">
  <div class="container col-lg-9">
  <div class="box main-div">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="<?php echo $data_client->clientPhoto ?>" alt="foto client">
            <h3><?php echo $data_client->clientName ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Client ID:</strong><?php echo $data_client->clientID ?></p>
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
                <td><?php echo $data_client->clientName ?></td>
              </tr>
              <tr>
                <th>E-mail</th>
                <td>:</td>
                <td><?php echo $data_client->clientEmail ?></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td>:</td>
                <td><?php echo $data_client->clientPhoneNumber ?></td>
              </tr>
            </table>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data_client->clientID ?>"><i class="fas fa-user-edit"></i></button></th>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<div class="py-2"></div>

<!-- Modal Edit Client -->

  <div class="modal fade" id="edit<?php echo $data_client->clientID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA <?php echo $data_client->clientName ?> </h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('client/editClient/'.$data_client->clientID);?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" placeholder="Client ID" name="clientID" value="<?php echo $data_client->clientID ?>"  required>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Name</label>
          <input type="text" class="form-control" placeholder="Client Name" name="clientName" value="<?php echo $data_client->clientName ?>" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Email</label>
          <input type="text" class="form-control" placeholder="Client Email" name="clientEmail" value="<?php echo $data_client->clientEmail ?>"required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Password</label>
          <input type="text" class="form-control" placeholder="Client Password" name="clientPassword" value="<?php echo $data_client->clientPassword ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Phone Number</label>
          <input type="text" class="form-control" placeholder="Client Phone Number" name="clientPhoneNumber" value="<?php echo $data_client->clientPhoneNumber ?>" required>
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

