<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('/database/files/stocks_data.json');

        if(!file_exists($filePath)) {
            $this->command->error("путь $filePath не найден :(");
            return;
        }

        $data = json_decode(file_get_contents($filePath), true);

        if ($data === null) {
            $this->command->error('не получилось декодировать джейсончик :(');
            return;
        }

        print_r($data[0]);

        forEach($data as $stock) {

            DB::table('stocks')->insert([
                'date' => $stock['date'],
                'last_change_date' => $stock['last_change_date'],
                'supplier_article' => $stock['supplier_article'],
                'tech_size' => $stock['tech_size'],
                'barcode' => $stock['barcode'],
                'quantity' => $stock['quantity'],
                'is_supply' => $stock['is_supply'],
                'is_realization' => $stock['is_realization'],
                'quantity_full' => $stock['quantity_full'],
                'warehouse_name' => $stock['warehouse_name'],
                'in_way_to_client' => $stock['in_way_to_client'],
                'in_way_from_client' => $stock['in_way_from_client'],
                'nm_id' => $stock['nm_id'],
                'subject' => $stock['subject'],
                'category' => $stock['category'],
                'brand' => $stock['brand'],
                'sc_code' => $stock['sc_code'],
                'price' => $stock['price'],
                'discount' => $stock['discount'],
            ]);

        }
    }
}
