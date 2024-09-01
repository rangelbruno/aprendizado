<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Consulta;
use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPacientes = $this->getTotalPacientes();
        $pacientesPorMes = $this->getPacientesPorMes();

        $totalConsultas = $this->getTotalConsultas();
        $consultasPorMes = $this->getConsultasPorMes();

        $totalAgendamentos = $this->getTotalAgendamentos();
        $agendamentosPorMes = $this->getAgendamentosPorMes();

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')], // Supondo que 'home' seja uma rota definida
            ['title' => 'Dashboard', 'url' => '#']
        ];


        return view('dashboard.index', compact('breadcrumbs', 'totalPacientes', 'pacientesPorMes', 'totalConsultas', 'consultasPorMes', 'totalAgendamentos', 'agendamentosPorMes'));
    }

    private function getTotalPacientes()
    {
        return Paciente::count();
    }

    private function getPacientesPorMes()
    {
        $anoAtual = date('Y');
        return Paciente::select(DB::raw('count(*) as count, EXTRACT(MONTH FROM created_at) as month'))
            ->whereYear('created_at', $anoAtual)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [intval($item->month) => $item->count];
            });
    }

    private function getTotalConsultas()
    {
        return Consulta::count();
    }

    private function getConsultasPorMes()
    {
        $anoAtual = date('Y');
        return Consulta::select(DB::raw('count(*) as count, EXTRACT(MONTH FROM created_at) as month'))
            ->whereYear('created_at', $anoAtual)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [intval($item->month) => $item->count];
            });
    }

    private function getTotalAgendamentos()
    {
        return Agendamento::count();
    }

    private function getAgendamentosPorMes()
    {
        $anoAtual = date('Y');
        return Agendamento::select(DB::raw('count(*) as count, EXTRACT(MONTH FROM created_at) as month'))
        ->whereYear('created_at', $anoAtual)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [intval($item->month) => $item->count];
            });
    }
}
