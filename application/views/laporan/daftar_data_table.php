<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nama Anak</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nama Ibu</th>
            <th>Nama Ayah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $d) : ?>
            <tr>
                <td><?= $d['nama_anak']; ?></td>
                <td><?= $d['jenis_kelamin']; ?></td>
                <td><?= $d['tgl_lahir']; ?></td>
                <td><?= $d['nama_ibu']; ?></td>
                <td><?= $d['nama_suami']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>