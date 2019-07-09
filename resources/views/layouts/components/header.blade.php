			<!-- begin::Header -->
			<header style="zoom: 85%;"  id="m_header" class="m-grid__item m-header " >
				<div class="m-header__top">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">

							<!-- begin::Brand -->
							<div class="m-stack__item m-brand">
								<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
									<div class="m-stack__item m-stack__item--middle m-brand__logo">
										<a href="{{url('')}}" class="m-brand__logo-wrapper">
											<img alt="" src="assets/demo/media/img/logo/logo.png" />
										</a>
									</div>

								</div>
							</div>

							<!-- end::Brand -->

							<!-- begin::Topbar -->
							<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
								<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-topbar__nav-wrapper">
										<ul class="m-topbar__nav m-nav m-nav--inline">



											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
											 m-dropdown-toggle="click">
												<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="" />
													</span>
													<span class="m-topbar__welcome">Hello,&nbsp;</span>
													<span class="m-topbar__username">{{$user->full_name}}</span>
												</a>
												<div class="m-dropdown__wrapper">
													<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
													<div class="m-dropdown__inner">
														<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
															<div class="m-card-user m-card-user--skin-dark">
																<div class="m-card-user__pic">
																	<img src="/storage/profile_img/{{$user->profile_img}}" class="m--img-rounded m--marginless" alt="" />
																</div>
																<div class="m-card-user__details">
																	<span class="m-card-user__name m--font-weight-500">{{$user->full_name}}</span>
																	<a href="" class="m-card-user__email m--font-weight-300 m-link">{{$user->email}}</a>
																</div>
															</div>
														</div>
														<div class="m-dropdown__body">
															<div class="m-dropdown__content">
																<ul class="m-nav m-nav--skin-light">
																	<li class="m-nav__item">
																		<a href="{{url("profile")}}" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-profile-1"></i>
																			<span class="m-nav__link-title">
																				<span class="m-nav__link-wrap">
																					<span class="m-nav__link-text">My Profile</span>
																					<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
																				</span>
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__separator m-nav__separator--fit">
																	</li>
																	<li class="m-nav__item">
																		<a href="{{url('logout')}}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<!-- end::Topbar -->
						</div>
					</div>
				</div>
				<div class="m-header__bottom">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">

							<!-- begin::Horizontal Menu -->
							<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
								<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
									<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									
										<li class="m-menu__item @if(isset($_GET['view']))  @if($_GET['view']=="Users") m-menu__item--active @endif @endif" aria-haspopup="true"><a href="{{url("?view=Users")}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Users</span></a></li>
										<li class="m-menu__item @if(isset($_GET['view']))  @if($_GET['view']=="Authority") m-menu__item--active @endif @endif" aria-haspopup="true"><a href="{{url("?view=Authority")}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Authorities</span></a></li>
										<li class="m-menu__item @if(isset($_GET['view']))  @if($_GET['view']=="Category") m-menu__item--active @endif @endif" aria-haspopup="true"><a id="link" href="{{url("?view=Category&id=5cacb5fcf34cdb15b5657de9")}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Categories</span></a></li>
                                        
                                        <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><span class="m-menu__link-text">Exams</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust" style="left: 56px;"></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url("?view=MyExams")}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">Authored</span></a></li>
                                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url("?view=UserProceededExams")}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">Solved</span></a></li>
     
                                                </ul>
                                            </div>
                                        </li>
									
									<!-- امتحان الدفعة -->
									{{-- <li class="m-menu__item m-menu__item--active " aria-haspopup="true"><a href="{{url("?view=ExamSolve&_id=5d18fd6b28863101580016e2#step-1")}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">CSE Exam</span></a></li> --}}
									</ul>
								</div>
							</div>

							<!-- end::Horizontal Menu -->

						</div>
					</div>
				</div>
			</header>
 {{-- <script>
			var elem = document.getElementById('link'),
			myname = 'req.session.name';   //used it as a string, just for test cases
			elem.href += myname;
	</script> --}}

			<!-- end::Header -->
