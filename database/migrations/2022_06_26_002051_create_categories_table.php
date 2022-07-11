<?php

use App\Models\Inflow;
use App\Models\Outflow;
/* use App\Models\CategoryInflow;
use App\Models\CategoryOutflow; */
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
