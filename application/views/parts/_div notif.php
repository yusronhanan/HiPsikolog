<?php if(!empty($this->session->flashdata('notif'))) { ?>
	    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('notif'); ?>
	    </div>
	    <?php } ?> 