@extends('frontend.layouts.master')
@push('head')

@endpush
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/ct.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkcontact.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= Contact Section ======= -->
<section id="contact">
    @if ($message = Session::get('pesan'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" id="main_form" action="{{route('contact.store')}}"
                method="POST">
                @csrf
                <span class="contact100-form-title">
                    Send Us A Message
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="nama" placeholder="Full Name">
                    <span class="focus-input100"></span>
                    <span class="text-danger error-text nama_error"></span>

                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="email" name="email" placeholder="E-mail">
                    <span class="focus-input100"></span>
                    <span class="text-danger error-text nama_error"></span>

                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="telp" placeholder="Phone">
                    <span class="focus-input100"></span>
                    <span class="text-danger error-text nama_error"></span>

                </div>

                <div class="wrap-input100 validate-input">
                    <textarea class="input100" name="pesan" placeholder="Your Message"></textarea>
                    <span class="focus-input100"></span>
                    <span class="text-danger error-text nama_error"></span>

                </div>
                <div class="wrap-input">
                    <div class="captcha text-center mb-1">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-primary" class="reload" id="reload" style="color: red">
                            ↻
                        </button>
                    </div>
                    <div class="wrap-input100">
                        <input id="captcha" type="text" class="input100" placeholder="Enter Captcha" name="captcha">
                        <span class="focus-input100"></span>

                        <span class="text-danger error-text captcha_error"></span>
                    </div>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <i class="fa fa-paper-plane  mr-1"></i>
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
@push('jsf')
<script>
    $(function(){
              $("#main_form").on('submit', function(e){
                  e.preventDefault();

                  $.ajax({
                      url:$(this).attr('action'),
                      method:$(this).attr('method'),
                      data:new FormData(this),
                      processData:false,
                      dataType:'json',
                      contentType:false,
                      beforeSend:function(){
                          $(document).find('span.error-text').text('');
                      },
                      success:function(data){
                          if(data.status == 0){
                              $.each(data.error, function(prefix, val){
                                  $('span.'+prefix+'_error').text(val[0]);
                              });
                          }else{
                              $('#main_form')[0].reset();
                              const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Pesan berhasil dikirim ! kami akan segera menghubungi anda'
                                })

                          }
                      }
                  });
              });
              $('.js-tilt').tilt({
            scale: 1.1
        })
          });
          $('#reload').click(function () {
            $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush
