<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SummaryResource\Pages;
use App\Models\Summary;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SummaryResource extends Resource
{
    protected static ?string $model = Summary::class;

    protected static ?string $slug = 'summaries';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Summary';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('content_id')
                    ->relationship('content', 'title')
                    ->searchable()
                    ->required(),

                Select::make('provider_id')
                    ->relationship('provider', 'name')
                    ->searchable(),

                Select::make('ai_model_id')
                    ->relationship('aiModel', 'name')
                    ->searchable(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?Summary $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?Summary $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('content.title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('provider.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('aiModel.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('feedback')
                    ->badge()
                    ->sortable(),

                TextColumn::make('failed')
                    ->badge(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSummaries::route('/'),
            'create' => Pages\CreateSummary::route('/create'),
            'edit' => Pages\EditSummary::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user', 'content', 'provider', 'aiModel']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name', 'content.title', 'provider.name', 'aiModel.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        if ($record->content) {
            $details['Content'] = $record->content->title;
        }

        if ($record->provider) {
            $details['Provider'] = $record->provider->name;
        }

        if ($record->aiModel) {
            $details['AiModel'] = $record->aiModel->name;
        }

        return $details;
    }
}
