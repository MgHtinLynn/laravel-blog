<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Resources\Article\ArticleListResource;
use App\Services\Article\ArticleContracts;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleContracts $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $result = $this->articleService->getAll($request);
            return ArticleListResource::collection($result);
        }
        return view('backend.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request): ?JsonResponse
    {
        if ($request->ajax()) {
            $result = $this->articleService->store($request);
            if ($result) {
                return response()->json([
                    'status' => 201,
                    'message' => trans('article.created')
                ], 201);
            }
        }
        abort(500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return Application|Factory|View
     */
    public function edit(string $id)
    {
        $article = $this->articleService->getFindById($id);
        return view('backend.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  string  $id
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, string $id): ?JsonResponse
    {
        if ($request->ajax()) {
            $result = $this->articleService->update($request, $id);
            if ($result) {
                return response()->json([
                    'status' => 200,
                    'message' => trans('article.update')
                ], 200);
            }
        }
        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): ?RedirectResponse
    {
        $result = $this->articleService->delete($id);
        if ($result) {
            return redirect()->route('backend.article.index')->with(['success' => trans('article.deleted')]);
        }
        abort(500);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            try {
                $fileNameWithExtension = $request->file('upload')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('upload')->getClientOriginalExtension();

                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                $timestamp = now()->timestamp;
                //Upload File
                if ($request->has('coverPhoto')) {

                    $request->file('upload')->storeAs('public/uploads/coverPhoto/'.$timestamp, $filenameToStore);

                    $url = asset('storage/uploads/coverPhoto/'.$timestamp.'/'.$filenameToStore);
                } else {
                    $request->file('upload')->storeAs('public/uploads/editor/'.$timestamp, $filenameToStore);

                    $url = asset('storage/uploads/editor/'.$timestamp.'/'.$filenameToStore);
                }


                return response()->json([
                    'url' => $url
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'error' => [
                        "message" => $e->getMessage()
                    ]
                ]);
            }
        }
        return response()->json([
            'error' => [
                'status' => 500,
                "message" => 'Something Wrong With Upload.'
            ]
        ]);
    }
}
