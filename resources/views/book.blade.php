<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Hotels - Booking Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0e6d2, #f8f9fa);
            min-height: 100vh;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }

        nav {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(212, 175, 55, 0.3);
            margin-bottom: 50px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 900;
            font-size: 24px;
            letter-spacing: 2px;
            color: #D4AF37;
        }

        .star {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            background: #fff;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.25);
        }

        .form-container h2 {
            text-align: center;
            color: #D4AF37;
            margin-bottom: 40px;
            font-size: 32px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[readonly] {
            background: #f9f9f9;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .radio-group label {
            font-weight: normal;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        button {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
        }

        .calc-btn {
            background: #28a745;
            color: white;
        }

        .calc-btn:hover {
            background: #218838;
        }

        .submit-btn {
            background: #D4AF37;
            color: white;
        }

        .submit-btn:hover {
            background: #B8941F;
        }

        .reset-btn {
            background: #6c757d;
            color: white;
        }

        .reset-btn:hover {
            background: #545b62;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <div class="star"></div>
            <span>STAR HOTELS</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('booking') }}">Booking</a></li>
            <li><a href="{{ route('tampilan') }}">Daftar Pemesanan</a></li>
        </ul>
    </nav>

    <div class="form-container">
        <h2>Form Pemesanan Hotel</h2>
        <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Pemesan</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
                </div>
            </div>

            <div class="form-group">
                <label for="nomor_identitas">Nomor Identitas</label>
                <input type="text" id="nomor_identitas" name="nomor_identitas" maxlength="16" pattern="\d{16}" required>
                <div class="error" id="nomor_error"></div>
            </div>

            <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar</label>
                <select id="tipe_kamar" name="tipe_kamar" required>
                    <option value="">Pilih Tipe Kamar</option>
                    <option value="Standar">Standar</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Family">Family</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" readonly>
            </div>

            <div class="form-group">
                <label for="tanggal_pesan">Tanggal Pesan</label>
                <input type="text" id="tanggal_pesan" name="tanggal_pesan" pattern="\d{2}/\d{2}/\d{4}" placeholder="dd/mm/yyyy" required>
            </div>

            <div class="form-group">
                <label for="durasi">Durasi Menginap</label>
                <input type="number" id="durasi" name="durasi" min="1" required>
                <div class="error" id="durasi_error"></div>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="breakfast" name="breakfast">
                    <label for="breakfast">Termasuk Breakfast</label>
                </div>
            </div>

            <div class="form-group">
                <label for="total_bayar">Total Bayar</label>
                <input type="number" id="total_bayar" name="total_bayar" readonly>
            </div>

            <div class="buttons">
                <button type="button" class="calc-btn" onclick="calculateTotal()">Hitung Total Bayar</button>
                <button type="submit" class="submit-btn">Simpan</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>

    <script>
        const prices = {
            'Standar': 500000,
            'Deluxe': 750000,
            'Family': 1000000
        };

        document.getElementById('tipe_kamar').addEventListener('change', function() {
            const tipe = this.value;
            document.getElementById('harga').value = prices[tipe] || '';
        });

        function validateNomorIdentitas() {
            const val = document.getElementById('nomor_identitas').value;
            const error = document.getElementById('nomor_error');
            if (val.length !== 16 || isNaN(val)) {
                error.textContent = 'isian salah..data harus 16 digit';
                return false;
            } else {
                error.textContent = '';
                return true;
            }
        }

        function validateDurasi() {
            const val = document.getElementById('durasi').value;
            const error = document.getElementById('durasi_error');
            if (!val || isNaN(val) || val <= 0) {
                error.textContent = 'harus isi angka';
                return false;
            } else {
                error.textContent = '';
                return true;
            }
        }

        document.getElementById('nomor_identitas').addEventListener('blur', validateNomorIdentitas);
        document.getElementById('durasi').addEventListener('input', validateDurasi);

        function calculateTotal() {
            if (!validateNomorIdentitas() || !validateDurasi()) return;

            const harga = parseFloat(document.getElementById('harga').value) || 0;
            const durasi = parseInt(document.getElementById('durasi').value) || 0;
            const breakfast = document.getElementById('breakfast').checked;

            let total = harga * durasi;
            if (durasi > 3) {
                total *= 0.9;
            }
            if (breakfast) {
                total += 80000;
            }

            document.getElementById('total_bayar').value = Math.round(total);
        }
    </script>
</body>
</html>
