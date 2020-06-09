<div class="post-attributes-panel">
  <?php $count = 1 ?>
  <?php $postAttributes = isset($post) ?  $post[$relationship] : [] ?>
  <?php $postAttributes = old('{{$type}}') ?  old('{{$type}}') : $postAttributes ?>
  <ul id="{{$type}}-list">
    @if( !isset($post) )
      @foreach( $postAttributes as $postAttribute )
        <li id="{{$type}}-{{$count}}">
          {{$postAttribute}}
          <span class="fa fa-times-circle" onclick="remove_post_attribute('{{$type}}','{{$type}}-{{$count}}')"></span>
          <input id="{{$type}}-{{$count}}-input" type="hidden" name="{{$type}}[]" value="{{$postAttribute}}" />
        </li>
        <?php $count++ ?>
      @endforeach
    @else
      @foreach( $postAttributes as $postAttribute )
        <li id="{{$type}}-{{$count}}">
          {{$postAttribute->title}}
          <span class="fa fa-times-circle" onclick="remove_post_attribute('{{$type}}','{{$type}}-{{$count}}')"></span>
          <input id="{{$type}}-{{$count}}-input" type="hidden" name="{{$type}}[]" value="{{$postAttribute->title}}" />
        </li>
        <?php $count++ ?>
      @endforeach
    @endif
  </ul>
</div>
