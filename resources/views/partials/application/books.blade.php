<div class="columns is-multiline">
  @if(isset($books))
    @foreach ($books as $book)
        <div class="column is-12">
            <div class="columns is-vcentered">
                <div class="column is-9">
                    <h2 class="title"><a class="has-text-grey-dark" href="{{ $book->link }}">{{ $book->title }}</a></h2>
                </div>
                <div class="column is-3 has-text-right-desktop">
                    <a href="{{ $book->category->link }}" class="button is-default">{{ $book->category->title }}</a>
                </div>
            </div>
            <div class="level"></div>
            <div class="content">
                <p>{{ getNWords($book->description, 50) }}</p>
                <p>Download: {{secure_asset($book->file_path)}} </p>
                <a href="{{ Storage::url($book->file_path) }}" download>{{$book->title }}</a>
            </div>

            <div class="columns is-vcentered">
                <div class="column is-9">
                    <a class="button is-link" href="{{ $book->link }}">{{ __('application.read_more') }}</a>
                </div>
                <div class="column is-3 has-text-right-desktop">
                    <p class="has-text-grey">{{ $book->localized_published_at }}</p>
                </div>
            </div>
        </div>
    @endforeach
  @endif
    @if ($books->total() > $books->count())
        <div class="column is-12">
            {!! $books->appends(request()->except('page'))->links() !!}
        </div>
    @endif
</div>
