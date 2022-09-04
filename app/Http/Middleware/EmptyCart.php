<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;


class EmptyCart
{

    public $flasher;
    public function __construct(FlasherInterface $flasher)
    {
        $this->flasher = $flasher;
    }
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->cart->count()){
            return $next($request);
        }else{
            $this->flasher->addError('Your Cart Is Empty');
            return redirect('/');
        }
    }
}
