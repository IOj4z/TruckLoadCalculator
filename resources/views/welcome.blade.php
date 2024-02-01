@extends('layouts.app')

@section('content')
    <div id="app">
        <truck-load></truck-load>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
<script>

</script>
