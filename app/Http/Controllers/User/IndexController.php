<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\BlogRepositoryInterface;

class IndexController extends Controller
{
    protected $blogRepository;
    protected $articleRepository;


    public function __construct(
        BlogRepositoryInterface $blogRepository,
        ArticleRepositoryInterface $articleRepositoryInterface
    )
    {
        $this->blogRepository = $blogRepository;
        $this->articleRepository = $articleRepositoryInterface;
    }

    public function index()
    {
        return view('pages.user.index', [
            'blogs' => $this->blogRepository->all(),
            'articles' => $this->articleRepository->all()
        ]);
    }
}
