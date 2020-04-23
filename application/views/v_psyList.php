<div class="container">
    <div class="box main-div">
      <h2>PSYCHOLOGIST DATA</h2>
      <p>Data Table HiPsikolog</p>
          
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpsy">Add Psychologist</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Description</th>
            <th>Photo</th>

            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data_psy as $d ) {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->psyID ?></td>

            <td><?php echo $d->psyName ?></td>
            <td><?php echo $d->psyEmail ?></td>
            <!-- <td><?php echo $d->psyPassword ?></td> -->
            <td><?php echo $d->psyPhoneNumber ?></td>
            <td><?php echo $d->psyDesc ?></td>
            <td><img width="100px" height="100px" src="<?php echo base_url().'assets/img/'.$d->psyPhoto ?>" alt="<?php echo $d->psyName ?>"></td>

            <td><button type="button" class="btn btn-warning editForm" data-toggle="modal" data-target="#edit" id="<?= $d->psyID ?>"><i class="fas fa-user-edit"></i></button></td>
            <td><a type="button" class="btn btn-danger"  href="<?= site_url('psychologist/deletePsychologist/'.$d->psyID);?>" onClick="return confirm('Are you sure?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>
<br/>

<!-- Modal Edit Psychologist -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT DATA</h2>
        </div>
        <form method="post" action="<?= site_url('psychologist/editPsychologist/');?>" id="edit_form" enctype="multipart/form-data">

          <div class="modal-body">
            <!-- <input type="hidden" class="form-control" placeholder="psy ID" name="psyID" id="edit_psyID" value=""  required> -->
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Name</label>
              <input type="text" class="form-control" placeholder="psy Name" name="psyName" id="edit_psyName" value="" required >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Psychologist Email</label>
              <input type="text" class="form-control" placeholder="psy Email" name="psyEmail" id="edit_psyEmail" value=""required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Password</label>
              <input type="password" class="form-control" placeholder="psy Password" name="psyPassword" id="edit_psyPassword" value="" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Phone Number</label>
              <input type="text" class="form-control" placeholder="psy Phone Number" name="psyPhoneNumber" id="edit_psyPhoneNumber" value="" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Psychologist Description</label>
              <textarea class="form-control" placeholder="Psychologist Description" name="psyDesc" id="edit_psyDesc" required></textarea>
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


<!-- Modal add Psychologist -->
<div class="modal fade" id="addpsy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h2>Add Data Psychologist</h2>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= site_url('psychologist/addPsychologist') ?>"  enctype="multipart/form-data">
            <!-- <input type="hidden" class="form-control" placeholder="Psychologist ID" name="psyID" required> -->
            <div class="form-group">
                <label for="formGroupExampleInput">Psychologist Name</label>
                <input type="text" class="form-control" placeholder="Psychologist Name" name="psyName" required >
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Psychologist Email</label>
                <input type="text" class="form-control" placeholder="Psychologist Email" name="psyEmail" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Psychologist Password</label>
                <input type="password" class="form-control" placeholder="Psychologist Password" name="psyPassword" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Psychologist Phone Number</label>
                <input type="text" class="form-control" placeholder="Psychologist Phone Number" name="psyPhoneNumber" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Psychologist Description</label>
                <textarea class="form-control" placeholder="Psychologist Description" name="psyDesc" required></textarea>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text">Profile Picture</span>
              </div>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*' required>
                  <label class="custom-file-label text-left" for="uploadImage">Choose file</label>
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
</div>

<script type="text/javascript">
  


  $(document).ready( function () {
    $('.custom-file-input').on('change', function() { 
		let fileName = $(this).val().split('\\').pop(); 
		$(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});

    $(".editForm").click(function(){
    // to display in modal form automatically

        // var psyName = $("input[id='edit_psyName']").val();
        var psyID = $(this).attr('id');

        $j.ajax({
            url: '<?= base_url() ?>psychologist/getPsyID/',
            type: 'POST',
            data: {id:psyID},
            dataType : 'json',
            error: function() {
              alert('Something is wrong');
            },
            success: function(data) {
              $("#edit_psyName").val(data.psyName);
              $("#edit_psyEmail").val(data.psyEmail);
              $("#edit_psyPassword").val(data.psyPassword);
              $("#edit_psyPhoneNumber").val(data.psyPhoneNumber);
              $("#edit_psyDesc").html(data.psyDesc);
              $("#edit_form").attr('action',"<?= site_url('psychologist/editPsychologist/');?>"+data.psyID);
            }
        });


        });
});
</script>