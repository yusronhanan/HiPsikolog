<section class="py-5">
<div class="container main-div" style="margin-bottom:250px">
    <div class="row h-100 justify-content-center align-items-center">
    <h2>MY APPOINTMENT</h2>
    <div class="col-12 col-sm-8 col-lg-10">
        <?php if($data_appointment == null){ ?>
            <br>
            <br>
            <br>
       <a href="<?= site_url("home/counselling/")?>#counsellingpackage" style="margin: 0;" class="btn btn-primary">Make an Appointment</a>

        <?php } ?>
      <ul class="list-group">
        <?php $no=1; foreach ($data_appointment as $da) { ?>     
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p>Appointment ID : <?= $da->appointmentID?></p>
                <button class="btn btn-primary" data-toggle="collapse" href="#collapseDetail<?=$no?>">Details</button>
            </div>
            <div class="collapse" id="collapseDetail<?=$no?>">
                <div class="card-body">
                <table>
                    <?php foreach ($data_package as $dp) { 
                      if($da->counsellingID == $dp->counsellingID) {
                    ?>    
                    <tr>
                        <th>Package</th>
                        <td>:</td>
                        <td><?php echo $dp->counsellingName ?></td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>:</td>
                        <td><?php echo $dp->counsellingDuration?> minutes</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>:</td>
                        <td>Rp. <?php echo number_format($dp->counsellingPrice)?></td>
                    </tr>
                    <?php }} ?>
                    <tr>
                        <th>Date</th>
                        <td>:</td>
                        <td><?php echo date_format(date_create($da->date),"d/m/y") ?></td>                                               
                    </tr>
                    <tr>                
                        <th>Time</th>
                        <td>:</td>
                        <td><?php echo $da->time ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td><?php echo $da->status ?></td>
                    </tr>
                </table>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-start">
                    <button type="button" class="btn btn-info infoView" data-toggle="modal" data-target="#info" id="<?= $da->psyID ?>">View Psychologist Information</button>
                    <?php if($da->status == 'Requested'){ ?>
                        <a href="<?= site_url('Appointment/updateStatus/Cancelled/'.$da->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Cancel</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php $no++; } ?>
      </ul>
      </form>
    </div>
  </div>
</div>
</section>

<!-- Modal Psychologist Info -->

<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Psychologist Information</h2>
        </div>
        <center>
        <img src=""  width="200px"  class="img-fluid" alt="" id="view_psyPhoto">
        </center>
          <div class="modal-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td id="view_psyName"></td>                                              
                    </tr>
                    <tr>                
                        <th>E-mail</th>
                        <td>:</td>
                        <td id="view_psyEmail"></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>:</td>
                        <td id="view_psyPhoneNumber"></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>:</td>
                        <td id="view_psyDesc"></td>
                    </tr>
                </table>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready( function () {

    $(".infoView").click(function(){
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
              $("#view_psyName").html(data.psyName);
              $("#view_psyEmail").html(data.psyEmail);
              $("#view_psyPhoneNumber").html(data.psyPhoneNumber);
              $("#view_psyDesc").html(data.psyDesc);
              $("#view_psyPhoto").attr('src',"<?= base_url().'assets/img/'?>"+data.psyPhoto);
              $("#view_psyPhoto").attr('alt',""+data.psyName);
            }
        });


        });
});
</script>