<?php
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        
        if ($user->role === 'gerente') {
            return redirect()->route('dashboard.gerente');
        } elseif ($user->role === 'empleado') {
            return redirect()->route('dashboard.empleado');
        } else {
            return redirect()->route('dashboard.cliente');
        }
    })->name('dashboard');

    Route::get('/dashboard/gerente', function () {
        return view('dashboard.gerente');
    })->name('dashboard.gerente');

    Route::get('/dashboard/empleado', function () {
        return view('dashboard.empleado');
    })->name('dashboard.empleado');

    Route::get('/dashboard/cliente', function () {
        return view('dashboard.cliente');
    })->name('dashboard.cliente');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth'])->group(function () {
        Route::resource('empleados', EmpleadoController::class);
    });
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('carritos', CarritoController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::post('/carrito/comprar', [App\Http\Controllers\CarritoController::class, 'comprar'])->name('carrito.comprar');
});

require __DIR__.'/auth.php';