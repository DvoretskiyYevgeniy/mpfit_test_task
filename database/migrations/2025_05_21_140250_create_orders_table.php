<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('status')->default(App\Enums\OrderStatus::NEW->value);
            $table->string('comment')->nullable();
            $table->integer('count');
            $table->decimal('total_price', 10, 2);

            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'orders_products_idx');
            $table->foreign('product_id', 'orders_products_fk')
                ->on('products')
                ->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
