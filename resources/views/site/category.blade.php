@extends('site.page_base')
<script>
    _CAT = {{ $category }};
</script>
@section('banner')
    <div class="banner_box layout2">
        这是banner
    </div>
@endsection

@section('page_main')
    <div>
        这是主体
    </div>
@endsection
