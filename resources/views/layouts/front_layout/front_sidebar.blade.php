<?php 
    use App\Section;
    $sections = Section::sections();
    //dd($sections);
 ?>
<div class="col-lg-3 col-md-12 sidebar mt-8 mt-lg-0">
   <div>

      <div class="widget widget-categories mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Categories</h5>
         <div id="accordion" class="accordion">
            <?php $i = 1 ?>
            @foreach($sections as $section)
            <div class="card border-0 mb-2">
               <div class="card-header">
                  <h6 class="mb-0">
                     <a class="link-title" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}"  aria-expanded="{{ ($i==1)? 'true':''}}">{{ $section['name'] }}</a>
                  </h6>
               </div>
               <div id="collapse{{$i}}" class="collapse {{ ($i==1)? 'show':''}}" data-parent="#accordion">
                  <div class="card-body text-muted">
                     <ul class="list-unstyled">
                      @foreach($section['categories'] as $category)
                        <li> <a href="{{ $category['url'] }}">{{ $category['category_name'] }}</a></li>
                        @foreach($category['subcategories'] as $subcategory)
                        <li> <a href="{{ $subcategory['url'] }}">&nbsp;&nbsp;--{{ $subcategory['category_name'] }}</a></li>
                        @endforeach
                      @endforeach
                     </ul>
                  </div>
               </div>
            </div>
            <?php $i++; ?>
            @endforeach
         </div>
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Price</h5>
         <input type="hidden" id="minimum_price" value="0">
         <input type="hidden" id="maximum_price" value="2000">
         <p id="price_show">$0 - $2000</p>
         <div id="price_range"></div>
         <button id="price_range_filter" style="margin-top: 15px;margin-left: -8px;" class="btn btn-sm btn-info">Filter</button>
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Fabric</h5>
         @foreach($fabricArray as $fabric)
         <div class="custom-control clear-filter custom-checkbox mb-2">
            <input type="checkbox" custom-class="fabric" name="fabric[]" value="{{ $fabric }}" class="custom-control-input fabric {{ str_replace(' ','_',$fabric) }}" id="{{ $fabric }}" custom-id="{{ str_replace(' ','_',$fabric) }}">
            <label class="custom-control-label" for="{{ $fabric }}">{{ $fabric }}</label>
         </div>
         @endforeach
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Sleeve</h5>
         @foreach($sleeveArray as $sleeve)
         <div class="custom-control clear-filter custom-checkbox mb-2">
            <input type="checkbox" custom-class="sleeve" name="sleeve[]" value="{{ $sleeve }}" class="custom-control-input sleeve {{ str_replace(' ','_',$sleeve) }}" id="{{ $sleeve }}" custom-id="{{ str_replace(' ','_',$sleeve) }}">
            <label class="custom-control-label" for="{{ $sleeve }}">{{ $sleeve }}</label>
         </div>
         @endforeach
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Pattern</h5>
         @foreach($patternArray as $pattern)
         <div class="custom-control clear-filter custom-checkbox mb-2">
            <input type="checkbox" custom-class="pattern" name="pattern[]" value="{{ $pattern }}" class="custom-control-input pattern {{ str_replace(' ','_',$pattern) }}" id="{{ $pattern }}" custom-id="{{ str_replace(' ','_',$pattern) }}">
            <label class="custom-control-label" for="{{ $pattern }}">{{ $pattern }}</label>
         </div>
         @endforeach
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Fit</h5>
         @foreach($fitArray as $fit)
         <div class="custom-control clear-filter custom-checkbox mb-2">
            <input type="checkbox" custom-class="fit" name="fit[]" value="{{ $fit }}" class="custom-control-input fit {{ str_replace(' ','_',$fit) }}" id="{{ $fit }}" custom-id="{{ str_replace(' ','_',$fit) }}">
            <label class="custom-control-label" for="{{ $fit }}">{{ $fit }}</label>
         </div>
         @endforeach
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Occasion</h5>
         @foreach($occasionArray as $occasion)
         <div class="custom-control clear-filter custom-checkbox mb-2">
            <input type="checkbox" custom-class="occasion" name="occassion[]" value="{{ $occasion }}" class="custom-control-input occassion {{ str_replace(' ','_',$occasion) }}" id="{{ $occasion }}" custom-id="{{ str_replace(' ','_',$occasion) }}">
            <label class="custom-control-label" for="{{ $occasion }}">{{ $occasion }}</label>
         </div>
         @endforeach
      </div>

      <div class="widget widget-brand mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Brand</h5>
         <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="brandCheck1">
            <label class="custom-control-label" for="brandCheck1">Covmed</label>
         </div>
         <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="brandCheck2">
            <label class="custom-control-label" for="brandCheck2">Tiagoo</label>
         </div>
         <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="brandCheck3">
            <label class="custom-control-label" for="brandCheck3">Organtic</label>
         </div>
         <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="brandCheck4">
            <label class="custom-control-label" for="brandCheck4">Dealsdot</label>
         </div>
         <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="brandCheck5">
            <label class="custom-control-label" for="brandCheck5">Harrier</label>
         </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="brandCheck6">
            <label class="custom-control-label" for="brandCheck6">Unicorn</label>
         </div>
      </div>
      <div class="widget widget-color mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Color</h5>
         <ul class="list-inline">
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter1" name="Radios">
                  <label class="form-check-label" for="color-filter1" data-bg-color="#3cb371"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter2" name="Radios" checked>
                  <label class="form-check-label" for="color-filter2" data-bg-color="#4876ff"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter3" name="Radios">
                  <label class="form-check-label" for="color-filter3" data-bg-color="#0a1b2b"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter4" name="Radios">
                  <label class="form-check-label" for="color-filter4" data-bg-color="#f94f15"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter5" name="Radios">
                  <label class="form-check-label" for="color-filter5" data-bg-color="#FF00FF"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter6" name="Radios">
                  <label class="form-check-label" for="color-filter6" data-bg-color="#ffc300"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter7" name="Radios">
                  <label class="form-check-label" for="color-filter7" data-bg-color="#808080"></label>
               </div>
            </li>
            <li>
               <div class="form-check pl-0">
                  <input type="radio" class="form-check-input" id="color-filter8" name="Radios">
                  <label class="form-check-label" for="color-filter8" data-bg-color="#008080"></label>
               </div>
            </li>
         </ul>
      </div>
      <div class="widget widget-size mb-4 border rounded p-4">
         <h5 class="widget-title mb-3">Size</h5>
         <ul class="list-inline clearfix">
            <li>
               <input name="sc" id="xs-size" type="radio">
               <label for="xs-size">XS</label>
            </li>
            <li>
               <input name="sc" id="s-size" type="radio">
               <label for="s-size">S</label>
            </li>
            <li>
               <input name="sc" id="m-size" checked="" type="radio">
               <label for="m-size">M</label>
            </li>
            <li>
               <input name="sc" id="l-size" type="radio">
               <label for="l-size">L</label>
            </li>
            <li>
               <input name="sc" id="xl-size" type="radio">
               <label for="xl-size">XL</label>
            </li>
         </ul>
      </div>
      <div class="widget mb-4">
         <div class="position-relative rounded overflow-hidden">
            <!-- Background --> 
            <img class="img-fluid hover-zoom" src="assets/images/product-ad/side-banner.jpg" alt=""> 
            <!-- Body -->
            <div class="position-absolute top-50 pl-5 side-banner">
               <h6 class="text-dark">Todays Deals</h6>
               <!-- Heading -->
               <h4 class="font-w-6 text-dark">Accessories <br>
                  Special
               </h4>
               <!-- Link --> <a class="more-link" href="#">Shop Now </a> 
            </div>
         </div>
      </div>
   </div>
</div>

