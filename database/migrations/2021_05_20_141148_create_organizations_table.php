<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->bigIncrements('Org_id');
            $table->string('Org_nama', 25);
            $table->string('Org_email');
            $table->string('Org_password',30);
            $table->string('Org_alamat',30);
            $table->bigInteger('Org_telepon');
            $table->Integer('Org_rank');
            $table->text('Org_description');
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
        Schema::dropIfExists('organizers');
    }
}
