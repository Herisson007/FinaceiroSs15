<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;

class FinanceiroController extends Controller
{
    public function index()
{
    $registros = Financeiro::latest()->get();

    // Calcular as entradas, saídas e total
    $entradas = $registros->where('tipo', 'Entrada')->sum('valor');
    $saidas = $registros->where('tipo', 'Saída')->sum('valor');
    $total = $entradas - $saidas;

    // Organizar os dados para o gráfico
    $dados = [
        'labels' => ['Entradas', 'Saídas'], // Adicionado rótulo para Entradas e Saídas
        'datasets' => [
            [
                'label' => 'Entradas',
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
                'data' => [$entradas, 0], // Ajustado para utilizar a variável $entradas
            ],
            [
                'label' => 'Saídas',
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 1,
                'data' => [0, $saidas], // Ajustado para utilizar a variável $saidas
            ],
        ],
    ];

    // Retornar a view com os dados
    return view('home', compact('registros', 'entradas', 'saidas', 'total', 'dados'));
}


    public function adicionarRegistro(Request $request)
    {
        // Valide os dados recebidos do formulário
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:Entrada,Saída',
        ]);

        // Crie um novo registro financeiro
        Financeiro::create($request->all());

        // Redirecione de volta à página financeira (home)
        return redirect()->route('home');
    }
}
