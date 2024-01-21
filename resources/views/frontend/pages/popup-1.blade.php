



<style>
    .overlay {
  opacity: 0;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal {
  max-width: 600px;
  height: 300px;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  background-color: white;
}

.show-modal {
  opacity: 1;
  animation: show 0.2s;
}

@keyframes show {
  from {
    opacity: 0;
    transform: scale(0);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.hide-modal {
  opacity: 0;
  animation: hide .25s;
}

@keyframes hide {
  from {
    opacity: 1;
    transform: scale(1);
  }
  to {
    opacity: 0;
    transform: scale(0);
  }
}
</style>

@php
    $popup = DB::table('popups')->where('status', 1)->first();

@endphp



{{-- @if ($popup) --}}


<div class="overlay">
    <div class="modal">
        hi
        {{-- <a href="{{ url($popup->popup_link) }}">
            <span>
                <img src="{{ asset($popup->popup_img) }}" alt="{{ $popup->meta_tag }}">
            </span>
        </a> --}}
        {{-- <img src="https://i.pinimg.com/originals/f6/50/a3/f650a377c6fabd4740f0edd07d95f41f.jpg" alt="li"> --}}
      <button id="close-modal-btn">Close Modal</button>
    </div>
  </div>

{{-- @else

@endif --}}


<script>
    const modal= document.querySelector(".overlay");

setTimeout(function() {
  modal.classList.add("show-modal");
}, 1000);

document.querySelector("#close-modal-btn").addEventListener("click", () => {
  modal.classList.remove("show-modal");
  modal.classList.add("hide-modal");
})
</script>

