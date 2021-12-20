<!DOCTYPE html>

<head>
    <title> Data Buku Kunjungan ATCS </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="docs\css\jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="docs\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- JS -->
    <script type="text/javascript" src="docs\js\jquery-latest-slim.min.js"></script>
    <script type="text/javascript" src="docs\js\jquery-ui-custom.min.js"></script>
    <!-- FONT -->
    <link href='https://fonts.googleapis.com/css?family=sans-serif' rel='stylesheet'>
</head>

<body>
    <style>
        body {
            font-family: 'sans-serif';
            font-size: 18px;
        }
    </style>
    <?php
    include 'koneksi.php';
    ?>

    <!--
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img\logo.png" width="70;" align="left" style="float:left;"> Dishub Kota Tasikmalaya</a>
            </div>

            </ul>
        </div>
    </nav>
    -->
    </form>
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <br>
            <h4><b>Daftar Tamu Kunjungan ATCS (Area Traffic Control System)</b></h4>
            <?php
            if (isset($_GET['pesan'])) {
                $pesan = $_GET['pesan'];
                if ($pesan == "input") {
                    echo "Data berhasil di input.";
                } else if ($pesan == "update") {
                    echo "Data berhasil di update.";
                } else if ($pesan == "hapus") {
                    echo "Data berhasil di hapus.";
                }
            }
            ?>
        </div>

        <div class="panel-body">
            <div class="pull-right">
                <!-- <a class="btn btn-primary" href="savepdf.php"> PDF</a> -->
                <a href="cetak.php" target="_blank" class="btn btn-info" role="button">CETAK</a>
                <a class="btn btn-primary" href="addtamu.php"> + Tambah Data Baru</a>
                <a class="btn btn-danger" href="index.php"> Logout</a>
            </div>
            <div style="margin-bottom: 20px;">
                <form class="form-inline" action="" method="GET">
                    <div class="form-group">
                        <!--    <input type="text" name="pencarian" class="form-control" placeholder="masukan pencarian!" value="<?php if (isset($_GET['pencarian'])) {
                                                                                                                                        echo $_GET['pencarian'];
                                                                                                                                    } ?>"> 

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>-->
                </form>
            </div>
            <br>
            <table class="table table-bordered table-striped">
                <tr style="text-align:center">
                    <th> No </th>
                    <th> Nama </th>
                    <th> Alamat </th>
                    <th> No Handphone </th>
                    <th> Tanggal</th>
                    <th> Keterangan </th>
                    <th colspan="2" style="text-align:center">Aksi</th>

                </tr>

                <?php
                $tampil = mysqli_query($koneksi, "SELECT * from ttamu order by id desc");
                $no = 1;
                while ($data = mysqli_fetch_array($tampil)) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $data['nama'] ?> </td>
                        <td> <?= $data['alamat'] ?> </td>
                        <td> <?= $data['nope'] ?> </td>
                        <td> <?= $data['tanggal'] ?></td>
                        <td> <?= $data['keterangan'] ?></td>
                        <td> <a class="btn btn-primary center" onclick="return confirm('apakah anda ingin mengedit data?');" id="tomboledit" data-toggle="modal" data-target="#editmodal" data-id="<?= $data['id']; ?>" data-nama="<?= $data['nama']; ?>" data-alamat="<?= $data['alamat']; ?>" data-nope="<?= $data['nope']; ?>" data-tanggal="<?= $data['tanggal']; ?>" data-keterangan="<?= $data['keterangan']; ?>">Edit</a> </td>
                        <td> <a class="btn btn-warning center" onclick="return confirm('apakah anda ingin menghapus data');" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
                        </td>
                    </tr>


                <?php endwhile; ?>

            </table>

        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="editmodalLabel">Edit Data Tamu</h2>
                </div>
                <div class="modal-body">
                    <form action="data.php" method="POST">
                        <?php
                        include 'koneksi.php';

                        //jika klik tombol submit maka akan melakukan perubahan
                        if (isset($_POST['submit'])) {
                            $id = $_POST['id'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $nope = $_POST['nope'];
                            $tanggal = $_POST['tanggal'];
                            $keterangan = $_POST['keterangan'];

                            //query mengubah barang
                            mysqli_query($koneksi, "UPDATE ttamu SET nama='$nama', alamat='$alamat', nope='$nope' , tanggal='$tanggal', keterangan='$keterangan' WHERE id='$id'") or die(mysqli_error($koneksi));

                            //redirect ke halaman index.php
                            echo "<script>alert('Data telah berhasil diupdate.');window.location='data.php';</script>";
                        } ?>

                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat!" required />
                        </div>
                        <div class="form-group">
                            <label for="nope" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" name="nope" id="nope" pattern="^\d{12}$" placeholder="Masukan Nomor Handphone!" required />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukan Waktu Anda Berkunjung" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukan Keterangan Anda!" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script>
    $(document).on("click", "#tomboledit", function() {
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let alamat = $(this).data('alamat');
        let nope = $(this).data('nope');
        let tanggal = $(this).data('tanggal');
        let keterangan = $(this).data('keterangan');

        $("#id").val(id);
        $(".modal-body #nama").val(nama);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #nope").val(nope);
        $(".modal-body #tanggal").val(tanggal);
        $(".modal-body #keterangan").val(keterangan);
    });
</script>

<!-- Modal Tambah data -->
<div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahmodalLabel">Tambah Data Tamu</h2>
            </div>
            <div class="modal-body">
                <form action="data.php" method="POST">
                    <?php
                    include 'koneksi.php';

                    //jika klik tombol submit maka akan melakukan perubahan
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $nope = $_POST['nope'];
                        $tanggal = $_POST['tanggal'];
                        $keterangan = $_POST['keterangan'];

                        //query mengubah barang
                        mysqli_query($koneksi, "UPDATE ttamu SET nama='$nama', alamat='$alamat', nope='$nope' , tanggal='$tanggal', keterangan='$keterangan' WHERE id='$id'") or die(mysqli_error($koneksi));

                        //redirect ke halaman index.php
                        echo "<script>alert('Data telah berhasil diupdate.');window.location='data.php';</script>";
                    } ?>

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required />
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat!" required />
                    </div>
                    <div class="form-group">
                        <label for="nope" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="nope" id="nope" pattern="^\d{12}$" placeholder="Masukan Nomor Handphone!" required />
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukan Waktu Anda Berkunjung" required></input>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukan Keterangan Anda!" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script>
    $(document).on("click", "#tomboledit", function() {
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let alamat = $(this).data('alamat');
        let nope = $(this).data('nope');
        let tanggal = $(this).data('tanggal');
        let keterangan = $(this).data('keterangan');

        $("#id").val(id);
        $(".modal-body #nama").val(nama);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #nope").val(nope);
        $(".modal-body #tanggal").val(tanggal);
        $(".modal-body #keterangan").val(keterangan);
    });
</script>

</html>

</html>