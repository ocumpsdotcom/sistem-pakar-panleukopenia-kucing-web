<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php elseif ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" onclick="<?php unset($_SESSION['message']); ?>" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else : ?>
            <?php endif; ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark d-inline"><?= $title; ?></h6>
                    <a href="" class="float-right" data-toggle="modal" data-target="#newPenyakitModal"><i class="fas fa-fw fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Penyakit</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($penyakit as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?> </th>
                                        <th scope="row"><?= $m['kode_penyakit'] ?> </th>
                                        <th scope="row"><?= $m['nama_penyakit'] ?> </th>
                                        <th scope="row">
                                            <a href="" data-toggle="modal" data-target="#updatePenyakitModal<?= $m['id']; ?>" class="badge badge-success">edit</a>
                                            <a class="badge badge-danger" href="<?= base_url(); ?>penyakit/deletedata/<?= $m['id']; ?> ">delete</a>
                                        </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newPenyakitModal" tabindex="-1" aria-labelledby="newPenyakitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPenyakitModalLabel">Tambah Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('penyakit'); ?> method="POST">
                    <div class=" form-group">
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit" required>
                    </div>
                    <div class=" form-group">
                        <textarea name="solusi" id="solusi" rows="5" class="form-control" required placeholder="Solusi Penyakit"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $i = 0; ?>
<?php foreach ($penyakit as $m) : $i++ ?>
    <div class="modal fade" id="updatePenyakitModal<?= $m['id']; ?>" tabindex="-1" aria-labelledby="updatePenyakitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePenyakitModalLabel">Edit Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('penyakit/updatepenyakit'); ?>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $m['id']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="update_nama_penyakit" name="update_nama_penyakit" value="<?= $m['nama_penyakit']; ?>" required>
                    </div>
                    <div class=" form-group">
                        <textarea name="update_solusi" id="update_solusi" rows="5" class="form-control" required><?= $m['solusi'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>