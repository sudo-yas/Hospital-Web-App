<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');  
            $table->string('nom');
            $table->string('prenom'); 
            $table->string('ville'); 
            $table->string('profil'); 
            $table->string('tel'); 
            $table->string('email'); /*'id', 'nom', 'prenom', 'ville', 'profil', 'tel', 'email', 'password', 'Specialite', 'StructHospital', 'dispo'*/
            $table->string('password');
            $table->string('specialite')->nullable();
            $table->string('StructHospital')->nullable();
            $table->string('dispo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
