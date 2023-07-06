<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>
<section>
    <div class="container">
    <div class="row">
      <!-- Post Content Column -->
      <!-- Sidebar Widgets Column -->
	<div class="col-lg-12">
        <!-- Preview Image -->
        <img class="img-fluid rounded center" width="800px;" src="<?= base_url() ?>/assets/images/404.jpg" alt="">

      </div>
	

    </div>
    <!-- /.row -->

  </div>
</section>
<?= $this->endSection(); ?>