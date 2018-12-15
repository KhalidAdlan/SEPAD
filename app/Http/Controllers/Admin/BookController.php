<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\BookDataTable;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'author'      => 'required|string',
        'category_id'  => 'required|integer',
        'file_path' => 'required|file',
        'description'  => 'required|string|max:200',
        'published_at' => 'required|string',
        'title'        => 'required|string|max:200'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\BookDataTable $dataTable
     *
     * @return mixed
     */
    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.book.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.book', $this->formVariables('book', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createBookFlashRedirect(Book::class, $request);
    }

    /**
     * @param \App\Models\Book $Book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Book $Book)
    {
        return view('admin.show', ['object' => $Book]);
    }

    /**
     * @param \App\Models\Book $Book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Book $Book)
    {
        return view('admin.forms.book', $this->formVariables('book', $Book, $this->options()));
    }

    /**
     * @param \App\Models\Book $Book
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Book $Book, Request $request)
    {
        return $this->saveFlashRedirect($Book, $request);
    }

    /**
     * @param \App\Models\Book $Book
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Book $Book)
    {
        return $this->destroyFlashRedirect($Book);
    }

    /**
     * @return array
     */
    protected function options()
    {
        return ['options' => Category::pluck('title', 'id')];
    }
}
