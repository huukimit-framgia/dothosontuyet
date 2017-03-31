<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\TemplateViews;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\OrderDetail;

use App\Http\Requests;
use App\Http\Requests\CustomerFormRequest;

class OrderController extends Controller
{
    use TemplateViews;

    /**
     * Xử lý thêm đơn hàng khách hàng đã đăng nhập
     *
     * @param Request $request
     * @return $this
     */
    public function insert(Request $request)
    {
        if (false == Auth::check()) {
            return redirect(route('app.cart.list', SUBFIX));
        }
        if (userInformationExists()) {
            $order = Order::create([
                'userid' => Auth::user()->id,
                'total' => 0,
                'amount' => 0,
            ]);

        } else {
            return 'Thieu thong tin tai khoan';
        }
        return $this->view('app.order.checkout');
    }

    public function postCustomer(CustomerFormRequest $request)
    {

    }
}
