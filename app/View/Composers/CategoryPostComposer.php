<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryPostComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;
    protected $categoryRepository;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        // Dependencies are automatically resolved by the service container...
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $userId = Auth::user()->id;
        $categoryPost = $this->categoryRepository->getManyBy('user_id', $userId, ['posts']);

        $view->with('categoryPost', $categoryPost);
    }
}