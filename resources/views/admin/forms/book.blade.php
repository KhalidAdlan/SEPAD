@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'category_id'])
    @include('partials.admin.form.text', ['attribute' => 'published_at', 'class' => 'datepicker', 'default' => now()->format('Y-m-d')])
    @foreach (['title', 'author'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.file', ['attribute' => "file_path"])
    @include('partials.admin.form.textarea', ['attribute' => 'description'])
    @include('partials.admin.form.submit')
@endsection
