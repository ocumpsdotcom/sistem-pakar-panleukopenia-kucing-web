<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (is_null($user['alamat']) || is_null($user['no_hp'])) { ?>
        <div class="row">
            <div class="col-lg-12 text-center p-5" style="margin-top: 100px;">
                <div class="card p-5">
                    <p>Mohon lengkapi data alamat dan no handphone terlebih dahulu dengan cara klik Edit Profile dimenu My Profile</p>
                    <a href="<?= base_url('/user') ?>" class="badge badge-sm badge-success">Alihkan Sekarang</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Page Heading -->

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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <form active <?= base_url('diagnosis') ?> method="POST">
                                        <?php $i = 1; ?>
                                        <?php foreach ($gejala as $d) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?> </th>
                                                <th scope="row"><?= $d['kode_gejala'] ?> </th>
                                                <th scope="row"><?= $d['nama_gejala'] ?> </th>
                                                <th>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="cf_<?= $d["kode_gejala"] ?>">Pilih Kemungkinan</label>
                                                        </div>
                                                        <select class="custom-select" id="cf_<?= $d["kode_gejala"] ?>" name="cf_<?= $d["kode_gejala"] ?>" required>
                                                            <option value="0">Klik untuk memilih</option>
                                                            <option value="-0.1">Pasti Tidak</option>
                                                            <option value="-0.8">Hampir Pasti Tidak</option>
                                                            <option value="-0.6">Kemungkinan Besar Tidak</option>
                                                            <option value="-0.4">Mungkin Tidak</option>
                                                            <option value="0.2">Tidak Tahu</option>
                                                            <option value="0.4">Mungkin</option>
                                                            <option value="0.6">Kemungkinan Besar</option>
                                                            <option value="0.8">Hampir Pasti</option>
                                                            <option value="1">Pasti</option>
                                                        </select>
                                                    </div>
                                                </th>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                        <tr>
                                            <th>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </th>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    <?php } ?>
</div>

</div>
<!-- End of Main Content -->