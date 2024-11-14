@extends('layouts.client')

@section('main')
    <!--Contents-->
    <main>

        

        <!-- ====== end contact image ====== -->

        <!-- ====== start contact form ====== -->
        <section class="tc-contact-form pt-80 pb-80">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-6 border-1 border-end brd-gray">
                        <div class="contact-form-card">
                            <h4 class="fsz-24px text-capitalize mb-10">Liên hệ</h4>
                            <p class="fsz-13px mb-30">Các trường bắt buộc được đánh dấu <span class="text-danger">*</span> </p>
                            <form class="form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-15">
                                            <input type="text" name="subject" class="form-control" placeholder="Tiêu đề *">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-15">
                                            <textarea rows="6" name="message" class="form-control" placeholder="Tin nhắn *"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-15">
                                            <input type="text" name="name" class="form-control" placeholder="Họ tên * ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-15">
                                            <input type="text" name="email" class="form-control" placeholder="Email * ">
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn bg-main text-white rounded-0 mt-30">
                                    <span class="fsz-11px">Gửi </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-40 mt-lg-0">
                        <h4 class="fsz-24px text-capitalize mb-30">Tìm chúng tôi trên Google Map</h4>
                        <div class="map ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30739.355007109953!2d108.2277878824301!3d15.622640739595143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3169e4cfebbc7e41%3A0xbcfe3d3428ddc521!2zQsOsbmggTMOjbmgsIFRoxINuZyBCw6xuaCwgUXXhuqNuZyBOYW0sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1728530857989!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>         
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end contact form ====== -->


        <div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="logo">
                    <img src="{{ asset('assets/client/img/logo_home9.png') }}" alt="" class="dark-none">
                    <img src="{{ asset('assets/client/img/logo_home4_lt.png') }}" alt="" class="light-none">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-4">
                
                <div class="text">
                    Tranng tin y tế số 1 Việt Nam
                </div>

                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1"> Danh mục <i
                            class="la la-angle-right ms-1"></i> </h6>
                       
                    @if(isset($listCategory) && is_object($listCategory))
                        @foreach($listCategory as $value)
                            <a href="{{ route('client.blog.category', ['slug' => $value->slug] ) }}" class="cat-card">
                                <div class="img img-cover">
                                    <img src="{{ asset('assets/client/img/videos/2.png') }}" alt="">
                                </div>
                                <div class="info">
                                    <h5>{{ $value->name }}</h5>
                                    
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
                
            </div>
        </div>
                

    </main>
    <!--End-Contents-->
@endsection
