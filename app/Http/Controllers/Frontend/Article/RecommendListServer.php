<?php

namespace App\Http\Controllers\Frontend\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleListResource;
use App\Http\Resources\Article\ArticleRecommendListResource;
use App\Services\Article\ArticleContracts;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RecommendListServer extends Controller
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
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        if ($request->ajax()) {
            $result = $this->articleService->getRecommendList($request);
            return ArticleRecommendListResource::collection($result);
        }
        abort(404);
    }
}
