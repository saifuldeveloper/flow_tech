@extends('fontend_master')
@section('content')
    @php
        $setting = DB::table('settings')->first();
    @endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="material-icons">home</i></a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
        </div>
    </section>
    <div class="info-page bg-bt-gray p-tb-15">
        <div class="container body">
            <div class="contact-us-content">

                <div class="row m-b-30">
                    <div class="col-md-6">
                        <div class="c-card ws-box">
                            <div class="ic"><a href="tel:16793"><i class="material-icons">phone</i></a></div>
                            <div class="each-contact-text">
                                <h3>Contact Us (10 AM - 7 PM)</h3>
                                <p class="c-phone">{{ $setting->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-card ws-box">
                            <div class="ic"><a href="{{ $setting->email }}"><i class="material-icons">email</i></a>
                            </div>
                            <div class="each-contact-text">
                                <h3>For Corporate Deals & Complain</h3>
                                <p>{{ $setting->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-md-12">

                        <h2 style="text-align: center">Contact Us</h2>
                        <br>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form class="m-5" action="{{ route('contact.message.store') }}" method="POST">
                            @csrf
                            <div class="row mx-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" required
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Message</label>
                                        <textarea name="message">

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
