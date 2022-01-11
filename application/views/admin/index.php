<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Welcome to Dashboard!</h6>
        </div>
        <div class="card-body">
            <p>Hi, <?= $user['name'];  ?>~! Welcome back to Dashboard!</p>
            <p class="mb-0">Start customizing this view by editing <code>/application/views/admin/index.php</code>!</p>
            <hr>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime autem perspiciatis nostrum quam corrupti quia eos. Nesciunt libero neque enim ducimus tempora cupiditate unde aut tenetur numquam laudantium, illo beatae.</p>
        </div>
    </div>

    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registred Users (In Database)
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">3</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p><?= password_needs_rehash('$2y$10$xu3cc2hZT2ONJHTD4ecq..zyNyOUs10rKxQphHNB0xMU4ax9SKqUi', PASSWORD_DEFAULT); ?></p>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->