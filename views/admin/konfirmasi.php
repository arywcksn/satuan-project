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
                    <h2>Konfirmasi</small></h2>
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
                  
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Transaksi</th>
                          <th>Nama</th>
                          <th>Tanggal Transfer</th>
                          <th>Bank</th>
                          <th>Bukti Pembayaran</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i = 1;?>
                        <?php foreach($konfirmasi as $p) : ?>
                        <tr>
                          <th scope="row"> <?= $i ?> </th>
                          <td><?= $p['id_transaksi'] ;?></td>
                          <td><?= $p['nama_member'] ;?></td>
                          <td><?= $p['tgl_transfer'] ;?></td>
                          <td><?= $p['bank'] ;?></td>
                          <td><img src="<?= base_url()?>upload/<?=$p['bukti_pembayaran'] ;?>" class='img-thumbnail'
                          style= 'width:350px;height:120px;'></td>
                          <td><?= $p['keterangan'] ;?></td>
                          <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_konfirmasi']; ?>"> Edit </i></a>
                                 <a href="<?= base_url('admin/hapuskonfirmasi/' . $p['id_konfirmasi']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah konfirmasi <?= $p['nama_member']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
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
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="newKonfirmasiModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="newKonfirmasiModalLabel">Tambah Konfirmasi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="<?= base_url('admin/konfirmasi'); ?>" method="post">
                         <div class="modal-body">
                             <div class="form-group">
                                 <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Reservasi">
                            </div>
                            <div class="form-group">
                                 <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" id="lama pemesanan" name="Lama Pemesanan" placeholder="Lama Pemesanan">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" id="room" name="room" placeholder="room">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" id="total" name="total" placeholder="total">
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
        foreach ($konfirmasi as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_konfirmasi']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('admin/editkonfirmasi'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit Konfirmasi</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" value="<?= $p['id_konfirmasi']; ?>" name="id_konfirmasi">
                                 <div class="form-group row">
                                     <b><label class='col'>Nama konfirmasi</label></b><br>
                                     <input type="text" name="id_konfirmasi" autocomplete="off" value="<?= $p['id_konfirmasi']; ?>" required placeholder="Masukkan konfirmasi" class="form-control"></div>
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


     