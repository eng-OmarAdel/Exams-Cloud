           <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light ">
                    <!-- BEGIN: Aside Menu -->
                        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" m-menu-scrollable="0" m-menu-dropdown-timeout="500">

                        
                        @can('admin')
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=questions" class="m-menu__link ">
                                    <i class="m-menu__link-icon la la-question"></i>
                                    <span class="m-menu__link-text">
                                        Questions
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    Questions
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=categories" class="m-menu__link">
                                    <i class="m-menu__link-icon la la-archive"></i>
                                    <span class="m-menu__link-text">
                                        Categories & Sub-Categories
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    Categories & Sub-Categories
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        @endcan
    
                                        </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->