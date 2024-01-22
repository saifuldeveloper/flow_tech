

    @php
        $popup = DB::table('popups')->first();

    @endphp
{{-- @dd($popup) --}}

{{-- @include('frontend.pages.popup') --}}


    {{-- <div class="bts-popup" role="alert">
        <div class="bts-popup-container">
            <div class="container">
                <a href="{{ url($popup->popup_link) }}">
                    <span>
                        <img src="{{ asset($popup->popup_img) }}" alt="{{ $popup->meta_tag }}">
                    </span>
                </a>


            </div>
            <a href="#0" class="bts-popup-close img-replace">Close</a>
        </div> --}}
    </div>

    <div class="modal fade" id="global-modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!--Modal Content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" style="margin-top: -16px; font-size: 28px;" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>

            </div>
            <div class="modal-body" style="padding: 0;">
                <a href="{{ url($popup->popup_link) }}">
                    <span>
                        <img src="{{ asset($popup->popup_img) }}" alt="{{ $popup->meta_tag }}">
                    </span>
                </a>
            </div>
          </div>
        </div>
      </div>











<script>


    $(document).ready(function() {
        $('#global-modal').modal('show');
    });

    </script>


    {{-- <script>
        jQuery(document).ready(function($) {

            window.onload = function() {
                $(".bts-popup").delay(1000).addClass('is-visible');
            }

            //open popup
            $('.bts-popup-trigger').on('click', function(event) {
                event.preventDefault();
                $('.bts-popup').addClass('is-visible');
            });

            //close popup
            $('.bts-popup').on('click', function(event) {
                if ($(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup')) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }
            });
            //close popup when clicking the esc keyboard button
            $(document).keyup(function(event) {
                if (event.which == '27') {
                    $('.bts-popup').removeClass('is-visible');
                }
            });
        });
    </script> --}}
{{-- @endsection --}}
