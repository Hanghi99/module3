<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

;
Route::get('/greeting',function () {
    echo "hello world";
});
Route::get('/greeting/{name?}',function ($name=null){
if($name){
    echo "Hello ".$name."!";
}else {
    echo "Hello world";
}
});
Route::get('/login',function (){
    return view('login');
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
        && $request->password == 'admin') {
        return view('welcome_admin');
    }
    return view('login_error');
});

Route::get('/product',function (){
    return view('product');
});

Route::Post('/product',function(Illuminate\Http\Request $request){
    $product_description    =   $request->product_description;
    $list_price             =   $request->list_price;
    $discount_percent       =   $request->discount_percent;
    $discount_amount        =   $list_price*$discount_percent *0.1;
    $discount_price         =   $list_price - $discount_amount;
    return view('discount',compact(['discount_amount', 'discount_price']));

    
});

Route::get('/tudien',function(){
    return view('tudien');
});
Route::post('/tudien',function(Illuminate\Http\Request $request){
        $dictionary = [
            "hello"=>"xin chào",
            "baby"=>"trẻ",
            "goodbye"=>"tạm biệt",
            "dictionary"=>"từ điển"
        ];
        $english = $request->english;
        $vietnamese = $dictionary[$english];
        return view('tudien1',compact('vietnamese'));
});

Route::get('/', function () {
    echo "<h2>This is Home page</h2>";
});

Route::get('/about', function () {
    echo "<h2>This is About page</h2>";
});

Route::get('/contact', function () {
    echo "<h2>This is Contact page</h2>";
});
Route::get('/user', function () {
    return view('user', ['name'=>'Masud Alam']);
});
Route::get('/user/{name}', function ($name) {
    echo "<h2>Xin chào $name</h2>";
});
Route::get('/user-name/{name?}', function ($name = 'Sohel') {
    echo "<h2>User name is $name</h2>";
});
// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/{timezone?}', function ($timezone = null) {
//     if (!empty($timezone)) {

//         // Khởi tạo giá trị giờ theo múi giờ UTC
//         $time = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('UTC'));

//         // Thay đổi về múi giờ được chọn
//         $time->setTimezone(new DateTimeZone(str_replace('-', '/', $timezone)));

//         // Hiển thị giờ theo định dạng mong muốn
//         echo 'Múi giờ bạn chọn ' . $timezone . ' hiện tại đang là: ' . $time->format('d-m-Y H:i:s');
//     }
//     return view('index');
// });


// Tạo 1 nhóm route với tiền tố customer
Route::prefix('customer')->group(function () {
    Route::get('index', function () {
        // Hiển thị danh sách khách hàng
        echo "Hiển thị danh sách khách hàng";
        return view('customer.index');
    });

    Route::get('create', function () {
        // Hiển thị Form tạo khách hàng
    });

    Route::post('store', function () {
        // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
    });

    Route::get('{id}/show', function () {
        // Hiển thị thông tin chi tiết khách hàng có mã định danh id
    });

    Route::get('{id}/edit', function () {
        // Hiển thị Form chỉnh sửa thông tin khách hàng
    });

    Route::patch('{id}/update', function () {
        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
    });

    Route::delete('{id}', function () {
        // Xóa thông tin dữ liệu khách hàng
    });
});