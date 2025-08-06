<?php

namespace Database\Seeders;

use App\Models\Indikator;
use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TatananIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::create([
            'no' => 1,
            'step' => 'Tatanan 1',
            'status' => 0
        ]);
        Step::create([
            'no' => 2,
            'step' => 'Tatanan 2',
            'status' => 0
        ]);
        Step::create([
            'no' => 3,
            'step' => 'Tatanan 3',
            'status' => 0
        ]);
        Indikator::create([
            'step_id' => 1,
            'nomor' => 1,
            'nama' => 'Indikator 1 Tatanan 1',
        ]);
        Indikator::create([
            'step_id' => 1,
            'nomor' => 2,
            'nama' => 'Indikator 2 Tatanan 1',
        ]);
        Indikator::create([
            'step_id' => 2,
            'nomor' => 1,
            'nama' => 'Indikator 1 Tatanan 2',
        ]);
        Indikator::create([
            'step_id' => 2,
            'nomor' => 2,
            'nama' => 'Indikator 2 Tatanan 2',
        ]);
        Indikator::create([
            'step_id' => 3,
            'nomor' => 1,
            'nama' => 'Indikator 1 Tatanan 3',
        ]);
        Indikator::create([
            'step_id' => 3,
            'nomor' => 2,
            'nama' => 'Indikator 2 Tatanan 3',
        ]);
    }
}
