<div class="input-group" style="width:120px">
    <span class="input-group-btn">
        <button id="{{$minusID}}" type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" onclick="btnNumber(this.id,'{{$field}}')">
            <span class="glyphicon glyphicon-minus"></span>
        </button>
    </span>
    <input id="{{$field}}"  type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10" >
    <span class="input-group-btn">
        <button id="{{$plusID}}" type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]" onclick="btnNumber(this.id,'{{$field}}')">
            <span class="glyphicon glyphicon-plus"></span>
        </button>
    </span>
</div>
