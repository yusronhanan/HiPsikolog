<?php foreach ($psyAppointment as $pa) {  ?>
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