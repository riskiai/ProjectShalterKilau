<div class="col-md-12">
    <h4 class="card-title">Data Pendidikan Anak</h4>
    @if($anak->anakPendidikan)
        <table class="table table-borderless">
            <tbody>
                @if(!empty($anak->anakPendidikan->jenjang))
                    <tr>
                        <td>Jenjang Pendidikan</td>
                        <td>: {{ ucwords(str_replace('_', ' ', $anak->anakPendidikan->jenjang)) }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->kelas))
                    <tr>
                        <td>Kelas</td>
                        <td>: {{ $anak->anakPendidikan->kelas }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->nama_sekolah))
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: {{ $anak->anakPendidikan->nama_sekolah }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->alamat_sekolah))
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>: {{ $anak->anakPendidikan->alamat_sekolah }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->jurusan))
                    <tr>
                        <td>Jurusan</td>
                        <td>: {{ $anak->anakPendidikan->jurusan }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->semester))
                    <tr>
                        <td>Semester</td>
                        <td>: {{ $anak->anakPendidikan->semester }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->nama_pt))
                    <tr>
                        <td>Nama Perguruan Tinggi</td>
                        <td>: {{ $anak->anakPendidikan->nama_pt }}</td>
                    </tr>
                @endif
                @if(!empty($anak->anakPendidikan->alamat_pt))
                    <tr>
                        <td>Alamat Perguruan Tinggi</td>
                        <td>: {{ $anak->anakPendidikan->alamat_pt }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data pendidikan anak belum tersedia.
        </div>
    @endif
</div>
