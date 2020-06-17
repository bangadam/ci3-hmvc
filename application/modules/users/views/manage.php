<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Administration > Manage Users</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('admin') ?>"><i class="fa fa-home fa-lg"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Manage Users</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a class="float-right btn btn-primary" href="<?= base_url('users/create') ?>"><i class="fa
                    fa-plus"></i>
                        Create
                        New User</a>
                    <hr>
                    <?php if ($total_users == 1): ?>
                        <h6>There is one user on our database</h6>
                    <?php else: ?>
                        <h6>There are <strong><?= $total_users ?></strong> in our database</h6>
                    <?php endif ?>
                    <hr>
                    <?= $alert ?? "" ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $item) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item->username ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->first_name . ' ' . $item->last_name ?></td>
                                <td>
                                    <a href="<?= base_url('users/edit/' . $item->id) ?>" class="btn btn-warning"><i
                                                class="fa
                                fa-edit"></i></a>
                                    <a href="<?= base_url('users/delete/' . $item->id) ?>" class="btn btn-danger"><i
                                                class="fa
                                fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>