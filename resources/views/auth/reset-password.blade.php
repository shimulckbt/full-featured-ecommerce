@extends('user.master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Reset Your Password</h4>

                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class=" form-group">
                            <label class="info-title" for="eamil">Email Address <span>*</span></label>
                            <input type="email" name="email" id="eamil" value="{{$request->email}}" class="form-control unicase-form-control text-input" placeholder="Enter your email">
                        </div>

                        <div class=" form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" placeholder="Enter your password">
                        </div>

                        <div class=" form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                    </form>

                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('user.body.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection