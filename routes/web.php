<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\OdontogramaTratamientoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TipoTratamientoController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UserController;
use App\Models\TipoTratamiento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return  redirect('/login');
});

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//ROLES
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::patch('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

//USUARIOS
Route::resource('usuarios', UserController::class);
//CITAS
Route::resource('citas', CitaController::class);
//HISTORIALS
Route::get('historials', [CitaController::class, 'historials'])->name('historials.index');
Route::get('historials/filters', [CitaController::class, 'historialsFilters'])->name('historials.filters');
//AGENDA
Route::resource('agendas', AgendaController::class);
//ODONTOGRAMA
Route::get('odontogramas-index', [OdontogramaController::class, 'index'])->name('odontogramas.index_view');
Route::get('odontogramas/{id}', [OdontogramaController::class, 'odontogramas'])->name('odontogramas.index');
Route::get('odontograma-get-tratamiento/{id}', [OdontogramaTratamientoController::class, 'getOdontogramaTratamiento'])->name('odontograma.getTratamiento');
Route::post('odontogramas', [OdontogramaController::class, 'store'])->name('odontogramas.store');
Route::get('get-odontogramas/{id}', [OdontogramaController::class, 'getOdontogramas'])->name('odontogramas.show');
Route::get('get-detalle-odontogramas/{id}', [OdontogramaController::class, 'getDetalleOdontograma'])->name('odontogramas.show_detalle');
//Tratamientos
Route::resource('tratamientos', TratamientoController::class);
Route::post('tratamientos/agregarMedicamento', [TratamientoController::class, 'agregarMedicamento'])->name('tratamientos.agregarMedicamento');
//TIPOTRATAMIENTO
Route::resource('tipotratamientos', TipoTratamientoController::class);
//MEDICAMENTOS
Route::resource('medicamentos', MedicamentoController::class);
