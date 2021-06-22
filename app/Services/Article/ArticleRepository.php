<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 20/06/2021
 * Time: 15:54
 */

namespace App\Services\Article;

use App\Models\Article;
use Exception;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleRepository implements ArticleContracts
{
    /**
     * @var Article
     */
    private $model;

    /**
     * @var Repository|Application|mixed
     */
    private $paginate;

    /**
     * OrderRepository constructor.
     * @param  Article  $article
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
        $this->paginate = config('blog.paginate');
    }

    /**
     * @param  Request  $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request): LengthAwarePaginator
    {
        if ($request->input('per_page') && (!empty($request->input('per_page')))) {
            //get paginate with per_page value from client side
            $this->paginate = $request->input('per_page');
        }
        return $this->model->with(['user'])->paginate($this->paginate);
    }

    /**
     * @param  Request  $request
     * @return bool
     */
    public function store(Request $request): bool
    {
        try {
            $this->model->create($request->only([
                'title', 'cover_photo', 'user_id', 'description'
            ]));
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;

    }

    /**
     * @param  Request  $request
     * @param  string  $id
     * @return mixed
     */
    public function update(Request $request, string $id)
    {
        // get data and update
        return tap($this->model->findOrFail($id))->update($request->only([
            'title', 'cover_photo', 'user_id', 'description'
        ]));
    }

    /**
     * @param  string  $id
     * @return false
     */
    public function delete(string $id): bool
    {
        try {
            $item = $this->model->findOrFail($id);
            return $item->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;

    }

    public function getFindById(string $id)
    {
        return $this->model->with('user')->findOrFail($id);
    }

    /**
     * @param  Request  $request
     * @return Builder[]|Collection
     */
    public function getRecommendList(Request $request)
    {
        return $this->model->with('user')->orderBy('view_count')->take(5)->get();
    }
}
