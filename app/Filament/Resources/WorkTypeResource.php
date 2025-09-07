<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkTypeResource\Pages;
use App\Filament\Resources\WorkTypeResource\RelationManagers;
use App\Models\WorkType;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkTypeResource extends Resource
{
    protected static ?string $model = WorkType::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name'),
                TextInput::make('unit'),
                TextInput::make('price')->numeric(),
                Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name'),
                TextColumn::make('unit'),
                TextColumn::make('price'),
                TextColumn::make('description'),
            ])
            ->filters([
                //
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\RestoreAction::make()->color('success'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkTypes::route('/'),
            'create' => Pages\CreateWorkType::route('/create'),
            'edit' => Pages\EditWorkType::route('/{record}/edit'),
        ];
    }
}
