<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;


Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-user', [App\Http\Controllers\HomeController::class, 'user'])->name('view-user');

/*Route::prefix('/Suppliers')->group(function () {

});*/

//Routing for Supplier Management
 Route::get('view-supplier', [App\Http\Controllers\PurchaseController::class, 'view_supplier'])->name('view-supplier');
 Route::get('add-supplier', [App\Http\Controllers\PurchaseController::class, 'add_supplier'])->name('add-supplier'); 
Route::post('insert-supplier', [App\Http\Controllers\PurchaseController::class, 'insert_supplier'])->name('insert-supplier'); 
Route::get('delete-supplier/{id}', [App\Http\Controllers\PurchaseController::class, 'delete_supplier'])->name('delete-supplier/{id}'); 
Route::get('edit-supplier/{id}', [App\Http\Controllers\PurchaseController::class, 'edit_supplier'])->name('edit-supplier/{id}'); 
Route::post('update-supplier/{id}', [App\Http\Controllers\PurchaseController::class, 'update_supplier'])->name('update-supplier/{id}'); 

//Routing for Unit Management
 Route::get('view-unit', [App\Http\Controllers\ProductsController::class, 'view_unit'])->name('view-unit');
 Route::get('add-unit', [App\Http\Controllers\ProductsController::class, 'add_unit'])->name('add-unit'); 
Route::post('insert-unit', [App\Http\Controllers\ProductsController::class, 'insert_unit'])->name('insert-unit'); 
Route::get('delete-unit/{id}', [App\Http\Controllers\ProductsController::class, 'delete_unit'])->name('delete-unit/{id}'); 
Route::get('edit-unit/{id}', [App\Http\Controllers\ProductsController::class, 'edit_unit'])->name('edit-unit/{id}'); 
Route::post('update-unit/{id}', [App\Http\Controllers\ProductsController::class, 'update_unit'])->name('update-unit/{id}'); 

//Routing for Category Management
 Route::get('view-category', [App\Http\Controllers\ProductsController::class, 'view_category'])->name('view-category'); 
Route::post('add-category', [App\Http\Controllers\ProductsController::class, 'add_category'])->name('add-category');  
Route::post('insert-category', [App\Http\Controllers\ProductsController::class, 'insert_category'])->name('insert-category'); 
Route::get('delete-category/{id}', [App\Http\Controllers\ProductsController::class, 'delete_category'])->name('delete-category/{id}'); 
Route::get('edit-category/{id}', [App\Http\Controllers\ProductsController::class, 'edit_category'])->name('edit-category/{id}'); 
Route::post('update-category/{id}', [App\Http\Controllers\ProductsController::class, 'update_category'])->name('update-category/{id}'); 

//Routing for Product Management
 Route::get('view-product', [App\Http\Controllers\ProductsController::class, 'view_product'])->name('view-product');
 Route::get('add-product', [App\Http\Controllers\ProductsController::class, 'add_product'])->name('add-product'); 
Route::post('insert-product', [App\Http\Controllers\ProductsController::class, 'insert_product'])->name('insert-product'); 
Route::get('delete-product/{id}', [App\Http\Controllers\ProductsController::class, 'delete_product'])->name('delete-product/{id}'); 
Route::get('edit-product/{id}', [App\Http\Controllers\ProductsController::class, 'edit_product'])->name('edit-product/{id}'); 
Route::post('update-product/{id}', [App\Http\Controllers\ProductsController::class, 'update_product'])->name('update-product/{id}'); 


//Routing for Customer Management
 Route::get('view-customer', [App\Http\Controllers\CustomerController::class, 'view_customer'])->name('view-customer');
 Route::get('add-customer', [App\Http\Controllers\CustomerController::class, 'add_customer'])->name('add-customer'); 
