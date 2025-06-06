<?php
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AdminDashboardController;
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
        } elseif ($user->role === 'cliente') {
            if ($user->subrol === 'vendedor') {
                return redirect()->route('dashboard.vendedor');
            } elseif ($user->subrol === 'comprador') {
                return redirect()->route('dashboard.comprador');
            } else {
                return redirect()->route('dashboard.cliente'); // <-- Nueva ruta para cliente genérico
            }
        }
    abort(403);
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

    Route::get('/dashboard/vendedor', function () {
        return view('dashboard.vendedor');
    })->name('dashboard.vendedor');

    Route::get('/dashboard/comprador', function () {
        return view('dashboard.comprador');
    })->name('dashboard.comprador');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('ventas/{venta}/ticket', [VentaController::class, 'showTicket'])
    ->name('ventas.ticket')
    ->middleware('auth');

    Route::middleware(['auth'])->group(function () {
        Route::resource('empleados', EmpleadoController::class);
    });
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('carritos', CarritoController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::post('/ventas/{venta}/validar', [VentaController::class, 'validar'])->name('ventas.validar');
    Route::get('ventas/{venta}/ticket', [VentaController::class, 'showTicket'])->name('ventas.ticket');
    Route::post('/carrito/comprar', [App\Http\Controllers\CarritoController::class, 'comprar'])->name('carrito.comprar');
    Route::get('/carritos/comprar', [CarritoController::class, 'comprar'])->name('carritos.comprar');
    Route::middleware(['auth'])->group(function () {
    Route::get('/administrador/index', [AdminDashboardController::class, 'index'])
    ->name('administrador.index');
    });
});

require __DIR__.'/auth.php';