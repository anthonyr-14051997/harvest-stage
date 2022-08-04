<?php

use App\Models\Flow;
use App\Models\User;
use App\Models\FixedCost;
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
        Schema::create('categories', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->timestamps();

            $table->foreignIdFor(User::class);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

/* 
$table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('outflow_id');
            $table->foreign('outflow_id')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
*/