Route::post('insert-customer', [App\Http\Controllers\CustomerController::class, 'insert_customer'])->name('insert-customer'); 
Route::get('delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete_customer'])->name('delete-customer/{id}'); 
Route::get('edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'edit_customer'])->name('edit-customer/{id}'); 
Route::post('update-customer/{id}', [App\Http\Controllers\CustomerController::class, 'update_customer'])->name('update-customer/{id}'); 

//Routing for Purchase Management
 Route::get('view-purchase', [App\Http\Controllers\PurchaseController::class, 'view_purchase'])->name('view-purchase');
 Route::get('add-purchase', [App\Http\Controllers\PurchaseController::class, 'add_purchase'])->name('add-purchase'); 
Route::post('insert-purchase', [App\Http\Controllers\PurchaseController::class, 'insert_purchase'])->name('insert-purchase'); 
Route::get('delete-purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'delete_purchase'])->name('delete-purchase/{id}'); 
 Route::get('view-pending', [App\Http\Controllers\PurchaseController::class, 'view_pending'])->name('view-pending');
Route::get('edit-pending/{id}', [App\Http\Controllers\PurchaseController::class, 'edit_pending'])->name('edit-pending/{id}'); 
/*Route::get('edit-purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'edit_purchase'])->name('edit-purchase/{id}'); 
Route::post('update-purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'update_purchase'])->name('update-purchase/{id}'); */


Route::get('get-category}', [App\Http\Controllers\DefaultController::class, 'get_category'])->name('get-category');
Route::get('get-product}', [App\Http\Controllers\DefaultController::class, 'get_product'])->name('get-product'); 
Route::get('check-product-stock}', [App\Http\Controllers\DefaultController::class, 'check_product_stock'])->name('check-product-stock');  

 //Routing for Invoice Management
 Route::get('view-invoice', [App\Http\Controllers\InvoiceController::class, 'view_invoice'])->name('view-invoice');
 Route::get('add-invoice', [App\Http\Controllers\InvoiceController::class, 'add_invoice'])->name('add-invoice'); 
Route::post('insert-invoice', [App\Http\Controllers\InvoiceController::class, 'insert_invoice'])->name('insert-invoice'); 
Route::get('delete-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'delete_invoice'])->name('delete-invoice/{id}'); 
 Route::get('view-invoice-pending', [App\Http\Controllers\InvoiceController::class, 'view_invoice_pending'])->name('view-invoice-pending');
Route::get('edit-invoice-pending/{id}', [App\Http\Controllers\InvoiceController::class, 'edit_invoice_pending'])->name('edit-invoice-pending/{id}');
Route::post('approve-invoice-pending/{id}', [App\Http\Controllers\InvoiceController::class, 'approve_invoice_pending'])->name('approve-invoice-pending/{id}');


Route::get('print-invoice', [App\Http\Controllers\InvoiceController::class, 'print_invoice'])->name('print-invoice');

Route::get('print-invoice-pdf/{id}', [App\Http\Controllers\InvoiceController::class, 'print_invoice_pdf'])->name('print-invoice-pdf/{id}');


 
Route::get('view-daily-invoice-report', [App\Http\Controllers\ReportController::class, 'view_daily_invoice_report'])->name('view-daily-invoice-report');
Route::get('print-daily-invoice-report', [App\Http\Controllers\ReportController::class, 'view_daily_invoice_report_pdf'])->name('print-daily-invoice-report');
Route::get('view-daily-purchase-report', [App\Http\Controllers\ReportController::class, 'view_daily_purchase_report'])->name('view-daily-purchase-report');
Route::get('print-daily-purchase-report', [App\Http\Controllers\ReportController::class, 'view_daily_purchase_report_pdf'])->name('print-daily-purchase-report');


Route::get('view-stock-report', [App\Http\Controllers\InvoiceController::class, 'view_stock_report'])->name('view-stock-report');

Route::get('view-stock-report-pdf', [App\Http\Controllers\InvoiceController::class, 'view_stock_report_pdf'])->name('view-stock-report-pdf');


Route::get('view-p_s_c-stock-report', [App\Http\Controllers\ReportController::class, 'view_p_s_c_wise_stock'])->name('view-p_s_c-stock-report');
Route::get('view-supplier-wise-stock-report', [App\Http\Controllers\ReportController::class, 'view_p_s_c_wise_stock_pdf'])->name('view-supplier-wise-stock-report');

Route::get('view-product-wise-stock-report', [App\Http\Controllers\ReportController::class, 'view_product_wise_stock'])->name('view-product-wise-stock-report');

Route::get('view-category-wise-stock-report', [App\Http\Controllers\ReportController::class, 'view_category_wise_stock'])->name('view-category-wise-stock-report');

Route::get('view-customer-credit-report', [App\Http\Controllers\ReportController::class, 'view_customer_report'])->name('view-customer-credit-report');

Route::get('view-customer-credit-report-pdf', [App\Http\Controllers\ReportController::class, 'view_customer_credit_report'])->name('view-customer-credit-report-pdf');


Route::get('edit-customer-credit-invoice/{invoice_id}', [App\Http\Controllers\CustomerController::class, 'edit_customer_credit_invoice'])->name('edit-customer-credit-invoice/{invoice_id}');
Route::post('update-customer-credit-invoice/{invoice_id}', [App\Http\Controllers\CustomerController::class, 'update_customer_credit_invoice'])->name('update-customer-credit-invoice/{invoice_id}');

