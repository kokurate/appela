<table>
   <thead>
    <!-- A1 -->
    <tr>
        <!-- A1 --> <th></th> 
        <!-- B1 --> <th rowspan="2" colspan="2" style="text-align: center; font-size:16px; border: 1px solid black"> <strong>Total Pengaduan</strong></th>
    </tr>

    <!-- A2-->
    <tr>
        <th></th>
    </tr>

    <!-- A3-->
    <tr>
        <th></th>
        <th scope="col" style="border: 1px solid black; text-align: center; ">Tujuan</th>
        <th scope="col" style="border: 1px solid black; text-align: center; ">Total</th>
    </tr>

    <!-- A4-->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Jaringan</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_jaringan }} </td>
    </tr>

    <!-- A5-->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Server</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_server }} </td>
    </tr>

    <!-- A6 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Sistem Informasi</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_sistem_informasi }} </td>
    </tr>

    <!-- A7 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Website Unima</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_website_unima }} </td>
    </tr>

    <!-- A8 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Learning Management System</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_lms }} </td>
    </tr>

    <!-- A9 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Ijazah</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_ijazah }} </td>
    </tr>

    <!-- A10 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Slip</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_slip }} </td>
    </tr>

    <!-- A11 -->
    <tr>
        <td></td>
        <td style="border: 1px solid black; text-align: center; ">Lain-lain</td>
        <td style="border: 1px solid black; text-align: center; ">{{ $count_lain_lain }} </td>
    </tr>

    {{-- <td style="border: 1px solid black; text-align: center; ">Server</td>
    <td style="border: 1px solid black; text-align: center; ">Sistem Informasi</td>
    <td style="border: 1px solid black; text-align: center; ">Website Unima</td>
    <td style="border: 1px solid black; text-align: center; ">Learning Management System</td>
    <td style="border: 1px solid black; text-align: center; ">Ijazad</td>
    <td style="border: 1px solid black; text-align: center; ">Slip</td> --}}

    </thead>
      

    <!-- A12-->
    <tr>
        <th></th>
    </tr>

    <!-- A13-->
    <thead>
        <tr>
            <th rowspan="2" colspan="7" style="text-align: center; font-size:16px; border: 1px solid black"><strong>Data Pengaduan ({{ $count_pengaduan }})</strong></th>
        </tr>

        <!-- A14 -->
        <tr>
            <th></th>
        </tr>

        <!-- A15 -->
        <tr>
            <th style="border: 1px solid black; text-align: center; ">#</th>
            <th style="border: 1px solid black; text-align: center; ">Dibuat</th>
            <th style="border: 1px solid black; text-align: center; ">Kode</th>
            <th style="border: 1px solid black; text-align: center; ">Email</th>
            <th style="border: 1px solid black; text-align: center; ">Tujuan</th>
            <th style="border: 1px solid black; text-align: center; ">Status</th>
            <th style="border: 1px solid black; text-align: center; ">Judul</th>
        </tr>
    </thead>
    <!-- A16 -->
        <tbody>
            @forelse($pengaduan as $p)
                <tr>
                    <td style="border: 1px solid black">{{ $i++ }}</td>
                    <td style="border: 1px solid black">{{ $p->created_at }}</td>
                    <td style="border: 1px solid black">{{ $p->kode }}</td>
                    <td style="border: 1px solid black">{{ $p->used_email }}</td>
                    <td style="border: 1px solid black">{{ $p->tujuan->nama }}</td>
                    <td style="border: 1px solid black">{{ $p->status }}</td>
                    <td style="border: 1px solid black">{{ $p->judul }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; border: 1px solid black"><strong>Belum Ada Pengaduan</strong></td>
                </tr>
            @endforelse
        </tbody>



</table>