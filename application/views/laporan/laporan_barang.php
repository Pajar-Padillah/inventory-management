<!DOCTYPE html>
<html>

<head>
    <title>
        <?= $title_web; ?>
    </title>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1 solid #000;
            font-weight: bold;
            background-color: #e1e1e1;
        }

        .border-table td {
            border: 1 solid #000;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/img/kpu-logo.png') ?>" style="position: absolute; width: 70px; height: 70px; margin-top: 10px;">
    <table style="width: 110%;">
        <tr>
            <td align="center">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">KOMISI PEMILIHAN UMUM KOTA BANDAR LAMPUNG</span></strong></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%;"><span style="font-family:Arial;">Jl. Pulau Sebesi No.90, Sukarame, Bandar Lampung - 35131 Lampung - Indonesia <br>
                        Telp : (0721)-770074, Email : kpubandarlampungkota@gmail.com
                    </span></p>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        <b>LAPORAN SEMUA DATA BARANG</b>
    </p>
    <p align="center">
        Periode Tanggal <?= date('d F Y', strtotime($tanggal['tgl_awal']))  ?> s/d <?= date('d F Y', strtotime($tanggal['tgl_akhir']))  ?>
    </p>
    <table class="border-table">
        <tr>
            <th>No. </th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Ruangan</th>
            <th>Jenis Barang</th>
            <th>Satuan</th>
            <th>Nilai Perolehan</th>
            <th>Tanggal Perolehan</th>
            <th>Kondisi</th>
        </tr>
        <?php
        $no = 1;
        if ($barang) :
            foreach ($barang as $b) :
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['id_barang']; ?></td>
                    <td><?= $b['nama_barang']; ?></td>
                    <td><?= $b['nama_ruang']; ?></td>
                    <td><?= $b['nama_jenis']; ?></td>
                    <td><?= $b['nama_satuan']; ?></td>
                    <td>
                        <?php $angka = $b['nilai_perolehan'];
                        $angka_format = number_format($angka);
                        if ($angka_format == null) {
                            echo 0;
                        } else {
                            echo $angka_format;
                        } ?>
                    </td>
                    <td><?= $b['tanggal_perolehan']; ?></td>
                    <td>
                        <?php if ($b['kondisi'] == 'baik') : ?>
                            <span class="badge badge-success btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                        <?php elseif ($b['kondisi'] == 'rusak') : ?>
                            <span class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                        <?php elseif ($b['kondisi'] == 'keluar') : ?>
                            <span class="badge badge-danger btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="10" class="text-center">
                    Data Kosong
                </td>
            </tr>
        <?php endif; ?>
    </table>
    <div style="float:right;">
        <br>
        Bandar Lampung, <?= date('d F Y')  ?>
        <br>Ketua <br><br><br>
        <p><u><b>Daniel Solikhin, S.H</b></u></p>
    </div>
</body>

</html>