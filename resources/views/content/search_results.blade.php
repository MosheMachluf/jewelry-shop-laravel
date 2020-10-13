@extends('master')
@section('main_content')

<div class="ui container">
    <section class="section">

        <h1>תוצאות חיפוש עבור: {{ request('q') }}</h1>
        <p>
            מציג {{ $results->count() }}
            מתוך {{ $results->total() }}
            תוצאות עבור {{ request('q') }}
        </p>

        @forelse ($results as $product)

        <div class="row">
            <x-product-line :product="$product" />
        </div>

        @empty

        <p>לא נמצאו תוצאות</p>

        @endforelse

        {{ $results->appends(request()->input())->links() }}

    </section>
</div>

@endsection
