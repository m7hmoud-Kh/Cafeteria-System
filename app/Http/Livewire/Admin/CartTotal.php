<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartTotal extends Component
{


    public $sub_total;
    public $grand_total;
    public const TAX = 12;
    public $acutal_tax;

    protected $listeners = ['update_cart_checkout' => 'mount'];

    public function mount(Request $request){
        $this->sub_total = 0;
        $this->grand_total = 0;
        $this->acutal_tax = 0;

        $all_cart = Cart::select(
            DB::raw("price * quantity As sub_total")
        )->where('user_id',$request->session()->get('user_id'))
        ->get();

        $this->sub_total = $this->get_all_total_of_cart($all_cart);
        $this->acutal_tax = ($this->sub_total / self::TAX  );
        $this->grand_total = $this->sub_total + $this->acutal_tax;

        $this->acutal_tax = number_format($this->acutal_tax,2);
        $this->grand_total =  number_format($this->grand_total,2);
        $this->sub_total =number_format($this->sub_total,2);
    }



    public function get_all_total_of_cart($all_cart){
        $all_total_cart = 0;
        foreach ($all_cart as $cart) {
            $all_total_cart += $cart->sub_total;
        }
        return $all_total_cart;
    }

    public function render()
    {
        return view('livewire.admin.cart-total');
    }
}
