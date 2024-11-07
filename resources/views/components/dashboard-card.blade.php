@props([
    'bg' => 'bg-primary',
    'title' => '',
    'total' => 0,
])
<div class="col">
    <div class="card radius-10" style="background: {{ $bg }}">
        <div class="card-body">
            <div class="d-flex flex-column justify-content-between align-items-center">
                <h5 class="mb-0 text-white">{{ number_format($total) }}</h5>
                <h5 class="mb-0 text-white" style="font-size:16px;">{{ $title }}</h5>
            </div>
        </div>
    </div>
</div>
