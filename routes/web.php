<?php

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

Route::get('/', function () {
  return view('welcome');
});

Route::get('ok/{hoten}/{sdt}', function($hoten,$sdt){
    echo "Ho ten: $hoten va sdt: $sdt";
})->where(['hoten'=>'[a-z]+','sdt'=>'[0-9]{1,3}']);

Route::get('/call',function(){
    $name="dang tu";
    return view('hello',compact('name'));
});

Route::get('danang',['as'=>'dn',function(){
    return "Da Nang dep vl";
}]);

Route::get('start','HomeController@testAction');

Route::group(['prefix' => 'quanli'],function () {
    Route::get('1',function () {
        echo "dau la 1";
    });
    Route::get('2',function () {
        echo "day la 2";
    });
});

Route::get('run', function() {
    return view('tituc.news');
});

View::share('title','Laravel title');  //Share cho tat ca cac view (tuc file .blade.php)

View::composer(['tituc/news','hello'], function ($view) { // Share cho cac view them vao 
    return $view->with('thongtin','Day la Laravel');
});

Route::get('existView', function(){
    if(view()->exists('post')){
        return view('post');
    } else {
        return "khong ton tai view";
    }
});

Route::get('getThis',function(){
    return view('master');
});

Route::get('url',function(){
    return URL::full();
});

Route::get('url/asset', function(){
    return asset('css/mystyle.css',true); // xuat hien https:
});

Route::get('to', function(){
    return URL::to('ok',['dangtu','12'],true);
});

Route::get('go', function(){
    return secure_url('ok',['dangtu','13']); // cung de tao https:
});


// Schema-buider
Route::get('create', function(){
    Schema::create('danghuutu', function ( $table) {
        $table->increments('id');
        $table->string('tenmonhoc');
        $table->integer('gia');
        $table->text('ghichu')->nullable(); // co the co hoac khong
        $table->timestamps(); // tao them created_at va updated_at
    });
});

Route::get('changName',function(){
    Schema::dropIfexists('danghuutu'); // drop('')
});

Route::get('changeColumn',function(){
    Schema::table('danghuutu',function($table){
        $table->string('tenmonhoc',50)->change(); // cho toi da 50 ki tu
    });
});

Route::get('deleteColumn',function(){
    Schema::table('danghuutu',function($table){
        $table->dropColumn(['tenmonhoc','gia']); //xoa nhieu cot
    });
});

