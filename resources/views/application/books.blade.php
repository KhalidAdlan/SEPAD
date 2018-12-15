@extends('layouts.application')

@include('partials.application.sections', [
'title' => getTitle($title),
'description' => getDescription($description),
'image' => getImage()
])

@section('content')
    @include('partials.application.hero')
    <section class="section">
        <div class="container">
            @include('partials.application.books')
        </div>
    </section>
@endsection
