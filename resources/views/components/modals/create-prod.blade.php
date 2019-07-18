<div class="modal fade" id="{{$modalID}}" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$title}}</h4>
      </div>
      <div class="modal-body">
          <form id="new-prod-form" action="{{route('stock.store')}}" method="post" onsubmit="confirm_modal('newProdConfirmModal')">
            @csrf
            <div class="row">


              <div class="col-md-8">

                @foreach ($mainFields as $mainField)
                  <div class="form-group @if ($errors->has($mainField['name'])) has-error @endif">
            				<label class="col-md-2 control-label text-capitalize" style="line-height:35px">{{$mainField['title']}}  @if($mainField['required']) <span class="text-danger">*</span> @endif </label>
            				<div class="col-md-8">
                      @if( $mainField['type'] === 'textarea' )
            					<div class="input-group input-icon right in-grp1">
            						<span class="input-group-addon">
            							<i class="{{$mainField['icon']}}"></i>
            						</span>
            						<textarea id="{{$mainField['id']}}" name="{{$mainField['name']}}" class="form-control"  placeholder="{{$mainField['placeholder']}}" rows="{{$mainField['rows']}}">{{old($mainField['name'])}}</textarea>
            					</div>
                      @elseif( $mainField['type'] === 'select' )
                      <div class="input-group input-icon right in-grp1">
            						<span class="input-group-addon">
            							<i class="{{$mainField['icon']}}"></i>
            						</span>
                        <select id="{{$mainField['id']}}" class="form-control1" name="{{$mainField['name']}}">

                          <option value="1" @if(old($mainField['name']) == 1) selected @endif>Chicken</option>
                          <option value="2" @if(old($mainField['name']) == 2) selected @endif>Beef</option>
                          <option value="3" @if(old($mainField['name']) == 3) selected @endif>Fish</option>
                          <option value="4" @if(old($mainField['name']) == 4) selected @endif>Drumsticks</option>
                          <option value="5" @if(old($mainField['name']) == 5) selected @endif>Bonless</option>

                        </select>

            					</div>
                      @else
                      <div class="input-group input-icon right in-grp1">
            						<span class="input-group-addon">
            							<i class="{{$mainField['icon']}}"></i>
            						</span>
            						<input id="{{$mainField['id']}}" name="{{$mainField['name']}}" class="form-control1" type="{{$mainField['type']}}" placeholder="{{$mainField['placeholder']}}" min="{{$mainField['min']}}" value="{{old($mainField['name'])}}">
            					</div>
                      @endif

            				</div>
                    @if ($errors->has($mainField['name']))
                      <div class="col-sm-2 jlkdfj1">
                        <p class="help-block">{{ $errors->first($mainField['name']) }}</p>
                      </div>
                    @endif
            				<div class="clearfix"> </div>
            			</div>
                @endforeach

              </div>

              <div class="col-md-4">

                <div class="avatar-preview">
                  <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
                  <img id="product-image" class="" src="@if( old('img1') ) {{url(old('img1'))}} @else /placeholders/avatar-male.png @endif" alt="" >
                  <input id="product-image-url" type="hidden" name="img1" value="{{old('img1')}}">
                </div>
                <form id="product-image-form" action="/img-tmp" enctype="multipart/form-data">
                  <input class="hidden d-none"  type="file" name="" id="prod-image-file" onchange="upload_image(this.value,this.id,'product-image',{required:0,min:0,max:255,type:'image',size:1},'product-image-url','product')">
                </form>

                @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("prod-image-file",0)' ])@endcomponent

                @foreach ($sideFields as $sideField)
                  <div class="form-group @if ($errors->has($sideField['name'])) has-error @endif">

                    <div class="col-md-12">
            					<div class="input-group input-icon right in-grp1">
            						<span class="input-group-addon">
            							<i class="{{$sideField['icon']}}"></i>
            						</span>
            						<input id="{{$sideField['id']}}" name="{{$sideField['name']}}" class="form-control1" type="{{$sideField['type']}}" placeholder="{{$sideField['placeholder']}}" min="{{$sideField['min']}}" placeholder="{{$mainField['placeholder']}}" value="{{old($sideField['name'])}}">
            					</div>
            				</div>

            				<div class="clearfix"> </div>
            			</div>
                @endforeach
              </div>

          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{$cancelBtnTitle}}</button>
        <button type="button" class="btn btn-default btn-green" onclick="confirm_modal('newProdConfirmModal')">{{$saveBtnTitle}}</button>

      </div>
    </div>
  </div>
</div>
