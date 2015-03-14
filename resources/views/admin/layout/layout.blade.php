@include('admin.layout.head')
@include('admin.layout.nav')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="breadcrumb">
            <div class="pull-right">
                @yield('headerButton')
            </div>
        </div>

    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@yield('pageTitle')</h1>
        </div>
    </div><!--/.row-->
    @yield('content')
</div>	<!--/.main-->
@include('admin.layout.foot')