<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>tipe</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <p class="text-muted font-13 m-b-30">
                        <!-- button tambah -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tipe">Tambah tipe</button>
                    </p> 

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama tipe</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i = 1;?>
                        <?php foreach($tipe as $p) : ?>
                        <tr>
                          <th scope="row"> <?= $i ?> </th>
                          <td><?= $p['nama_tipe'] ;?></td>
                        <td>
                           <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_tipe']; ?>"> Edit </i></a>
                           <a href="<?= base_url('admin/hapustipe/' . $p['id_tipe']); ?>" class="btn btn-danger btn-xs"
                           onclick="return confirm('Apakah tipe <?= $p['nama_tipe']; ?> Ingin Dihapus ?');" class="badge badge-danger" data-placement="top"> hapus</i></a>
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

        <?php $i = 1;
        foreach ($tipe as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_tipe']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('admin/edittipe'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                             <!-- FORM EDIT -->
                                 <h5 class="modal-title">Edit tipe</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_tipe']; ?>" name="id_tipe">
                                 <div class="form-group row">
                                     <label class='col'>Nama tipe</label><br>
                                     <input type="text" name="nama_tipe" autocomplete="off" value="<?= $p['nama_tipe']; ?>" required placeholder="" class="form-control">
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

<!-- Modal TAMBAH tipe-->

<div class="modal fade" id="tipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah tipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tipe'); ?>" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama tipe</label>
            <input type="text" name="nama_tipe" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>