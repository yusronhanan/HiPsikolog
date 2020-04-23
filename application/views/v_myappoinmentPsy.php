<section class="py-5">
<div class="container main-div">
    <div class="row h-100 justify-content-center align-items-center">
    <h2>MY APPOINTMENT</h2>
    <div class="col-12 col-sm-8 col-lg-10">
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
                <div class="card-footer d-flex">
                    <div class="mr-auto p-2">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#info<?= $da->clientID ?>">View Client Information</button>
                    </div>
                    <?php if($da->status == 'Requested'){ ?>
                        <div class="p-2">
                            <a href="<?= site_url('Appointment/updateStatus/Accepted/'.$da->appointmentID)?>" class="btn btn-success" onClick="return confirm('Are you sure?')">Accept</a>
                            <a href="<?= site_url('Appointment/updateStatus/Decline/'.$da->appointmentID)?>" class="btn btn-danger" onClick="return confirm('Are you sure?')">Decline</a>
                            
                        </div>
                    <?php }?>
                     

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

<?php foreach ($data_client as $d ) {?>
<div class="modal fade" id="info<?php echo $d->clientID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Client Information</h2>
        </div>
        <center>
        <img src="<?= base_url().'assets/img/'.$d->clientPhoto?>" width="200px" class="img-fluid" alt="<?= $d->clientName?>">
        </center>
          
          <div class="modal-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td><?php echo $d->clientName ?></td>                                              
                    </tr>
                    <tr>                
                        <th>E-mail</th>
                        <td>:</td>
                        <td><?php echo $d->clientEmail ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>:</td>
                        <td><?php echo $d->clientPhoneNumber ?></td>
                    </tr>
                </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>