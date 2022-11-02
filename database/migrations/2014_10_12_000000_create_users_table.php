<?php

use App\Models\User;
use App\Models\UserTranslation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->nullable();
            $table->string('email')->unique();
            $table->boolean('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_translations', function(Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->unique(['user_id', 'locale']);
        });

        $user = User::create([
            'role'=>'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at'=>'2022-01-02 17:04:58',
            'image' => 'avatar-1.jpg',
            'updated_at' => now(),
            'created_at' => now(),
            ]);

        $user->fill([
            'en' => ['name' => 'Awlad Hossain','phone'=> '01673641621'],
            'bn' => ['name' => 'আওলাদ হোসেন','phone'=> '০১৬৭৩৬৪১৬২১']
        ]);

        $user->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_translations');
        Schema::dropIfExists('users');
    }
};
