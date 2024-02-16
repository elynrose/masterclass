@extends('layouts.frontend')
@section('content')

<section data-bs-version="5.1" class="header1 cid-u4cbOVLtzv mbr-fullscreen" id="header1-0">

    

    
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0); background:url({{ $landingPage->cover_image->getUrl() }}); background-size:cover;"></div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>{{ $landingPage->title }}</strong></h1>
                
                <h4 class="mbr-text mbr-fonts-style display-7">
                {{ $landingPage->sub_title }}</h4>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content11 cid-u4cc3593OS" id="content11-1">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="mbr-section-btn align-center"><a class="btn btn-secondary display-4" href="">REGISTER FOR THE MASTERCLASS</a></div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content4 cid-u4cc60Uk7F" id="content4-2">
    

    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                    <strong>WHAT YOU WILL LEARN</strong>
                </h3>
                
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features4 cid-u4cc9AmDtT" id="features4-3">
    
    
    <div class="container">
        @if($sessions->isNotEmpty())
        @foreach($sessions as $key => $session)
        <div class="row mt-4">
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                    @if($session->cover_image)
                                            <a href="{{ $session->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $session->cover_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Design</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Website Design</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">Mobirise is an easy website builder. Just
                            drop site elements to your page, add content and style it to look the way you like.</p>
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="" class="btn item-btn btn-secondary display-7" target="_blank">Start Now
                            &gt;</a></div>
                </div>
            </div>
            @endforeach
           @endif

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content11 cid-u4ccd3NY31" id="content11-4">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="mbr-section-btn align-center"><a class="btn btn-primary-outline display-4" href="">Live demo</a></div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content4 cid-u4cckLeGof" id="content4-6">
    

    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                    <strong>MEET THE TEACHER</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-5">
                    Firstname Lastname</h4>
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="header14 cid-sFzz5E692j" id="header14-1j">

    

    

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 image-wrapper">
                <img src="/assets/images/mbr-1256x837.jpg" alt="Mobirise Website Builder">
            </div>
            <div class="col-12 col-md">
                <div class="text-wrapper">
                    
                    <p class="mbr-text mbr-fonts-style display-7">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut dapibus massa, efficitur varius augue. In vel elit lorem. Fusce et dui fringilla, suscipit nulla sed, viverra nunc. Nulla ut justo ut enim vehicula maximus. Nam et neque tempus.<br><br>Duis lobortis aliquam varius. Aliquam at metus at urna bibendum aliquet. Curabitur ut commodo ex, nec vehicula eros. Suspendisse dictum eu tortor id aliquam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.<br></p>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="form5 cid-sFzDs3t9EG" id="form5-1m">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Subscribe</strong></h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="4m2GcGqx/7Udsl9Hlonfs6sgHZRqMJ2yoFUb9Fp8HI96+jeENOUSKHV+tixFkjelgoJPhL5kiJuDzFQK8XPdv82p2ghDkPLwsOJsp8JMlROQEAa13RUFqvamw/rU/4mM.XS6dmCmoi/pI62NpbV96D+WSc0WDdaJaHJT8WJJGWUMYuLkYtnLPi/l/Mfb8vwec9qo003P+UIPWIR3YiUW3kmtOTdYggEOgY+fztoJ47NMusg0mvNumiLlCHu3eUmwf">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out
                            the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some
                            problem!</div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" name="name" placeholder="Name" data-form-field="name" class="form-control" value="" id="name-form5-1m">
                        </div>
                        <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                            <input type="email" name="email" placeholder="E-mail" data-form-field="email" class="form-control" value="" id="email-form5-1m">
                        </div>
                        <div class="col-12 form-group mb-3" data-for="url">
                            <input type="url" name="url" placeholder="Your Site" data-form-field="url" class="form-control" value="" id="url-form5-1m">
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button type="submit" class="btn btn-primary display-4">Send message</button></div>
                    </div>
                <span class="gdpr-block">
<label>
<span class="textGDPR display-7" style="color: #a7a7a7"><input type="checkbox" name="gdpr" id="gdpr-form5-1m" required="">By continuing you agree to our <a style="color: #149dcc; text-decoration: none;" href="terms.html">Terms of Service</a> and <a style="color: #149dcc; text-decoration: none;" href="policy.html">Privacy Policy</a>.</span>
</label>
</span></form>
            </div>
        </div>
    </div>
</section>







<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.landingPage.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.landing-pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($landingPage->logo)
                                            <a href="{{ $landingPage->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $landingPage->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.sub_title') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->sub_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.cover_image') }}
                                    </th>
                                    <td>
                                        @if($landingPage->cover_image)
                                            <a href="{{ $landingPage->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $landingPage->cover_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.register_label') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->register_label }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.teacher_photo') }}
                                    </th>
                                    <td>
                                        @if($landingPage->teacher_photo)
                                            <a href="{{ $landingPage->teacher_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $landingPage->teacher_photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.teacher_name') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->teacher_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.stripe_code') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->stripe_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.teacher_bio') }}
                                    </th>
                                    <td>
                                        {!! $landingPage->teacher_bio !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.primary_color') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->primary_color }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.secondary_color') }}
                                    </th>
                                    <td>
                                        {{ $landingPage->secondary_color }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.landing-pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection