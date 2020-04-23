<section class="py-5">
<div class="container main-div">
    <div class="row h-100 justify-content-center align-items-center">
    <div class="col-12 col-sm-8 col-lg-10">
      <h6 class="text-muted">Menu Admin</h6> 
      <ul class="list-group">
      
        <a href="<?= site_url("home/appointmentList")?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          <div class="flex-column">
          Appointment List
            <p><small>Add, Edit, and Delete</small></p>
          </div>
          <div class="image-parent">
              <img src="<?= base_url().'assets/img/'?>appointment.png" class="img-fluid" alt="" width="100px">
          </div>
        </a>

        <a href="<?= site_url("home/psychologistlist")?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          <div class="flex-column">
          Psychologist List
            <p><small>Add, Edit, and Delete</small></p>
          </div>
          <div class="image-parent">
              <img src="<?= base_url().'assets/img/'?>psy.png" class="img-fluid" alt="" width="100px">
          </div>
        </a>

        <a href="<?= site_url("home/clientList")?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          <div class="flex-column">
          Client List
            <p><small>Edit and Delete</small></p>
          </div>
          <div class="image-parent">
              <img src="<?= base_url().'assets/img/'?>society.png" class="img-fluid" alt="" width="100px">
          </div>
        </a>
      </ul>
    </div>
  </div>
</div>
</section>