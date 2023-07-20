<?= $this->extend('layouts/base'); ?>
<?= $this->section('page_title'); ?>
<span><?= $userdata->username; ?></span>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <?php if($userdata->profile_pic != '') : ?>
                    <img src="" height="60">
                <?php else: ?>
                    <img src="<?= base_url(); ?>/assets/images/avatar.png" height="100" width="100">
                <?php endif; ?>
                
                <h1>Hi, <?= ucfirst($userdata->username); ?></h2>
                <p>Your email address is: <?= ($userdata->email); ?></p>
                <p>Your mobile number is: <?= ($userdata->mobile); ?></p>
                <p>Your account is: <?= ($userdata->status); ?></p>

                <a href="<?= base_url() ?>logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>