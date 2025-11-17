<?php

namespace App\Filament\Resources\Barangs;

use App\Filament\Resources\Barangs\Pages\CreateBarang;
use App\Filament\Resources\Barangs\Pages\EditBarang;
use App\Filament\Resources\Barangs\Pages\ListBarangs;
use App\Filament\Resources\Barangs\Schemas\BarangForm;
use App\Filament\Resources\Barangs\Tables\BarangsTable;
use App\Models\Barang;
use BackedEnum;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;
    protected static ?string $modelLabel = 'Barang';
    protected static ?string $pluralModelLabel = 'Barang';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
                        TextInput::make('kode')
                            ->label('Kode')
                            ->minLength(2)
                            ->maxLength(100)
                            ->required()
                            ->live(),
                        TextInput::make('nama')
                            ->label('Nama Barang')
                            ->minLength(2)
                            ->maxLength(100)
                            ->required(),
                        Select::make('jenis_id')
                            ->label('Jenis Barang')
                            ->relationship('jenis','nama')   
                            ->searchable() 
                            ->required(),
                        TextInput::make('harga')
                            ->label('Harga')
                            ->minLength(2)
                            ->maxLength(100)
                            ->required(),
                        TextInput::make('stok')
                            ->label('Stok')
                            ->minLength(2)
                            ->maxLength(100)
                            ->required(),
         ]);

    }

    public static function table(Table $table): Table
    {
       return BarangsTable::configure($table);
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
            'index' => ListBarangs::route('/'),
            'create' => CreateBarang::route('/create'),
            'edit' => EditBarang::route('/{record}/edit'),
        ];
    }
}
