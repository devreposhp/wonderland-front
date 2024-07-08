<?php

namespace App\Filament\Resources\Hotel;

use Filament\Forms\Form;
use App\Models\CommandLog;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Resources\Hotel\CommandLogResource\Pages;

class CommandLogResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = CommandLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Logs';

    public static string $translateIdentifier = 'command-logs';

    protected static ?string $slug = 'logs/commands';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('timestamp', 'desc')
            ->columns([
                TextColumn::make('user.username')
                    ->label(__('filament::resources.columns.username'))
                    ->searchable(),

                TextColumn::make('params')
                    ->label(__('filament::resources.columns.command'))
                    ->searchable(),

                TextColumn::make('succes')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'yes' => 'primary',
                        'no' => 'warning'
                    })
                    ->label(__('filament::resources.columns.success'))
                    ->formatStateUsing(fn (string $state): string => __("filament::resources.options.{$state}")),

                TextColumn::make('timestamp')
                    ->label(__('filament::resources.columns.executed_at'))
                    ->dateTime('Y-m-d H:i')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('succes')
                    ->label(__('filament::resources.filters.success'))
                    ->options([
                        'yes' => __('filament::resources.options.yes'),
                        'no' => __('filament::resources.options.no'),
                    ]),
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCommandLogs::route('/'),
        ];
    }
}
