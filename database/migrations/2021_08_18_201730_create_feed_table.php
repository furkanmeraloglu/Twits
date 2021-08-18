<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Tweet;

class CreateFeedTable extends Migration
{
    // Feed'in id'si feedini görüntüleyeceğimiz kullanıcının id'si olacak şekilde formüle edilebilir.
    // Örneğin 1 id'li kullanıcının feed'İnde hem kendi tweet'leri hem de rt ettiği başkalarının tweetleri olacak.
    // Bu yüzden de foreignIdFor ile User ve Tweet bağlıyoruz.
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Tweet::class);
            $table->boolean('isRetweet')->default(false);
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
        Schema::dropIfExists('feed');
    }
}
