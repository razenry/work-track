<?php

namespace App\Filament\Resources\WorkTypeResource\Pages;

use App\Filament\Resources\WorkTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkType extends CreateRecord
{
    protected static string $resource = WorkTypeResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
