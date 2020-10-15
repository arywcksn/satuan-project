<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Member</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <p class="text-muted font-13 m-b-30">
                        <!-- button tambah -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#member">Tambah member</button>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="5%">Nama</th>
                          <th width="10%">Email</th>
                          <th width="5%">No Telepon</th>
                          <th width="20%">Alamat</th>
                          <th width="10%">Username</th>
                          <th width="10%">Password</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i = 1;?>
                        <?php foreach($member as $p) : ?>
                        <tr>
                          <th scope="row"> <?= $i ?> </th>
                          <td><?= $p['nama_member'] ;?></td>
                          <td><?= $p['email'] ;?></td>
                          <td><?= $p['no_telepon'] ;?></td>
                          <td><?= $p['alamat'] ;?></td>
                          <td><?= $p['username'] ;?></td>
                          <td><?= $p['password'] ;?></td>
                          <!-- <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_member']; ?>"> Edit </i></a>
                                 <a href="<?= base_url('admin/hapusmember/' . $p['id_member']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah member <?= $p['nama']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
                                 </td> -->
                                 
                                 <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_member']; ?>"> Edit </i></a>
                               
                               <!-- FUNGSI HAPUS -->
                                 <a href="<?= base_url('admin/hapusmember/' . $p['id_member']); ?>" class="btn btn-danger btn-xs"
                                  onclick="return confirm('Apakah room <?= $p['nama_member']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
                          </td>
                            </td>
                        </tr>
                        <?php $i++;?>
                        <?php endforeach;?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
      
              </div>
          </div>
        </div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="member" tabindex="-1" role="dialog" aria-labelledby="newPaketModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="newPaketModalLabel">Tambah member</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="<?= base_url('admin/member'); ?>" method="post">
                         <div class="modal-body">
                             <div class="form-group">
                                 <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Nama Member">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn btn-primary">Tambah</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <?php $i = 1;
        foreach ($member as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_member']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('admin/Editmember'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit member</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_member']; ?>" name="id_member">
                                 <div class="form-group row">
                                     <b><label class='col'>Nama member</label></b><br>
                                     <input type="text" name="nama" autocomplete="off" value="<?= $p['nama_member']; ?>" required placeholder="Masukkan Nama member" class="form-control">
                                     <b><label class='col'>Email</label></b><br>
                                     <input type="text" name="email" autocomplete="off" value="<?= $p['email']; ?>" required placeholder="Masukkan Email" class="form-control">
                                     <b><label class='col'>No Telepon</label></b><br>
                                     <input type="text" name="no_telepon" autocomplete="off" value="<?= $p['no_telepon']; ?>" required placeholder="Masukkan No Telepon" class="form-control">
                                     <b><label class='col'>Alamat</label></b><br>
                                     <input type="text" name="alamat" autocomplete="off" value="<?= $p['alamat']; ?>" required placeholder="Masukkan Alamat" class="form-control">
                                     <b><label class='col'>Username</label></b><br>
                                     <input type="text" name="username" autocomplete="off" value="<?= $p['username']; ?>" required placeholder="Masukkan Username" class="form-control">
                                     <b><label class='col'>Password</label></b><br>
                                     <input type="text" name="password" autocomplete="off" value="<?= $p['password']; ?>" required placeholder="Masukkan Password" class="form-control">
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>
 </div>


     