     <table>
         <thead>
             <tr style="text-align: center">
                <th colspan="7" rowspan="2" style="text-align: center"><strong>EXPORT PENGADUAN, {{ $month }} {{ $year }}</strong></th>
            </tr>
            <tr>
                <th></th>
            </tr>
            

            <tr class="text-center">
                
                <th>#</th>
                <th>Pengaduan Dibuat</th>
                <th>Kode</th>
                <th>Email</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Judul</th>
            </tr>
            </thead>
            <tbody>

            @forelse($pengaduan as $p)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->created_at->toDateString() }}</td>
                    <td>{{ $p->kode }}</td>
                    <td>{{ $p->used_email }}</td>
                    <td>{{ $p->tujuan->nama }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->judul }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center"><strong>Belum Ada Pengaduan</strong></td>
                </tr>
            @endforelse
            </tbody>
        </table>
