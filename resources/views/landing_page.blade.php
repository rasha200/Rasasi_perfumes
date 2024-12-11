@extends('layouts.user_side_master')

@section('content')
<div>
    <div class="fullwidth-template">
   
{{--include hero_section start--}}
@include("include/landing_page/hero_section")
{{--include hero_section end--}}


{{--include flash-sale start--}}
@include("include/landing_page/first_section(discount)")
{{--include flash-sale end--}}



{{--include secound_section(static_categories) start--}}
@include("include/landing_page/secound_section(static_categories)")
{{--include secound_section(static_categories) end--}}


{{--include third_section(filter) start--}}
@include("include/landing_page/third_section(filter)")
{{--include third_section(filter) end--}}

 

{{--include fourth_section(static_category) start--}}
@include("include/landing_page/fourth_section(static_category_perfume)")
{{--include fourth_section(static_category) end--}}
       
      
{{--include fifth_section(new_products) start--}}
@include("include/landing_page/fifth_section(new_products)")
{{--include fifth_section(new_products) end--}}

       


    </div>
</div>


{{--include sixth_section(instgram) start--}}
@include("include/landing_page/sixth_section(instgram)")
{{--include sixth_section(instgram) end--}}


@endsection