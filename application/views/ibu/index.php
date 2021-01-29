<div class="right_col" role="main">
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Ibu</h2>
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
                                                <td><?= $b['tempat_lahir'] . '/' . $b['tgl_lahir']; ?></td>
                                                <td><?= $b['gol_dar']; ?></td>
                                                <td><?= $b['nama_suami']; ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#newViewIbuModal<?= $b['id_kelas']; ?>" href="<?= base_url(); ?>ibu/viewData/<?= $b['id_kelas']; ?>" class="btn btn-primary btn-circle btn-sm">
                                                        <i class="far fa-sticky-note"></i>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#newEditKelasModal<?= $b['id_kelas']; ?>" href="<?= base_url(); ?>ibu/editData/<?= $b['id_kelas']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url(''); ?>ibu/deleteData/<?= $b['id_kelas']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus">
                                                        <i class="far fa-trash-alt"></i>
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
</div>