Route::get('category',function(){
    Schema::create('category',function($table){
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});

Route::get('product',function(){
    Schema::create('product',function($table){
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category')->onDelelte('cascade');
        $table->timestamps();
    });
});

Route::get('selectAll',function(){
    $data=DB::table('bcd')->select('name')->where('id',4)->orWhere('phoneNumber',124334)->get();  //select(' de chon tung cot rieng biet')
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('order',function(){
    $data = DB::table('bcd')->orderBy('id','ASC')->get(); 
    // where('ten column','bieu thuc dieu kien',gia tri so sanh)
    //orderBy => lay du lieu va sap xep thu tu theo ASC: tang dan, DESC : giam dan
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('i',function(){
    $data = DB::table('bcd')->skip(2)->take(2)->get(); 
    //skip(2): lay tu vi tri thu 2
    // take(3): lay 3 phan tu
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('op',function(){
    $data = DB::table('bcd')->whereBetween('id',[1,4])->get(); 
    // whereBetween ; whereNotBetween
    // whereNull('...') -> lay ra nhung gia tri cua Null
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('oc',function(){
    $data = DB::table('bcd')->whereIn('id',[1,4,5])->get();
    // whereIn : chi lay gia tri trong mang
    // whereNotIn: lay nhung cot khac trong mang
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('count',function(){
    $data = DB::table('bcd')->count(); //count: den so du lieu
    echo $data;
});

Route::get('max',function(){
    $data = DB::table('bcd')->min('id'); //max
    echo $data;
});

Route::get('sum',function(){
    $data = DB::table('bcd')->sum('id'); //avg: tinh trung binh, sum: tinh tong
    echo $data;
});


Route::get('new',function(){
    Schema::create('newTable',function($table){
        $table->increments('id');
        $table->string('name');
        $table->string('title');
        $table->timestamps();
    });
});

Route::get('new1',function(){
    Schema::create('oldTable',function($table){
        $table->integer('price');
        $table->string('sodienthoai');
        $table->timestamps();
    });
});

Route::get('join',function(){
    $data = DB::table('oldTable')->select('title')->join('newTable','oldTable.price','=','newTable.id')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('ins',function(){
    DB::table('product')->insert([
        ['name'=>'quan dui 1','price'=>5000,'cate_id'=>1],
        ['name'=>'quan dui 2','price'=>5000,'cate_id'=>1],
        ['name'=>'quan dui 3','price'=>5000,'cate_id'=>1]
    ]);
});

Route::get('ix',function(){
    $id = DB::table('product')->insertGetId([
        'name'=>'quan di boi','price'=>50000, 'cate_id'=>2
    ]);
    // insertGetId: insert va lay ra id cua dong insert cuoi cung
    echo $id;
});

Route::get('up',function(){
    DB::table('product')->where('id',7)->update(['name'=>'quan di ngu']);
});

Route::get('de',function(){
    DB::table('product')->where('id','<=',5)->delete();
});

Route::get('getmodel',function(){
    $data = App\product::all()->toArray(); // hoac ->jSon
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('getok',function(){
    $data = App\product::find(2)->toArray(); // hoac findOrFails, where, firstOrFail(), take(), select(),count()
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('para',function(){
    $data = App\product::whereRaw('price = ? AND id = ?',[60000,1])->get()->toArray();
    // whereRaw -> nhet dieu kien vao
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('ge', function () {
    $product = new App\product;
    $product->name = "quan di choi";
    $product->price = 50000;
    $product->cate_id = 2;
    $product->save();
    echo "good";
});

Route::get('dt', function () {
    $data = array(
        'name' => "quan di ngu o",
        'price' => 5000,
        'cate_id' => 2
    );
    App\product::create($data);
});

Route::get('upd',function () {
    $product = App\product::find(5);
    $product->price = 1;
    $product->save();
});

Route::get('dr', function () {
    $product = App\product::destroy(3); // xoa cot co id = 3
});

Route::get('rou',function(){
    $data =  App\product::find(4)->images()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('getR',function (){
    $data = App\image::find(8)->product()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::post('ans', ['as'=>'and', function(){
    return "success";
}]);

Route::get('fom',function(){
    return view('form.layout');
});

Route::post('ad', ['as'=>'postDangky','uses'=>'DangtuController@Add']);

// Route::any('{all?}','HomeController@showwelcome')->where('all','(.*)');
 // where -> dieu kien cho 'all' la bat cu cai gi deu duoc
 // Go bat cu  cai Route khong dung thi 
 // Goi ve HomeController dung method showwelcome

Route::get('res',function(){
    $arr = array(
        'trungtam' => 'Laravel',
        'giangvien' => 'Dangtu',
        'monhoc' => 'Lap tring Laravel'
    );
    return response()->json($arr);
});

Route::get('xml',function(){
    $content = '<?xml version="1.0" encoding="UTF-8"?>
         <root>
            <trungtam>Dang tu</trungtam>
            <danhsach>
                <monhoc>Lap tring Laravel</monhoc>
            </danhsach>
         </root>
    ';
    $status = 200;
    $value = 'text/xml';
    return response($content,$status)->header('Content-Type',$value);
});

Route::get('cos',['as' => 'master',function() {
    return view('hello');
}]);

Route::get('resx',function(){
    return redirect()->route('master')->with([
        'level' => 'danger',
        'message' => 'Hello World'
    ]);
});

Route::get('rback',function(){
    return redirect()->back(); // quay lai duong dan truoc do 
});

Route::get('relo',function(){
    $url = 'F:/xampp/htdocs/cms/public/download/demo.rar';
    return Response::download($url)->deleteFileAfterSend(true);
    // download mot file
    // -> deleteFileAfterSend(true) : xoa file sau khi download
});

Route::get('rmar',function(){
    return response()->cap('danghuutu');
    // cap -> dinh nghia mot macro (giong nhu nethod) trong provider
});

Route::get('xd',function(){
    return response()->contact('http://localhost:8000/rmar');
});

Route::get('auth',['as'=>'getlogin', 'uses' => 'ThanhVienController@getLogIn']);

Route::post('auth',['as'=>'postlogin', 'uses' => 'ThanhVienController@postLogIn']);

// Route::get('authen', ['as'=>'getRegister', 'uses' => 'AuthController@getRegister']);

// Route::post('poth', ['as'=>'postRegister', 'uses' => 'AuthController@postRegister']);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('fd', ['as'=>'getRe','uses'=>'Auth\RegisterController@getRegister']);

Route::get('geton', ['as'=>'postRe','uses'=>'Auth\RegisterController@postRegister']);

Route::get('loin',['as'=> 'goin','uses'=>'Auth\LoginController@postLogIn']);

Route::resource('phpd','HomeController');

Route::get('osx', function(){
    return view('mixVue');
});

Route::get('gerid', function () {
    return view('post',[
        'name' => 'Dang Tu'
    ]);
});

Route::group(['middleware' => 'checkage'], function () {
    Route::get('checkAge/{myAge}', function($myAge) {
         return "dcm Duy";
    });
    
   
});
 
Route::get('post/{id}', function($id){
    return "Success";
})->middleware('CheckRole:editor');

Route::get('checkRequest', ['uses' => 'ThanhVienController@checkRequest']);