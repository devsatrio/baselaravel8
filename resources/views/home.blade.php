@extends('layouts.app')

@section('template_title')
    Dashboard Page
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session('status'))
                    <div class="col-lg-12 mt-2">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>Info!</h4>
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">How To Use Simple CRUD Maker With This Boiler</h3>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Create table first, for example <b>book</b></li>
                                <li>type <code>php artisan make:crud {table_name}</code> for example <code>php artisan
                                        make:crud book</code></li>
                                <li>by default your route will be plural name from your table, so if my table was book the
                                    route is <b>books</b></li>
                                <li>or you can custom route name by typing <code>php artisan make:crud {table_name}
                                        --route={route_name}</code> for example <code>php artisan make:crud book
                                        --route=book_crud</code>, that code will be change the default route</li>
                                <li>adding route to your <code>web.php</code> for example <code>Route::resource('book_crud',
                                        BukuController::class);</code></li>
                                <li>Finaly adding menu link on <code>sidebar.blade.php</code> for our new crud</li>
                                <blockquote class="quote-secondary">
                                    <p>if timestamp error when create or editing data adding this code to model <code>public
                                            $timestamps = false;</code></p>
                                    <p>if model table name error or not same with table name type this in model
                                        <code>protected $table = 'table_name';</code> for example <code>protected $table =
                                            'book';</code>
                                    </p>
                                    <p>
                                        You can edit file <b>.stub</b> in <b>"views/vendor/stubs"</b> folder to customize the crud generator view, model & controller
                                    </p>
                                </blockquote>
                                <span>More information for crud generator is <a href="https://github.com/awais-vteams/laravel-crud-generator" target="blank()">Here</a></span>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">This Project Is Using</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="https://spatie.be/docs/laravel-permission/v5/introduction" target="blank()">spatie/laravel-permission</a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://yajrabox.com/docs/laravel-datatables/master/introduction" target="blank()">yajra/laravel-datatables</a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://adminlte.io" target="blank()">Admin LTE</a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://github.com/awais-vteams/laravel-crud-generator" target="blank()">ibex/crud-generator</a>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
