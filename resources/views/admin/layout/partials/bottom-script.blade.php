	<!-- Bottom Scripts -->

	<script src="{{ url('resources/assets/admin/js/vendor.min.js') }}"></script>
	<script src="{{ url( 'resources/assets/admin/libs/js/toastr.js') }}"></script>

	<script>

		$(function(){
			$(".telah-dibaca").click(function(){
				var token = $("meta[name='csrf-token']").attr('content');
				$.get("{{ route('pesan_update_notif') }}", { _token:token}, function(){
					$(".badge-pesan").remove();
					$(".notification-info .line").removeAttr('style');
					$(".notification-info i").removeClass('entypo-mail');
					$(".notification-info i").addClass('entypo-check');
					$(".notification-info").addClass('notification-success');
					$(".notification-info").removeClass('notification-info');
				});
			});
		});

	</script>

	@yield('registerscript')