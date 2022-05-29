<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?= URLROOT; ?>/user/register" method="post">
                    <div class="form-group">
                        <label for="name">Name <sup class="obrigatorio">*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?= !empty($this->userForm->get_name_err()) ? 'is-invalid' : ''; ?>" value="<?= $this->userForm->get_name(); ?>">
                        <span class="invalid-feedback"><?= $this->userForm->get_name_err(); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail <sup class="obrigatorio">*</sup></label>
                        <input type="text" name="email" class="form-control form-control-lg <?= !empty($this->userForm->get_email_err()) ? 'is-invalid' : ''; ?>" value="<?= $this->userForm->get_email(); ?>">
                        <span class="invalid-feedback"><?= $this->userForm->get_email_err(); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <sup class="obrigatorio">*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?= !empty($this->userForm->get_password_err()) ? 'is-invalid' : ''; ?>" value="<?= $this->userForm->get_password(); ?>">
                        <span class="invalid-feedback"><?= $this->userForm->get_password_err(); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password <sup class="obrigatorio">*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?= !empty($this->userForm->get_confirm_password_err()) ? 'is-invalid' : ''; ?>" value="<?= $this->userForm->get_confirm_password(); ?>">
                        <span class="invalid-feedback"><?= $this->userForm->get_confirm_password_err(); ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT; ?>/user/login" class="btn btn-light btn-block">Have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>