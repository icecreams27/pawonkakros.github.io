@extends('mastertemplate')
@section('content')
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Login</h2>
                        <form action="loginn" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required data-error="Please enter your password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <div>
                                            @if (Session::has('error'))
                                            <span class="invalid-input-mess" style="background-color: yellow;">{{Session::get('error')}}</span>
                                            @endif
                                        </div>
                                        <button class="btn hvr-hover" id="submit" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <a href="register" class="btn hvr-hover">Register</a>
                                    {{-- <button class="btn hvr-hover" id="submit" type="submit">Register</button> --}}
                                </div>
                            </div>
                        </form>
                        <br>
                        <form action="">
                            <div class="text-center ">
                                <a  href="{{url('auth/facebook')}}"
                                class="px-4 py-2 text-white tracking-wider bg-blue-900 rounded"
                                style="background-color: #3b5998;"
                                role="button">
                                  Login With <i class='fab fa-facebook'></i>
                                </a>
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
