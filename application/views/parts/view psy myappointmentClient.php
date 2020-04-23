
<?php foreach ($data_psy as $d ) {?>
<div class="modal fade" id="info<?php echo $d->psyID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Psychologist Information</h2>
        </div>
        <center>
        <img src="<?= base_url().'assets/img/'.$d->psyPhoto?>"  width="200px"  class="img-fluid" alt="<?= $d->psyName?>">
        </center>
          <div class="modal-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td><?php echo $d->psyName ?></td>                                              
                    </tr>
                    <tr>                
                        <th>E-mail</th>
                        <td>:</td>
                        <td><?php echo $d->psyEmail ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>:</td>
                        <td><?php echo $d->psyPhoneNumber ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>:</td>
                        <td><?php echo $d->psyDesc ?></td>
                    </tr>
                </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>