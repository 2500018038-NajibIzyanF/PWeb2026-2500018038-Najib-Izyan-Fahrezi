<?php
function hitung_rata2($arrNilai)
{
    return array_sum($arrNilai) / count($arrNilai);
}


function nilai_huruf($angka)
{
    if ($angka >= 85) {
        return "A";
    } elseif ($angka >= 75) {
        return "B";
    } elseif ($angka >= 65) {
        return "C";
    } elseif ($angka >= 50) {
        return "D";
    } else {
        return "E";
    }
}


function tambah_bonus(&$nilai, $bonus)
{
    $nilai = $nilai + $bonus;
    if ($nilai > 100) {   
        $nilai = 100;
    }
}

$dataNilai = array(
    "Najib"   => 88,
    "Izyan"   => 78,
    "Fahrezi" => 90,
    "Abid"    => 79,
    "Alfi"    => 95,
    "Nehan"   => 85,
);

$jumlahMhs = count($dataNilai);
$dataAwal  = $dataNilai;


$mahasiswaBonus = "Fahrezi";
$besarBonus     = 15;

if (array_key_exists($mahasiswaBonus, $dataNilai)) {
    tambah_bonus($dataNilai[$mahasiswaBonus], $besarBonus);
}


$dataUrut = $dataNilai;
arsort($dataUrut);

$rataRata      = hitung_rata2($dataNilai);
$nilaiTerbaik  = max($dataNilai);
$nilaiTerendah = in_array(min($dataNilai), $dataNilai) ? min($dataNilai) : null;
$peringkat     = array_search($mahasiswaBonus, array_keys($dataUrut)) + 1;


