                <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container-fluid justify-content-between{if $nav_center } justify-content-lg-center{/if}">   
                        <div>
                            <a role="button" id="sidebarCollapse" class="btn btn-main rounded-circle d-none mr-3{if $nav_center } d-md-none{else} d-md-inline-block{/if}">
                                <i id="nav-icon" class="fas fa-bars"></i>
                            </a>
                            <a href="{{$maindir}}" class="navbar-brand text-light">
                                <i class="fab fa-youtube-square text-danger"></i>
                                <span class="font-weight-bold">{{$config.name}}</span>
                                <!-- <img class="img-fluid navbar-img" src="{{$imgdir}}/logo.png"> -->
                            </a>
                        </div>
                        {if $nav_center == false}
                        <div>
                            {if isset($account)}
                            <button type="button" class="avatar-btn rounded-circle border border-dark">
                                <img src="{{$account->avatar}}" alt="" class="img-fluid rounded-circle avatar-img" />
                            </button>
                            {else}
                            <button type="button" class="btn border border-primary sign-btn shadow-sm" data-toggle="modal" data-target="#loginModal">
                                <i class="fas fa-user-circle"></i>
                                <span>Sign In</span>
                            </button>
                            {/if}
                        </div>
                        {/if}
                    </div>
                </nav>
                
                <div class="wrapper">
                    <nav id="sidebar" class="dynamic-padding d-none d-lg-inline-block{if $display_sidebar} active{/if}">
                        <!-- <div class="sidebar-header">
                            <h3>Bootstrap Sidebar</h3>
                            <strong>BS</strong>
                        </div> -->

                        <ul class="list-unstyled components">
                            <li class="active">
                                <a href="{{$maindir}}">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-briefcase"></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fas fa-copy"></i>
                                    Pages
                                </a>
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <a href="#">Page 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Page 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Page 3</a>
                                    </li>
                                </ul>
                            </li>
                            {if isset($account)}
                                <li>
                                    <a href="{{$maindir}}/profile">
                                        <i class="fas fa-user"></i>
                                        {{$account->username}}
                                    </a>
                                </li>
                                {if $account->isAdmin()}
                                    <li>
                                        <a href="{{$maindir}}/admin">
                                            <i class="fas fa-cog"></i>
                                            Admin Panel
                                        </a>
                                    </li>
                                {/if}
                            {/if}
                            <li>
                                <a href="#">
                                    <i class="fas fa-paper-plane"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                        
                        <ul class="list-unstyled components hidden">
                            <li>
                                <a href="#">
                                    <i class="fas fa-paper-plane"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>

                        <!-- <ul class="list-unstyled CTAs">
                            <li>
                                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                            </li>
                            <li>
                                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                            </li>
                        </ul> -->
                    </nav>
                <div class="container dynamic-padding" id="content">
                    {if $display_sidebar}<div class="overlay"></div>{/if}