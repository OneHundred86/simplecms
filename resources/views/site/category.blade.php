@extends('site.page_base')
<script>
    _CAT = {{ $category }};
</script>
@section('banner')
    <div class="page_img">
        <div class="pic"><img src="images/ban_prod.jpg" alt="产品中心" /></div>
        <div class="ind_tit">
            <h3>产品中心</h3>
            <figure>
                <h4><span>Product</span>center</h4>
            </figure>

            <i class="ind_tit_ico2"></i>
        </div>
    </div>
@endsection

@section('page_main')
    <main class="page_main">
        这是主体
    </main>
@endsection
