<!DOCTYPE html>
<html>

<head>
    <style>
        *{
            font-family: 'Martian Mono', monospace;
        }
        #customers {
            border-radius: 4cm;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgba(105, 108, 255, 0.85);
            color: white;
        }

    </style>
</head>

<body>

    <h1>Laporan Data Transaksi</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
        </tr>

        @php
            $no=1;
        @endphp

        @foreach ($transaction as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->keterangan }}</td>
            <td>{{ $row->jumlah_pemasukan_id }}</td>
            <td>{{ $row->jumlah_pengeluaran_id }}</td>
        </tr>
        @endforeach
        <tr>
            {{-- <td>{{ $loop->iteration }}</td> --}}
            {{-- <td>{{ $row->kategori }}</td> --}}
        </tr>

    </table>

</body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Martian+Mono&display=swap">
</html>
