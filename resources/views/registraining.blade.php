@extends ('layouts.dashboardregis')
@section('page_heading','Form')

@section('section')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>    
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="POST" action="/register">
            <h2> Your Personal Information </h2>
            <!-- Nama Lengkap -->
            <div class="form-group">
                <div class="row">
                <div class="col-sm-4">
                <label>Full Name</label>
                <input class="form-control" name = "nama" value="{{ old('nama') }}" autofocus>
                </div>
                </div>
            </div>
            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label>Your gender</label>
                <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" id="optionsRadiosInline1" value="male" checked>Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" id="optionsRadiosInline2" value="female">Female
                </label>
            </div>
            <!-- Tanggal Lahir -->
            <div>
                <label>Your Birth Date</label>
                
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker">
                                    <input class="form-control date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <script type="text/javascript">
                                        $('.date').datepicker({  
                                            format: 'mm-dd-yyyy'  
                                        });                  
                                    </script>  
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
             <!-- Negara Asal -->
            <div class="form-group">
                <div class="row">
                <div class="col-sm-6">
                <label> Select Your Nationality </label>
                <select name="negara" class="form-control" autofocus>
                    <option value="{{ old('negara') }}" selected>{{ old('negara') }}</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antartica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo">Congo, the Democratic Republic of the</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                    <option value="Croatia">Croatia (Hrvatska)</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="France Metropolitan">France, Metropolitan</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                    <option value="Holy See">Holy See (Vatican City State)</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran (Islamic Republic of)</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                    <option value="Korea">Korea, Republic of</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia">Micronesia, Federated States of</option>
                    <option value="Moldova">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                    <option value="Saint LUCIA">Saint LUCIA</option>
                    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                    <option value="Span">Spain</option>
                    <option value="SriLanka">Sri Lanka</option>
                    <option value="St. Helena">St. Helena</option>
                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syrian Arab Republic</option>
                    <option value="Taiwan">Taiwan, Province of China</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Yugoslavia">Yugoslavia</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
                </div>
                </div>
            </div>
            <!-- Religion -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                <label> Select Your Religion</label>
                <select name="agama" class="form-control"autofocus>
                    <option value="{{ old('agama') }}" selected>{{ old('agama') }}</option>
                    <option value="Islam">Islam</option>
                    <option value="Christian">Christian</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Budhist">Budhist</option>
                    <option value="Hindu">Hindu</option>
                </select>
                </div>
                </div>
            </div>
            <!-- Status Kawin -->
            <div class="form-group">
                <label>Marital Status</label>
                <label class="radio-inline">
                    <input type="radio" name="marital_status" id="optionsRadiosInline1" value="male" checked>Single
                </label>
                <label class="radio-inline">
                    <input type="radio" name="marital_status" id="optionsRadiosInline2" value="married">Married
                </label>
                <label class="radio-inline">
                    <input type="radio" name="marital_status" id="optionsRadiosInline3" value="divorce">Divorce
                </label>
            </div>
            <!-- Kartu Identitas -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label> ID Type </label>
                        <select name="id_type" class="form-control" autofocus>
                            <option value="{{ old('id_type') }}">{{ old('id_type') }}</option>
                            <option value="passport">Passport</option>
                            <option value="idcard">ID Card</option>
                        </select>
                        <p>can be ID card or Passport</p>
                    </div>
                    <div class="col-sm-3">
                        <label> Identity Card Number </label>
                        <input class="form-control" name = "nomor_id" value="{{ old('nomor_id') }}">
                    </div>
                    <div class="col-sm-3">
                        <label> Issued Date </label>
                        <div class="input-group date" id="datetimepicker">
                            <input class="form-control date" name="tanggal_awal_id" value="{{ old('tanggal_awal_id') }}">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <script type="text/javascript">
                                    $('.date').datepicker({  
                                        format: 'mm-dd-yyyy'  
                                    });                  
                                </script>  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Expiry Date</label>
                        <div class="input-group date" id="datetimepicker">
                            <input class="form-control date" name="tanggal_akhir_id" value="{{ old('tanggal_akhir_id') }}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <script type="text/javascript">
                                $('.date').datepicker({  
                                    format: 'mm-dd-yyyy'  
                                });                  
                            </script>  
                    </div>
                    </div>
                </div>
            </div>

            <!-- Email User -->
            <div class="row">
                <div class="form-group">    
                    <div class="col-sm-6">
                        <label>Email</label>
                        <input class="form-control" placeholder="Insert Your Email" name= "email" value="{{ old('email') }}" autofocus>
                    </div>
            <!-- Password User -->
                    <div class="col-sm-6">
                        <label>Password</label>
                        <input class="form-control" placeholder="insert your password" name="password" type="password" autofocus>
                    </div>
                </div>
            </div>
            <br>
            <!-- Telepon User -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Telephone Number</label>
                        <input class="form-control" placeholder="Insert Your Phone Number" name="telepon" value="{{ old('telepon') }}" autofocus>
                    </div>
                </div>
            </div>
            <!-- Kemampuan bahasa inggris -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                    <label> English Profiency</label>
                    <select name="english_profiency" class="form-control"autofocus>
                        <option value="{{ old('english_profiency') }}" selected>{{ old('english_profiency') }}</option>
                        <option value="fair">Fair</option>
                        <option value="good">Good</option>
                        <option value="excellent">Excellent</option>
                    </select>
                    </div>
                </div>
            </div>
            <!-- alamat user -->
            <div class="form-group">
                <div class="row">
                <div class="col-sm-6">
                <label> Your Address </label>
                <textarea value="{{ old('alamat') }}"class = "form-control" rows="3" name="alamat" autofocus></textarea>
                </div>
                </div>
            </div>

            <h2> Your Professional Information </h2>
            <!-- Informasi pendidikan -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label> Education </label>
                    </div>
                    <div class="col-sm-3">
                        <!--code-->
                        <label> Highest Degeree </label>
                        <select name="high_degree" class="form-control" autofocus>
                            <option value="{{ old('high_degree') }}" selected>{{ old('high_degree') }}</option>
                            <option value="undergraduate">Undergraduate</option>
                            <option value="bachelor">Bachelor</option>
                            <option value="graduate">Graduate</option>
                            <option value="master">Master</option>
                            <option value="Doctoral">Doctoral</option>
                            <option value="professional">Professional</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                            <!--code-->
                        <label>Name of Institution</label>
                        <input class="form-control" name = "nama_instansi" value="{{ old('nama_instansi') }}" autofocus>
                    </div>

                    <div class="col-sm-3">
                        <label> Year Obtained </label>
                        <div class="input-group date" id="datetimepicker">
                            <input class="form-control date" name="year_obtained" value="{{ old('year_obtained') }}">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <script type="text/javascript">
                                    $('.date').datepicker({  
                                        format: 'mm-dd-yyyy'  
                                    });                  
                                </script>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- Informasi Pekerjaan -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label> Current Job </label>
                    </div>
                    <div class="col-sm-3">
                        <!--code-->
                        <label> Position </label>
                        <input class="form-control" name = "job_pos" value="{{ old('job_pos') }}" autofocus>
                    </div>
                     <div class="col-sm-3">
                        <!--code-->
                        <label> Name of Institution </label>
                        <input class="form-control" name = "job_institution" value="{{ old('job_institution') }}" autofocus>
                    </div>
                    <div class="col-sm-3">
                        <!--code-->
                        <label> Institusion Contact </label>
                        <input value="{{ old('job_contact') }}" class="form-control" name = "job_contact"  autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label> Job Institution's Address </label>
                        <textarea name="job_alamat" value="{{ old('job_alamat') }}"class = "form-control" rows="3"  autofocus></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                         <label> Your Area of Interest </label>
                        <textarea name="area_interest" value="{{ Input::old('area_interest') }}"class = "form-control" rows="3" autofocus></textarea>
                    </div>
                </div>
            </div> 
            <br>
            <button type="submit" class="btn btn-default">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
            {{ csrf_field() }}
        </form>
    </div>
    </div>
</div>
@stop
