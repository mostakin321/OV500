<?php

namespace App\Filament\Widgets;

use App\Models\LiveCall;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LiveCdrWidget extends TableWidget
{
    protected static ?string $heading = 'Live CDR View';

    protected int|string|array $columnSpan = 'full';

    protected static ?string $pollingInterval = '5s';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getLiveCdrQuery())
            ->columns([
                TextColumn::make('start_time')->label('Start')->dateTime()->sortable(),
                TextColumn::make('answer_time')->label('Answer')->dateTime()->sortable(),
                TextColumn::make('customer_company')->label('Customer')->searchable()->sortable(),
                TextColumn::make('customer_account_id')->label('Account')->searchable()->sortable(),
                TextColumn::make('customer_src_caller')->label('Caller')->searchable(),
                TextColumn::make('customer_src_callee')->label('Callee')->searchable(),
                TextColumn::make('carrier_name')->label('Carrier')->searchable()->sortable(),
                TextColumn::make('customer_destination')->label('Destination')->searchable(),
                TextColumn::make('customer_rate')->label('Sell Rate')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('carrier_rate')->label('Buy Rate')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('callstatus')->label('Status')->badge()->sortable(),
                TextColumn::make('call_flow')->label('Flow')->badge()->sortable(),
                TextColumn::make('fs_host')->label('FS Host')->searchable(),
            ])
            ->defaultSort('start_time', 'desc')
            ->paginated([10, 25, 50]);
    }

    protected function getLiveCdrQuery(): Builder
    {
        return LiveCall::query();
    }
}
