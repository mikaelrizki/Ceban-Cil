<?php
$conn = mysqli_connect("localhost", "root", "", "mikaelrizki");

$query = "SELECT * FROM cebancil";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$oldkl = $row['kl'];
$oldpd = $row['pd'];
$oldmg = $row['mg'];
$oldit = $row['it'];
$oldjm = $row['jm'];

if (isset($_POST['submit'])) {
    $kl = $_POST['katulampa'];
    $pd = $_POST['posDepok'];
    $mg = $_POST['manggarai'];
    $it = $_POST['istiqlal'];
    $jm = $_POST['jembatanMerah'];

    $sql = "UPDATE cebancil SET kl='$kl', pd='$pd', mg='$mg', it='$it', jm='$jm'";
    $result = mysqli_query($conn, $sql);
} else {
    $kl = 0;
    $pd = 0;
    $mg = 0;
    $it = 0;
    $jm = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EWS | Ceban Cil</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <img src="images/logo.svg" alt="Logo Ceban Cil" id="logo">
    <div class="container">
        <h1>
            Cegah Banjir Ciliwung
        </h1>
        <h3>Early Warning System for Flooding in Ciliwung River!</h3>
        <form action="" method="POST">
            <div class="atas">
                <input type="number" min="1" name="katulampa" id="katulampa" placeholder="Katulampa" required>
                <input type="number" min="1" name="posDepok" id="posDepok" placeholder="Pos Depok" required>
                <input type="number" min="1" name="manggarai" id="manggarai" placeholder="Manggarai" required>
            </div>
            <div class="bawah">
                <input type="number" min="1" name="istiqlal" id="istiqlal" placeholder="Istiqlal" required>
                <input type="number" min="1" name="jembatanMerah" id="jembatanMerah" placeholder="Jembatan Merah" required>
            </div>
            <div class="submit">
                <p>Click submit button to check status of Ciliwung River</p>
                <button type="button" name="show" id="show" onclick="reveal()">Show</button>
                <button type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="initabel" id="initabel">
        <table width="100%">
            <tr>
                <th>Kondisi</th>
                <th>Katulampa</th>
                <th>Pos Depok</th>
                <th>Manggarai</th>
                <th>Istiqlal</th>
                <th>Jembatan Merah</th>
            </tr>
            <tr>
                <td>Sebelum</td>
                <td><?= $oldkl ?></td>
                <td><?= $oldpd ?></td>
                <td><?= $oldmg ?></td>
                <td><?= $oldit ?></td>
                <td><?= $oldjm ?></td>
            </tr>
            <tr>
                <td>Status Sebelum</td>
                <td id="statuskl1"></td>
                <td id="statuspd1"></td>
                <td id="statusmg1"></td>
                <td id="statusit1"></td>
                <td id="statusjm1"></td>
            </tr>
            <tr>
                <td>Saat Ini</td>
                <td><?= $kl ?></td>
                <td><?= $pd ?></td>
                <td><?= $mg ?></td>
                <td><?= $it ?></td>
                <td><?= $jm ?></td>
            </tr>
            <tr>
                <td>Status Saat Ini</td>
                <td id="statuskl2"></td>
                <td id="statuspd2"></td>
                <td id="statusmg2"></td>
                <td id="statusit2"></td>
                <td id="statusjm2"></td>
            </tr>
            <tr>
                <td>Prediksi</td>
                <td id="statuskl3"></td>
                <td id="statuspd3"></td>
                <td id="statusmg3"></td>
                <td id="statusit3"></td>
                <td id="statusjm3"></td>
            </tr>
            <tr>
                <td>Status Prediksi</td>
                <td id="statuskl4"></td>
                <td id="statuspd4"></td>
                <td id="statusmg4"></td>
                <td id="statusit4"></td>
                <td id="statusjm4"></td>
            </tr>
            <tr>
                <td>Hasil Prediksi</td>
                <td colspan="5" id="hasil"></td>
            </tr>
        </table>
    </div>
</body>

<script>
    function reveal() {
        var x = document.getElementById("initabel");
        if (x.style.visibility === "hidden") {
            x.style.visibility = "visible";
            x.style.opacity = "1";
            x.style.transition = "visibility 0s, opacity 0.5s linear";
        } else {
            x.style.visibility = "hidden";
            x.style.opacity = "0";
        }
    }
</script>

<script>
    function Katulampa(tinggi) {
        if (tinggi > 200) {
            statusKatulampa = 'Bahaya';
        } else if (tinggi > 150) {
            statusKatulampa = 'Siaga';
        } else if (tinggi >= 80) {
            statusKatulampa = 'Waspada';
        } else {
            statusKatulampa = 'Normal';
        }
        return statusKatulampa;
    }

    function PosDepok(tinggi) {
        if (tinggi > 350) {
            statusPosDepok = 'Bahaya';
        } else if (tinggi > 270) {
            statusPosDepok = 'Siaga';
        } else if (tinggi >= 200) {
            statusPosDepok = 'Waspada';
        } else {
            statusPosDepok = 'Normal';
        }
        return statusPosDepok;
    }

    function Manggarai(tinggi) {
        if (tinggi > 950) {
            statusManggarai = 'Bahaya';
        } else if (tinggi > 850) {
            statusManggarai = 'Siaga'
        } else if (tinggi >= 750) {
            statusManggarai = 'Waspada'
        } else {
            statusManggarai = 'Normal';
        }
        return statusManggarai;
    }

    function Istiqlal(tinggi) {
        if (tinggi > 350) {
            statusIstiqlal = 'Bahaya';
        } else if (tinggi > 300) {
            statusIstiqlal = 'Siaga';
        } else if (tinggi >= 250) {
            statusIstiqlal = 'Waspada';
        } else {
            statusIstiqlal = 'Normal';
        }
        return statusIstiqlal;
    }

    function JembatanMerah(tinggi) {
        if (tinggi > 250) {
            statusMerah = 'Bahaya';
        } else if (tinggi > 200) {
            statusMerah = 'Siaga';
        } else if (tinggi >= 150) {
            statusMerah = 'Waspada';
        } else {
            statusMerah = 'Normal';
        }
        return statusMerah;
    }

    function prediksiKetinggian(sebelum, sekarang) {
        if (sekarang > sebelum) {
            return sekarang + (sekarang - sebelum);
        } else if (sebelum > sekarang) {
            return sekarang + (sebelum - sekarang);
        } else {
            return sebelum;
        }
    }

    function prediksiBanjir(katulampa, posDepok, manggarai, istiqlal, jembatanMerah) {
        kl = katulampa
        pd = posDepok
        mg = manggarai
        it = istiqlal
        jm = jembatanMerah

        if (kl == 'Siaga' || kl == 'Bahaya') {
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        } else if (kl == 'Waspada') {
            // Jika status ketinggian Katulampa berada pada posisi "Waspada"
            // Maka akan dilanjutkan pengecekan kondisi 4 lokasi pemantauan lainnya

            // Jika keempatnya "Bahaya"
            if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Siaga"
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Waspada"
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Normal"
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 2 "Bahaya" 2 "Siaga"
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

                // Jika 2 "Bahaya" 1 "Siaga" 1 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'

                // Jika 2 "Bahaya" 1 "Siaga" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

                // Jika 2 "Bahaya" 2 "Waspada"
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

                // Jika 2 "Bahaya" 1 "Waspada" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Siaga"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 2 "Siaga" 1 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 2 "Siaga" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'


                // Jika 1 "Bahaya" 1 "Siaga" 2 "Waspada"
                //Bahaya, Siaga, Waspada, Waspada
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                //Siaga, Bahaya, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                //Waspada, Bahaya, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                //Bahaya, Waspada, Siaga, Waspada
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                //Siaga, Waspada, Bahaya, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!!'
                //Waspada, Siaga, Bahaya, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Siaga, Waspada, Bahaya
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Waspada, Waspada, Bahaya
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Waspada, Siaga, Bahaya
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Bahaya, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Bahaya, Waspada, Waspada, Siaga
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Waspada, Bahaya, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'

                // Jika 1 "Bahaya" 1 "Siaga" 1 "Waspada" 1 "Normal"(UDAH BENER)
                // Normal, Siaga, Waspada, Bahaya
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Waspada, Bahaya
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Normal, Siaga, Bahaya
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada Lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Normal, Waspada, Siaga, Bahaya
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Siaga, Waspada, Normal, Bahaya
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Siaga, Normal, Bahaya
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Siaga, Bahaya, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Siaga, Waspada, Bahaya, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi istiqlal berpotensi terjadi banjir!'
                // Bahaya, Waspada, Siaga, Normal
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Waspada, Bahaya, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Menggarai berpotensi terjadi banjir!'
                // Siaga, Bahaya, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Siaga, Waspada, Normal
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Normal, Waspada, Siaga
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Normal, Bahaya, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Waspada, Bahaya, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Waspada, Normal, Siaga
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Normal, Waspada, Bahaya, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Waspada, Normal, Bahaya, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Siaga, Normal, Bahaya, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Normal, Siaga, Bahaya, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Bahaya, Siaga, Normal, Waspada
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Siaga, Bahaya, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Normal, Bahaya, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Normal, Siaga, Waspada
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 1 "Siaga" 2 "Normal"
                // Normal, Normal, Siaga, Bahaya
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Normal, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Normal, Bahaya, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Siaga, Bahaya, Normal
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Normal, Siaga, Normal, Bahaya
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Bahaya, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Normal, Normal, Bahaya
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Bahaya, Normal
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Bahaya, Normal, Normal, Siaga
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Normal, Siaga, Normal
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Siaga, Normal, Normal
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Siaga, Bahaya, Normal, Normal
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'

                // Jika 1 "Bahaya" 1 "Waspada" 2 "Normal"

                // Normal, Normal, Waspada, Bahaya
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Normal, Bahaya, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Waspada, Normal, Bahaya
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Normal, Waspada, Bahaya, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Bahaya, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Waspada, Normal, Normal, Bahaya
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Bahaya, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Bahaya, Normal, Normal, Waspada
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Normal, Waspada, Normal
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Waspada, Normal, Normal
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Bahaya, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

                // 4 Siaga
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
                // 3 Siaga 1 Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
                // 3 Siaga 1 Normal
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // 2 Siaga 2 Waspada

                // Siaga, Siaga, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Waspada, Siaga, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Siaga, Waspada, Waspada, Siaga
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan istiqlal berpotensi banjir!'
                // Waspada, Siaga, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
                // Waspada, Waspada, Siaga, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'


                // 2 Siaga 1 Waspada 1 Normal

                // Normal, Siaga, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
                // Normal, Siaga, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
                // Normal, Waspada, Siaga, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Siaga, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Siaga, Normal, Waspada, Siaga
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
                // Siaga, Siaga, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Siaga, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Waspada, Normal, Siaga
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah  berpotensi banjir!'
                // Siaga, Waspada, Siaga, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Waspada, Normal, Siaga, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'

                // 2 Siaga 2 Normal
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Waspada, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
                // Waspada, Normal, Waspada, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
                // Normal, Waspada, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
                // Waspada, Normal, Normal, Waspada
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Normal, Waspada, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'

                // 1 Siaga 3 Waspada
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // 1 Siaga 3 Normal
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // 2 Waspada 2 Normal

                // Waspada, Waspada, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Waspada, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
                // Waspada, Normal, Waspada, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
                // Normal, Waspada, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
                // Waspada, Normal, Normal, Waspada
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Normal, Waspada, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'


                // 2 Waspada 1 Siaga 1 Normal

                // Waspada, Waspada, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal warga perlu waspada!'
                // Siaga, Waspada, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
                // Waspada, Siaga, Waspada, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
                // Siaga, Waspada, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
                // Waspada, Siaga, Normal, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
                // Normal, Siaga, Waspada, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
                // Siaga, Normal, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Normal, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Waspada, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Waspada, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Waspada, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // 1 Waspada 3 Normal
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Jembatan Merah warga perlu waspada!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Istiqlal warga perlu waspada!'
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Manggarai warga perlu waspada!'
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok warga perlu waspada!'

                //2 Normal 1 Siaga 1 Waspada

                // Normal, Normal, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == '' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Normal, Siaga, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Normal, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
                // Normal, Siaga, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Waspada, Siaga, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Waspada, Normal, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Normal, Waspada, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Normal, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Normal, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Waspada, Normal, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            } else {
                pesan = '[AMAN] Pada lokasi Katulampa warga perlu waspada!'
            }
        } else {
            // Jika keempatnya "Bahaya"
            if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Siaga"
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Waspada"
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 3 "Bahaya" 1 "Normal"
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 2 "Bahaya" 2 "Siaga"
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

                // Jika 2 "Bahaya" 1 "Siaga" 1 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'

                // Jika 2 "Bahaya" 1 "Siaga" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

                // Jika 2 "Bahaya" 2 "Waspada"
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

                // Jika 2 "Bahaya" 1 "Waspada" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Siaga"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 2 "Siaga" 1 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 2 "Siaga" 1 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'


                // Jika 1 "Bahaya" 1 "Siaga" 2 "Waspada"
                //Bahaya, Siaga, Waspada, Waspada
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                //Siaga, Bahaya, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                //Waspada, Bahaya, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                //Bahaya, Waspada, Siaga, Waspada
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                //Siaga, Waspada, Bahaya, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!!'
                //Waspada, Siaga, Bahaya, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Siaga, Waspada, Bahaya
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Waspada, Waspada, Bahaya
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Waspada, Siaga, Bahaya
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Bahaya, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Bahaya, Waspada, Waspada, Siaga
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Waspada, Bahaya, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'

                // Jika 1 "Bahaya" 1 "Siaga" 1 "Waspada" 1 "Normal"(UDAH BENER)
                // Normal, Siaga, Waspada, Bahaya
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Waspada, Bahaya
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Normal, Siaga, Bahaya
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada Lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Normal, Waspada, Siaga, Bahaya
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Siaga, Waspada, Normal, Bahaya
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Siaga, Normal, Bahaya
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
                // Waspada, Siaga, Bahaya, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Siaga, Waspada, Bahaya, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi istiqlal berpotensi terjadi banjir!'
                // Bahaya, Waspada, Siaga, Normal
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Waspada, Bahaya, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Menggarai berpotensi terjadi banjir!'
                // Siaga, Bahaya, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Siaga, Waspada, Normal
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Normal, Waspada, Siaga
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Normal, Bahaya, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Waspada, Bahaya, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Waspada, Normal, Siaga
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Normal, Waspada, Bahaya, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Waspada, Normal, Bahaya, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Siaga, Normal, Bahaya, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Normal, Siaga, Bahaya, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
                // Bahaya, Siaga, Normal, Waspada
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
                // Siaga, Bahaya, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Normal, Bahaya, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
                // Bahaya, Normal, Siaga, Waspada
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'

                // Jika 1 "Bahaya" 1 "Siaga" 2 "Normal"
                // Normal, Normal, Siaga, Bahaya
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Normal, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Normal, Bahaya, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Siaga, Bahaya, Normal
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Normal, Siaga, Normal, Bahaya
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Bahaya, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Normal, Normal, Bahaya
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Bahaya, Normal
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Bahaya, Normal, Normal, Siaga
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Normal, Siaga, Normal
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Siaga, Normal, Normal
            } else if (pd == 'Bahaya' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Siaga, Bahaya, Normal, Normal
            } else if (pd == 'Siaga' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'

                // Jika 1 "Bahaya" 1 "Waspada" 2 "Normal"

                // Normal, Normal, Waspada, Bahaya
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Normal, Bahaya, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Waspada, Normal, Bahaya
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Bahaya, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Normal, Waspada, Bahaya, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Bahaya, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
                // Waspada, Normal, Normal, Bahaya
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Bahaya, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
                // Bahaya, Normal, Normal, Waspada
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Normal, Waspada, Normal
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Bahaya, Waspada, Normal, Normal
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Bahaya, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Waspada"
            } else if (pd == 'Bahaya' && mg == 'Waspada' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Bahaya' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Bahaya' && jm == 'Waspada') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Waspada' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

                // Jika 1 "Bahaya" 3 "Normal"
            } else if (pd == 'Bahaya' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Bahaya' && it == 'Normal' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Bahaya' && jm == 'Normal') {
                pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Bahaya') {
                pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

                // 4 Siaga
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
                // 3 Siaga 1 Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
                // 3 Siaga 1 Normal
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'



                // 2 Siaga 1 Waspada 1 Normal

                // Normal, Siaga, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
                // Normal, Siaga, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
                // Normal, Waspada, Siaga, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Siaga, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Siaga, Normal, Waspada, Siaga
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
                // Siaga, Siaga, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Siaga, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Waspada, Normal, Siaga
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah  berpotensi banjir!'
                // Siaga, Waspada, Siaga, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Waspada, Normal, Siaga, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'

                // 2 Siaga 2 Waspada

                // Siaga, Siaga, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
                // Siaga, Waspada, Siaga, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
                // Siaga, Waspada, Waspada, Siaga
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
                // Waspada, Siaga, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai dan istiqlal berpotensi banjir!'
                // Waspada, Siaga, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
                // Waspada, Waspada, Siaga, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

                // 2 Waspada 1 Siaga 1 Normal

                // Waspada, Waspada, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Siaga, Waspada, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Siaga, Waspada, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Waspada, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Siaga, Normal, Waspada
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Normal, Siaga, Waspada, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Normal, Waspada, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Waspada, Normal, Siaga, Waspada
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Waspada, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Waspada, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Waspada, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Waspada, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'

                //2 Normal 1 Siaga 1 Waspada

                // Normal, Normal, Siaga, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == '' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Siaga, Normal, Normal, Waspada
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Normal, Siaga, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Normal, Waspada, Normal
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
                // Normal, Siaga, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Waspada, Siaga, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
                // Siaga, Waspada, Normal, Normal
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // Normal, Waspada, Siaga, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Waspada, Normal, Siaga, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
                // Normal, Normal, Waspada, Siaga
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Waspada, Normal, Normal, Siaga
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
                // Normal, Waspada, Normal, Siaga
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'

                // 1 Siaga 3 Waspada
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Waspada' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Siaga' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
            } else if (pd == 'Waspada' && mg == 'Siaga' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Waspada' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // 1 Siaga 3 Normal
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Siaga') {
                pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Siaga' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
            } else if (pd == 'Normal' && mg == 'Siaga' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
            } else if (pd == 'Siaga' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
                // 2 Waspada 2 Normal

                // Waspada, Waspada, Normal, Normal
            } else if (pd == 'Waspada' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Waspada, Waspada, Normal
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
                // Waspada, Normal, Waspada, Normal
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
                // Normal, Waspada, Normal, Waspada
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
                // Waspada, Normal, Normal, Waspada
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
                // Normal, Normal, Waspada, Waspada
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'

                // 1 Waspada 3 Normal
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Normal' && jm == 'Waspada') {
                pesan = '[AMAN] Pada lokasi Jembatan Merah warga perlu waspada!'
            } else if (pd == 'Normal' && mg == 'Normal' && it == 'Waspada' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Istiqlal warga perlu waspada!'
            } else if (pd == 'Normal' && mg == 'Waspada' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Manggarai warga perlu waspada!'
            } else if (pd == 'Waspada' && mg == 'Normal' && it == 'Normal' && jm == 'Normal') {
                pesan = '[AMAN] Pada lokasi Pos Depok warga perlu waspada!'
            } else {
                pesan = '[AMAN] DAS Ciliwung tidak memiliki potensi banjir!'
            }
        }
        return pesan
    }

    var oldkl = <?= $oldkl ?>;
    var oldpd = <?= $oldpd ?>;
    var oldmg = <?= $oldmg ?>;
    var oldit = <?= $oldit ?>;
    var oldjm = <?= $oldjm ?>;

    var kl = <?= $kl ?>;
    var pd = <?= $pd ?>;
    var mg = <?= $mg ?>;
    var it = <?= $it ?>;
    var jm = <?= $jm ?>;

    var predkl = prediksiKetinggian(<?= $oldkl ?>, <?= $kl ?>);
    var predpd = prediksiKetinggian(<?= $oldpd ?>, <?= $pd ?>);
    var predmg = prediksiKetinggian(<?= $oldmg ?>, <?= $mg ?>);
    var predit = prediksiKetinggian(<?= $oldit ?>, <?= $it ?>);
    var predjm = prediksiKetinggian(<?= $oldjm ?>, <?= $jm ?>);

    var statkl = Katulampa(predkl);
    var statpd = PosDepok(predpd);
    var statmg = Manggarai(predmg);
    var statit = Istiqlal(predit);
    var statjm = JembatanMerah(predjm);



    document.getElementById("statuskl1").innerHTML = Katulampa(oldkl);
    document.getElementById("statuspd1").innerHTML = PosDepok(oldpd);
    document.getElementById("statusmg1").innerHTML = Manggarai(oldmg);
    document.getElementById("statusit1").innerHTML = Istiqlal(oldit);
    document.getElementById("statusjm1").innerHTML = JembatanMerah(oldjm);

    document.getElementById("statuskl2").innerHTML = Katulampa(kl);
    document.getElementById("statuspd2").innerHTML = PosDepok(pd);
    document.getElementById("statusmg2").innerHTML = Manggarai(mg);
    document.getElementById("statusit2").innerHTML = Istiqlal(it);
    document.getElementById("statusjm2").innerHTML = JembatanMerah(jm);

    document.getElementById("statuskl3").innerHTML = prediksiKetinggian(oldkl, kl);
    document.getElementById("statuspd3").innerHTML = prediksiKetinggian(oldpd, pd);
    document.getElementById("statusmg3").innerHTML = prediksiKetinggian(oldmg, mg);
    document.getElementById("statusit3").innerHTML = prediksiKetinggian(oldit, it);
    document.getElementById("statusjm3").innerHTML = prediksiKetinggian(oldjm, jm);

    document.getElementById("statuskl4").innerHTML = Katulampa(prediksiKetinggian(oldkl, kl));
    document.getElementById("statuspd4").innerHTML = PosDepok(prediksiKetinggian(oldpd, pd));
    document.getElementById("statusmg4").innerHTML = Manggarai(prediksiKetinggian(oldmg, mg));
    document.getElementById("statusit4").innerHTML = Istiqlal(prediksiKetinggian(oldit, it));
    document.getElementById("statusjm4").innerHTML = JembatanMerah(prediksiKetinggian(oldjm, jm));

    var hasil = prediksiBanjir(statkl, statpd, statmg, statit, statjm);
    document.getElementById("hasil").innerHTML = hasil;
</script>

</html>