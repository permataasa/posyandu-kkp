<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Ibu</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataIbuModal">Tambah Data Ibu</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ibu</th>
                                            <th>Tempat/Tgl Lahir</th>
                                            <th>Gol Dar</th>
                                            <th>Nama Suami</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($ibu as $b) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $b['nama_ibu']; ?></td>
                                                <td><?= $b['tempat_lahir'] . ',' . $b['tgl_lahir']; ?></td>
                                                <td><?= $b['gol_dar']; ?></td>
                                                <td><?= $b['nama_suami']; ?></td>
                                                <td>
                                                    <!-- <a data-toggle="modal" data-target="#viewDataIbuModal<?= $b['id_ibu']; ?>" href="<?= base_url(); ?>ibu/viewDataIbu/<?= $b['id_ibu']; ?>" class="btn btn-info btn-circle btn-sm" title="Details">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </a> -->
                                                    <a data-toggle="modal" data-target="#editDataIbuModal<?= $b['id_ibu']; ?>" href="<?= base_url(); ?>ibu/updateDataIbu/<?= $b['id_ibu']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>ibu/deleteDataIbu/<?= $b['id_ibu']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <!-- Large modal -->
    <div class="modal fade bs-example-modal-lg" id="addDataIbuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Data Ibu</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="demo-form2" action="<?php echo base_url('ibu/createDataIbu') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 form-group">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-ibu">Nama Ibu</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nama-ibu" name="nama-ibu" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat-lhr-ibu">Tmpt Lahir Ibu</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tempat-lhr-ibu" name="tempat-lhr-ibu" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir Ibu
                                    </label>
                                    <div class="col-md-9">
                                        <input id="tgl-lahir-ibu" name="tgl-lahir-ibu" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gol-dar">Golongan Darah</label>
                                    <div class="col-md-9">
                                        <input type="text" id="gol-dar" name="gol-dar" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-ibu">Pendidikan Ibu</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pendidikan-ibu" name="pendidikan-ibu" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan-ibu">Pekerjaan Ibu</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pekerjaan-ibu" name="pekerjaan-ibu" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                    <div class="col-md-9">
                                        <input type="text" id="alamat" name="alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kota">Kota</label>
                                    <div class="col-md-9">
                                        <input type="text" id="kota" name="kota" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kecamatan">Kecamatan</label>
                                    <div class="col-md-9">
                                        <input type="text" id="kecamatan" name="kecamatan" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-suami">Nama Suami</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat-lhr-suami">Tmpt Lahir Suami</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tempat-lhr-suami" name="tempat-lhr-suami" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir Suami
                                    </label>
                                    <div class="col-md-9">
                                        <input id="tgl-lahir-ibu" name="tgl-lahir-suami" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-suami">Pendidikan Suami</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pendidikan-suami" name="pendidikan-suami" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan-suami">Pekerjaan Suami</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pekerjaan-suami" name="pekerjaan-suami" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="no-tlp">No Telepon</label>
                                    <div class="col-md-9">
                                        <input type="text" id="no-tlp" name="no-tlp" class="form-control" data-inputmask="'mask' : '9999-9999-9999'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modals -->
    <!-- Large modal -->
    <?php
    $a = 0;
    foreach ($ibu as $row) {
        $a++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataIbuModal<?= $row['id_ibu']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data Ibu</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('ibu/updateDataIbu/') . $row['id_ibu']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-ibu">Nama Ibu</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nama-ibu" name="nama-ibu" required="required" class="form-control" value="<?= $row['nama_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat-lhr-ibu">Tmpt Lahir Ibu</label>
                                        <div class="col-md-9">
                                            <input type="text" id="tempat-lhr-ibu" name="tempat-lhr-ibu" class="form-control" value="<?= $row['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir Ibu
                                        </label>
                                        <div class="col-md-9">
                                            <input id="tgl-lahir-ibu" name="tgl-lahir-ibu" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tgl_lahir'] ?>">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="gol-dar">Golongan Darah</label>
                                        <div class="col-md-9">
                                            <input type="text" id="gol-dar" name="gol-dar" class="form-control" value="<?= $row['gol_dar'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-ibu">Pendidikan Ibu</label>
                                        <div class="col-md-9">
                                            <input type="text" id="pendidikan-ibu" name="pendidikan-ibu" class="form-control" value="<?= $row['pendidikan'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan-ibu">Pekerjaan Ibu</label>
                                        <div class="col-md-9">
                                            <input type="text" id="pekerjaan-ibu" name="pekerjaan-ibu" class="form-control" value="<?= $row['pekerjaan'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                        <div class="col-md-9">
                                            <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kota">Kota</label>
                                        <div class="col-md-9">
                                            <input type="text" id="kota" name="kota" class="form-control" value="<?= $row['kota'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kecamatan">Kecamatan</label>
                                        <div class="col-md-9">
                                            <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?= $row['kecamatan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-suami">Nama Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control" value="<?= $row['nama_suami'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat-lhr-suami">Tmpt Lahir Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="tempat-lhr-suami" name="tempat-lhr-suami" class="form-control" value="<?= $row['tempat_lahir_suami'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir Suami
                                        </label>
                                        <div class="col-md-9">
                                            <input id="tgl-lahir-suami" name="tgl-lahir-suami" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tgl_lahir_suami'] ?>">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-suami">Pendidikan Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="pendidikan-suami" name="pendidikan-suami" class="form-control" value="<?= $row['pendidikan_suami'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan-suami">Pekerjaan Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="pekerjaan-suami" name="pekerjaan-suami" class="form-control" value="<?= $row['pekerjaan_suami'] ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no-tlp">No Telepon</label>
                                        <div class="col-md-9">
                                            <input type="text" id="no-tlp" name="no-tlp" class="form-control" data-inputmask="'mask' : '9999-9999-9999'" value="<?= $row['no_tlp'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>