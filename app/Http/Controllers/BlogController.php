<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Yugo\Blogger\Facades\Blogger;

class BlogController extends Controller
{
    /**
     * @var array
     */
    private $blog = [];

    private $blogger;

    private $pages = [];

    public function __construct()
    {
        $this->blog = Blogger::blog();

        if (empty($this->blog) or !empty($this->blog['error'])) {
            abort(404, __('Blog not found.'));
        }

        $this->blogger = Blogger::setBlog($this->blog['id']);

        $this->pages = $this->getPages();

        \view()->share('blog', $this->blog);
        \view()->share('pages', $this->pages);
    }

    /**
     * @return array
     */
    private function getPages(): array
    {
        return $this->blogger->pages();
    }

    /**
     * @param Request $request
     * @return View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request): View
    {
        $this->validate($request, [
            's' => ['nullable', 'string']
        ]);

        if (! empty($request->s)) {
            $posts = $this->blogger->search($request->s);
        }
        else {
            $posts = $this->blogger->posts();
        }

        return view('blogs.index', compact('posts'));
    }

    /**
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $post = $this->blogger->postById($id);

        if (empty($post) or !empty($post['error'])) {
            abort(404, __('Post not found.'));
        }

        list($excerpt, $content) = explode('<br />', $post['content'], 2);
        unset($content);

        return view('blogs.show', compact('post'))
            ->with('description', strip_tags($excerpt));
    }

    /**
     * @param string $id
     * @return View
     */
    public function page(string $id): View
    {
        $page = $this->blogger->page($id);

        return view('blogs.page', compact('page'));
    }
}
