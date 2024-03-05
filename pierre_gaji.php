<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
if (isset($_POST["kirim1"])) {
    $gaji = $_POST["kirim1"];


    if (isset($_POST["operator"]) && isset($_POST["operator1"])) {
        $operasi = $_POST["operator"];
        $operasi2 = $_POST["operator1"];


        if ($gaji >= 5000000) {
            $tahun = $gaji * 12;
            if ($operasi == "iya" && $operasi2 == 0) {
                $ptkp = 58500000;
            } elseif ($operasi == "iya" && $operasi2 == 1) {
                $ptkp = 63000000;
            } elseif ($operasi == "iya" && $operasi2 == 2) {
                $ptkp = 67500000;
            } elseif ($operasi == "iya" && $operasi2 == 3) {
                $ptkp = 72000000;
            }

            if ($operasi == "tidak" && $operasi2 == 0) {
                $ptkp = 54000000;
            } elseif ($operasi == "tidak" && $operasi2 == 1) {
                $ptkp = 58500000;
            } elseif ($operasi == "tidak" && $operasi2 == 2) {
                $ptkp = 63000000;
            } elseif ($operasi == "tidak" && $operasi2 == 3) {
                $ptkp = 67500000;
            }


            $pkp =  $tahun - $ptkp;
            $pph = (5 / 100) * $pkp;
            $bulanan = $pph / 12;
            $bpjs = (1 / 100) * $gaji;
            $bpjskerja = (2 / 100) * $gaji;
            $bersih = $gaji - ($bulanan + $bpjs + $bpjskerja);
        } else {
            $else = "Gaji anda sangat kecil";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Kalkulator Gaji</h1>

    <p class="text-center">kalkulator gaji membantu kamu menghitung gaji bersih bulanan dengan lebih muda</p>

    <div class="container">
        <div class="row align-items-start">
            <div class="col-sm-12 col-md-6">
                <form action="" method="POST">
                    <h5 class="mt-5">Inputkan gaji kotor</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                        <input type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="kirim1" require >
                    </div>

                    <div class="row align-items-start">
                        <div class="col-6">
                            status perkawinan
                            <select class="form-select" aria-label="Default select example" name="operator">
                                <option value="iya">Kawin</option>
                                <option value="tidak">Tidak Kawin</option>
                            </select>
                        </div>
                        <div class="col-6">
                            Jumlah Tanggungan
                            <select class="form-select " aria-label="Default select example" name="operator1">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="kirim" value="kirim" class="btn btn-primary mt-3">

                </form>
            </div>
            <div class="col-sm-12 col-md-6">

                <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                    <div>
                        Di buat oleh pierre <br>
                        <?php echo $else; ?> <br>
                        Gaji Bulanan : <?php echo number_format($gaji); ?><br>
                        Gaji Disetahunkan : <?php echo number_format($tahun); ?><br>
                        Penghasilan Tidak Kena Pajak (PTKP) : <?php echo number_format($ptkp); ?><br>
                        Penghasilan Kena Pajak (PKP) : <?php echo number_format($pkp); ?><br>
                        <hr>
                        Pajak Penghasilan Tahunan (PPh 21): <?php echo number_format($pph); ?> <br>
                        Pajak Penghasilan Bulanan: <?php echo number_format($bulanan); ?> <br>
                        BPJS Kesehatan : <?php echo number_format($bpjs); ?> <br>
                        BPJS Ketenagakerjaan: <?php echo number_format($bpjskerja); ?> <br>
                        <hr>
                        Gaji bersih bulanan (Take Home Pay)
                        <p class="fs-1"><?php echo number_format($bersih); ?></p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>