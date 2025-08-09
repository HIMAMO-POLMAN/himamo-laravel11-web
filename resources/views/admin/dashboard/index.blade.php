@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('card', 'Dashboard')
@section('keterangan', 'Selamat Datang ' . Auth::user()->name)
@section('content')

	<div class="row">
		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="avatar bg-info text-white rounded-circle me-3 d-flex justify-content-center align-items-center"
							style="width: 50px; height: 50px;">
							<i class="bx bx-user-pin bx-md"></i>
						</div>

						<div>
							<span class="d-block text-muted">Total Pengguna</span>
							<h3 class="card-title mb-0">{{ $totalPengguna }}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="avatar bg-primary text-white rounded-circle me-3 d-flex justify-content-center align-items-center"
							style="width: 50px; height: 50px;">
							<i class="bx bx-book-open bx-md"></i>
						</div>
						<div>
							<span class="d-block text-muted">Total Informasi</span>
							<h3 class="card-title mb-0">{{ $totalInformasi }}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="avatar bg-warning text-white rounded-circle me-3 d-flex justify-content-center align-items-center"
							style="width: 50px; height: 50px;">
							<i class="bx bx-library bx-md"></i>
						</div>
						<div>
							<span class="d-block text-muted">Total Pustaka</span>
							<h3 class="card-title mb-0">{{ $totalPustaka }}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="m-0 font-weight-bold text-primary">Informasi Terbaru</h4>
					<i class="bx bx-history bx-md text-primary"></i>
				</div>
				<div class="card-body">
					@if ($informasiTerbaru->count())

						@foreach ($informasiTerbaru as $informasi)
							<hr class="my-3">
							<div class="d-flex justify-content-between">
								<p class="text-muted mb-1">{{ date('d/m/Y', strtotime($informasi->created_at)) }}</p>
								<p class="text-muted mb-1"><i class="bx bx-show"></i> {{ $informasi->views_count ?? '0' }}
									views
								</p>
							</div>
							<h5>{{ $informasi->title }}</h5>
							<p>{{ $informasi->excerpt }}</p>
							<a href="{{ url('ae-informasi/detail/' . $informasi->slug) }}">
								<button class="btn btn-sm btn-primary mb-3">Lihat</button>
							</a>
						@endforeach
					@else
						<p class="text-muted">Belum ada informasi terbaru</p>
					@endif
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="m-0 font-weight-bold text-primary">Informasi Paling Populer</h4>
					<i class="bx bx-trending-up bx-md text-primary"></i>
				</div>
				<div class="card-body">
					@if ($informasiPopuler->count())
						@foreach ($informasiPopuler as $informasi)
							<hr class="my-3">
							<div class="d-flex justify-content-between">
								<p class="text-muted mb-1">
									{{ date('d/m/Y', strtotime($informasi->created_at ? $informasi->created_at->format('d M Y') : '-')) }}
								</p>
								<p class="text-muted mb-1"><i class="bx bx-show"></i> {{ $informasi->views_count ?? '0' }}
									views
								</p>
							</div>
							<h5>{{ $informasi->title }}</h5>
							<p>{{ Str::limit($informasi->excerpt, 100) }}</p>
							<a href="{{ url('ae-informasi/detail/' . $informasi->slug) }}">
								<button class="btn btn-sm btn-primary mb-3">Lihat</button>
							</a>
						@endforeach
					@else
						<p class="text-muted">Belum ada informasi populer</p>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h4 class="m-0 font-weight-bold text-warning">Pustaka Terbaru</h4>
				</div>
				<div class="card-body">
					@if ($pustakaTerbaru->count())
						@foreach ($pustakaTerbaru as $pustaka)
							<hr class="my-3">
							<h5>{{ $pustaka->title }}</h5>
							<p>{{ Str::limit($pustaka->abstrak, 100) }}</p>
							<a href="{{ route('ae-library.edit', $pustaka->id) }}"
								class="btn btn-sm btn-warning mb-3">Lihat</a>
						@endforeach
					@else
						<p class="text-muted">Belum ada pustaka terbaru</p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Perkembangan Views Artikel (Bulanan)</h6>
				</div>
				<div class="card-body">
					<canvas id="grafikViewsInformasi"></canvas>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-warning">Grafik Pustaka</h6>
				</div>
				<div class="card-body">
					<canvas id="grafikPustaka"></canvas>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const ctxViewsBulanan = document.getElementById('grafikViewsInformasi').getContext('2d');
		new Chart(ctxViewsBulanan, {
			type: 'bar',
			data: {
				labels: {!! json_encode($grafikViewsInformasi->pluck('bulan')) !!},
				datasets: [{
					label: 'Jumlah Views',
					data: {!! json_encode($grafikViewsInformasi->pluck('jumlah')) !!},
					backgroundColor: 'rgba(75, 192, 192, 0.5)',
					borderColor: 'rgba(75, 192, 192, 1)',
					borderWidth: 2
				}]
			}
		});

		const ctxPustaka = document.getElementById('grafikPustaka').getContext('2d');
		new Chart(ctxPustaka, {
			type: 'bar',
			data: {
				labels: {!! json_encode($grafikPustaka->pluck('bulan')) !!},
				datasets: [{
					label: 'Jumlah Pustaka',
					data: {!! json_encode($grafikPustaka->pluck('jumlah')) !!},
					backgroundColor: 'rgba(255, 206, 86, 0.5)'
				}]
			}
		});
	</script>

@endsection
