<div class="container">
    <div class="box main-div">
      <h2>CLIENT DATA</h2>
      <p>Data Table HiPsikolog</p> 
    
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
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
            <!-- <td><?php echo $d->clientPassword ?></td> -->
            <td><?php echo $d->clientPhoneNumber ?></td>
            <td><button type="button" class="btn btn-warning editForm" id="<?= $d->clientID ?>" data-toggle="modal" data-target="#edit"><i class="fas fa-user-edit"></i></button></td>
            <td><a type="button" class="btn btn-danger"  href="<?= site_url('client/deleteClient/'.$d->clientID);?>" onClick="return confirm('Are you sure?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>
<br/>

<!-- Modal Edit Client -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA <?php echo $d->clientName ?> </h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('client/editClient/');?>" id="edit_form" enctype="multipart/form-data">
        <input type="hidden" class="form-control" placeholder="Client ID" name="clientID" id="edit_clientID" value=""  required>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Name</label>
          <input type="text" class="form-control" placeholder="Client Name" name="clientName" id="edit_clientName" value="" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Client Email</label>
          <input type="text" class="form-control" placeholder="Client Email" name="clientEmail" id="edit_clientEmail" value=""required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Password</label>
          <input type="password" class="form-control" placeholder="Client Password" name="clientPassword" id="edit_clientPassword" value="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Client Phone Number</label>
          <input type="text" class="form-control" placeholder="Client Phone Number" name="clientPhoneNumber" id="edit_clientPhoneNumber" value="" required>
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



<script type="text/javascript">
  $(document).ready( function () {

    $(".editForm").click(function(){
    // to display in modal form automatically

        // var psyName = $("input[id='edit_psyName']").val();
        var clientID = $(this).attr('id');

        $j.ajax({
            url: '<?= base_url() ?>client/getClientID/',
            type: 'POST',
            data: {id:clientID},
            dataType : 'json',
            error: function() {
              alert('Something is wrong');
            },
            success: function(data) {
              $("#edit_clientName").val(data.clientName);
              $("#edit_clientEmail").val(data.clientEmail);
              $("#edit_clientPassword").val(data.clientPassword);
              $("#edit_clientPhoneNumber").val(data.clientPhoneNumber);
              $("#edit_form").attr('action',"<?= site_url('client/editClient/');?>"+data.clientID);
            }
        });


        });
});
</script>