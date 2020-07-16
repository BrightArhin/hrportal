<aside class="main-sidebar" id="sidebar-wrapper" style="height: 100%">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="background-color: #f5f5f5; height: 100%">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" >
            <div class="pull-left image">
                <img style="width: 200px; height: 120px; max-width: 200px" src={{asset('images/cocobod.jpg')}}
                     alt="UserImage"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                    <p>Profile</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
            @endif
            <!-- Status -->

            </div>
        </div>


        <!-- Sidebar Menu -->

        <ul class="sidebar-menu" data-widget="tree" >
            @include('client.layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