$petaPredikat = array(
    "A" => array("bg" => "#DCFCE7", "fg" => "#166534", "bd" => "#86EFAC"),
    "B" => array("bg" => "#DBEAFE", "fg" => "#1E40AF", "bd" => "#93C5FD"),
    "C" => array("bg" => "#FEF3C7", "fg" => "#92400E", "bd" => "#FCD34D"),
    "D" => array("bg" => "#FFE4D5", "fg" => "#9A3412", "bd" => "#FDBA8C"),
    "E" => array("bg" => "#FEE2E2", "fg" => "#991B1B", "bd" => "#FCA5A5"),
);

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Rekap Nilai Mahasiswa &ndash; Bonus Keaktifan</title>
<style>
    * { box-sizing: border-box; }
    body {
        margin: 0;
        padding: 32px 16px;
        background: #EEF1F5;
        font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
        color: #1E2A38;
        font-size: 14px;
        line-height: 1.55;
    }
    .sheet {
        max-width: 720px;
        margin: 0 auto;
        background: #FFFFFF;
        border: 1px solid #DDE2E9;
        border-radius: 10px;
        overflow: hidden;
    }

    
    .head {
        background: #16324F;
        background-image: linear-gradient(135deg, #16324F 0%, #1F4569 100%);
        color: #F4F7FA;
        padding: 28px 32px 24px;
    }
    .head .eyebrow {
        display: block;
        text-transform: uppercase;
        letter-spacing: .14em;
        font-size: 11px;
        color: #9FC0DA;
        margin-bottom: 8px;
    }
    .head h1 {
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 700;
        font-size: 25px;
        margin: 0 0 12px;
        letter-spacing: .01em;
    }
    .head .who {
        display: inline-block;
        background: rgba(255,255,255,0.10);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12.5px;
        color: #E7EEF4;
    }

    
    .body { padding: 8px 32px 30px; }
    .section { padding-top: 26px; }
    .section .num {
        display: inline-block;
        font-family: Georgia, serif;
        font-weight: 700;
        font-size: 11px;
        letter-spacing: .12em;
        color: #B8860B;
        text-transform: uppercase;
        margin-bottom: 4px;
    }
    .section h2 {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 17px;
        margin: 0 0 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid #E2E5EA;
        color: #16324F;
    }

   
    table { width: 100%; border-collapse: collapse; }
    th, td {
        padding: 9px 12px;
        text-align: left;
        border-bottom: 1px solid #E9ECF1;
        font-size: 13.5px;
    }
    th {
        background: #F4F6F9;
        color: #52606D;
        text-transform: uppercase;
        letter-spacing: .06em;
        font-size: 11px;
        font-weight: 700;
        border-bottom: 1px solid #DDE2E9;
    }
    td.num, th.num { text-align: right; font-variant-numeric: tabular-nums; }
    td.center, th.center { text-align: center; }
    tr:last-child td { border-bottom: none; }
    tr.top td { background: #FBF6E7; }

    .badge {
        display: inline-block;
        min-width: 22px;
        padding: 2px 9px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        text-align: center;
        border: 1px solid;
    }

   
    .callout {
        border-left: 3px solid #16324F;
        background: #F4F7FA;
        border-radius: 0 6px 6px 0;
        padding: 14px 16px;
        font-size: 13.5px;
    }
    .callout.gold { border-left-color: #B8860B; background: #FBF6E7; }
    .callout code {
        background: #E9ECF1;
        border-radius: 4px;
        padding: 1px 6px;
        font-family: "SFMono-Regular", Consolas, Menlo, monospace;
        font-size: 12px;
    }

    
    .flow { width: 100%; margin-top: 12px; }
    .flow td { border: none; padding: 0; vertical-align: middle; }
    .flow .box {
        display: block;
        text-align: center;
        border-radius: 8px;
        padding: 12px 10px;
        border: 1px solid #DDE2E9;
    }
    .flow .box .lbl {
        display: block;
        font-size: 10.5px;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #8592A0;
        margin-bottom: 4px;
    }
    .flow .box .val {
        display: block;
        font-family: Georgia, serif;
        font-size: 24px;
        font-weight: 700;
    }
    .flow .before .val { color: #8592A0; }
    .flow .after { background: #FBF6E7; border-color: #EAD9A0; }
    .flow .after .val { color: #16324F; }
    .flow .arrow {
        text-align: center;
        color: #B8860B;
        font-size: 18px;
        width: 46px;
    }

   
    .stats { width: 100%; margin-top: 4px; }
    .stats td {
        border: none;
        padding: 10px 6px;
        text-align: center;
        border-right: 1px solid #E9ECF1;
    }
    .stats td:last-child { border-right: none; }
    .stats .lbl {
        display: block;
        font-size: 10.5px;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #8592A0;
        margin-bottom: 3px;
    }
    .stats .val {
        display: block;
        font-family: Georgia, serif;
        font-size: 20px;
        font-weight: 700;
        color: #16324F;
    }

   
    pre.dump {
        background: #16324F;
        color: #D7E4EF;
        border-radius: 8px;
        padding: 14px 16px;
        font-family: "SFMono-Regular", Consolas, Menlo, monospace;
        font-size: 12.5px;
        line-height: 1.6;
        overflow-x: auto;
        margin-top: 8px;
    }
    .foot {
        padding: 14px 32px 22px;
        font-size: 11px;
        color: #96A1AC;
        border-top: 1px solid #E9ECF1;
    }
</style>
</head>
<body>
<div class="sheet">

    <div class="head">
        <h1>Rekap Nilai Mahasiswa &ndash; Bonus Keaktifan</h1>
    </div>

    <div class="body">

        <div class="section">
            <span class="num">Tahap 01</span>
            <h2>Data Nilai Awal </h2>
            <table>
                <tr><th>Nama</th><th class="num">Nilai UAS</th></tr>
                <?php foreach ($dataAwal as $nama => $nilai): ?>
                <tr><td><?php echo $nama; ?></td><td class="num"><?php echo $nilai; ?></td></tr>
                <?php endforeach; ?>
            </table>
            <p style="margin:10px 2px 0; color:#52606D;">
                Jumlah mahasiswa (fungsi <code style="background:#F4F6F9;border-radius:4px;padding:1px 6px;font-family:Consolas,monospace;font-size:12px;">count()</code>):
                <b style="color:#16324F;"><?php echo $jumlahMhs; ?></b> orang.
            </p>
        </div>

        <div class="section">
            <span class="num">Tahap 02</span>
            <h2>Bonus Keaktifan &ndash; Passing by Reference</h2>
            <div class="callout gold">
                Mahasiswa <b><?php echo $mahasiswaBonus; ?></b> memperoleh bonus keaktifan
                melalui <code>tambah_bonus(&amp;$nilai, $bonus)</code>. Karena parameter
                dikirim <i>by reference</i>, nilai pada array <code>$dataNilai</code>
                berubah langsung tanpa perlu di-<i>return</i>.
            </div>
            <table class="flow">
                <tr>
                    <td style="width:44%;">
                        <span class="box before">
                            <span class="lbl">Sebelum Bonus</span>
                            <span class="val"><?php echo $dataAwal[$mahasiswaBonus]; ?></span>
                        </span>
                    </td>
                    <td class="arrow">&#10230;<br><span style="font-size:11px;color:#8592A0;">+<?php echo $besarBonus; ?></span></td>
                    <td style="width:44%;">
                        <span class="box after">
                            <span class="lbl">Sesudah Bonus</span>
                            <span class="val"><?php echo $dataNilai[$mahasiswaBonus]; ?></span>
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <span class="num">Tahap 03</span>
            <h2>Peringkat Akhir &ndash;</h2>
            <table>
                <tr>
                    <th class="center">#</th><th>Nama</th>
                    <th class="num">Nilai Akhir</th><th class="center">Predikat</th>
                </tr>
                <?php $rank = 1; foreach ($dataUrut as $nama => $nilai):
                    $huruf = nilai_huruf($nilai);
                    $warna = $petaPredikat[$huruf];
                ?>
                <tr class="<?php echo $rank === 1 ? 'top' : ''; ?>">
                    <td class="center"><?php echo $rank++; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td class="num"><?php echo $nilai; ?></td>
                    <td class="center">
                        <span class="badge" style="background:<?php echo $warna['bg']; ?>;color:<?php echo $warna['fg']; ?>;border-color:<?php echo $warna['bd']; ?>;">
                            <?php echo $huruf; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="section">
            <span class="num">Tahap 04</span>
            <h2>Statistik Kelas</h2>
            <table class="stats">
                <tr>
                    <td>
                        <span class="lbl">Rata-rata</span>
                        <span class="val"><?php echo number_format($rataRata, 2); ?></span>
                    </td>
                    <td>
                        <span class="lbl">Tertinggi</span>
                        <span class="val"><?php echo $nilaiTerbaik; ?></span>
                    </td>
                    <td>
                        <span class="lbl">Terendah</span>
                        <span class="val"><?php echo $nilaiTerendah; ?></span>
                    </td>
                    <td>
                        <span class="lbl">Peringkat <?php echo $mahasiswaBonus; ?></span>
                        <span class="val">#<?php echo $peringkat; ?></span>
                    </td>
                </tr>
            </table>
            <p style="margin:12px 2px 0; color:#8592A0; font-size:12px;">
                Rata-rata dihitung fungsi <code style="background:#F4F6F9;border-radius:4px;padding:1px 6px;font-family:Consolas,monospace;">hitung_rata2()</code>,
                peringkat dicari dengan <code style="background:#F4F6F9;border-radius:4px;padding:1px 6px;font-family:Consolas,monospace;">array_search()</code>.
            </p>
        </div>

        <div class="section">
            <span class="num">Tahap 05</span>
            <h2>Struktur Array Akhir (print_r)</h2>
            <pre class="dump"><?php print_r($dataUrut); ?></pre>
        </div>

    </div>

    <div class="foot">rekap_nilai.php &middot; Tugas Temu 13 &middot; Array &amp; Function dalam PHP</div>
</div>
</body>
</html>