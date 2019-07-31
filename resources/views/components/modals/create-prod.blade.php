<div class="modal fade" id="{{$modalID}}" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$title}}</h4>
      </div>
      <div class="modal-body">
          <form id="new-prod-form" action="{{route('stock.store')}}" method="post" onsubmit="confirm_modal('newProdConfirmModal')">
            @csrf
            <div class="row">


              <div class="col-md-12">

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
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{$cancelBtnTitle}}</button>
        <button type="button" class="btn btn-default btn-green" onclick="confirm_modal('newProdConfirmModal')">{{$saveBtnTitle}}</button>

      </div>
    </div>
  </div>
</div>
