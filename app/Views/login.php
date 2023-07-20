<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <br>
        <h1 class="text-center">Login</h1>
        <br>
        <?php
        if(session()->getTempdata('success')):
          ?>
          <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
        <?php
          endif;
        ?>
        <?php
        if(session()->getTempdata('error')):
          ?>
          <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
        <?php
          endif;
        ?>
        <?= form_open(); ?>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email')?>">
            <span class="text-danger"><?= display_error($validation, 'email');?> </span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            <span class="text-danger"><?= display_error($validation, 'password');?> </span>
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </div>
        <br>
        <div class="form-group">
            <a href="https://www.google.com" target="_blank"><img height=50 width=300 src="<?= base_url()?>/assets/images/Google.png"></a>
        </div>
        <div class="form-group">
            <a href="https://www.facebook.com" target="_black"><img height=60 width=300 src="<?= base_url()?>/assets/images/facebook.png"></a>
        </div>
        <br><br><br>
        <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>