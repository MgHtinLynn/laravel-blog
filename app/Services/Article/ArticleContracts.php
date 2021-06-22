<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 20/06/2021
 * Time: 15:54
 */

namespace App\Services\Article;

use Illuminate\Http\Request;

interface ArticleContracts
{
    public function getAll(Request $request);

    public function store(Request $request);

    public function update(Request $request, string $id);

    public function delete(string $id);

    public function getFindById(string $id);

    public function getRecommendList(Request $request);
}
