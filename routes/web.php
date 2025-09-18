<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\McqsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\McqController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Frontend\AboutUsController as FrontendAboutUsController;



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


Route::get('/all-mcqs/{cat?}', [McqController::class, 'index'])->name('mcqs.index');
Route::get('/get-subcategories/{id}', [McqController::class, 'getSubcategories']);
Route::get('/subcategories/{id}', [SubCategoryController::class, 'getByCategory']);

Route::get('/get-subcategories/{id}', [CategoryController::class, 'getSubcategories']);



Route::get('/home', function () {
    return view('home');
})->middleware('user');


Route::get('/', function ($cat = "") {
    $categories = \App\Models\Category::with('subcategories')->get();
    return view('welcome', compact('categories'));
});

Route::get('/report/{id}', function ($id) {
    $action = route('report.mcq', ['id' => $id]);
    return view('report', compact('action'));
})->middleware('user');


Route::post('/report-submit/{id}', function ($id) {
    $mcq = \App\Models\Mcq::find($id);
    \App\Models\Report::create([
        'user_id' => Auth::id(),
        'category_id' => $mcq->category_id,
        'mcq_id' => $mcq->id,
        'report' => request('report'),
    ]);
    toastr()->success('Mcq Reported Successfully');
    return redirect('/all-mcqs');
})->middleware('user')->name('report.mcq');

Route::controller(AuthController::class)->group(function () {
    // Registration routes
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    // Login routes with rate limiting
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginAction')->name('login.action')->middleware('throttle:10,1'); // Throttle login attempts to 10 attempts per minute
    });

    // Logout routes
    Route::middleware('auth')->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::post('logout', 'logout')->name('logout');
    });
});


Route::group(['middleware' => 'Admin'], function () {


    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Frontend Pages

Route::get('/about-us', [FrontendAboutUsController::class, 'index'])->name('frontend.aboutus');


// Category Controller
Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('create', [CategoryController::class, 'index'])->name('All.Category');
    Route::get('add', 'add')->name('category.add');
    Route::post('save', 'save')->name('category.save');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::post('edit/{id}', 'update')->name('category.update');
    Route::get('delete/{id}', 'delete')->name('category.delete');
    Route::get('category/import',  'importForm')->name('category.import.form');
    Route::post('category/import',  'importJson')->name('category.import.json');
});





// SubCategory Controller routes
Route::controller(SubCategoryController::class)->prefix('subcategory')->group(function () {
    Route::get('/view', 'index')->name('all.subcategory');        // List all subcategories (index)
    Route::get('add', 'add')->name('subcategory.add');             // Show form to add subcategory
    Route::post('save', 'save')->name('subcategory.save');         // Store new subcategory
    Route::get('edit/{id}', 'edit')->name('subcategory.edit');     // Show form to edit subcategory
    Route::post('edit/{id}', 'update')->name('subcategory.update'); // Update subcategory
    Route::get('delete/{id}', 'delete')->name('subcategory.delete'); // Delete subcategory
    Route::get('/subcategories/{category_id}', 'getByCategory');
    Route::get('import', 'importForm')->name('subcategory.import.form');
    Route::post('import', 'importJson')->name('subcategory.import.json');

});

Route::get('/get-subcategories/{category}', [SubCategoryController::class, 'getByCategory']);


Route::prefix('admin')->group(function () {
    Route::get('/topics', [TopicController::class, 'index'])->name('admin.all.topic');
    Route::get('/topics/add', [TopicController::class, 'add'])->name('admin.add.topic');
    Route::post('/topics/save', [TopicController::class, 'save'])->name('admin.save.topic');
    Route::get('/topics/edit/{id}', [TopicController::class, 'edit'])->name('admin.edit.topic');
    Route::post('/topics/update/{id}', [TopicController::class, 'update'])->name('admin.update.topic');
    Route::get('/topics/delete/{id}', [TopicController::class, 'delete'])->name('admin.delete.topic');

    // For Topics
    Route::get('/topics/by-subcategory/{id}', [TopicController::class, 'getBySubcategory']);
    Route::get('/subcategories/by-category/{id}', [TopicController::class, 'getSubcategoriesByCategory']);
});

// routes/web.php

Route::get('/get-subcategories/{category}', [SubCategoryController::class, 'getByCategory']);

Route::get('/get-subcategories/{category}', [AjaxController::class, 'getSubcategories']);
Route::get('/get-topics/{subcategory}', [AjaxController::class, 'getTopics']);
;

//// Search Cateory
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/search-category', 'CategoryController@search')->name('searchCategory');
    Route::get('/clear-category', 'CategoryController@clear')->name('clearCategory');
});

