@extends('layouts.default')

@section('meta')
    <title>General Settings</title>
    <meta name="description" content="General Settings">
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/select2-bootstrap-5/select2-bootstrap-5-theme.min.css') }}">
@endsection

@section('content')

<div class="container">
    <h3 class="page-title">General Settings</h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <div class="card-body">
      
            <div class="tab-content p-4" id="myTabContent">
                    <div class="tab-pane fade active show" id="system" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
                            <p class="text-muted text-uppercase mb-1">Localization</p><hr class="mt-0">
                            <form action="{{ url('settings/update') }}" method="post" class="needs-validation" novalidate="" accept-charset="utf-8">
                            @csrf
                                <div class="mb-3">
                                    <label for="site-title" class="mb-0 form-label">Time zone</label>
                                    <p class="m-0"><small class="text-muted">Select your region, and city to sync local time</small></p>
                                    <select id="select-search" name="time_zone" class="form-control text-uppercase">
                                        <option value="" selected="" disabled="">Choose...</option>
                                        <option value="Africa/Accra" @if($data->time_zone == "Africa/Accra") selected @endif>(UTC -00:00) Africa/Accra</option>
                                        <option value="Africa/Bamako" @if($data->time_zone == "Africa/Bamako") selected @endif>(UTC -00:00) Africa/Bamako</option>
                                        <option value="Africa/Banjul" @if($data->time_zone == "Africa/Banjul") selected @endif>(UTC -00:00) Africa/Banjul</option>
                                        <option value="Africa/Bissau" @if($data->time_zone == "Africa/Bissau") selected @endif>(UTC -00:00) Africa/Bissau</option>
                                        <option value="Africa/Casablanca" @if($data->time_zone == "Africa/Casablanca") selected @endif>(UTC -00:00) Africa/Casablanca</option>
                                        <option value="Africa/Conakry" @if($data->time_zone == "Africa/Conakry") selected @endif>(UTC -00:00) Africa/Conakry</option>
                                        <option value="Africa/Dakar" @if($data->time_zone == "Africa/Dakar") selected @endif>(UTC -00:00) Africa/Dakar</option>
                                        <option value="Africa/El_Aaiun" @if($data->time_zone == "Africa/El_Aaiun") selected @endif>(UTC -00:00) Africa/El_Aaiun</option>
                                        <option value="Africa/Freetown" @if($data->time_zone == "Africa/Freetown") selected @endif>(UTC -00:00) Africa/Freetown</option>
                                        <option value="Africa/Lome" @if($data->time_zone == "Africa/Lome") selected @endif>(UTC -00:00) Africa/Lome</option>
                                        <option value="Africa/Monrovia" @if($data->time_zone == "Africa/Monrovia") selected @endif>(UTC -00:00) Africa/Monrovia</option>
                                        <option value="Africa/Nouakchott" @if($data->time_zone == "Africa/Nouakchott") selected @endif>(UTC -00:00) Africa/Nouakchott</option>
                                        <option value="Africa/Ouagadougou" @if($data->time_zone == "Africa/Ouagadougou") selected @endif>(UTC -00:00) Africa/Ouagadougou</option>
                                        <option value="Africa/Sao_Tome" @if($data->time_zone == "Africa/Sao_Tome") selected @endif>(UTC -00:00) Africa/Sao_Tome</option>
                                        <option value="UTC" @if($data->time_zone == "UTC") selected @endif>(UTC -00:00) UTC</option>
                                        <option value="Africa/Algiers" @if($data->time_zone == "Africa/Algiers") selected @endif>(UTC +01:00) Africa/Algiers</option>
                                        <option value="Africa/Bangui" @if($data->time_zone == "Africa/Bangui") selected @endif>(UTC +01:00) Africa/Bangui</option>
                                        <option value="Africa/Brazzaville" @if($data->time_zone == "Africa/Brazzaville") selected @endif>(UTC +01:00) Africa/Brazzaville</option>
                                        <option value="Africa/Ceuta" @if($data->time_zone == "Africa/Ceuta") selected @endif>(UTC +01:00) Africa/Ceuta</option>
                                        <option value="Africa/Douala" @if($data->time_zone == "Africa/Douala") selected @endif>(UTC +01:00) Africa/Douala</option>
                                        <option value="Africa/Kinshasa" @if($data->time_zone == "Africa/Kinshasa") selected @endif>(UTC +01:00) Africa/Kinshasa</option>
                                        <option value="Africa/Lagos" @if($data->time_zone == "Africa/Lagos") selected @endif>(UTC +01:00) Africa/Lagos</option>
                                        <option value="Africa/Libreville" @if($data->time_zone == "Africa/Libreville") selected @endif>(UTC +01:00) Africa/Libreville</option>
                                        <option value="Africa/Luanda" @if($data->time_zone == "Africa/Luanda") selected @endif>(UTC +01:00) Africa/Luanda</option>
                                        <option value="Africa/Malabo" @if($data->time_zone == "Africa/Malabo") selected @endif>(UTC +01:00) Africa/Malabo</option>
                                        <option value="Africa/Ndjamena" @if($data->time_zone == "Africa/Ndjamena") selected @endif>(UTC +01:00) Africa/Ndjamena</option>
                                        <option value="Africa/Niamey" @if($data->time_zone == "Africa/Niamey") selected @endif>(UTC +01:00) Africa/Niamey</option>
                                        <option value="Africa/Porto-Novo" @if($data->time_zone == "Africa/Porto-Novo") selected @endif>(UTC +01:00) Africa/Porto-Novo</option>
                                        <option value="Africa/Tunis" @if($data->time_zone == "Africa/Tunis") selected @endif>(UTC +01:00) Africa/Tunis</option>
                                        <option value="Africa/Blantyre" @if($data->time_zone == "Africa/Blantyre") selected @endif>(UTC +02:00) Africa/Blantyre</option>
                                        <option value="Africa/Bujumbura" @if($data->time_zone == "Africa/Bujumbura") selected @endif>(UTC +02:00) Africa/Bujumbura</option>
                                        <option value="Africa/Cairo" @if($data->time_zone == "Africa/Cairo") selected @endif>(UTC +02:00) Africa/Cairo</option>
                                        <option value="Africa/Gaborone" @if($data->time_zone == "Africa/Gaborone") selected @endif>(UTC +02:00) Africa/Gaborone</option>
                                        <option value="Africa/Harare" @if($data->time_zone == "Africa/Harare") selected @endif>(UTC +02:00) Africa/Harare</option>
                                        <option value="Africa/Johannesburg" @if($data->time_zone == "Africa/Johannesburg") selected @endif>(UTC +02:00) Africa/Johannesburg</option>
                                        <option value="Africa/Kigali" @if($data->time_zone == "Africa/Kigali") selected @endif>(UTC +02:00) Africa/Kigali</option>
                                        <option value="Africa/Lubumbashi" @if($data->time_zone == "Africa/Lubumbashi") selected @endif>(UTC +02:00) Africa/Lubumbashi</option>
                                        <option value="Africa/Lusaka" @if($data->time_zone == "Africa/Lusaka") selected @endif>(UTC +02:00) Africa/Lusaka</option>
                                        <option value="Africa/Maputo" @if($data->time_zone == "Africa/Maputo") selected @endif>(UTC +02:00) Africa/Maputo</option>
                                        <option value="Africa/Maseru" @if($data->time_zone == "Africa/Maseru") selected @endif>(UTC +02:00) Africa/Maseru</option>
                                        <option value="Africa/Mbabane" @if($data->time_zone == "Africa/Mbabane") selected @endif>(UTC +02:00) Africa/Mbabane</option>
                                        <option value="Africa/Tripoli" @if($data->time_zone == "Africa/Tripoli") selected @endif>(UTC +02:00) Africa/Tripoli</option>
                                        <option value="Africa/Windhoek" @if($data->time_zone == "Africa/Windhoek") selected @endif>(UTC +02:00) Africa/Windhoek</option>
                                        <option value="Europe/Zaporozhye" @if($data->time_zone == "Europe/Zaporozhye") selected @endif>(UTC +02:00) Europe/Zaporozhye</option>
                                        <option value="Africa/Addis_Ababa" @if($data->time_zone == "Africa/Addis_Ababa") selected @endif>(UTC +03:00) Africa/Addis_Ababa</option>
                                        <option value="Africa/Asmara" @if($data->time_zone == "Africa/Asmara") selected @endif>(UTC +03:00) Africa/Asmara</option>
                                        <option value="Africa/Dar_es_Salaam" @if($data->time_zone == "Africa/Dar_es_Salaam") selected @endif>(UTC +03:00) Africa/Dar_es_Salaam</option>
                                        <option value="Africa/Djibouti" @if($data->time_zone == "Africa/Djibouti") selected @endif>(UTC +03:00) Africa/Djibouti</option>
                                        <option value="Africa/Juba" @if($data->time_zone == "Africa/Juba") selected @endif>(UTC +03:00) Africa/Juba</option>
                                        <option value="Africa/Kampala" @if($data->time_zone == "Africa/Kampala") selected @endif>(UTC +03:00) Africa/Kampala</option>
                                        <option value="Africa/Khartoum" @if($data->time_zone == "Africa/Khartoum") selected @endif>(UTC +03:00) Africa/Khartoum</option>
                                        <option value="Africa/Mogadishu" @if($data->time_zone == "Africa/Mogadishu") selected @endif>(UTC +03:00) Africa/Mogadishu</option>
                                        <option value="Africa/Nairobi" @if($data->time_zone == "Africa/Nairobi") selected @endif>(UTC +03:00) Africa/Nairobi</option>
                                        </select>
                                </div>
                                <div class="mb-3">
                                    <label for="time_format" class="mb-0 form-label">Time format</label>
                                    <p class="m-0"><small class="text-muted">Select your preffered time format</small></p>
                                    <select name="time_format" class="form-select text-uppercase">
                                        <option value="" selected="" disabled="">Choose...</option>
                                        <option value="1" @isset($data->time_format) @if($data->time_format == 1) selected @endif @endisset>12 Hour (6:20 pm)</option>
                                        <option value="2" @isset($data->time_format) @if($data->time_format == 2) selected @endif @endisset>24 Hour (16:20)</option>
                                    </select>
                                </div>
                                <p class="text-muted text-uppercase mb-1">Safeguarding</p><hr class="mt-0">
                                <div class="mb-3">
                                    <label for="" class="form-label">Visitor Kiosk IP restriction</label>
                                    <textarea class="form-control" name="iprestriction" rows="3" placeholder="Enter IP addresses, if more than one add comma after each IP address">@isset($data->iprestriction){{ $data->iprestriction }}@endisset</textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check"></i><span class="text-with-icon">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/assets/vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/js/initiate-select2.js') }}"></script>
@endsection