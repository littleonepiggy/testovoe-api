<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('/database/files/orders_data.json');

        if(!file_exists($filePath)) {
            $this->command->error("путь $filePath не найден :(");
            return;
        }

        $data = json_decode(file_get_contents($filePath), true);

        if ($data === null) {
            $this->command->error('не получилось декодировать джейсончик :(');
            return;
        }

        forEach($data as $order) {

            DB::table('orders')->insert([
                'g_number' => $order['g_number'],
                'date' => $order['date'],
                'last_change_date' => $order['last_change_date'],
                'supplier_article' => $order['supplier_article'],
                'tech_size' => $order['tech_size'],
                'barcode' => $order['barcode'],
                'total_price' => $order['total_price'],
                'discount_percent' => $order['discount_percent'],
                'warehouse_name' => $order['warehouse_name'],
                'oblast' => $order['oblast'],
                'income_id' => $order['income_id'],
                'odid' => $order['odid'],
                'nm_id' => $order['nm_id'],
                'subject' => $order['subject'],
                'category' => $order['category'],
                'brand' => $order['brand'],
                'is_cancel' => $order['is_cancel'],
                'cancel_dt' => $order['cancel_dt'],
            ]);

        }

    }
}
