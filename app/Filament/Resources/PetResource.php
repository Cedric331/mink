<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetResource\Pages;
use App\Filament\Resources\PetResource\RelationManagers;
use App\Models\Pet;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationLabel = 'Animaux';
    protected static ?string $modelLabel = 'Animal';
    protected static ?string $pluralModelLabel = 'animaux';
    protected static ?string $slug = 'animaux';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de l\'animal')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('photos')
                            ->directory('form-photos')
                            ->multiple()
                            ->reorderable()
                            ->openable()
                            ->downloadable()
                            ->required()
                            ->image()
                            ->preserveFilenames()
                            ->maxSize(2048)
                            ->columnSpanFull()
                            ->label('Photos'),

                        TextInput::make('name')
                            ->required()
                            ->label('Nom'),

                        TextInput::make('age')
                            ->numeric('integer')
                            ->required()
                            ->label('Age'),

                        Select::make('type')
                            ->required()
                            ->label('Type')
                            ->options([
                                'chien' => 'Chien',
                                'cheval' => 'Cheval',
                                'brebis' => 'Brebis',
                                'cochon' => 'Cochon',
                            ]),

                        Select::make('race')
                            ->options([
                                'labrador' => 'Labrador',
                                'frison' => 'Frison',
                                'pottok' => 'Pottok',
                                'irish cob' => 'Irish Cob',
                                'merinos' => 'Mérinos',
                                'solognotes' => 'Solognotes',
                            ])
                            ->label('Race'),

                        Select::make('statut')
                            ->required()
                            ->label('Statut')
                            ->columnSpanFull()
                            ->options([
                                'vendu' => 'Vendu',
                                'en vente' => 'En vente',
                            ]),

                        Textarea::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->label('Description'),

                    ]),

                Forms\Components\Section::make('Détails financiers')
                    ->schema([
                        Forms\Components\TextInput::make('price_ht')
                            ->label('Prix Vente HT')
                            ->suffixIcon('heroicon-o-currency-euro')
                            ->required()
                            ->live('input', debounce: 200)
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $prixHT = (float) $state;
                                $tva = (float) $get('tva') / 100;
                                $prixTTC = $prixHT * (1 + $tva);
                                $set('price_ttc', number_format($prixTTC, 2, '.', ''));
                            })
                            ->numeric('decimal', 2),

                        Forms\Components\TextInput::make('price_ttc')
                            ->label('Prix Vente TTC')
                            ->suffixIcon('heroicon-o-currency-euro')
                            ->required()
                            ->hint('Le prix TTC est calculé automatiquement en fonction du prix HT et de la TVA.')
                            ->live('input', debounce: 200)
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $prixTTC = (float) $state;
                                $tva = (float) $get('tva') / 100;
                                $prixHT = $prixTTC / (1 + $tva);
                                $set('price_ht', number_format($prixHT, 2, '.', ''));
                            })
                            ->numeric('decimal', 2),

                        Forms\Components\Select::make('tva')
                            ->label('TVA (%)')
                            ->options([
                                '20' => '20',
                                '10' => '10',
                                '5.5' => '5.5',
                                '2.1' => '2.1',
                            ])
                            ->default('20')
                            ->required()
                            ->hint('En modifiant la TVA, le prix TTC sera recalculé automatiquement.')
                            ->live('input', debounce: 200)
                            ->selectablePlaceholder(false)
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $tva = (float) $state / 100;
                                $prixHT = (float) $get('price_ht');
                                $prixTTC = $prixHT * (1 + $tva);
                                $set('price_ttc', number_format($prixTTC, 2, '.', ''));
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photos')
                    ->label('Photos')
                    ->circular()
                    ->stacked(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('age')
                    ->label('Age')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
        ];
    }
}
