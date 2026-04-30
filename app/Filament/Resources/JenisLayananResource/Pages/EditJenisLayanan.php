<?php

namespace App\Filament\Resources\JenisLayananResource\Pages;

use App\Filament\Resources\JenisLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisLayanan extends EditRecord
{
    protected static string $resource = JenisLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus'),
        ];
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
    return parent::getCancelFormAction()
        ->label('Batal');
    }
}
