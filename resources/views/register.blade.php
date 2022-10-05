@extends('mastertemplate')
@section('content')
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Register</h2>
                        <form action="registerr" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required data-error="Please enter your username" value="{{ old('username') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your Name" value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required data-error="Please enter your password" value="{{ old('password') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="conpassword" name="conpassword" placeholder="Confirm Password" required data-error="Please enter your Confirm password" value="{{ old('conpassword') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <div>
                                        @error('username')
                                        <span class="invalid-input-mess" style="background-color: yellow;">{{$message}}</span>
                                        @enderror
                                        @error('password')
                                        <span class="invalid-input-mess" style="background-color: yellow;">{{$message}}</span>
                                        @enderror
                                        @error('conpassword')
                                        <span class="invalid-input-mess" style="background-color: yellow;">{{$message}}</span>
                                        @enderror
                                        @if (Session::has('username'))
                                        <span class="invalid-input-mess" style="background-color: yellow;">{{Session::get('username')}}</span>
                                        @endif
                                    </div>
                                        <button class="btn hvr-hover" id="submit" type="submit">Submit</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <a href="login" class="btn hvr-hover">Log In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p>Pawon Kak Ros adalah industri rumah tangga yang bergerak di bidang sambal yang menjual sambal dan telah berdiri sejak tahun 2021. Kak Ros merupakan industri rumah tangga yang berlokasi di Surabaya, Jawa Timur. Kak Ros menggunakan sistem make to stock untuk produk yang dibuatnya dalam usaha memenuhi kebutuhan konsumen yang bervariasi setiap waktunya. Ketika orang memesan ke Kak Ros baru sambal yang dipesan dibuat jadi tidak ada stok yang tersedia. Konsumen yang dilayani oleh industri rumah tangga biasanya adalah reseller ataupun individu perorangan untuk penggunaan secara langsung. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: +62 812 303 352 7</p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: pawonkakros@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
