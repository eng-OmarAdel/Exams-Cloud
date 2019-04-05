<!DOCTYPE html>

<html lang="en">

                @include('layouts.components.head')


	<!-- begin::Body -->
	<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">


                @include('layouts.components.header')

                @include('layouts.components.body')


                @include('layouts.components.footer')
		</div>

		<!-- end:: Page -->



		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->

                @include('layouts.components.scripts')
           
           		@yield('script')


	</body>

	<!-- end::Body -->
</html>