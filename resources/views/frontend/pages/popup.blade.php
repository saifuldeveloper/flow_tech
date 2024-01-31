@php
    $popup = DB::table('popups')->where('status', 1)->first();

@endphp

<style>
    .img-replace {
        /* replace text with an image */
        display: inline-block;
        overflow: hidden;
        text-indent: 100%;
        color: transparent;
        white-space: nowrap;
    }

    .bts-popup {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        transition: opacity 0.3s 0s, visibility 0s 0.3s;
        z-index: 1;
    }

    .bts-popup.is-visible {
        opacity: 1;
        visibility: visible;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
        transition: opacity 0.3s 0s, visibility 0s 0s;
    }

    .bts-popup-container {
        position: relative;
        /* height: 540px; */
        width: 550px;
        /* width: 90%; */
        /* max-width: 400px; */
        margin: 4em auto;
        /* background: #f36f21; */
        border-radius: none;
        text-align: center;
        /* box-shadow: 0 0 2px rgba(0, 0, 0, 0.2); */
        -webkit-transform: translateY(-40px);
        -moz-transform: translateY(-40px);
        -ms-transform: translateY(-40px);
        -o-transform: translateY(-40px);
        transform: translateY(-40px);
        /* Force Hardware Acceleration in WebKit */
        -webkit-backface-visibility: hidden;
        -webkit-transition-property: -webkit-transform;
        -moz-transition-property: -moz-transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        -moz-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }
    .bts-popup-container img {
        padding: 0 0 0 0;
        margin-top: 130px;
        height: 500px;
    }

    .bts-popup-container p {
        color: white;
        padding: 10px 40px;
    }

    .bts-popup-container .bts-popup-button {
        padding: 5px 25px;
        border: 2px solid white;
        display: inline-block;
        margin-bottom: 10px;
    }

    .bts-popup-container a {
        color: white;
        text-decoration: none;
        text-transform: uppercase;
    }

    .bts-popup-container .bts-popup-close {
        position: absolute;
        top: 140px;
        right: 8px;
        width: 30px;
        height: 30px;
    }

    .bts-popup-container .bts-popup-close::before,
    .bts-popup-container .bts-popup-close::after {
        content: '';
        position: absolute;
        top: 12px;
        width: 16px;
        height: 3px;
        background-color: white;
    }

    .bts-popup-container .bts-popup-close::before {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        left: 8px;
    }

    .bts-popup-container .bts-popup-close::after {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        right: 6px;
        top: 13px;
    }

    .is-visible .bts-popup-container {
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
    }

    @media only screen and (min-width: 1170px) {
        .bts-popup-container {
            margin: 8em auto;
        }
    }
</style>


<div class="bts-popup" role="alert">
    <div class="bts-popup-container">
        <a href="{{ url($popup->popup_link) }}">
            <span>
                <img src="{{ asset($popup->popup_img) }}" alt="{{ $popup->meta_tag }}">
            </span>
        </a>
        <a href="#0" class="bts-popup-close img-replace">Close</a>
    </div>
</div>




<script>
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
</script>
