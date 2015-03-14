@include('admin.layout.head')
@include('admin.layout.nav')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="breadcrumb row">
            <div class="pull-left">
                <div class="text-left">
                    <h3>@yield('pageTitle')</h3>
                </div>
            </div>
            <div class="pull-right">@yield('headerButton')</div>
        </div>

    </div><!--/.row-->
    @yield('content')
</div>	<!--/.main-->
@include('admin.layout.foot')