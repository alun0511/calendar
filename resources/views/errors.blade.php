<link rel="stylesheet" href="{{ asset('./css/error.css') }}">
@if ($errors->any())
<section class="error">
    <p>
        {{ $errors->first() }}
    </p>
</section>
@endif
<script type="text/javascript" src="{{ URL::asset('./js/error.js') }}"></script>