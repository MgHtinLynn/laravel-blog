<?php

namespace App\Http\Controllers\Frontend\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleListResource;
use App\Services\Article\ArticleContracts;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleServer extends Controller
{
    /**
     * @var ArticleContracts
     */
    protected $articleService;

    /**
     * ArticleServer constructor.
     * @param  ArticleContracts  $articleService
     */
    public function __construct(ArticleContracts $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return AnonymousResourceCollection
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $result = $this->articleService->getAll($request);
            return ArticleListResource::collection($result);
        }
        abort(404);
    }
}
