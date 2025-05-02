<?php

namespace Modules\Socialite\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Socialite\Services\SocialiteService;

class SocialiteController extends Controller
{
    protected SocialiteService $socialiteService;

    public function __construct(SocialiteService $socialiteService)
    {
        $this->socialiteService = $socialiteService;
    }

    public function redirect($provider)
    {
        return $this->socialiteService->redirect($provider);
    }

    public function callback($provider)
    {
        return $this->socialiteService->callback($provider);
    }

}
