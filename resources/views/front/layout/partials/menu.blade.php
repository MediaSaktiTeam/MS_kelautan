						<?php $Menus = App\Menu::where('parent_id',0)
								->where('lokasi','Header')
								->orderBy('urutan', 'asc')
								->get() ?>

						@foreach( $Menus as $Menu )

							<?php $CekSubMenu = App\Menu::where('parent_id', $Menu->id)->count(); ?>
							
							@if ( $CekSubMenu < 1 )
								
								<li><a href="{{ $Menu->link }}">{{ $Menu->judul }}</a></li>
														
							
							@else

								<?php $SubMenu = App\Menu::where('parent_id', $Menu->id)
															->orderBy('urutan','asc')
															->get(); ?>

									<li>
										<a href="#">{{ $Menu->judul }}</a>
										<ul class="sub-menu sub-menu-level-1">
											@foreach( $SubMenu as $Sub )
												<li><a href="{{ $Sub->link }}">{{ $Sub->judul }}</a></li>
											@endforeach	
										</ul>
									</li>

							@endif

						@endforeach