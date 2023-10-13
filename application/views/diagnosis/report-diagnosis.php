<html>

<head>
    <title><?= $title ?></title>
</head>

<body>
    <style>
        .text-size-30 {
            font-size: 30px;
        }

        .users-label {
            padding: 5px;
            height: 30px;
            width: 200px;
            font-size: 25px;
        }

        .users-data {
            padding: 5px;
            height: 30px;
            width: 400px;
            font-size: 25px;
        }

        .users-data-head {
            padding: 5px;
            height: 30px;
            width: 300px;
            font-size: 25px;
            text-align: center;
        }
    </style>
    <div style="text-align: center;">
        <h2 style="margin: 0px;"><?= $title ?></h2>
    </div>
    <hr>

    <table style="margin-top: 20px;">
        <tr>
            <th class="users-data-head">Data user</th>
            <th class="users-data-head"></th>
            <th class="users-data-head">Data Konsultasi</th>
            <th class="users-data-head"></th>
        </tr>
        <tr style="font-size: 30px;">
            <td class="users-label">Nama :</td>
            <td class="users-data"><?= $dataPemilik[0]['name'] ?></td>
            <td class="users-label">Diagnosa :</td>
            <td class="users-data"><?= $dataPemilik[0]['nama_penyakit'] ?></td>
        </tr>
        <tr style="font-size: 30px;">
            <td class="users-label">Tanggal Diagnosa :</td>
            <td class="users-data"><?= $dataPemilik[0]['created_at'] ?></td>
            <td class="users-label">Tingkat Kepastian :</td>
            <td class="users-data" style="color: red;"><?= $dataPemilik[0]['tingkat_kepercayaan'] * 100 ?>%</td>
        </tr>
        <tr style="font-size: 30px;">
            <td class="users-label">Alamat :</td>
            <td class="users-data"><?= $dataPemilik[0]['alamat'] ?></td>
        </tr>
        <tr style="font-size: 30px;">
            <td class="users-label">NoHp :</td>
            <td class="users-data"><?= $dataPemilik[0]['no_hp'] ?></td>
        </tr>

    </table>

    <div style=" justify-content: center;">
        <table id="TabelTampilData" style="table-layout: auto; width: 100%; border-collapse: collapse; margin-top: 10px; margin-left: 10px;">
            <thead align="center">
                <tr style="text-align: center; font-size: 15px;">
                    <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:12px;">No</th>
                    <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:130px;">Gejala</th>
                    <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:130px;">CF</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($gejalaDipilih as $gejala) { ?>
                    <tr style="text-align: center; font-size: 15px;">
                        <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:12px;"><?= $i ?></th>
                        <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:130px;">[<?= $gejala['kode_gejala'] ?>] <?= $gejala['nama_gejala'] ?></th>
                        <th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width:130px;"><?= $gejala['cf_value'] ?></th>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <div>

        </div>
    </div>

    <div style="width: 800px;">
        <p>
            Kesimpulan : <br>
            Penyakit yang diderita oleh pasien adalah :
        <div style="color: red;"><?= $dataPemilik[0]['nama_penyakit'] ?></div> dengan
        tingkat kepercayaan = <?= $dataPemilik[0]['tingkat_kepercayaan'] ?>
        atau <div style="color: red;"><?= $dataPemilik[0]['tingkat_kepercayaan'] * 100 ?> % </div>
        </p>

        <p class="mb-5">
            Solusi : <br>
            <?= $dataPemilik[0]['solusi'] ?>
        </p>
    </div>


</body>

</html>