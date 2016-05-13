<!-- <script src="{{ url('resources/assets/app/js/canvasjs.min.js') }}"></script> -->
<?php $Sc = new App\custom ?>

<div class="panel-heading">
	<div class="panel-title">
		<div class="col-md-4" style="padding-right: 0">
			<input type="date" id="offset" value="{{ $offset }}" class="form-control">
		</div>

		<div class="col-md-2" style="padding-left: 0">
			<button type="button" class="btn btn-default" style="background: none;border: none;cursor: default">Sampai Tgl</button>
		</div>

		<div class="col-md-4">
			<input type="date" id="limit" value="{{ $limit }}" class="form-control">
		</div>

		<div class="col-md-2" style="padding: 0">
			<button class="btn btn-default" id="show-filter">Tampilkan</button>
		</div>
	</div>
	<hr>
</div>

<div class="panel-body">
	
	<div class="row">
		<div id="chartContainer_pembudidaya" style="height: 300px; width: 100%;"></div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		<div id="chartContainer_nelayan" style="height: 300px; width: 100%;"></div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		<div id="chartContainer_pengolah" style="height: 300px; width: 100%;"></div>
	</div>

</div>

<script>

	window.onload = function () {
		/* Jenis Produksi Pembudidaya */
		    var chart = new CanvasJS.Chart("chartContainer_pembudidaya",
		    {
		      title:{
		      	fontSize: 20,
		        text: "Statistik Jenis Produksi Pembudidaya Tgl {{ $Sc->tgl_indo($offset) }} - {{ $Sc->tgl_indo($limit) }}"    
		      },
		      animationEnabled: true,
		      axisY: {
		        title: "Jumlah (orang)"
		      },
		      legend: {
		        verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
		      theme: "theme1",
		      data: [

		      {        
		        type: "column",  
		        showInLegend: false, 
		        legendMarkerColor: "grey",
		        dataPoints: [
		        	<?php $i = 1 ?>
		        	@foreach( $jenis_produksi_pembudidaya as $jpp )
		        		@if ( $i++ != count($jenis_produksi_pembudidaya) )
				        	{y: {{ $i }}, label: "{{ $jpp->jenis_produksi }}"},
				        @else
				        	{y: {{ $i }}, label: "{{ $jpp->jenis_produksi }}"}
				        @endif
				    @endforeach       
		        ]
		      }   
		      ]
		    });

		    chart.render();

		/* Jenis Produksi Nelayan */
		    var chart = new CanvasJS.Chart("chartContainer_nelayan",
		    {
		      title:{
		      	fontSize: 20,
		        text: "Statistik Jenis Produksi Nelayan Tgl {{ $Sc->tgl_indo($offset) }} - {{ $Sc->tgl_indo($limit) }}"    
		      },
		      animationEnabled: true,
		      axisY: {
		        title: "Jumlah (orang)"
		      },
		      legend: {
		        verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
		      theme: "theme1",
		      data: [

		      {        
		        type: "column",  
		        showInLegend: false, 
		        legendMarkerColor: "grey",
		        dataPoints: [
			        {y: 297571, label: "Venezuela"},
			        {y: 267017,  label: "Saudi" },
			        {y: 175200,  label: "Canada"},
			        {y: 154580,  label: "Iran"},
			        {y: 116000,  label: "Russia"},
			        {y: 97800, label: "UAE"},
			        {y: 20682,  label: "US"},        
			        {y: 20350,  label: "China"}        
		        ]
		      }   
		      ]
		    });

		    chart.render();

		/* Jenis Produksi Pengolah */
		    var chart = new CanvasJS.Chart("chartContainer_pengolah",
		    {
		      title:{
		      	fontSize: 20,
		        text: "Statistik Jenis Produksi Pengolah Tgl {{ $Sc->tgl_indo($offset) }} - {{ $Sc->tgl_indo($limit) }}"    
		      },
		      animationEnabled: true,
		      axisY: {
		        title: "Jumlah (orang)"
		      },
		      legend: {
		        verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
		      theme: "theme1",
		      data: [

		      {        
		        type: "column",  
		        showInLegend: false, 
		        legendMarkerColor: "grey",
		        dataPoints: [
			        {y: 297571, label: "Venezuela"},
			        {y: 267017,  label: "Saudi" },
			        {y: 175200,  label: "Canada"},
			        {y: 154580,  label: "Iran"},
			        {y: 116000,  label: "Russia"},
			        {y: 97800, label: "UAE"},
			        {y: 20682,  label: "US"},        
			        {y: 20350,  label: "China"}        
		        ]
		      }   
		      ]
		    });

		    chart.render();
		}

</script>