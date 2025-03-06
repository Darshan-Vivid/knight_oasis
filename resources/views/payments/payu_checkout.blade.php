<form action="{{ $url }}" method="POST" id="payu_form">
    @foreach ($data as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}"><br>
    @endforeach
</form>

<script>
    document.getElementById('payu_form').submit();
</script>
