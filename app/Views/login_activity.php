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
            <h4>Login Activity</h4>
            <?php if(count($login_info)>0) : ?>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>User Agent</th>
                        <th>IP</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                    </tr>
                    <?php foreach($login_info as $info): ?>
                        <tr>
                            <td> <?= $info->id; ?> </td>
                            <td> <?= $info->agent; ?> </td>
                            <td> <?= $info->ip; ?> </td>
                            <td><?= date("l dS M Y h:i:s a", strtotime($info->login_time)); ?></td>
                            <td> <?= $info->logout_time; ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <h5>Sorry, no information found!</h5>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>