// Category Controller
Route::controller(McqsController::class)->prefix('mcqs')->group(function () {
    Route::get('', [McqsController::class, 'index'])->name('All.mcqs');
    Route::get('reports', [McqsController::class, 'reports'])->name('reports.mcqs');
    Route::get('add', 'add')->name('mcqs.add');
    Route::post('save', 'save')->name('mcqs.store');
    Route::get('edit/{id}', 'edit')->name('mcqs.edit');
    Route::post('edit/{id}', 'update')->name('mcqs.update');
    Route::delete('delete/{id}', 'delete')->name('mcqs.delete');
    Route::delete('report/delete/{id}', 'rdelete')->name('mcqs.report.delete');
    Route::post('/mcqs/import', [McqsController::class, 'import'])->name('mcqs.import');
});

// Route::resource('aboutus', App\Http\Controllers\Admin\AboutUsController::class);
Route::resource('aboutus', App\Http\Controllers\Admin\AboutUsController::class)->parameters([
    'aboutus' => 'aboutus'
]);
//Braand Routes
Route::controller(BrandController::class)->prefix('brand')->group(function () {
    Route::get('create', 'index')->name('all.brand');
    Route::get('add', 'add')->name('brand.add');
    Route::post('save', 'save')->name('brand.save');
    Route::get('edit/{id}', 'edit')->name('brand.edit');
    Route::post('edit/{id}', 'update')->name('brand.update');
    Route::get('delete/{id}', 'delete')->name('brand.delete');
});

// Product
Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::get('/product', [ProductController::class, 'index'])->name('admin.all.product');
Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::patch('product/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');



// Order
Route::get('/dashboard', [\App\Http\Controllers\OrderController::class, 'dashboard'])->name('dashboard');
Route::get('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('admin.order.create');
Route::get('/order/fetchProducts/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->name('admin.order.show');
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('admin.all.order');
Route::get('/order/edit/{order}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('admin.order.edit');
Route::post('/order/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('admin.order.store');
Route::patch('/order/update/{order}', [\App\Http\Controllers\OrderController::class, 'update'])->name('admin.order.update');
Route::delete('/order/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('admin.order.delete');

//Customer
Route::get('/customer/fetchProducts/{id}', [CustomerController::class, 'productshow'])->name('admin.customer.productshow');
Route::get('/customer/fetchbrands/{id}', [CustomerController::class, 'brandshow'])->name('admin.customer.brandshow');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::get('/customer', [CustomerController::class, 'index'])->name('admin.all.customer');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::patch('/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('admin.customer.delete');

// //        jquery
Route::get('/subcategories/{category_id}', [BrandController::class, 'getSubcategoriesByCategory'])->name('subcategories.by.category');
Route::get('/products/{subcategory_id}', [ProductController::class, 'getProductsBySubcategory'])->name('products.by.subcategory');


//         //Client Route
Route::resource('clients', ClientController::class);


// EMployee crud route
Route::get('crud', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');


//Search button
Route::get('/crud', [EmployeeController::class, 'fetchAll'])->name('search');

//////  Blog Category
Route::controller(\App\Http\Controllers\BlogCategory::class)->prefix('blogcategory')->group(function () {
    Route::get('create', [\App\Http\Controllers\BlogCategory::class, 'index'])->name('all.blogcategory');
    Route::get('add', 'add')->name('blogcategory.add');
    Route::post('save', 'save')->name('blogcategory.save');
    Route::get('edit/{id}', 'edit')->name('blogcategory.edit');
    Route::post('edit/{id}', 'update')->name('blogcategory.update');
    Route::get('delete/{id}', 'delete')->name('blogcategory.delete');
});

Route::controller(PostController::class)->prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('all.post');
    Route::get('add', 'add')->name('post.add');
    Route::post('save', 'save')->name('post.save');
    Route::get('edit/{id}', 'edit')->name('post.edit');
    Route::post('edit/{id}', 'update')->name('post.update');
    Route::get('delete/{id}', 'delete')->name('post.delete');
});


Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'clear cache';
});

Route::get('/admin/mcqs', [McqsController::class, 'search'])->name('mcqs.index');
// Import MCQs
Route::get('/admin/mcqs/import', [McqsController::class, 'showImportForm'])->name('mcqs.import.form');
Route::post('/admin/mcqs/import', [McqsController::class, 'importByEachCategory'])->name('mcqs.import');

// AJAX Endpoints
Route::get('/get-subcategories/{id}', [McqsController::class, 'getSubcategories']);
Route::get('/get-topics/{id}', [McqsController::class, 'getTopics']);

Route::get('/test-mcqs', function () {
    $mcqCount = \App\Models\Mcq::count();
    $categories = \App\Models\Category::count();
    $subcategories = \App\Models\Subcategory::count();
    $topics = \App\Models\Topic::count();

    return response()->json([
        'mcqs_count' => $mcqCount,
        'categories_count' => $categories,
        'subcategories_count' => $subcategories,
        'topics_count' => $topics,
        'sample_mcqs' => \App\Models\Mcq::take(5)->get(['id', 'question', 'category_id', 'subcategory_id', 'topic_id'])
    ]);
});
