<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <?php if($this->session->flashdata('message'))  echo $this->session->flashdata('message');  ?>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>room</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <p class="text-muted font-13 m-b-30">
                        <!-- button tambah -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#room">Tambah room</button>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="10%">Nama room</th>
                          <th width="25%">Foto</th>
                          <th width="5%">tipe</th>
                          <th width="20%">Deskripsi</th>
                          <th width="10%">Harga</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i = 1;?>
                        <?php foreach($dataRoom as $p) : ?>
                        <tr>
                          <th scope="row"> <?= $i ?> </th>
                          <td><?= $p['nama_room'] ;?></td>
                          <td><img src="<?= base_url()?>upload/<?=$p['foto'] ;?>" class='img-thumbnail'
                          style= 'width:350px;height:120px;'></td>
                          <td><?= $p['nama_tipe'] ;?></td>
                          <td><?= $p['detail_room'] ;?></td>
                          <td><?= $p['harga'] ;?></td>
                          <td>
                          <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_room']; ?>"> Edit </i></a>
                               
                               <!-- FUNGSI HAPUS -->
                                 <a href="<?= base_url('admin/hapusroom/' . $p['id_room']); ?>" class="btn btn-danger btn-xs"
                                  onclick="return confirm('Apakah room <?= $p['nama_room']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
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


<!-- FORM Modal -->
<div class="modal fade" id="room" tabindex="-1" role="dialog" aria-labelledby="newPaketModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="newPaketModalLabel">Tambah room</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <?php echo form_open_multipart('admin/room'); ?>
                         <div class="modal-body">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Nama room</label>
                      <input type="text" name="nama_room" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlFile1">Foto</label>
                      <div class="custom-file">
                      <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    </div>
                    
                    <div class="form-group row">
                                  <label class="control-label" for="id_tipe">Tipe</label><br>
                                  <select name="id_tipe" id="id_tipe">
                                  <!-- AMBIL KATEGORI DARI DB -->
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($tipe as $t) : ?>
                                    <option value="<?= $t['id_tipe']; ?>"><?= $t['nama_tipe'];?></option> 
                                    <?php endforeach; ?>
                                  </select>
                                </div>

                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Deskripsi</label>
                      <textarea class="form-control" name="detail_room" id="message-text"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    </div>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              <?php echo form_close(); ?>
              </div>
              </div>
              </div>
              </div>

              <!-- FORM EDIT -->
     <?php $i = 1;
        foreach ($room as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_room']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <?php echo form_open_multipart('admin/Editroom'); ?>
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit room</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_room']; ?>" name="id_room">
                                 <div class="form-group row">
                                     <label class='col'>Nama room</label><br>
                                     <input type="text" name="nama_room" autocomplete="off" value="<?= $p['nama_room']; ?>" required placeholder="" class="form-control">
                                 </div>

                                 <div class="form-group row">
                                     <label class='col'>Foto</label><br>
                                     <input type="file" name="foto" autocomplete="off" value="<?= $p['foto']; ?>" required placeholder="" class="form-control">
                                 </div>

                                 <div class="form-group row">
                                  <label class="control-label" for="id_tipe">Tipe</label><br>
                                  <select name="id_tipe" id="id_tipe">
                                  <!-- AMBIL tipe DARI DB -->
                                    <option value="">Pilih Tipe</option>
                                    <?php foreach ($tipe as $t) : ?>
                                    <option value="<?= $t['id_tipe']; ?>"><?= $t['nama_tipe'];?></option> 
                                    <?php endforeach; ?>
                                  </select>
                                  </div>

                                 <div class="form-group row">
                                     <label class='col'>Deskripsi</label><br>
                                     <input type="text" name="detail_room" autocomplete="off" value="<?= $p['detail_room']; ?>" required placeholder="" class="form-control">
                                 </div>

                                 <div class="form-group row">
                                     <label class='col'>Harga</label><br>
                                     <input type="text" name="harga" autocomplete="off" value="<?= $p['harga']; ?>" required placeholder="" class="form-control">
                                 </div>

                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                                 </div>
                             </div>
                         </div>
                     <?php echo 
                     form_close();
                     ?>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>
     </div>