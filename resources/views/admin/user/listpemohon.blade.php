@extends('layouts.dashboard')
@section('page_heading','List Pemohon')
@section('section')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="row">
  <div class="container">
      <div class="col-lg-12">
          <table id="listpemohon" class="table table-striped">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>Current Research</th>
                      <th>Published Works</th>
                      <th>Recent Attended</th>
                      <th>Tujuan Ikut</th>
                      <th>Use Learning</th>

                      <th>Action</th>

                  </tr>
              </thead>
                  <tbody>
                    @foreach($pemohon as $pemohons)
                    @if($pemohons->status==0)
                      <tr>
                          <td>{!!$pemohons->nama!!} </td>
                          <td>{!!$pemohons->current_research!!}  </td>
                          <td>{!!$pemohons->published_works!!}  </td>
                          <td>{!!$pemohons->recent_attended!!}  </td>
                          <td>{!!$pemohons->tujuan_ikut!!}  </td>
                          <td>{!!$pemohons->use_learning!!}  </td>

                          <td>
                            <a href="{{Route('terimatraining',['id_user'=>$pemohons->id_user])}}"><button id="terima" class="btn btn-success" onclick="return confirm('Kirim email konfirmasi penerimaan ke user?')">Diterima</button></a>
                            <a href="{{Route('tolaktraining',['id_user'=>$pemohons->id_user])}}"><button id="tolak" class="btn btn-danger" onclick="return confirm('Kirim email konfirmasi penolakan ke user?')">Ditolak</button></a>
                          </td>
                      </tr>
                    @endif
                    @endforeach
                  </tbody>

          </table>
      </div>
  </div>
</div>



<!-- <script type="text/javascript">
$( "#terima" ).click(function() {
  $(this).attr("disabled", "disabled");
  $("#tolak").removeAttr("disabled");

});
$( "#tolak" ).click(function() {
   $(this).attr("disabled", "disabled");
   $("#terima").removeAttr("disabled");
});

</script> -->

@stop
