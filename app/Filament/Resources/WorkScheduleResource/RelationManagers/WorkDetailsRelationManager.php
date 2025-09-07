<?php

namespace App\Filament\Resources\WorkScheduleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'work_details';

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('worker_id')
                ->relationship('worker', 'name')
                ->searchable()
                ->required(),
            Textarea::make('description')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('worker_id')
            ->columns([
                TextColumn::make('worker_id'),
                TextColumn::make('worker.name'),
                TextColumn::make('description')->limit(50),
                TextColumn::make('income')->money('IDR')->label('Salary'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
