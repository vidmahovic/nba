<table class="table {{ $table_class ?? ''}}" id="{{ $table_id  ?? ""}}">
    @if(isset($headers))
    <thead class="{{ $header_class ?? "" }}">
        <tr>
            {{ $headers }}
        </tr>
    </thead>
    @endif
    <tbody>
        {{ $slot }}
    </tbody>
</table>
