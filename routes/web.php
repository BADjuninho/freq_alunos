<?php

use Illuminate\Support\Facades\Route;

/*
* Página inicial
*/
Route::get('/', function () {
    return view('index'); // Exibe a página inicial
})->name('inicio');

/*
* Cadastro de usuário
*/
Route::get('/cadastrar_usuario', function () {
    return view('/cadastrar_usuario/index'); // Exibe o formulário de cadastro de usuário
})->name('cadastrar_usuario');

/*
* Listagem de empresas
*/
Route::get('/listar', function () {
    return view('/cadastrar_empresa/listar'); // Exibe a listagem de empresas cadastradas
})->name('listar_empresas');

/*
* Listagem de funcionários de uma empresa
*/
Route::get('/listar_funcionario', function () {
    return view('/cadastrar_empresa/listar_relatorios_user'); // Exibe a listagem de funcionários de uma empresa
})->name('listar_funcionarios');

/*
* Listagem de relatórios de um funcionário
*/
Route::get('/listar_secretario', function () {
    return view('/cadastrar_empresa/listar_relatorios_secretario'); // Exibe a listagem de relatórios de um funcionário
})->name('listar_relatorios_funcionario');

/*
* Cadastro de empresa
*/
Route::get('/cad_empresa', function () {
    return view('/cadastrar_empresa/index'); // Exibe o formulário de cadastro de empresa
})->name('cadastrar_empresa');

/*
* Cadastro de usuário
*/
Route::get('/cad_user', function () {
    return view('/cadastrar_usuario/index'); // Exibe o formulário de cadastro de usuário
})->name('cadastrar_usuario');

/*
* Listagem de usuários
*/
Route::get('/listar_usuarios', function () {
    return view('/cadastrar_usuario/listar'); // Exibe a listagem de usuários cadastrados
})->name('listar_usuarios');

/*
* Listagem de empresas de um usuário
*/
Route::get('/ver_empresa', function () {
    return view('/cadastrar_usuario/listar_usuarios_empresa'); // Exibe a listagem de empresas de um usuário
})->name('listar_empresas_usuario');

/*
* Vincular usuário a empresa
*/
Route::get('/vinc_usuario', function () {
    return view('/cadastrar_empresa/vincular_usuario'); // Exibe o formulário de vínculo de usuário a empresa
})->name('vincular_usuario');

/*
* Anexar relatório
*/
Route::get('/anexar_relatorio', function () {
    return view('/cadastrar_empresa/anexar_relatorio'); // Exibe o formulário de anexo de relatório
})->name('anexar_relatorio');

/*
* Anexar relatório (com id do usuário na URL)
*/
Route::get('/anexar_relatorio', function (Illuminate\Http\Request $request) {
    $id = $request->query('id'); // Obtém o ID do usuário da URL
    return view('/cadastrar_empresa/anexar_relatorio', [$id=>'id']); // Exibe o formulário de anexo de relatório com ID do usuário pré-inserido
})->name('anexar_relatorio_com_id');

/*
* Listagem de relatórios de uma empresa (com id da empresa na URL)
*/
Route::get('/listar_relatorios', function (Illuminate\Http\Request $request) {
    $id = $request->query('id'); // Obtém o ID da empresa da URL
    return view('/cadastrar_empresa/listar_relatorios', [$id=>'id']); // Exibe a listagem de relatórios de uma empresa
})->name('listar_relatorios_com_id');

/*
* Edição de empresa
*/
Route::get('/update_empresa', function (Illuminate\Http\Request $request) {
    $id = $request->query('id'); // Obtém o ID da empresa da URL
    return view('/cadastrar_empresa/update', [$id=>'id']); // Exibe o formulário de edição de empresa com ID pré-inserido
})->name('editar_empresa');

/*
* Edição de usuário
*/
Route::get('/update_usuario', function (Illuminate\Http\Request $request) {
    $id = $request->query('id'); // Obtém o ID do usuário da URL
    return view('/cadastrar_usuario/update', [$id=>'id']); // Exibe o formulário de edição de usuário com ID pré-inserido
})->name('editar_usuario');

/*
* Listagem de usuários de uma empresa (com id da empresa na URL)
*/
Route::get('/listar_usuarios_empresa', function (Illuminate\Http\Request $request) {
    $id = $request->query('id');// Obtém o ID da empresa da URL
    return view('/cadastrar_empresa/listar_usuarios_empresa', [$id=>'id']);// Exibe o formulário de listagem de usuarios de uma empresa com ID pré-inserido
});
