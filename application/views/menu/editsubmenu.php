                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row"></div>
                    <div class="col-lg">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message') ?>

                        <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Submenu Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="New Submenu Name or Existing Name" value="<?= $load; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu_id" class="col-sm-2 col-form-label">Change Visibility Location</label>
                                <div class="col-sm-10">
                                    <select name="menu_id" id="menu_id" class="form-control col-sm-3">
                                        <option value="">Select Menu</option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">Submenu URLs</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="New URL or Existing URL">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icon" class="col-sm-2 col-form-label">Submenu Icon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Fontawesome Icon String">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-check">
                                    <div class="col-sm-10">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal -->

                <!-- Modal -->
                <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="New Sub Menu Title">
                                    </div>
                                    <div class="form-group">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URLs">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon (Use Fontawesome)">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">Active? (Check if active)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>