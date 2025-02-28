<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreferenceResource\Pages;
use App\Models\Preference;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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

class PreferenceResource extends Resource
{
    protected static ?string $model = Preference::class;

    protected static ?string $slug = 'preferences';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('provider_id')
                    ->relationship('provider', 'name')
                    ->searchable(),

                Select::make('ai_model_id')
                    ->relationship('aiModel', 'name')
                    ->searchable(),

                Select::make('api_key_id')
                    ->relationship('apiKey', 'name')
                    ->searchable(),

                TextInput::make('use_custom_prompt'),

                TextInput::make('custom_prompt'),

                TextInput::make('language'),

                TextInput::make('summary_length'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?Preference $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?Preference $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('provider.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('aiModel.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('apiKey.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('use_custom_prompt'),

                TextColumn::make('custom_prompt'),

                TextColumn::make('language'),

                TextColumn::make('summary_length'),
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
            'index' => Pages\ListPreferences::route('/'),
            'create' => Pages\CreatePreference::route('/create'),
            'edit' => Pages\EditPreference::route('/{record}/edit'),
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
        return parent::getGlobalSearchEloquentQuery()->with(['user', 'provider', 'aiModel', 'apiKey']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name', 'provider.name', 'aiModel.name', 'apiKey.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        if ($record->provider) {
            $details['Provider'] = $record->provider->name;
        }

        if ($record->aiModel) {
            $details['AiModel'] = $record->aiModel->name;
        }

        if ($record->apiKey) {
            $details['ApiKey'] = $record->apiKey->name;
        }

        return $details;
    }
}
