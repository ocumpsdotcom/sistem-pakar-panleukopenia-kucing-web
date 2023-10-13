   <div class="container">

       <!-- Outer Row -->
       <div class="row justify-content-center">

           <div class="col-xl-10 col-lg-12 col-md-9">

               <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                   <div class="card-body p-0">
                       <!-- Nested Row within Card Body -->
                       <div class="row">
                           <div class="col-lg">
                               <div class="p-5">
                                   <div class="text-center">
                                       <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                   </div>
                                   <?php if ($this->session->flashdata('message')) : ?>
                                       <div class="alert alert-danger alert-dismissible" role="alert">
                                           <?= $this->session->flashdata('message'); ?>
                                           <button type="button" class="close" data-dismiss="alert" onclick="<?php unset($_SESSION['message']); ?>" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                   <?php elseif ($this->session->flashdata('success')) : ?>
                                       <div class="alert alert-success alert-dismissible" role="alert">
                                           <?= $this->session->flashdata('success'); ?>
                                           <button type="button" class="close" data-dismiss="alert" onclick="<?php unset($_SESSION['message']); ?>" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                   <?php else : ?>
                                   <?php endif; ?>
                                   <form class="user" method="POST" action="<?= base_url('auth'); ?> ">
                                       <div class="form-group">
                                           <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                           <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                       </div>
                                       <div class="form-group">
                                           <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                           <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                       </div>
                                       <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Login
                                       </button>
                                   </form>
                                   <hr>
                                   <div class="text-center">
                                       <a class="small" href="<?= base_url('auth/registration') ?> ">Tidak punya akun? Klik Disini</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>

   </div>