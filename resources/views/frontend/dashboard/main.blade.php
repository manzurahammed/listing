<!doctype html>
<html lang="en">
@include('frontend.dashboard.header')

<div class="dashboard-breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="breadcrumb-title">Hello, <span>Steve</span></h3>
            </div>
            <div class="col-sm-6">
                <nav>
                    <ol class="breadcrumb dashboard-breadcrumb">
                        <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="grey-bg-2 padding-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-2">
                @if (Session::has('status'))
                    @php ($status = Session::get('status'))
                    @component('components.dashboardalert')
                        @slot('type')
                            {{$status['type']}}
                        @endslot
                        @slot('title')
                            {{$status['title']}}
                        @endslot
                    @endcomponent
                @endif
                @if ($errors->any())
                    @component('components.dashboarderrors')

                    @endcomponent
                @endif

                @yield('dashboard')
            </div>
            <div class="col-lg-3 order-lg-1">
                @include('frontend.dashboard.sidebar')
            </div>
        </div>
    </div>
</div>

@include('frontend.dashboard.footer')
</html>