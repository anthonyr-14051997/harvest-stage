<?php

use App\Models\User;
use App\Models\Category;
use App\Models\PercentageUrssaf;
/* use App\Models\CategoryFlow; */
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
        Schema::create('flows', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 6, 2);
            $table->string('name');
            $table->date('date');
            $table->enum('type', ['inflow', 'outflow']);
            $table->timestamps();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(PercentageUrssaf::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flows');
    }
};
