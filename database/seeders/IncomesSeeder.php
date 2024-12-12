<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('/database/files/incomes_data.json');

        if(!file_exists($filePath)) {
            $this->command->error("путь $filePath не найден :(");
            return;
        }

        $data = json_decode(file_get_contents($filePath), true);

        if ($data === null) {
            $this->command->error('не получилось декодировать джейсончик :(');
            return;
        }

        forEach($data as $income) {

            DB::table('incomes')->insert([
                'number' => $income['number'],
                'income_id' => $income['income_id'],
                'date' => $income['date'],
                'last_change_date' => $income['last_change_date'],
                'supplier_article' => $income['supplier_article'],
                'tech_size' => $income['tech_size'],
                'barcode' => $income['barcode'],
                'quantity' => $income['quantity'],
                'total_price' => $income['total_price'],
                'date_close' => $income['date_close'],
                'warehouse_name' => $income['warehouse_name'],
                'nm_id' => $income['nm_id'],
            ]);

        }

    }
}
