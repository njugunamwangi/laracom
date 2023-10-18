<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->string('product', 2000);
            $table->string('model_name', 2000)->nullable();
            $table->string('model_number', 2000)->nullable();
            $table->string('slug', 2000);
            $table->longText('description')->nullable();
            $table->decimal('list_price', 10, 2);
            $table->decimal('retail_price', 10, 2);
            $table->boolean('status');
            $table->longText('warranty')->nullable();
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            $table->string('meta_title', 2000)->nullable();
            $table->string('meta_description', 2000)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
