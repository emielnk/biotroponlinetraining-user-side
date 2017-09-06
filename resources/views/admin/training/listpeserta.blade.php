@extends('layouts.dashboard')
@section('page_heading','List Pemohon')
@section('section')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="row">
  <div class="container">
      <div class="col-lg-12">
          <table id="listpeserta" class="table table-striped">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>Current Research</th>
                      <th>Published Works</th>
                      <th>Recent Attended</th>
                      <th>Tujuan Ikut</th>
                      <th>Use Learning</th>


                  </tr>
              </thead>
                  <tbody>
                    @foreach($peserta as $pesertas)
                      <tr>
                          <td>{!!$pesertas->nama!!} </td>
                          <td>{!!$pesertas->current_research!!}  </td>
                          <td>{!!$pesertas->published_works!!}  </td>
                          <td>{!!$pesertas->recent_attended!!}  </td>
                          <td>{!!$pesertas->tujuan_ikut!!}  </td>
                          <td>{!!$pesertas->use_learning!!}  </td>
                      </tr>

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
