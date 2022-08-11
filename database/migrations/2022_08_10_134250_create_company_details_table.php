<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            // $table->text('company_name');
            // $table->text('trade_name');
            // $table->text('chamber_of_commerce');
            // $table->text('establishment_no');
            // $table->text('positive_reviews');
            // $table->text('negative_reviews');
            // $table->text('bovag');
            // $table->text('companies_at_same_location');
            $table->text("Bovag_registered")->nullable();
            $table->text("KVK_found")->nullable();
            $table->text("Unnamed")->nullable();
            $table->text("bovag_matched_address")->nullable();
            $table->text("bovag_matched_address_score")->nullable();
            $table->text("bovag_matched_name")->nullable();
            $table->text("bovag_matched_name_score")->nullable();
            $table->text("bovag_matched_telephone")->nullable();
            $table->text("bovag_matched_telephone_score")->nullable();
            $table->text("bovag_other_details")->nullable();
            $table->text("business_status")->nullable();
            $table->text("company_ratings")->nullable();
            $table->text("duplicate_location")->nullable();
            $table->text("duplicates_found")->nullable();
            $table->text("geometry_location_lat")->nullable();
            $table->text("geometry_location_lng")->nullable();
            $table->text("geometry_viewport_northeast_lat")->nullable();
            $table->text("geometry_viewport_northeast_lng")->nullable();
            $table->text("geometry_viewport_southwest_lat")->nullable();
            $table->text("geometry_viewport_southwest_lng")->nullable();
            $table->text("google_rating")->nullable();
            $table->text("google_reviews")->nullable();
            $table->text("google_vicinity")->nullable();
            $table->text("icon")->nullable();
            $table->text("icon_background_color")->nullable();
            $table->text("icon_mask_base_uri")->nullable();
            $table->text("irregularities")->nullable();
            $table->text("kvk_Address")->nullable();
            $table->text("kvk_chamber_of_commerce")->nullable();
            $table->text("kvk_earch_text")->nullable();
            $table->text("kvk_establishment_no")->nullable();
            $table->text("kvk_other")->nullable();
            $table->text("kvk_partnership_name")->nullable();
            $table->text("kvk_tradename")->nullable();
            $table->text("lat")->nullable();
            $table->text("lng")->nullable();
            $table->text("negative_reviews")->nullable();
            $table->text("opening_hours_open_now")->nullable();
            $table->text("overall_similarity_score")->nullable();
            $table->text("permanently_closed")->nullable();
            $table->text("photos_height")->nullable();
            $table->text("photos_html_attributions")->nullable();
            $table->text("photos_photo_reference")->nullable();
            $table->text("photos_width")->nullable();
            $table->text("place_api_address")->nullable();
            $table->text("place_api_company_name")->nullable();
            $table->text("place_api_full_address")->nullable();
            $table->text("place_api_phone_number")->nullable();
            $table->text("place_id")->nullable();
            $table->text("plus_code_global_code")->nullable();
            $table->text("plus_code_compound_code")->nullable();
            $table->text("poitive_reviews")->nullable();
            $table->text("rating")->nullable();
            $table->text("reference")->nullable();
            $table->text("scope")->nullable();
            $table->text("types")->nullable();
            $table->text("user_ratings_total")->nullable();
            $table->text("user_ratings_total_1")->nullable();
            $table->text('category')->nullable();
            $table->text("kvk_search_text")->nullable();
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
        Schema::dropIfExists('company_details');
    }
}
