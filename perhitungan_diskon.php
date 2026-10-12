<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator-container {
            background: #00162e;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease;
        }

        .calculator-container:hover {
            transform: translateY(-10px);
        }

        h1 {
            color: #ffffff;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ffffff;
            font-weight: 400;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .result-container {
            margin-top: 30px;
            padding: 20px;
            background: #f0f8ff;
            border-radius: 10px;
            border: 1px dashed #007bff;
            display: none; /* Hidden by default */
        }

        .result-container h2 {
            margin-top: 0;
            color: #007bff;
        }

        #harga-akhir {
            font-size: 28px;
            font-weight: 600;
            color: #28a745;
        }

        #hemat {
            color: #555;
        }
    </style>
</head>
<body>

    <div class="calculator-container">
        <h1>Kalkulator Diskon</h1>
        <div class="input-group">
            <label for="harga-asli">Harga Asli (Rp)</label>
            <input type="number" id="harga-asli" placeholder="Contoh: 100000">
        </div>
        <div class="input-group">
            <label for="diskon">Persentase Diskon (%)</label>
            <input type="number" id="diskon" placeholder="Contoh: 10">
        </div>
        <button onclick="hitungDiskon()">Hitung Diskon</button>
        <div class="result-container" id="hasil">
            <h2>Harga Setelah Diskon</h2>
            <p id="harga-akhir"></p>
            <p id="hemat"></p>
        </div>
    </div>

    <script>
        function hitungDiskon() {
            const hargaAsliInput = document.getElementById('harga-asli');
            const diskonInput = document.getElementById('diskon');
            
            const hargaAsli = parseFloat(hargaAsliInput.value);
            const diskon = parseFloat(diskonInput.value);

            if (isNaN(hargaAsli) || isNaN(diskon) || hargaAsli <= 0 || diskon < 0 || diskon > 100) {
                alert("Masukkan harga asli dan diskon yang valid!\n- Harga harus lebih besar dari 0.\n- Diskon harus antara 0 dan 100.");
                return;
            }

            const jumlahDiskon = (hargaAsli * diskon) / 100;
            const hargaAkhir = hargaAsli - jumlahDiskon;

            const formatRupiah = (angka) => {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
            };

            document.getElementById('harga-akhir').innerText = formatRupiah(hargaAkhir);
            document.getElementById('hemat').innerText = `Anda hemat ${formatRupiah(jumlahDiskon)}!`;
            
            const hasilContainer = document.getElementById('hasil');
            hasilContainer.style.display = 'block';
        }
    </script>

</body>
</html>