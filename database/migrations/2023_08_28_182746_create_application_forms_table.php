<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->date('application_date');
            $table->date('date_of_birth')->nullable();
            $table->string('post_group')->nullable();
            $table->string('post_name')->nullable();
            $table->string('can_teach')->nullable();
            $table->string('upto_class')->nullable();
            $table->string('full_name')->nullable();;
            $table->string('email')->unique()->nullable();;
            $table->string('confirm_email')->nullable();;
            $table->string('qualification_10_stream')->nullable();
            $table->string('qualification_10_subject')->nullable();
            $table->string('qualification_10_university')->nullable();
            $table->decimal('qualification_10_percentage', 5, 2)->nullable();
            $table->string('qualification_12_stream')->nullable();
            $table->string('qualification_12_subject')->nullable();
            $table->string('qualification_12_university')->nullable();
            $table->decimal('qualification_12_percentage', 5, 2)->nullable();
            $table->string('qualification_graduation_stream')->nullable();
            $table->string('qualification_graduation_subject')->nullable();
            $table->string('qualification_graduation_university')->nullable();
            $table->decimal('qualification_graduation_percentage', 5, 2)->nullable();
            $table->string('qualification_post_graduation_stream')->nullable();
            $table->string('qualification_post_graduation_subject')->nullable();
            $table->string('qualification_post_graduation_university')->nullable();
            $table->decimal('qualification_post_graduation_percentage', 5, 2)->nullable();
            $table->string('qualification_bed_stream')->nullable();
            $table->string('qualification_bed_subject')->nullable();
            $table->string('qualification_bed_university')->nullable();
            $table->decimal('qualification_bed_percentage', 5, 2)->nullable();
            $table->text('other_education_details')->nullable();
            // Personal Details
            $table->string('marital_status')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('landline_no')->nullable();
            // Experience
            $table->string('current_job')->nullable();
            $table->string('present_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('expected_accommodation')->nullable();
            $table->text('future_plans')->nullable();
            $table->boolean('family_associated')->nullable();
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
