<?php

use App\Helpers\TablesHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create(TablesHelper::RESERVATIONS, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on(TablesHelper::CLIENTS)
                ->onDelete('CASCADE');

            $table->tinyInteger('poeple')->default(1);
            $table->date('from');
            $table->date('to');

            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id')
                ->references('id')
                ->on(TablesHelper::ROOMS)
                ->onDelete('SET NULL');

            $table->string('state');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(TablesHelper::RESERVATIONS);
    }
}
