<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();
        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();	
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
        });
     /*    Schema::table('users', function (Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('student_family_id');
        }); */
        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'password' => bcrypt("admin"),
                'name' => 'admin',
            ],
            [
                'email' => 'gyorgys@gmail.com',
                'password' => bcrypt("admin"),
                'name' => 'gyorgy szilard',
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */
        Schema::create('products', function (Blueprint $table) {
            $table->id();	
            $table->string('brand');
            $table->string('category');
            $table->boolean('summer');
            $table->string('type');
            $table->integer('number')->unsigned();
            $table->string('letter',1);
            $table->string('fuel', 1);
            $table->string('rain',1);
            $table->integer('sound');
            $table->double('oldPrice')->nullable();
            $table->double('newPrice');
            $table->double('vat');
            $table->integer('pieceNumber')->unsigned();
            $table->string("useFor");
        });
        DB::table('products')->insert([
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => null,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => null,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Pirelli',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '200/55/R17',
                'number' => 99,
                'letter' => 'f',
                'fuel' => 'b',
                'rain' => 'n',
                'sound' => 88,
                'oldPrice' => 200.00,
                'newPrice' => 199.99,
                'vat' => 20.59,
                'pieceNumber' => 6,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Michelin',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 400.00,
                'vat' => 20,
                'pieceNumber' => 4,
                'useFor'=>"trucks",
            ],
            [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"agriculture",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => null,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"rims",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => 500.99,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"skid",
            ],
              [
                'brand' => 'Hankook',
                'category' => 'P Zero',
                'summer'  =>  false,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => 324.44,
                'newPrice' => 300.00,
                'vat' => 29.33,
                'pieceNumber' => 9,
                'useFor'=>"cars",
            ],
            [
                'brand' => 'Good year',
                'category' => 'P Zero',
                'summer'  =>  true,
                'type' => '205/55/R16',
                'number' => 82,
                'letter' => 'T',
                'fuel' => 'g',
                'rain' => 'e',
                'sound' => 73,
                'oldPrice' => 111.00,
                'newPrice' => 100.00,
                'vat' => 1.12,
                'pieceNumber' => 0,
                'useFor'=>"inner",
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Checkouts
        |--------------------------------------------------------------------------
        */
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();	
            //TODO: change this to normal address;
            $table->string('address');
            $table->string('bank');
            $table->string('comments');
            $table->string('deliveryMethod');
            $table->string('email');
            $table->string('firstName');
            $table->string('iban');
            $table->string('name');
            $table->string('paymentMethod');
            $table->string('personType');
            $table->string('registrationNumber');
            $table->string('termsAgree');
            $table->unsignedBigInteger('user_id');
            $table->integer('date')->unsigned();

        });

        Schema::table('checkouts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('checkouts')->insert([
            [
                "address"=>"Harghita 85",
                "bank"=>"sdfgh",
                "comments"=>"gh",
                "deliveryMethod"=>"express",
                "email"=>"gyorgys@gmail.com",
                "firstName"=>"szilard",
                "iban"=>"23456",
                "name"=>"Gyorgy Szilard",
                "paymentMethod"=>"cash",
                "personType"=>"indiv",
                "registrationNumber"=>"dfghj",
                "termsAgree"=>"agree",
                'user_id' => 1,
                'date' => $unixTimeStamp,
            ],
            [
                "address"=>"Harghita 85",
                "bank"=>"sdfgh",
                "comments"=>"gh",
                "deliveryMethod"=>"express",
                "email"=>"gyorgys@gmail.com",
                "firstName"=>"szilard",
                "iban"=>"23456",
                "name"=>"Gyorgy Szilard",
                "paymentMethod"=>"cash",
                "personType"=>"indiv",
                "registrationNumber"=>"dfghj",
                "termsAgree"=>"agree",
                'user_id' => 1,
                'date' => $unixTimeStamp,
            ],
            [
                "address"=>"Harghita 85",
                "bank"=>"sdfgh",
                "comments"=>"gh",
                "deliveryMethod"=>"express",
                "email"=>"gyorgys@gmail.com",
                "firstName"=>"szilard",
                "iban"=>"23456",
                "name"=>"Gyorgy Szilard",
                "paymentMethod"=>"cash",
                "personType"=>"indiv",
                "registrationNumber"=>"dfghj",
                "termsAgree"=>"agree",
                'user_id' => 1,
                'date' => $unixTimeStamp,
            ],
            [
                "address"=>"Harghita 85",
                "bank"=>"sdfgh",
                "comments"=>"gh",
                "deliveryMethod"=>"express",
                "email"=>"gyorgys@gmail.com",
                "firstName"=>"szilard",
                "iban"=>"23456",
                "name"=>"Gyorgy Szilard",
                "paymentMethod"=>"cash",
                "personType"=>"indiv",
                "registrationNumber"=>"dfghj",
                "termsAgree"=>"agree",
                'user_id' => 2,
                'date' => $unixTimeStamp,
            ]
        ]);

          /*
        |--------------------------------------------------------------------------
        | checkout_product
        |--------------------------------------------------------------------------
        */
        Schema::create('checkout_product', function (Blueprint $table) {
            $table->id();	
            $table->integer('amount');
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('product_id');
            $table->date('created_at');	
            $table->date('updated_at');	

            $table->foreign('checkout_id')->references('id')->on('checkouts');
            $table->foreign('product_id')->references('id')->on('products');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
    }
}
