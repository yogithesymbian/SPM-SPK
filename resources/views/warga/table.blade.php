<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered text-center">
      <thead >
        <tr>
          <th class="no">No</th>
          <th>Nama Warga</th>
          @forelse ($kreteria as $index => $item)
            <th>{{$item->nama}}</th>
          @empty

          @endforelse
          @if(Auth::user()->role == 'admin')
            <th class="action">Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @forelse ($warga as $index => $item)
          @if ($item->alternatif)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->alternatif->nama}}</td>
              @foreach ($kreteria as $key => $value)
                @foreach($value->detail as $kunci => $nilaii)
                  @if(array_get($nilai[$item->alternatif_id], $value->id) == $nilaii->id)
                    <td>{{$nilaii->nama}}</td>
                  @endif
                @endforeach
              @endforeach
              @if(Auth::user()->role == 'admin')
              <td>
                <a href="{{route('warga.edit',$item->alternatif_id)}}" class="btn btn-info btn-sm ">Edit</a>
                <a href="{{route('warga.destroy',$item->alternatif_id)}}"
                  data-method="DELETE" data-confirm="Anda yakin akan menghapus data ini?"
                  class="btn btn-sm btn-danger" title="Hapus Data">
                  Delete
                </a>
              </td>
              @endif
            </tr>
          @endif
        @empty
          <tr>
            <td colspan="{{3 + count($kreteria)}}" align="center">Data Tidak Ada</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
