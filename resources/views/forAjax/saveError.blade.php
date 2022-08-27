@if (session('save'))
    <div id="save-error-child" class="save-error alert alert-danger col-md-3 text-center">
        <i class="bi bi-exclamation-triangle-fill"></i> {{ session('save') }}
    </div>
    @php(session()->forget('save'))
    <script>
        setTimeout(function() {
            $("#save-error-child").css("display", "none");
        }, 1500);
    </script>

@endif
