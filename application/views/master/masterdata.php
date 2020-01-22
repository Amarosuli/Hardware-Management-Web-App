<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 ml-auto"><?= $title; ?></h1>


    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">List Part Number
                <a href="#" class="btn btn-warning btn-icon-split float-right" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-dark-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text text-dark">Add New Hardware</span>
                </a>
            </h4>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Part Number</th>
                            <th>Description</th>
                            <th>Figure</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($mp as $mp) : ?>
                            <tr>
                                <td><?= $n; ?></td>
                                <td><?= $mp['part_number']; ?></td>
                                <td><?= $mp['part_description']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#figure<?= $n; ?>">
                                        Show
                                    </button>

                                    <div class="modal fade" id="figure<?= $n; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src=" <?= base_url('assets/img/figure/' . $mp['part_number']); ?>.png" alt="..." class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
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
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">New Hardware</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label class="float-right">Part Number</label>
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