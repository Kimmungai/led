<div class="modal fade" id="{{$modalID}}" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$title}}</h4>
      </div>
      <div class="modal-body">
        <p>{{$question}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{$cancelBtnTitle}}</button>
        <button type="button" class="btn btn-default btn-green" onclick="submit_form('{{$formID}}')">{{$saveBtnTitle}}</button>

      </div>
    </div>
  </div>
</div>
