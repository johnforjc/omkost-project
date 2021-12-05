@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    
    <!-- ============================ Filter Space ================================== -->
    <div class="filterspaces">
        <div class="container">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="filterspace__controls">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabcekblacklist" data-toggle="pill" href="#pills-rent" role="tab" aria-controls="pills-rent" aria-selected="true" onclick="tabcek()">
                                        Cek Blacklist
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabtambahblacklist" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false" onclick="tabtambah()">
                                        Tambah Blacklist
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-8">
                        -
                    </div>
                <!--
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="filterspace__link">
                            <a href="javascript_voide(0);" class="filt_link" data-toggle="modal" data-target="#searchfilter"><i class="ti-filter mr-1"></i><span>Filters</span></a>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Filter Space ================================== -->
    <!-- ============================ All Property ================================== -->
    <section>
        <div class="container">
            
            <div class="row">
                
                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="hidden-md-down">
                    
                        <div class="page-sidebar">
                            
                            <!-- Find New Property -->
                            <div class="sidebar-widgets">
                                <h6>Jenis Blacklist</h6>
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="seljenisblacklist" class="form-control">
                                            <option value="pencari">Pencari Kost</option>
                                            <option value="pegawai">Pegawai Kost</option>
                                            <option value="tukang">Tukang</option>
                                            <option value="toko">Toko</option>
                                        </select>
                                    </div>
                                </div>
                                <div id = "divcek" class = "collapse show">
                                    <h6>Cari Melalui</h6>
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="KTP / Nama"
                                            id="txtcari">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>
                                    <button id="btncek" type="button" class="btn btn-theme full-width bg-2">Cek</button>
                                </div>

                                <div id = "divtambah" class = "collapse">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <h6>Kota</h6>
                                            <input type="text" class="form-control" placeholder="Surabaya"
                                            id="txtkota">
                                            <h6>No Identitas</h6>
                                            <input type="text" class="form-control" placeholder="357xxxxxxxxxx"
                                            id="txtidentitas">
                                            <h6>Nama</h6>
                                            <input type="text" class="form-control" placeholder="Rudy"
                                            id="txtnama">
                                            <h6>Telp</h6>
                                            <input type="text" class="form-control" placeholder="081xxxxxxxxx"
                                            id="txttelp">
                                            <h6>Keterangan</h6>
                                            <input type="text" class="form-control" placeholder="Kabur tidak bayar kos"
                                            id="txtketerangan">
                                            <h6>Bukti</h6>
                                            <input type="file" class="form-control"
                                            id="txtbukti">
                                        </div>
                                        <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="setBlacklist()">Simpan</button>
                                    </div>
                                </div>
                            <!--    
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Location">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                </div>
                            -->    
                                
                                
                            <!--
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="status" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Apartment</option>
                                            <option value="2">Condo</option>
                                            <option value="3">Houses</option>
                                            <option value="4">Villa</option>
                                            <option value="5">Land</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="price" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Less Then $1000</option>
                                            <option value="2">$1000 - $2000</option>
                                            <option value="3">$2000 - $3000</option>
                                            <option value="4">$3000 - $4000</option>
                                            <option value="5">Above $5000</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="bedrooms" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="bathrooms" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="garage" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Any Type</option>
                                            <option value="2">Yes</option>
                                            <option value="3">No</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="built" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">2010</option>
                                            <option value="2">2011</option>
                                            <option value="3">2012</option>
                                            <option value="4">2013</option>
                                            <option value="5">2014</option>
                                            <option value="6">2015</option>
                                            <option value="7">2016</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="simple-input">
                                                <input type="text" class="form-control" placeholder="Min Area">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="simple-input">
                                                <input type="text" class="form-control" placeholder="Max Area">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                        <h6>Choose Price</h6>
                                        <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range" value="" />
                                        </div>
                                    </div>
                                </div>
                            -->
                                
                            
                            </div>
                        
                        </div>
                    </div>
                    <!-- Sidebar End -->
                
                </div>
                
                <div class="col-lg-8 col-md-12 col-sm-12">
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 list-layout">

                            <!-- Single Property Start 
                            <div class="sides_list_property large">
                                <div class="sides_list_property_thumb">
                                    <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="">
                                </div>
                                <div class="sides_list_property_detail">
                                    <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                                    <span><i class="ti-location-pin"></i>Sans Fransico</span>
                                    <div class="lists_property_types mt-1">
                                        <div class="property_types_vlix sale">For Sale</div>
                                    </div>
                                    <div class="lists_property_price">
                                        <div class="lists_property_price_value first">
                                            <h4>$4,240</h4>
                                        </div>
                                        <div class="lists_property_added">
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <table class="table" id="tabelblacklist" style = "width:100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align:left;width:1%;">No</th>
                                        <th style="text-align:left;width:1%;">Kota</th>
                                        <th style="text-align:left;width:1%;">Identitas</th>
                                        <th style="text-align:left;width:1%;">Nama</th>
                                        <th style="text-align:left;width:1%;">Telp</th>
                                        <th style="text-align:left;width:auto;">Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="dtblacklist">
                                    
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
        </div>	
    </section>
    <!-- ============================ All Property ================================== -->
	@include('layouts.partial.footer')
@endsection		

@section('script')
    @parent

	<script>
        function tabcek()
        {
            $("#divcek").collapse('show');
            $("#divtambah").collapse('hide');
        }
        function tabtambah()
        {
            $("#divcek").collapse('hide');
            $("#divtambah").collapse('show');
        }
        function clearinput()
        {
            $('#txtkota').val("");
            $('#txtidentitas').val("");
            $('#txtnama').val("");
            $('#txttelp').val("");
            $('#txtketerangan').val("");
        }
		function setBlacklist()
		{
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    jenis:$('#seljenisblacklist').val(), 
                    kota:$('#txtkota').val(), 
                    identitas:$('#txtidentitas').val(), 
                    nama:$('#txtnama').val(), 
                    telp:$('#txttelp').val(), 
                    keterangan:$('#txtketerangan').val(),
                    //submit_by:"{{ Cookie::get('email') }}",
                },
                success : function(response){
                    //var data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getBlacklist();
                        clearinput();
                    }
                    else
                    {
                        alert(response.message);
                    }
                },
                error: function(err){
                    alert("Error, hubungi admin")
                }
            });
        }

        function getBlacklist()
		{
            $.ajax({
                type  : 'GET',
                url   : "{{ url('/api/getBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                success : function(response){
                    var data = response.data;
                    if(response.status)
                    {
                        //alert(response.message);
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td style="text-align:left;">'+(i+1)+'</td>'+
                                    '<td style="text-align:left;">'+data[i].kota+'</td>'+
                                    '<td style="text-align:left;">'+data[i].identitas+'</td>'+
                                    '<td style="text-align:left;">'+data[i].nama+'</td>'+
                                    '<td style="text-align:left;">'+data[i].telp+'</td>'+
                                    '<td style="text-align:left;">'+data[i].keterangan+'</td>'+
                                    '</tr>';
                        }
                        $('#dtblacklist').html(html);
                    }
                    else
                    {
                        alert(response.message);
                    }
                },
                error: function(err){
                    alert("Error, hubungi admin")
                }
            });
        }

        window.onload=getBlacklist();
	</script>
@stop