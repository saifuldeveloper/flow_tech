@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'FlowTechBD')
                <img height="80px" width="180px" src="https://flowtechbd.com/media/logo/1788608982823317.jpg"
                    alt="flowtechbd_logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
