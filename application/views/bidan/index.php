<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Bidan</h3>
        </div>
    </div>
    <div class="flash-dataw" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataBidanModal">Tambah Data Bidan</button>
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
                                            <th>Nama lengkap</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bidan as $d) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $d['nama_bidan']; ?></td>
                                                <td><?= $d['tempat_lahir'] . ', ' . $d['tanggal_lahir']; ?></td>
                                                <td>
                                                    <!-- <a data-toggle="modal" data-target="#viewDataBidanModal<?= $d['id_bidan']; ?>" href="<?= base_url(); ?>bidan/viewDataBidan/<?= $d['id_bidan']; ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </a> -->
                                                    <a data-toggle="modal" data-target="#editDataBidanModal<?= $d['id_bidan']; ?>" href="<?= base_url(); ?>bidan/updateDatabidan/<?= $d['id_bidan']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a ata-toggle="tooltip" href="<?= base_url(''); ?>bidan/deleteDataBidan/<?= $d['id_bidan']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
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
    <div class="modal fade bs-example-modal-lg" id="addDataBidanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Data Bidan</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="demo-form2" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 form-group">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-bidan">Nama Bidan</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nama-bidan" name="nama-bidan" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tmt-lahir">Tempat Lahir</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tmt-lahir" name="tmt-lahir" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir
                                    </label>
                                    <div class="col-md-9">
                                        <input id="tgl-lahir" name="tgl-lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="no-hp">No HP</label>
                                    <div class="col-md-9">
                                        <input type="text" id="no-hp" name="no-hp" class="form-control" data-inputmask="'mask' : '9999-9999-9999'">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-terakhir">Pendidikan Terakhir</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pendidikan-terakhir" name="pendidikan-terakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_id">Username</label>
                                    <div class="col-md-9">
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            <option value="">-- Pilih Username --</option>
                                            <?php foreach ($users as $m) : ?>
                                                <option value="<?= $m['id_user']; ?>"><?= $m['username']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modals -->
    <!-- Large modal -->
    <?php
    $q = $this->db->get('user');
    $dist =  array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $dist[] = $row;
        }
    }

    $a = 0;
    foreach ($bidan as $row) {
        $a++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataBidanModal<?= $row['id_bidan']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data Bidan</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('bidan/updateDataBidan') . $row['id_bidan']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-bidan">Nama Bidan</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nama-bidan" name="nama-bidan" required="required" class="form-control" value="<?= $row['nama_bidan'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tmt-lahir">Tempat Lahir</label>
                                        <div class="col-md-9">
                                            <input type="text" id="tmt-lahir" name="tmt-lahir" class="form-control" value="<?= $row['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tgl Lahir
                                        </label>
                                        <div class="col-md-9">
                                            <input id="tgl-lahir" name="tgl-lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tanggal_lahir'] ?>">
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no-hp">No HP</label>
                                        <div class="col-md-9">
                                            <input type="text" id="no-hp" name="no-hp" class="form-control" data-inputmask="'mask' : '9999-9999-9999'" value="<?= $row['no_hp'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan-terakhir">Pendidikan Terakhir</label>
                                        <div class="col-md-9">
                                            <input type="text" id="pendidikan-terakhir" name="pendidikan-terakhir" class="form-control" value="<?= $row['pendidikan_terakhir'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_id">Username</label>
                                        <div class="col-md-9">
                                            <select name="user_id" id="user_id" class="form-control" required>
                                                <option value="">-- Pilih Username --</option>
                                                <?php
                                                // var_dump($row['user_id'])  ;
                                                // die;
                                                if (count($dist)) {
                                                    foreach ($dist as $item) {
                                                ?>
                                                        <option value="<?php echo $item->id_user; ?>" <?php if ($item->id_user == $row['user_id']) echo 'selected'; ?>> <?php echo $item->username; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>