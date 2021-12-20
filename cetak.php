<!DOCTYPE html>
<html>

<head>
    <title>cetak dari database </title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: white;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .tengah {
            text-align: center;
        }
    </style>

    <?php
    include 'koneksi.php';
    ?>
    <center>
        <h2> DATA TAMU KUNJUNGAN DINAS PERHUBUNGAN KOTA TASIKMALAYA</h2>
    </center>

    <table border="1" style="width: 100%">
        <tr>
            <th> No </th>
            <th> Nama </th>
            <th> Alamat </th>
            <th> Nomor Handphone </th>
            <th> Tanggal</th>
            <th> Keterangan </th>
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
                <td> <?= $data['keterangan'] ?> </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>

    <a href="cetak.php" target="_blank"></a>

    <script>
        window.print();
    </script>
</body>

</html>