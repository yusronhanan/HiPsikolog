<section class="py-5">
<div class="container main-div">
    <div class="row h-100 justify-content-center align-items-center">
    <div class="col-12 col-sm-8 col-lg-10">
      <h6 class="text-muted">Psychologist</h6> 
      <ul class="list-group">
      <?php foreach ($psyAppointment as $pa) { ?>
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          <div class="flex-column">
            <?= $pa->psyName?>
            <p><small><?= $pa->psyDesc?></small></p>
          </div>
          <div class="image-parent">
              <img src="<?= base_url().'assets/img/'.$pa->psyPhoto?>" class="img-fluid" alt="foto psikolognya">
          </div>
        </a>
        </a> 
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
</section>