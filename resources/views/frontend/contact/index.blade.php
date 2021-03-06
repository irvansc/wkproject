@extends('frontend.layouts.master')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<!-- ======= Breadcrumbs ======= -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/ct.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Contact</h2>
            @if ($message = Session::get('pesan'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </header>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p>{{$p->alamat}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Telphone</h3>
                            <p>{{$p->phone}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>{{$p->email}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <form action="{{route('contact.store')}}" method="post" id="main_form">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Name" name="nama">
                            <span class="text-danger error-text nama_error"></span>
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <span class="text-danger error-text email_error"></span>

                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control " placeholder="Phone" name="telp">
                            <span class="text-danger error-text telp_error"></span>

                        </div>

                        <div class="col-md-12">
                            <textarea placeholder="Message" class="form-control" name="pesan" rows="5"></textarea>
                            <span class="text-danger error-text pesan_error"></span>

                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="icofont-paper-plane"></i> Send
                                Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <img src="{{asset('theme/img/maps.png')}}" alt="" width="500">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row gy-4">
                    <iframe src="{{$p->maps}}" width="600" height="450" style="border:0;" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End #main -->

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
                            //     Swal.fire(
                            //     'Pesan berhasil dikirim !',
                            //     'kami akan segera menghubungi anda',
                            //     'success',

                            // );

                          }
                      }
                  });
              });
          });
</script>
@endpush
