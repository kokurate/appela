     <table>
         <thead>
             <tr><br></tr>
             <tr><br></tr>

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

            @foreach($pengaduan as $p)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->created_at->toDateString() }}</td>
                    <td>{{ $p->kode }}</td>
                    <td>{{ $p->used_email }}</td>
                    <td>{{ $p->tujuan->nama }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->judul }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
