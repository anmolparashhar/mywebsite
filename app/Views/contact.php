<?php
$page_session = \CodeIgniter\Config\Services::session();
?>
<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>
<script>
    setTimeout(function() {
        $("#hidemsg").hide();
    }, 3000);
</script>
<section>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4 text-primary"><i>Contact Us</i></h1>
                <br>
                <?php if($page_session->getTempdata('success')): ?>
                    <div id='hidemsg' class='alert alert-success'><?= $page_session->getTempdata('success') ?></div>
                <?php endif; ?>

                <?php if($page_session->getTempdata('error')): ?>
                    <div id='hidemsg' class='alert alert-danger'><?= $page_session->getTempdata('error') ?></div>
                <?php endif; ?>
                <?= form_open(); ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="uname" class="form-control" placeholder="Enter your name" value='<?= set_value('uname') ?>'>
                    <span class='text-danger'><?= display_error($validation, 'uname'); ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value='<?= set_value('email') ?>'>
                    <span class='text-danger'><?= display_error($validation, 'email'); ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter mobile" value='<?= set_value('mobile') ?>'>
                    <span class='text-danger'><?= display_error($validation, 'mobile'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Message</label>
                    <textarea name="msg" class="form-control" value='<?= set_value('msg') ?>'></textarea>
                    <span class='text-danger'><?= display_error($validation, 'msg'); ?></span>
                </div>
                
                <button type="submit" name="save" class="btn btn-primary" value='Send'>Submit</button>
                <br><br><br>
                <?= form_close(); ?>
                <div class='pb-5'></div>
            </div>
        </div>
	</div>		
</section>
<?= $this->endSection(); ?>