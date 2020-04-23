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