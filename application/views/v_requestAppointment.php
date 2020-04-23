<section class="py-5">
<div class="container main-div">
    <div class="row h-100 justify-content-center align-items-center">
    <div class="col-12 col-sm-8 col-lg-10">
    <div class="form-group">
    <form action="<?= site_url('appointment/requestAppointment')?>" method="post" id="requestAppointment">
            <label for="formGroupExampleInput2">Counselling Package</label>
            <select class="form-control" id="formGroupExampleInput2" name="counsellingID" required>
            <?php foreach ($data_package as $dp ) { ?>
                        <?php if($pkg == $dp->counsellingID){ ?>
                        <option value="<?= $dp->counsellingID; ?>" selected><?=$dp->counsellingName ?> (<?=$dp->counsellingDuration ?> minutes) only <?= 'Rp ' . number_format($dp->counsellingPrice);  ?></option>
                        <?php } else{ ?>
                         <option value="<?= $dp->counsellingID; ?>" ><?=$dp->counsellingName ?> (<?=$dp->counsellingDuration ?> minutes) only <?= 'Rp ' . number_format($dp->counsellingPrice);  ?></option>
                        <?php } ?>
                        
            <?php } ?>
            </select>            
    </div>
    <div class="form-group">
          <label for="formGroupExampleInput2">Date</label>
          <input type="date" class="form-control" placeholder="Date" name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group">
          <label for="formGroupExampleInput2">Time</label>
            <select class="form-control" id="formGroupExampleInput2" name="time" required>
            <?php for ($i=0; $i < count($arrTime); $i++) {?>
                  <option value="<?= $arrTime[$i]; ?>"  ><?=$arrTime[$i] ?></option>
                
            <?php } ?>
            </select>
    </div>
      <h6 class="text-muted">Choose Psychologist to Request an Appointment</h6> 
      <input type="hidden" name="psyID">
      <ul class="list-group">
      <?php foreach ($psyAppointment as $pa) { ?>
        <a onclick="counselling('<?= $pa->psyID?>')" id="selectPsy" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          <div class="flex-column">
            <?= $pa->psyName?>
            <p><small><?= $pa->psyDesc?></small></p>
          </div>
          <div class="image-parent">
              <img width="150px" src="<?= base_url().'assets/img/'.$pa->psyPhoto?>" class="img-fluid" alt="<?= $pa->psyName?>">
          </div>
        </a>
         
        <?php } ?>
      </ul>
      </form>
    </div>
  
  </div>
</div>
</section>

<script>
  function counselling(psyID){
      $("[name='psyID']").val(psyID);
      var isSubmit = confirm("Are you sure ?");
      if(isSubmit){
      $("form#requestAppointment").submit();
      }
    }
</script>
