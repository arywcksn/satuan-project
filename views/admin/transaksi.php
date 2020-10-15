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
                    <h2>Transaksi</small></h2>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksi">Tambah transaksi</button>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="5%">Transaksi</th>
                          <th width="5%">Nama</th>
                          <th width="5%">Tanggal</th>
                          <th width="5%">Lama Pemesanan</th>
                          <th width="5%">Room</th>
                          <th width="20%">Total Pembayaran</th>
                          <th width="10%">Status</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i = 1;?>
                        <?php foreach($transaksi as $p) : ?>
                        <tr>
                          <th scope="row"> <?= $i ?> </th>
                          <td><?= $p['id_transaksi'] ;?></td>
                          <td><?= $p['nama_member'] ;?></td>
                          <td><?= $p['tanggal'] ;?></td>
                          <td><?= $p['lama_pemesanan'] ;?></td>
                          <td><?= $p['nama_room'] ;?></td>
                          <td><?= $p['total_pembayaran'] ;?></td>
                          <td><?= $p['status'] ;?></td>
                          <!-- <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_transaksi']; ?>"> Edit </i></a>
                                 <a href="<?= base_url('admin/hapustransaksi/' . $p['id_transaksi']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah transaksi <?= $p['nama']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
                                 </td> -->
                                 
                                 <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_transaksi']; ?>"> Edit </i></a>
                               
                               <!-- FUNGSI HAPUS -->
                                 <a href="<?= base_url('admin/hapustransaksi/' . $p['id_transaksi']); ?>" class="btn btn-danger btn-xs"
                                  onclick="return confirm('Apakah room <?= $p['id_transaksi']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
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
<div class="modal fade" id="transaksi" tabindex="-1" role="dialog" aria-labelledby="newPaketModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="newPaketModalLabel">Tambah transaksi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="<?= base_url('admin/transaksi'); ?>" method="post">
                         <div class="modal-body">
                             <div class="form-group">
                             <select name="id_member" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option>Pilih Member</option>
                                <?php foreach ($member as $val) : ?>
                                  <option value="<?= $val['id_member'] ?>"><?= $val['nama_member']; ?></option>
                                <?php endforeach; ?>
                              </select>                             
                             
                             </div>
                             <div class="form-group">
                             <select name="id_room" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option>Pilih Room</option>
                                <?php foreach ($room as $vals) : ?>
                                  <option value="<?= $vals['id_room'] ?>"><?= $vals['nama_room'].' [ Rp.'.$vals['harga'].' ]' ?></option>
                                <?php endforeach; ?>
                              </select>  
                             </div>
                             <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" name="tanggal" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="lama_pemesanan" name="lama_pemesanan" placeholder="Lama Pemesanan">
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" placeholder="Total Pembayaran">
                             </div>
                             <select name="status" class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                              <option>Status Pembayaran</option>
                              <?php foreach ($status as $value) : ?>
                              <option value="<?= $value ?>"><?= $value ?></option>
                              <?php endforeach; ?>
                            </select>
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
        foreach ($transaksi as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_transaksi']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('admin/Edittransaksi'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit transaksi</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_transaksi']; ?>" name="id_transaksi">
                                 <div class="form-group row">
                                     <b><label class='col'>Nama</label></b><br>
                                     <input type="text" name="id_member" autocomplete="off" value="<?= $p['id_member']; ?>" required placeholder="Masukkan Nama" class="form-control">
                                     <b><label class='col'>Room</label></b><br>
                                     <input type="text" name="id_room" autocomplete="off" value="<?= $p['id_room']; ?>" required placeholder="Masukkan Room" class="form-control">
                                     <b><label class='col'>Lama Pemesanan</label></b><br>
                                     <input type="text" class="form-control" id="lama_pemesanan"  value="<?= $p['lama_pemesanan']; ?>" name="lama_pemesanan" placeholder="Lama Pemesanan">
                                     <b><label class='col'>Total Pembayaran</label></b><br>
                                     <input type="text" name="total_pembayaran" autocomplete="off" value="<?= $p['total_pembayaran']; ?>" required placeholder="Masukkan Total Pembayaran" class="form-control">
                                     <b><label class='col'>Status Pembayaran</label></b><br>
                                      <select name="status"  class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option></option>
                                       <?php foreach ($status as $value) : ?>
                                        <option value="<?= $value ?>"><?= $value ?></option>
                                       <?php endforeach; ?>
                                      </select>
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


     