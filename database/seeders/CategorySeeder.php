<?php
namespace Database\Seeders;use App\Models\Category;use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder {public function run():void{foreach([['حمص',1,[['حمص عادي',1.00],['حمص لحمة',2.50]]],['ساندويشات',2,[['فلافل',0.50],['فلافل دوبل',0.75]]],['مشروبات',3,[['ماء',0.35],['عصير',1.00]]]]as[$n,$s,$ps]){$c=Category::create(['name'=>$n,'sort_order'=>$s]);foreach($ps as[$p,$price])$c->products()->create(['name'=>$p,'price'=>$price]);}}}
