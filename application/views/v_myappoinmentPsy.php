<section class="py-5">
<div class="container main-div" style="margin-bottom:350px">
    <div class="row h-100 justify-content-center align-items-center">
    <h2>MY APPOINTMENT</h2>
    <div class="col-12 col-sm-8 col-lg-10">
   
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item">
                <a href="#active" class="nav-link" data-toggle="tab">Active</a>
            </li>
            <li class="nav-item">
                <a href="#history" class="nav-link" data-toggle="tab">History</a>
            </li>
        </ul>
      
        <div class="tab-content">
            <div class="tab-pane fade" id="active">
            <?php if($data_appointment_active == null){ ?>
            <br>
            <br>
            <br>
       <h3>No Active Appointment</h3>
        <?php } ?>
            <ul class="list-group">
        <?php $no=1; foreach ($data_appointment_active as $dac) { ?>     
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p>Appointment ID : <?= $dac->appointmentID?></p>
                <button class="btn btn-primary" data-toggle="collapse" href="#collapseDetail<?=$no?>">Details</button>
            </div>
            <div class="collapse" id="collapseDetail<?=$no?>">
                <div class="card-body">
                <table>
                    <?php foreach ($data_package as $dp) { 
                      if($dac->counsellingID == $dp->counsellingID) {
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
                        <td><?php echo date_format(date_create($dac->date),"d/m/y") ?></td>                                               
                    </tr>
                    <tr>                
                        <th>Time</th>
                        <td>:</td>
                        <td><?php echo $dac->time ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td><?php echo $dac->status ?></td>
                    </tr>
                </table>
                </div>
                <div class="card-footer d-flex">
                    <div class="mr-auto p-2">
                        <button type="button" class="btn btn-info infoView" data-toggle="modal" data-target="#info" id="<?= $dac->clientID ?>">View Client Information</button>
                    </div>
                    <?php if($dac->status == 'Requested'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/Accepted/'.$dac->appointmentID)?>" class="btn btn-success" onClick="return confirm('Are you sure?')">Accept</a>
                            <a href="<?= site_url('Appointment/updateStatus/Decline/'.$dac->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Decline</a>
                            
                        </div>
                    <?php }?>
                    <?php if($dac->status == 'Accepted'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/In Session/'.$dac->appointmentID)?>" class="btn btn-success" onClick="return confirm('Are you sure?')">In Session</a>
                            
                        </div>
                    <?php }?>
                    <?php if($dac->status == 'In Session'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/Completed/'.$dac->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Completed</a>                            
                        </div>
                    <?php }?>
                     

                </div>
            </div>
        </div>
        <?php $no++; } ?>
      </ul>
            </div>
            <div class="tab-pane fade" id="history">
            <?php if($data_appointment_history == null){ ?>
            <br>
            <br>
            <br>
       <h3>No History Appointment</h3>
        <?php } ?>
            <ul class="list-group">
        <?php $no=1; foreach ($data_appointment_history as $dah) { ?>     
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p>Appointment ID : <?= $dah->appointmentID?></p>
                <button class="btn btn-primary" data-toggle="collapse" href="#collapseDetail<?=$no?>">Details</button>
            </div>
            <div class="collapse" id="collapseDetail<?=$no?>">
                <div class="card-body">
                <table>
                    <?php foreach ($data_package as $dp) { 
                      if($dah->counsellingID == $dp->counsellingID) {
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
                        <td><?php echo date_format(date_create($dah->date),"d/m/y") ?></td>                                               
                    </tr>
                    <tr>                
                        <th>Time</th>
                        <td>:</td>
                        <td><?php echo $dah->time ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td><?php echo $dah->status ?></td>
                    </tr>
                </table>
                </div>
                <div class="card-footer d-flex">
                    <div class="mr-auto p-2">
                        <button type="button" class="btn btn-info infoView" data-toggle="modal" data-target="#info" id="<?= $dah->clientID ?>">View Client Information</button>
                    </div>
                    <?php if($dah->status == 'Requested'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/Accepted/'.$dah->appointmentID)?>" class="btn btn-success" onClick="return confirm('Are you sure?')">Accept</a>
                            <a href="<?= site_url('Appointment/updateStatus/Decline/'.$dah->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Decline</a>
                            
                        </div>
                    <?php }?>
                    <?php if($dah->status == 'Accepted'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/In Session/'.$dah->appointmentID)?>" class="btn btn-success" onClick="return confirm('Are you sure?')">In Session</a>
                            
                        </div>
                    <?php }?>
                    <?php if($dah->status == 'In Session'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/Completed/'.$dah->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Completed</a>                            
                        </div>
                    <?php }?>
                     

                </div>
            </div>
        </div>
        <?php $no++; } ?>
      </ul>
            </div>
        </div>
    
    </div>
  </div>
</div>
</section>

<!-- Modal Psychologist Info -->

<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Client Information</h2>
        </div>
        <center>
        <img src="" width="200px" class="img-fluid" alt="" id="view_clientPhoto">
        </center>
          
          <div class="modal-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td id="view_clientName"></td>                                              
                    </tr>
                    <tr>                
                        <th>E-mail</th>
                        <td>:</td>
                        <td id="view_clientEmail"></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>:</td>
                        <td id="view_clientPhoneNumber"></td>
                    </tr>
                </table>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready( function () {
    $("#myTab a:first").tab('show'); // show last tab on page load

    $(".infoView").click(function(){
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
              $("#view_clientName").html(data.clientName);
              $("#view_clientEmail").html(data.clientEmail);
              $("#view_clientPhoneNumber").html(data.clientPhoneNumber);
              $("#view_clientPhoto").attr('src',"<?= base_url().'assets/img/'?>"+data.clientPhoto);
              $("#view_clientPhoto").attr('alt',""+data.clientName);
            }
        });


        });
});
</script>