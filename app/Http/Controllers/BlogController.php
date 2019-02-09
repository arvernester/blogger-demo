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

    /**
     * @var Blogger
     */
    private $blogger;

    /**
     * @var array
     */
    private $pages = [];

    /**
     * @var string
     */
    private $linebkreak = '<br />';

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
     * @param $post
     * @return array
     */
    private function getExcerpt($post): array
    {
        if (str_contains($post['content'], $this->linebkreak)) {
            list($excerpt,$content) = explode($this->linebkreak, $post['content'], 2);
        }
        elseif (str_contains($post['content'], '.')) {
            list($excerpt, $content) = explode('.', $post['content'], 2);
            $excerpt .= '.';
        }
        unset($content);

        $post['excerpt'] = strip_tags($excerpt ?? $post['item']);

        return $post;
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

        if (! empty($posts['items'])) {
            $items = array_map([$this, 'getExcerpt'], $posts['items']);

            $posts['items'] = $items;
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

        $post = $this->getExcerpt($post);

        return view('blogs.show', compact('post'));
    }

    /**
     * @param string $id
     * @return View
     */
    public function page(string $id): View
    {
        $page = $this->blogger->page($id);

        $page = $this->getExcerpt($page);

        return view('blogs.page', compact('page'));
    }
}
