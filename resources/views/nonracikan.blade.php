@extends('adminlte::page')
@include('sweetalert::alert')
@section('title', 'Non Racikan')

@section('content_header')
    <h1 class="m-0 text-dark">Tambahkan Resep Non Racikan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                	<form name="nonracikan" method="" action="">
                		@csrf
                		<div class="row col-12">
	            			<div class="form-group col-6">
			                <label for="listObat">Nama Obat</label>
			                <select id="listObat" name="listObat" class="form-control custom-select">
			                  <option selected disabled>Select one</option>
			                  @if(count($obats) > 0)
			                  @foreach($obats as $obat)
			                  	<option data-obat="{{ $obat->obatalkes_nama }}" data-stok="{{ $obat->stok }}" value="{{$obat->obatalkes_nama}}"> {{$obat->obatalkes_nama}} </option>
			                  @endforeach
			                  @endif
			                </select>
			              </div>

			              <div class="form-group col-6">
			                <label for="listSigna">Signa</label>
			                <select id="listSigna" class="form-control custom-select">
			                  <option selected disabled>Select one</option>
			                  @if(count($signas) > 0)
			                  @foreach($signas as $signa)
			                  	<option data-signa="{{$signa->signa_nama}}" id="{{ $signa->signa_id }}" value="{{$signa->signa_nama}}"> {{$signa->signa_nama}} </option>
			                  @endforeach
			                  @endif
			                </select>
			              </div>
	            		</div>

	            		

	            		<div class="row">
				          <div class="col-12">
				            <div class="card">
				              <div class="card-header">
				                <h3 class="card-title">Transaksi Nonracikan</h3>
				              </div>
				              <!-- /.card-header -->
				              <div id="listResep" class="card-body table-responsive p-0">
				                <table class="table table-hover text-nowrap">
				                  <thead>
				                    <tr>
				                      <th>Nama Obat</th>
				                      <th>Stok</th>
				                      <th>Signa</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    
				                  </tbody>
				                </table>
				              </div>
				              <!-- /.card-body -->
				            </div>
				            <!-- /.card -->
				          </div>
				        </div>

				        <div class="form-group col-12">
	            			<button onClick='inputdata()' class="btn btn-success">Simpan</button>
							<button type="reset" onclick='resetdata()' class="btn btn-warning">Batal</button>
	            		</div>
                	</form>
            		

                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@stop

@push('js')
	<script type="text/javascript">

			$(".custom-select").change(function (){
	            getNonRacikan();
	        });

	</script>

	<script type="text/javascript">
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		function getNonRacikan() {
			var obat = $('#listObat option:selected').data('obat');
			var stok = $('#listObat option:selected').data('stok');
			var signa = $('#listSigna option:selected').data('signa');
			 
			render = `<tr>
			  <td class="col-4">${obat}</td>
			  <td class="col-4">${stok}</td>
			  <td class="col-4">${signa ? signa : ""}</td>
			  </tr>`;

			  $("#listResep table tbody").html(render);
		}

		function resetdata() {
			$("#listResep table tbody").html("");
	        
		}

		function inputdata() {
			var data = {
				obat 		: $('#listObat option:selected').data('obat'),
				stok		: $('#listObat option:selected').data('stok'),
				signa		: $('#listSigna option:selected').data('signa'),
			}

			// console.log(data);

	        $.ajax({
	            url         : "{{route('nonracikan.store')}}",
	            type        : "POST",
	            data        : data,
	            success     : function(res){
	                if (res){
	                	console.log(res);
	                	// getNonRacikan();
	                	// snackAlert("success","Reminder telah berhasil dikirim!");
	                    // snackAlert("success","Reminder telah berhasil dikirim!");
	                } else {
	                	console.log(data);
	                    // snackAlert("error", `Failed send notif: ${res.message||"error "+res.status_code}`);
	                }
	            },
	            error: function(xhr){
	                var error = (xhr.responseJSON) ? xhr.responseJSON.error : JSON.parse(xhr.responseText).error;
	                console.log('error');
	            }
	        });
		}
	</script>
@endpush