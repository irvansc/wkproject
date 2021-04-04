@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/foto.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkfoto.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="galery" id="galery">
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                @if ($value->url_video == '' )
                @else
                <div class="col-md-4">
                    <a data-fancybox href="https://www.youtube.com/watch?v=9fbc_nZ_OlY">
                        YouTube video - Ada juga videonya klik disini
                    </a>
                    {{-- <div class="admission_insruction" style="text-align: center">
                        <div class="embed-responsive embed-responsive-1by1">
                            <iframe class="embed-responsive-item" src="{{$value->url_video}}"></iframe>
                </div>
            </div> --}}
        </div>
        @endif
    </div>
    </div>
    </div>
    <div class="container">

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0" style="font-size: 20px">Foto
            |<strong>{{$value->title}}</strong></h1>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left hover">
            <style>
                #image-gallery .modal-footer {
                    display: block;
                }

                .thumb {
                    margin-top: 15px;
                    margin-bottom: 15px;
                }
            </style>
            @foreach ($foto as $fo)

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$fo->title}}"
                    data-image="{{asset('images/foto/album/fotos/'.$fo->gbr)}}" data-target="#image-gallery">
                    <img class="img-thumbnail" src="{{asset('images/foto/album/fotos/'.$fo->gbr)}}"
                        alt="{{$fo->title}}">
                </a>
            </div>
            {{-- <div class="col-lg-3 col-md-4 col-6">
                    <img src="{{asset('images/foto/album/fotos/'.$fo->gbr)}}" class="img-fluid img-thumbnail "
            data-fancybox="group" data-caption="{{$fo->title}}">
            </a>
        </div> --}}
        @endforeach
    </div>
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="image-gallery-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i
                            class="fa fa-arrow-left"></i>
                    </button>

                    <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                            class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
@endsection
@push('jsf')
<script>
    $('[data-fancybox]').fancybox({
    youtube : {
        controls : 1,
        showinfo : 1
    }
});
    let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>
@endpush
