<div class="modal fade" id="{{$modalID}}" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$title}}</h4>
      </div>
      <div class="modal-body">

          <div class="input-group input-icon right in-grp1">
            <span class="input-group-addon">
              <i class="fas fa-envelope"></i>
            </span>
            <input id="share-email" class="form-control1" type="email" name="" value="" placeholder="Enter an email address" autofocus>
          </div>

      </div>
      <div class="modal-footer mt-3">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{$cancelBtnTitle}}</button>
        <button type="button" class="btn btn-default btn-green" onclick="share_doc('{{$modalID}}',{{$docId}},'{{$docType}}')"><span class="fas fa-share-alt"></span> {{$saveBtnTitle}}</button>

      </div>
    </div>
  </div>
</div>
