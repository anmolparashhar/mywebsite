<php $page_session = \Config\Services::session();?>
<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>
<!-- Sign in with Google CSS  -->
<style>
    .login-with-google-btn {
  transition: background-color .3s, box-shadow .3s;
    
  padding: 12px 16px 12px 100px;
  border: none;
  border-radius: 3px;
  box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
  
  color: #757575;
  font-size: 14px;
  font-weight: 500;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
  
  background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
  background-color: white;
  background-repeat: no-repeat;
  background-position: 12px 11px;
  
  &:hover {
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
  }
  
  &:active {
    background-color: #eeeeee;
  }
  
  &:focus {
    outline: none;
    box-shadow: 
      0 -1px 0 rgba(0, 0, 0, .04),
      0 2px 4px rgba(0, 0, 0, .25),
      0 0 0 3px #c8dafc;
  }
  
  &:disabled {
    filter: grayscale(100%);
    background-color: #ebebeb;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
    cursor: not-allowed;
  }
}
</style>
<!-- End of Style for Sign-in with Google -->
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-6 col-xg-3">
          <br>
        <h1 class="text-center">Register</h1>
        <?php
        if($page_session->getTempdata('success')):
          ?>
          <div class="alert alert-success"><?= $page_session->getTempdata('success') ?></div>
        <?php
          endif;
        ?>
        <?php
        if($page_session->getTempdata('error')):
          ?>
          <div class="alert alert-danger"><?= $page_session->getTempdata('error') ?></div>
        <?php
          endif;
        ?>
        <?= form_open(); ?>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" value="<?= set_value('username')?>">
            <span class="text-danger"><?= display_error($validation, 'username');?> </span>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email')?>">
            <span class="text-danger"><?= display_error($validation, 'email');?> </span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="<?= set_value('password')?>">
            <span class="text-danger"><?= display_error($validation, 'password');?> </span>
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" value="<?= set_value('cpassword')?>">
            <span class="text-danger"><?= display_error($validation, 'cpassword');?> </span>
        </div>
        <div class="form-group">
            <label for="">Mobile</label>
            <input type="text" name="mobile" class="form-control" value="<?= set_value('mobile')?>">
            <span class="text-danger"><?= display_error($validation, 'mobile');?> </span>
        </div>
        <div class="form-group">
            <input type="submit" name="register" value="Register" class="btn btn-primary">
        </div>
        <div> <button type="button" class="login-with-google-btn" > Sign in with Google </button> </div>
        <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>