@extends('layouts.app')

@section('title', 'the artisan. — wangian premium malaysia')
@section('meta_description', '32 wangian premium terinspirasi jenama dunia. Pati diimport. Botol kaca gold cap. 10ml RM35 · 30ml RM79. Ketahanan 12 jam.')

@section('content')
  {{-- Inject product data for JavaScript --}}
  <script>
    window.products = @json($products);
  </script>

  @include('partials.hero')
  @include('partials.ticker')
  @include('partials.urgency')
  @include('partials.collection', ['products' => $products])
  @include('partials.bundle')
  @include('partials.countdown')
  @include('partials.why')
  @include('partials.journey')
  @include('partials.quiz')
  @include('partials.testimonials')
  @include('partials.shipping')
@endsection