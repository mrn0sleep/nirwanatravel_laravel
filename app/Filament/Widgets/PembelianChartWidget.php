<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use Filament\Widgets\ChartWidget;

class PembelianChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Status Pembelian';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '30s';
    protected static ?int $contentHeight = 250;

    public function getDescription(): ?string
    {
        $total = Pembelian::count();
        return "Total {$total} pembelian";
    }

    protected function getData(): array
    {
        $belumBayar = Pembelian::where('status', 'Belum Bayar')->count();
        $sudahBayar = Pembelian::where('status', 'Sudah Bayar')->count();
        $selesai = Pembelian::where('status', 'Selesai')->count();
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pembelian',
                    'data'  => [$belumBayar, $sudahBayar, $selesai],
                    'backgroundColor' => ['#ef4444', '#f59e0b', '#22c55e',],
                    'borderColor' => ['#dc2626', '#d97706', '#16a34a'],
                    'borderWidth' => 2,
                    'borderRadius' => 6,
                ],
            ],
            'labels' => ['Belum Bayar', 'Sudah Bayar', 'Selesai'],
        ];
        
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
