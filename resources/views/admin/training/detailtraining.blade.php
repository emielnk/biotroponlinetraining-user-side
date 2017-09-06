@extends('layouts.dashboard')
@section('page_heading')
{{ $judul->nama_training }}
@endsection
@section('section')

<div class="col-md-12 col-lg-12">
    <a href="./detailtraining/newpertemuan"><button style="margin-bottom:20px"type="button" class="btn btn-primary" name="Pertemuan Baru">Tambah Pertemuan</button></a>
    <a href="./detailtraining/newtest"><button style="margin-bottom:20px"type="button" class="btn btn-primary" name="Test Baru">Tambah Test</button></a>
</div>

                  <!-- buat pre-test -->
              @if($test)
              @foreach($test as $testsingle)
                    <div class="col-lg-12 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('showtest',['id_training'=>$testsingle->id_training, 'id_test' => $testsingle->id_test])}}"><h2>Test</h2></a>
                                    </div>
                                </div>
                                <p>Mengukur pemahaman peserta training terhadap materi</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                @if($cari)
                  @foreach($cari as $caripertemuan)
                    <div class="col-lg-12 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-12">
                  				              <a href="{{ route('destroytemu', ['id_train'=>$caripertemuan->id_training, 'id_per'=> $caripertemuan->id_pertemuan]) }}"><button style="margin:5px; float:right" type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Delete</button></a>
                                        <a href="{{ route('editpertemuan', ['id_train'=>$caripertemuan->id_training, 'id_per'=> $caripertemuan->id_pertemuan]) }}"><button style="margin:5px; float:right" class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('editpertemuan', ['id_train'=>$caripertemuan->id_training, 'id_per'=> $caripertemuan->id_pertemuan]) }}"><button style="margin:5px; float:right" class="btn btn-primary">Tambah Bahan Ajar</button></a>
                                        <h2>{{$caripertemuan->tanggal_pelaksanaan}}</h2>
                                    </div>
                                </div>
                                <p>{!!$caripertemuan->deskripsi_pertemuan!!}</p>
                                Bahan Belajar :
                            </div>
                            <ul>
                              @if($bahan)
                              @foreach($bahan as $bahans)
                                @if($bahans->id_pertemuan == $caripertemuan->id_pertemuan)
                                  <a href="{{asset('bahan/'.$bahans->nama_bahan)}}"><li>{{$bahans->nama_bahan}}</li></a>
                                @endif
                              @endforeach
                              @endif
                            </ul>
                        </div>
                    </div>
                  @endforeach
                @endif
              @endif
                  <!-- buat post-test -->
                    <!-- <div class="col-lg-12 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#"><button style="margin:5px; float:right" type="submit" class="btn btn-danger">Delete</button></a>
                                        <a href="#"><button style="margin:5px; float:right" class="btn btn-success">Edit</button></a>
                                        <a href="./detailtraining/post-test"><h2>Post-Test</h2></a>
                                    </div>
                                </div>
                                <p>Mengukur pemahaman peserta training terhadap materi yang sudah di sampaikan</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- buat evaluasi -->
                      <!-- <div class="col-lg-12 col-md-4">
                          <div class="thumbnail">
                              <div class="caption">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <a href="#"><button style="margin:5px; float:right" type="submit" class="btn btn-danger">Delete</button></a>
                                          <a href="#"><button style="margin:5px; float:right" class="btn btn-success">Edit</button></a>
                                          <a href="./detailtraining/evaluasi"><h2>Evaluasi Training</h2></a>
                                      </div>
                                  </div>
                                  <p>Mengevaluasi pelaksanaan training, agar pelaksanaan training semakin efektif dan bermanfaat</p>
                              </div>
                          </div>
                      </div> -->

@stop
