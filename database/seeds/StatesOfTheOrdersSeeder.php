<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesOfTheOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_states')->insert([
            'name' => 'INIT',
            'detail' => 'When an order is created, it becomes INIT state. It will look for the information of this order from database and switch to corresponding state.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'WAIT_FOR_POINTS_PAYMENT',
            'detail' => 'In this state, the order actor wait for user to pay points.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'WAIT_FOR_PRE_ORDER',
            'detail' => 'Using the third-party payment need to make “preorder” first.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'WAIT_FOR_CASH_PAYMENT',
            'detail' => 'In this state, the order wait for user finishing third-party payment.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'FINISHED',
            'detail' => 'Both points payments and cash payment have been finished.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'TO_BE_CANCELLED',
            'detail' => 'Order will be cancelled because of some reasons.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'WAIT_FOR_CASH_REFUND',
            'detail' => 'When it comes to refund, the first step is cash refund.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'WAIT_FOR_POINTS_REFUND',
            'detail' => 'Return the points to user.'
        ]);
        DB::table('order_states')->insert([
            'name' => 'CANCELLED',
            'detail' => 'Both cash refund and points refund have been finished.'
        ]);
    }
}
