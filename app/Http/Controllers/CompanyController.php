<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use GuzzleHttp;

class CompanyController extends Controller
{
    public function irregularitiesOnTheMap(){
        return view('irregular');
    }

    public function globalSearch($value)
    {
        $companies = CompanyDetail::where('place_api_company_name', 'like', '%' . $value . '%')->get();
        return response()->json($companies);
    }

    public function companyCategory($company_category){
        $companyFind = CompanyDetail::where('category', $company_category)->get();
        return $companyFind;
    }

    public function getCompanyData($id){
        $company = CompanyDetail::find($id);
        return $company;
    }

    public function getAllCompaniesData(){
        $companies = CompanyDetail::all();
        return view('index', compact('companies'));
    }

    public function index(){
        $data = $this->get('https://2c028aa685c8.ngrok.io/vngp1_predict_pre_extracted?place_type=all');
        $posts = json_decode($data->getBody()->getContents());
        $allData = $posts->compnaies_indicators_dict;
        $allDataFormatted = json_decode(json_encode($allData), true);
        CompanyDetail::truncate();
        for($i=0; $i<count($allDataFormatted); $i++){
            if($allDataFormatted[$i]['types'] != null){
                $category = explode(',', $allDataFormatted[$i]['types']);
                if (in_array('car_dealer', $category)) {
                    $category_value = 'car_dealer';
                } else if(in_array('car_repair', $category)) {
                    $category_value = "car_repair";
                }
                else{
                    $category_value = "-";
                }
            }
            CompanyDetail::create([
                'Bovag_registered' => $allDataFormatted[$i]['Bovag_registered'] ?? '',
                'KVK_found' => $allDataFormatted[$i]['KVK_found'] ?? '',
                'Unnamed' => $allDataFormatted[$i]['Unnamed'] ?? '',
                'bovag_matched_address' => $allDataFormatted[$i]['bovag_matched_address'] ?? '',
                'bovag_matched_address_score' => $allDataFormatted[$i]['bovag_matched_address_score'] ?? '',
                'bovag_matched_name' => $allDataFormatted[$i]['bovag_matched_name'] ?? '',
                'bovag_matched_name_score' => $allDataFormatted[$i]['bovag_matched_name_score'] ?? '',
                'bovag_matched_telephone' => $allDataFormatted[$i]['bovag_matched_telephone'] ?? '',
                'bovag_matched_telephone_score' => $allDataFormatted[$i]['bovag_matched_telephone_score'] ?? '',
                'bovag_other_details' => $allDataFormatted[$i]['bovag_other_details'] ?? '',
                'business_status' => $allDataFormatted[$i]['business_status'] ?? '',
                'company_ratings' => $allDataFormatted[$i]['company_ratings'] ?? '',
                'duplicate_location' => $allDataFormatted[$i]['duplicate_location'] ?? '',
                'duplicates_found' => $allDataFormatted[$i]['duplicates_found'] ?? '',
                'geometry_location_lat' => $allDataFormatted[$i]['geometry.location.lat'] ?? '',
                'geometry_location_lng' => $allDataFormatted[$i]['geometry.location.lng'] ?? '',
                'geometry_viewport_northeast_lat' => $allDataFormatted[$i]['geometry.viewport.northeast.lat'] ?? '',
                'geometry.viewport.northeast.lng' => $allDataFormatted[$i]['geometry.viewport.northeast.lng'] ?? '',
                'geometry.viewport.southwest.lat' => $allDataFormatted[$i]['geometry.viewport.southwest.lat'] ?? '',
                'geometry.viewport.southwest.lng' => $allDataFormatted[$i]['geometry.viewport.southwest.lng'] ?? '',
                'google_rating' => $allDataFormatted[$i]['google_rating'] ?? '',
                'google_reviews' => $allDataFormatted[$i]['google_reviews'] ?? '',
                'google_vicinity' => $allDataFormatted[$i]['google_vicinity'] ?? '',

                'icon' => $allDataFormatted[$i]['icon'] ?? '',
                'icon_background_color' => $allDataFormatted[$i]['icon_background_color'] ?? '',

                'icon_mask_base_uri' => $allDataFormatted[$i]['icon_mask_base_uri'] ?? '',
                'irregularities' => $allDataFormatted[$i]['irregularities'] ?? '',
                'kvk_Address' => $allDataFormatted[$i]['kvk_Address'] ?? '',
                'kvk_chamber_of_commerce' => $allDataFormatted[$i]['kvk_chamber_of_commerce'] ?? '',
                'kvk_earch_text' => $allDataFormatted[$i]['kvk_earch_text'] ?? '',
                'kvk_establishment_no' => $allDataFormatted[$i]['kvk_establishment_no'] ?? '',
                'kvk_other' => $allDataFormatted[$i]['kvk_other'] ?? '',
                'kvk_partnership_name' => $allDataFormatted[$i]['kvk_partnership_name'] ?? '',
                'kvk_tradename' => $allDataFormatted[$i]['kvk_tradename'] ?? '',
                'lat' => $allDataFormatted[$i]['lat_lng'][0] ?? '',
                'lng' => $allDataFormatted[$i]['lat_lng'][1] ?? '',
                'negative_reviews' => $allDataFormatted[$i]['negative_reviews'] ?? '',
                'opening_hours_open_now' => $allDataFormatted[$i]['opening_hours.open_now'] ?? '',
                'overall_similarity_score' => $allDataFormatted[$i]['overall_similarity_score'] ?? '',
                'permanently_closed' => $allDataFormatted[$i]['permanently_closed'] ?? '',
                'photos_height' => $allDataFormatted[$i]['photos.height'] ?? '',
                'photos_html_attributions' => $allDataFormatted[$i]['photos.html_attributions'] ?? '',
                'photos_photo_reference' => $allDataFormatted[$i]['photos.photo_reference'] ?? '',
                'photos_width' => $allDataFormatted[$i]['photos.width'] ?? '',
                'place_api_address' => $allDataFormatted[$i]['place_api_address'] ?? '',
                'place_api_company_name' => $allDataFormatted[$i]['place_api_company_name'] ?? '',
                'kvk_search_text' => $allDataFormatted[$i]['kvk_search_text'] ?? '',
                'place_api_full_address' => $allDataFormatted[$i]['place_api_full_address'] ?? '',
                'place_api_phone_number' => $allDataFormatted[$i]['place_api_phone_number'] ?? '',
                'place_id' => $allDataFormatted[$i]['place_id'] ?? '',
                'plus_code_global_code' => $allDataFormatted[$i]['plus_code.global_code'] ?? '',
                'plus_code_compound_code' => $allDataFormatted[$i]['plus_code_compound_code'] ?? '',
                'poitive_reviews' => $allDataFormatted[$i]['poitive_reviews'] ?? '',
                'rating' => $allDataFormatted[$i]['rating'] ?? '',
                'reference' => $allDataFormatted[$i]['reference'] ?? '',
                'scope' => $allDataFormatted[$i]['scope'] ?? '',
                'types' => $allDataFormatted[$i]['types'] ?? '',
                'user_ratings_total' => $allDataFormatted[$i]['user_ratings_total'] ?? '',
                'user_ratings_total_1' => $allDataFormatted[$i]['user_ratings_total.1'] ?? '',
                'category' => $category_value ?? '',
            ]);
        }
    }

    public function get($url)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get($url);
        return $response;
    }
    public function store(Request $request){
        dd($request->all());
    }

}
