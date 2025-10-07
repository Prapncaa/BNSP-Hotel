<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Star Hotels - Daftar Pemesanan</title>
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
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
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

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 16px;
            position: relative;
            padding: 5px 0;
            transition: color 0.4s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background: #D4AF37;
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-links a:hover,
        .nav-links a:focus {
            color: #D4AF37;
            outline: none;
        }

        .nav-links a:hover::after,
        .nav-links a:focus::after {
            width: 100%;
        }

        .book-btn {
            background: #D4AF37;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.4);
            user-select: none;
        }

        .book-btn:hover,
        .book-btn:focus {
            background: #B8941F;
            box-shadow: 0 10px 25px rgba(184, 148, 31, 0.7);
            outline: none;
        }

        /* Table Container */
        .table-container {
            width: 100%;
            max-width: 1400px;
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

        .table-container h2 {
            text-align: center;
            color: #B8941F;
            margin-bottom: 40px;
            font-size: 36px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-shadow: 0 0 8px #D4AF37;
            user-select: none;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            font-size: 16px;
            font-weight: 600;
            color: #5a4d00;
        }

        thead th {
            background: #fff9e6;
            color: #6b5e00;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0;
            box-shadow: inset 0 -3px 6px rgba(212, 175, 55, 0.2);
            user-select: none;
        }

        tbody tr {
            background: #fffbea;
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.15);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
        }

        tbody tr:hover,
        tbody tr:focus-within {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.35);
            background: #fff8d1;
            outline: none;
        }

        tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border: none;
        }

        .no-data {
            text-align: center;
            color: #8c7a00;
            padding: 60px 20px;
            font-style: italic;
            font-size: 20px;
            user-select: none;
            text-shadow: 0 0 3px rgba(212, 175, 55, 0.5);
        }

        .action-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
            transition: background 0.3s, transform 0.2s;
        }

        .edit-btn {
            background: #007bff;
            color: white;
        }

        .edit-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        @media (max-width: 1024px) {
            .table-container {
                padding: 40px 30px;
            }
            table {
                font-size: 14px;
            }
            thead th, tbody td {
                padding: 12px 15px;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 15px 30px;
            }
            .nav-links {
                gap: 25px;
            }
            .table-container {
                padding: 30px 20px;
            }
            table {
                font-size: 13px;
            }
            thead th, tbody td {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            nav {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
            .logo {
                font-size: 20px;
            }
            .star {
                width: 40px;
                height: 40px;
            }
            .table-container {
                padding: 25px 15px;
            }
            table {
                font-size: 12px;
            }
            thead th, tbody td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="logo" aria-label="Logo Star Hotels">
            <div class="star" aria-hidden="true"></div>
            <span>STAR HOTELS</span>
        </div>
        <ul class="nav-links" role="menubar" aria-label="Main navigation">
            <li role="none"><a href="{{ route('home') }}" role="menuitem" tabindex="0">Home</a></li>
            <li role="none"><a href="{{ route('booking') }}" role="menuitem" tabindex="0">Booking</a></li>
            <li role="none"><a href="{{ route('tampilan') }}" role="menuitem" tabindex="0">Daftar Pemesanan</a></li>
        </ul>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
        <div style="text-align: center; margin-bottom: 20px; padding: 10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Section -->
    <div class="table-container" role="main" aria-labelledby="tableTitle">
        <h2 id="tableTitle">Daftar Pemesanan Hotel</h2>
        @if($pemesanans->count() > 0)
            <table aria-describedby="tableDesc" role="table">
                <caption id="tableDesc" class="sr-only">Tabel daftar pemesanan hotel dengan kolom nama, jenis kelamin, nomor identitas, tipe kamar, harga, tanggal pesan, durasi, breakfast, total bayar, dan aksi</caption>
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nomor Identitas</th>
                        <th scope="col">Tipe Kamar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Breakfast</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanans as $pemesanan)
                        <tr tabindex="0">
                            <td>{{ $pemesanan->nama }}</td>
                            <td>{{ $pemesanan->jenis_kelamin }}</td>
                            <td>{{ $pemesanan->nomor_identitas }}</td>
                            <td>{{ $pemesanan->tipe_kamar }}</td>
                            <td>Rp {{ number_format($pemesanan->harga, 0, ',', '.') }}</td>
                            <td>{{ $pemesanan->tanggal_pesan }}</td>
                            <td>{{ $pemesanan->durasi }} hari</td>
                            <td>{{ $pemesanan->breakfast ? 'Ya' : 'Tidak' }}</td>
                            <td>Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('booking.edit', $pemesanan->id) }}" class="action-btn edit-btn">Edit</a>
                                <form action="{{ route('booking.destroy', $pemesanan->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data" role="alert" aria-live="polite">
                Belum ada pemesanan yang tercatat.
            </div>
        @endif
    </div>

    <style>
        /* Screen reader only */
        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
    </style>
</body>
</html>
