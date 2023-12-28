@extends('layouts.app')

@section('content')
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-record-card {
            margin-bottom: 20px;
            padding: 20px;
        }

        .add-record-card:hover {
            background-color: #f0f0f0;
            transition: background-color 0.3s ease;
        }

        #barChart {
            margin-top: 20px;
        }
    </style>

    <div class="container">
        <h1 class="text-center">Controle Financeiro</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">Entradas</div>
                    <div class="card-body">
                        <p>Total de Entradas: R$ {{ $entradas }}</p>
                        <ul>
                            @foreach($registros->where('tipo', 'Entrada') as $registro)
                                <li>{{ $registro->descricao }} - R$ {{ $registro->valor }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">Saídas</div>
                    <div class="card-body">
                        <p>Total de Saídas: R$ {{ $saidas }}</p>
                        <ul>
                            @foreach($registros->where('tipo', 'Saída') as $registro)
                                <li>{{ $registro->descricao }} - R$ {{ $registro->valor }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">Resultado</div>
                    <div class="card-body">
                        <p>Total: R$ {{ $total }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="total text-center mt-3 border border-primary rounded p-3 add-record-card">
                    <h2 class="text-primary">Adicionar Registro</h2>
                    <form action="{{ route('financeiro.adicionar') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type='text' name='descricao' class="form-control" placeholder='Adicione uma descrição' required>
                        </div>
                        <div class="mb-3">
                            <input type='text' name='valor' class="form-control" placeholder='Adicione um valor' required>
                        </div>
                        <div class="mb-3">
                            <input type='radio' name='tipo' value='Entrada' required> Entrada
                            <input type='radio' name='tipo' value='Saída' required> Saída
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type='submit' class="btn btn-primary me-md-2">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="mb-3 col-md-20">
                <div class="card">
                    <div class="card-header bg-info text-white">Gráfico de Barra</div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var dados = {!! json_encode($dados) !!};

        var config = {
            type: 'bar',
            data: dados,
            options: {
                scales: {
                    x: { stacked: true },
                    y: { stacked: true }
                }
            }
        };

        var ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, config);
    });
</script>

@endsection
