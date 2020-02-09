<!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</a>
                        </li>
                        <li class="nav-label">Features</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User<span class="label label-rouded label-warning pull-right">6</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('user')}}">User List</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Billing</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i><span class="hide-menu">Invoice</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="layout-blank.html">Invoice List</a></li>
                                <li><a href="layout-boxed.html">Defaulter</a></li>
                                <li><a href="layout-fix-header.html">Invoice Schedule</a></li>
                                <li><a href="layout-fix-sidebar.html">Invoice config</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">System Configuration</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cogs"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">

                            <li><a href="{{url('session')}}">Session</a></li>
                            <li><a href="#" class="has-arrow">SMS</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="layout-blank.html">SMS Template</a></li>
                                    <li><a href="layout-boxed.html">SMS Report</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->