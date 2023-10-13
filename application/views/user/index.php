<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
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
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?> " class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?> </h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <a href="" data-toggle="modal" data-target="#updateProfile" class="badge badge-success">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<div class="modal fade" id="updateProfile" tabindex="-1" aria-labelledby="updateProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('user/editProfile'); ?>
                <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']; ?>" hidden>
                <div class=" form-group">
                    <input type="text" class="form-control" id="update_name" name="update_name" value="<?= $user['name']; ?>" required>
                </div>
                <div class=" form-group">
                    <input type="text" class="form-control" id="update_email" name="update_email" value="<?= $user['email']; ?>" required readonly>
                </div>
                <div class=" form-group">
                    <label for="update_no_hp">No Handphone</label>
                    <input type="number" class="form-control" id="update_no_hp" name="update_no_hp" value="<?= $user['no_hp']; ?>" required>
                </div>
                <div class=" form-group">
                    <label for="update_alamat">Alamat</label>
                    <textarea name="update_alamat" id="update_alamat" rows="5" class="form-control" required><?= $user['alamat'] ?></textarea>
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

</div>
<!-- End of Main Content -->