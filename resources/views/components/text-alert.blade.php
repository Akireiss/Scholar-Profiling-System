<div id="messageContainer">
    @if (session()->has('message'))
        <span class="text-success text-sm mt-2">
            {{ session('message') }}
        </span>
    @endif
</div>

@push('scripts')

<script>
    setTimeout(function() {
        var messageContainer = document.getElementById('messageContainer');
        if (messageContainer) {
            messageContainer.remove();
        }
    }, 3000);
</script>
    @endpush
