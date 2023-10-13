<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-dark d-inline">Rekap Konsultasi</h6>
                </div>
                <div class="card-body">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="row mb-4">
                                    <div class="col-lg-5">Nama :</div>
                                    <div class="col-lg-6"><?= $dataPemilik[0]['name'] ?></div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-5">Tanggal Diagnosis :</div>
                                    <div class="col-lg-6"><?= $dataPemilik[0]['created_at'] ?></div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-5">Alamat :</div>
                                    <div class="col-lg-6"><?= $dataPemilik[0]['alamat'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">NoHp :</div>
                                    <div class="col-lg-6"><?= $dataPemilik[0]['no_hp'] ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <div class="col-lg-5">Diagnosis :</div>
                                    <div class="col-lg-6 text-danger"><?= $dataPemilik[0]['nama_penyakit'] ?></div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-5">Tingkat Kepastian :</div>
                                    <div class="col-lg-6 text-danger"><?= $dataPemilik[0]['tingkat_kepercayaan'] * 100 ?> %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-dark d-inline">Gejala Yang Diinputkan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Gejala</th>
                                    <th>CF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($gejalaDipilih as $gejala) : ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i ?> </th>
                                        <th scope="row">[<?= $gejala['kode_gejala'] ?>] <?= $gejala['nama_gejala'] ?></th>
                                        <th scope="row" class="text-center"><?= $gejala['cf_value'] ?> </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-dark d-inline">Hasil Diagnosa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <p>
                                Kesimpulan : <br>
                                Penyakit yang diderita oleh pasien adalah :
                            <div class="text-danger text-inline"><?= $dataPemilik[0]['nama_penyakit'] ?></div> dengan
                            tingkat kepercayaan = <?= $dataPemilik[0]['tingkat_kepercayaan'] ?>
                            atau <div class="text-danger text-inline"><?= $dataPemilik[0]['tingkat_kepercayaan'] * 100 ?> % </div>
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p class="mb-5">
                                Solusi : <br>
                                <?= $dataPemilik[0]['solusi'] ?>
                            </p>
                            <div class="mt-5">
                                <a href="<?= base_url('pdfview/consultation/' . $dataPemilik[0]['kode_konsultasi']) ?>" class="btn btn-info btn-md">Cetak Rekap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->