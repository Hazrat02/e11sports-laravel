@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    @php
                    echo $cookie->data_values->description
                    @endphp
                </p>
            </div>
        </div>
    </div>
</section>
@endsection