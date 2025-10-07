<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Star Hotels - Edit Booking</title>
    <style>
        /* Reset & base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0e6d2, #f8f9fa);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            color: #333;
        }

        /* Navigation */
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
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: saturate(180%) blur(20px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 900;
            font-size: 24px;
            letter-spacing: 2px;
            color: #D4AF37;
            text-shadow: 0 0 8px #FFD700;
            user-select: none;
        }

        .star {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            clip-path: polygon(
                50% 0%,
                61% 35%,
                98% 35%,
                68% 57%,
                79% 91%,
                50% 70%,
                21% 91%,
                32% 57%,
                2% 35%,
                39% 35%
            );
            filter: drop-shadow(0 0 5px #FFD700);
            animation: starGlow 3s ease-in-out infinite alternate;
        }

        @keyframes starGlow {
            0% {
                filter: drop-shadow(0 0 5px #FFD700);
            }
            100% {
                filter: drop-shadow(0 0 15px #FFD700);
            }
        }

        /* Form Container */
        .form-container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            padding: 50px 60px;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.25);
            backdrop-filter: saturate(180%) blur(15px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container h2 {
            text-align: center;
            color: #B8941F;
            margin-bottom: 40px;
            font-size: 36px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-shadow: 0 0 8px #D4AF37;
        }

        .form-group {
            margin-bottom: 30px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #5a4d00;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 0.03em;
            text-shadow: 0 0 3px rgba(212, 175, 55, 0.7);
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #d4af37;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #5a4d00;
            background: #fff9e6;
            box-shadow: inset 0 0 8px rgba(212, 175, 55, 0.15);
            transition: border-color 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #FFD700;
            box-shadow: 0 0 12px #FFD700;
            background: #fffbea;
        }

        input[readonly] {
            background: #f9f6e7;
            cursor: default;
            color: #a68c00;
            font-weight: 700;
            font-size: 18px;
            text-shadow: 0 0 3px rgba(212, 175, 55, 0.8);
        }

        /* Radio Group */
        .radio-group {
            display: flex;
            gap: 30px;
            margin-top: 8px;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 15px;
            color: #6b5e00;
            cursor: pointer;
            user-select: none;
            position: relative;
            padding-left: 30px;
        }

        .radio-group input[type="radio"] {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2.5px solid #d4af37;
            border-radius: 50%;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: background 0.3s ease, border-color 0.3s ease;
            background: #fff9e6;
            box-shadow: inset 0 0 6px rgba(212, 175, 55, 0.2);
        }

        .radio-group input[type="radio"]:checked {
            background: #D4AF37;
            border-color: #FFD700;
            box-shadow: 0 0 8px #FFD700;
        }

        /* Checkbox Group */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 24px;
            height: 24px;
            cursor: pointer;
            appearance: none;
            border: 2.5px solid #d4af37;
            border-radius: 6px;
            background: #fff9e6;
            box-shadow: inset 0 0 6px rgba(212, 175, 55, 0.2);
            position: relative;
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .checkbox-group input[type="checkbox"]:checked {
            background: #D4AF37;
            border-color: #FFD700;
            box-shadow: 0 0 8px #FFD700;
        }

        .checkbox-group input[type="checkbox"]:checked::after {
            content: '✔';
            color: #fff;
            font-weight: 900;
            font-size: 18px;
            position: absolute;
            top: 1px;
            left: 5px;
            user-select: none;
        }

        .checkbox-group label {
            font-weight: 600;
            font-size: 16px;
            color: #6b5e00;
            cursor: pointer;
            user-select: none;
            text-shadow: 0 0 2px rgba(212, 175, 55, 0.7);
        }

        /* Error Messages */
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
            display: none;
            font-weight: 700;
            text-shadow: 0 0 2px rgba(220, 53, 69, 0.8);
        }

        /* Form Row */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* Buttons */
        .button-group {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .button-group {
                grid-template-columns: 1fr;
            }
        }

        .btn {
            padding: 18px 0;
            border: none;
            border-radius: 15px;
            font-weight: 900;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.4);
            letter-spacing: 1.2px;
            text-transform: uppercase;
            user-select: none;
            position: relative;
            overflow: hidden;
            transition: background 0.4s ease, transform 0.3s ease, box-shadow 0.4s ease;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: translateY(-50%) rotate(25deg);
            transition: left 0.7s ease;
            pointer-events: none;
            z-index: 1;
        }

        .btn:hover::before {
            left: 150%;
        }

        .btn:focus {
            outline: none;
            box-shadow: 0 0 15px 3px #FFD700;
        }

        .btn-calculate {
            background: #D4AF37;
            color: #fff;
            text-shadow: 0 0 6px #B8941F;
        }

        .btn-calculate:hover {
            background: #B8941F;
            box-shadow: 0 10px 25px rgba(184, 148, 31, 0.7);
            transform: translateY(-4px);
        }

        .btn-save {
            background: #28a745;
            color: #fff;
            text-shadow: 0 0 6px #1e7e34;
        }

        .btn-save:hover {
            background: #218838;
            box-shadow: 0 10px 25px rgba(33, 136, 56, 0.7);
            transform: translateY(-4px);
        }

        .btn-reset {
            background: #6c757d;
            color: #fff;
            text-shadow: 0 0 6px #4e555b;
        }

        .btn-reset:hover {
            background: #5a6268;
            box-shadow: 0 10px 25px rgba(90, 98, 104, 0.7);
            transform: translateY(-4px);
        }

        /* Scrollbar for inputs (optional) */
        input[type="text"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="logo">
            <div class="star"></div>
            <span>STAR HOTELS</span>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="form-container" role="main" aria-labelledby="formTitle">
        <h2 id="formTitle">Edit Pemesanan Hotel</h2>
        <form id="bookingForm" action="{{ route('booking.update', $pemesanan->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <!-- Nama Pemesan -->
            <div class="form-group">
                <label for="nama">Nama Pemesan <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                <input type="text" id="nama" name="nama" value="{{ $pemesanan->nama }}" required aria-required="true" aria-describedby="namaHelp" autocomplete="name" />
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group" role="radiogroup" aria-labelledby="jenisKelaminLabel">
                <label id="jenisKelaminLabel">Jenis Kelamin <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ $pemesanan->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} required aria-required="true" />
                        Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $pemesanan->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} />
                        Perempuan
                    </label>
                </div>
            </div>

            <!-- Nomor Identitas -->
            <div class="form-group">
                <label for="nomorIdentitas">Nomor Identitas <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                <input type="text" id="nomorIdentitas" name="nomor_identitas" maxlength="16" value="{{ $pemesanan->nomor_identitas }}" required aria-required="true" aria-describedby="errorIdentitas" autocomplete="off" inputmode="numeric" pattern="\d{16}" oninput="validateIdentity()" />
                <div class="error-message" id="errorIdentitas" role="alert" aria-live="assertive">Nomor identitas harus 16 digit angka</div>
            </div>

            <!-- Form Row: Tipe Kamar & Harga -->
            <div class="form-row">
                <div class="form-group">
                    <label for="tipeKamar">Tipe Kamar <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                    <select id="tipeKamar" name="tipe_kamar" required aria-required="true" aria-describedby="tipeKamarHelp">
                        <option value="" disabled>Pilih Tipe Kamar</option>
                        <option value="Standar" {{ $pemesanan->tipe_kamar == 'Standar' ? 'selected' : '' }}>Standar - Rp 500.000</option>
                        <option value="Deluxe" {{ $pemesanan->tipe_kamar == 'Deluxe' ? 'selected' : '' }}>Deluxe - Rp 800.000</option>
                        <option value="Family" {{ $pemesanan->tipe_kamar == 'Family' ? 'selected' : '' }}>Family - Rp 1.200.000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" id="harga" name="harga_display" readonly aria-readonly="true" />
                    <input type="hidden" id="hargaValue" name="harga" value="{{ $pemesanan->harga }}" />
                </div>
            </div>

            <!-- Form Row: Tanggal & Durasi -->
            <div class="form-row">
                <div class="form-group">
                    <label for="tanggalPesan">Tanggal Pesan <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                    <input type="text" id="tanggalPesan" name="tanggal_pesan" placeholder="dd/mm/yyyy" value="{{ $pemesanan->tanggal_pesan }}" required aria-required="true" autocomplete="off" />
                </div>

                <div class="form-group">
                    <label for="durasi">Durasi Menginap (hari) <span aria-hidden="true" style="color:#dc3545;">*</span></label>
                    <input type="number" id="durasi" name="durasi" min="1" value="{{ $pemesanan->durasi }}" required aria-required="true" aria-describedby="errorDurasi" />
                    <div class="error-message" id="errorDurasi" role="alert" aria-live="assertive">Harus isi angka</div>
                </div>
            </div>

            <!-- Breakfast -->
            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="breakfast" name="breakfast" value="1" {{ $pemesanan->breakfast ? 'checked' : '' }} />
                    <label for="breakfast">Termasuk Breakfast (+ Rp 80.000)</label>
                </div>
            </div>

            <!-- Total Bayar -->
            <div class="form-group">
                <label for="totalBayar">Total Bayar</label>
                <input type="text" id="totalBayar" name="total_bayar_display" readonly aria-readonly="true" />
                <input type="hidden" id="totalBayarValue" name="total_bayar" value="{{ $pemesanan->total_bayar }}" />
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button type="button" class="btn btn-calculate" onclick="hitungTotal()" aria-label="Hitung Total Bayar">Hitung Total Bayar</button>
                <button type="submit" class="btn btn-save" onclick="return validateBeforeSave()" aria-label="Update Booking">Update Booking</button>
                <a href="{{ route('tampilan') }}" class="btn btn-reset" style="text-decoration: none; text-align: center;">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        const hargaKamar = {
            'Standar': 500000,
            'Deluxe': 800000,
            'Family': 1200000
        };

        // Set initial values on load
        document.addEventListener('DOMContentLoaded', function() {
            const tipeKamar = document.getElementById('tipeKamar').value;
            const harga = hargaKamar[tipeKamar];
            if (harga) {
                document.getElementById('harga').value = 'Rp ' + harga.toLocaleString('id-ID');
            }
            calculateTotal();
        });

        // Fungsi validasi nomor identitas real-time
        function validateIdentity() {
            const input = document.getElementById('nomorIdentitas');
            const errorDiv = document.getElementById('errorIdentitas');
            const value = input.value.replace(/\D/g, ''); // hanya angka
            input.value = value; // update input

            if (value.length !== 16) {
                errorDiv.style.display = 'block';
            } else {
                errorDiv.style.display = 'none';
            }
        }

        // Fungsi hitung total tanpa alert untuk otomatis
        function calculateTotal() {
            const harga = parseInt(document.getElementById('hargaValue').value);
            const durasi = parseInt(document.getElementById('durasi').value);
            const breakfast = document.getElementById('breakfast').checked;

            if (isNaN(harga) || isNaN(durasi) || durasi < 1) {
                document.getElementById('totalBayar').value = '';
                document.getElementById('totalBayarValue').value = '';
                return;
            }

            let total = harga * durasi;
            if (breakfast) {
                total += 80000 * durasi;
            }

            document.getElementById('totalBayar').value = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('totalBayarValue').value = total;
        }

        // Update harga ketika tipe kamar dipilih
        document.getElementById('tipeKamar').addEventListener('change', function () {
            const tipe = this.value;
            const harga = hargaKamar[tipe];

            if (harga) {
                document.getElementById('harga').value = 'Rp ' + harga.toLocaleString('id-ID');
                document.getElementById('hargaValue').value = harga;
            } else {
                document.getElementById('harga').value = '';
                document.getElementById('hargaValue').value = '';
            }
            calculateTotal();
        });

        // Hitung total otomatis ketika durasi atau breakfast berubah
        document.getElementById('durasi').addEventListener('input', calculateTotal);
        document.getElementById('breakfast').addEventListener('change', calculateTotal);

        // Fungsi hitung total bayar (dengan alert)
        function hitungTotal() {
            const harga = parseInt(document.getElementById('hargaValue').value);
            const durasi = parseInt(document.getElementById('durasi').value);
            const breakfast = document.getElementById('breakfast').checked;

            if (isNaN(harga)) {
                alert('Silakan pilih tipe kamar terlebih dahulu.');
                return;
            }
            if (isNaN(durasi) || durasi < 1) {
                alert('Durasi menginap harus diisi dengan angka minimal 1.');
                return;
            }

            let total = harga * durasi;
            if (breakfast) {
                total += 80000 * durasi;
            }

            document.getElementById('totalBayar').value = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('totalBayarValue').value = total;
        }

        // Fungsi validasi sebelum submit
        function validateBeforeSave() {
            const nama = document.getElementById('nama').value.trim();
            const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
            const nomorIdentitas = document.getElementById('nomorIdentitas').value.trim();
            const tipeKamar = document.getElementById('tipeKamar').value;
            const tanggalPesan = document.getElementById('tanggalPesan').value.trim();
            const durasi = document.getElementById('durasi').value;

            if (!nama || !jenisKelamin || !nomorIdentitas || nomorIdentitas.length !== 16 || !tipeKamar || !tanggalPesan || !durasi || durasi < 1) {
                alert('Mohon lengkapi semua data dengan benar sebelum menyimpan.');
                return false;
            }

            if (!document.getElementById('totalBayarValue').value) {
                alert('Silakan hitung total bayar terlebih dahulu.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
