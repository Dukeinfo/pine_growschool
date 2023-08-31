<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
   
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->date('application_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('landline_no')->nullable();

            // Educational Information
            $table->string('post_group')->nullable();
            $table->string('post_name')->nullable();
            $table->string('can_teach')->nullable();
            $table->string('upto_class')->nullable();

            // 10th Grade Information
            $table->string('stream_10th')->nullable();
            $table->string('subject_10th')->nullable();
            $table->string('university_10th')->nullable();
            $table->decimal('percentage_10th', 5, 2)->nullable(); // Assuming a decimal format

            // 12th Grade Information
            $table->string('stream_12')->nullable();
            $table->string('subject_12')->nullable();
            $table->string('university_12')->nullable();
            $table->decimal('percentage_12', 5, 2)->nullable(); // Assuming a decimal format

            // Graduation Information
            $table->string('stream_graduation')->nullable();
            $table->string('subject_graduation')->nullable();
            $table->string('university_graduation')->nullable();
            $table->decimal('percentage_graduation', 5, 2)->nullable(); // Assuming a decimal format

            // Post Graduation Information
            $table->string('stream_post_graduation')->nullable();
            $table->string('subject_post_graduation')->nullable();
            $table->string('university_post_graduation')->nullable();
            $table->decimal('percentage_post_graduation', 5, 2)->nullable(); // Assuming a decimal format

            // B.Ed Information
            $table->string('stream_bed')->nullable();
            $table->string('subject_bed')->nullable();
            $table->string('university_bed')->nullable();
            $table->decimal('percentage_bed', 5, 2)->nullable(); // Assuming a decimal format

            // Other Details
            $table->text('other_details')->nullable();
            $table->string('expected_accommodation')->nullable();
            $table->text('future_plans')->nullable();
            $table->string('associated_with_pinegrove')->nullable();
            $table->string('photo')->nullable(); 

            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->string('login')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('application_forms');
    }
}
