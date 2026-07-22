<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndicativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicativos = [
            [
                'data_publicacao' => '2025-10-30',
                'mes' => 'Outubro',
                'ano' => 2025,
                'tipo' => 'Residencial',
                'arquivo' => 'uploads/indicativos/Secovi-MT_-_IND_MOB_RESIDENCIAL.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'data_publicacao' => '2025-10-30',
                'mes' => 'Outubro',
                'ano' => 2025,
                'tipo' => 'Comercial',
                'arquivo' => 'uploads/indicativos/Secovi-MT_-_IND_MOB_COMERCIAL.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'data_publicacao' => '2025-08-30',
                'mes' => 'Agosto',
                'ano' => 2025,
                'tipo' => 'Residencial',
                'arquivo' => 'uploads/indicativos/08 2025 Secovi-MT_-_IND_MOB_RESIDENCIAL.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'data_publicacao' => '2025-08-30',
                'mes' => 'Agosto',
                'ano' => 2025,
                'tipo' => 'Comercial',
                'arquivo' => 'uploads/indicativos/08 2025 Secovi-MT_-_IND_MOB_COMERCIAL.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('indicativos')->insert($indicativos);
    }
}
