<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">List Kit (PPCL)
                <a href="#" class="btn btn-warning btn-icon-split float-right" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-dark-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text text-dark">Create New Kit</span>
                </a>
            </h4>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kit Name</th>
                            <th>Kit Description</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($st as $st) : ?>
                            <tr>

                                <td><?= $n; ?></td>
                                <td><?= $st; ?></td>
                                <td>
                                    <a href="" class="badge badge-success">Edit</a> |
                                    <a href="" class="badge badge-danger">Remove</a>
                                </td>

                            </tr>
                            <?php $n++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">New Kit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label class="float-right">Kit Name</label>
                            <input type="text" class="form-control" name="part_number" id="part_number">
                        </div>
                        <div class="form-group">
                            <label class="float-right">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->