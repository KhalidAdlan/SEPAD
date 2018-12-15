<?php

namespace App\Http\Controllers\Application;

use App\Base\Services\SitemapService;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('application.books', [
            'title' => getTitle(),
            'description' => getDescription(),
            'books' => Book::published()->paginate(4),
            'categories' => $this->getCategories()
        ]);
    }


    public function getCategories()
    {
      return Category::all();

    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(Category $category)
    {
        return view('application.books', [
            'title' => $category->title,
            'description' => $category->description,
            'books' => book::where('category_id', $category->id)->paginate(4),
            'categories' => $this->getCategories() ,
        ]);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage(Page $page)
    {
        return view('application.content', ['object' => $page, 'categories' => $this->getCategories()]);
    }

    /**
     * @param \App\Models\book $book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getbook(book $book)
    {
        return view('application.content', ['object' => $book]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getSitemap()
    {
        return SitemapService::render();
    }
}
