<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
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
            background-color: #04AA6D;
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
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
        </tr>

        @php
            $no=1;
        @endphp

        @foreach ($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->kategori_id }}</td>
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

</html>
