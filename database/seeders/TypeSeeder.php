<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type; 

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::create(['name' => 'Eletrônicos']);
        Type::create(['name' => 'Roupas']);
        Type::create(['name' => 'Acessórios']);
    }
}