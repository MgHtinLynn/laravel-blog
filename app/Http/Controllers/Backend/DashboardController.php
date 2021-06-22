<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 20/06/2021
 * Time: 00:36
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        $userCount = User::all()->count();
        $articleCount = Article::all()->count();
        return view('backend.home.dashboard',compact('userCount','articleCount'));
    }
}
