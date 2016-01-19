		<div class="mail-header">
			<!-- title -->
			<div class="mail-title">
				Detail Pesan
			</div>
			
			<!-- links -->
			<div class="mail-links">
			
				<a href="{{ route('pesan_tulis', ['email' => $Pes->email]) }}" class="btn btn-primary btn-icon">
					Balas
					<i class="entypo-reply"></i>
				</a>
				
			</div>
		</div>

		<div class="mail-info">
			
			<div class="mail-sender dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ url('resources/assets/admin/images/user-alt@2x.png') }}" class="img-circle" width="30" /> 
					<span>{{ $Pes->nama }}</span>
					({{ $Pes->email }})
				</a>
				
			</div>
			
			<div class="mail-date">
				{{ $Pes->created_at }}
			</div>
			
		</div>
		
		<div class="mail-text">
			{!! nl2br(e($Pes->pesan)) !!}
		</div>