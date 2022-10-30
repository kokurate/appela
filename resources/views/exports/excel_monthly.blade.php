     <table>
         <thead>
             <tr style="text-align: center">
                <th colspan="7" rowspan="2" style="text-align: center"><strong>EXPORT PENGADUAN, {{ $month }} {{ $year }}</strong></th>
            </tr>
            <tr>
                <th></th>
            </tr>
            

            <tr>
                
                <th style="text-align: center">#</th>
                <th style="text-align: center">Dibuat</th>
                <th style="text-align: center">Kode</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Tujuan</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Judul</th>
            </tr>
            </thead>
            <tbody>

            @forelse($pengaduan as $p)

                <tr>
                    <td style="border: 1px solid black">{{ $i++ }}</td>
                    <td style="border: 1px solid black">{{ $p->created_at->toDateString() }}</td>
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
