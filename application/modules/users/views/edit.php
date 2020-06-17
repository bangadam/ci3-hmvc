<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $page_title ?? "Untitled web page" ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('admin') ?>"><i class="fa fa-home fa-lg"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Edit User</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <?= $alert ?? "" ?>
                    <hr>
                    <?php echo validation_errors("<p style='color:red'>", "</p>"); ?>
                    <form action="<?= base_url('users/update/'.$user->id) ?>" method="POST">
                        <div class="form-group">
                            <label for="" class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $user->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password Confirmation</label>
                            <input type="password" name="passconf" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?= $user->first_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Choose Role</label>
                            <select name="role" class="form-control">
                                <option value="default"  <?=  $user->role == 'default' ? 'selected' : ''
                                ?>>Default</option>
                                <option value="member"  <?=  $user->role == 'member' ? 'selected' : ''
                                ?>>Member</option>
                                <option value="admin" <?= $user->role == 'admin' ? 'selected' : ''  ?> >Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>