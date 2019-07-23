

<div id="{{$name}}" class="calculator">
  <fieldset id="container">
<form class="keys" name="calculator" onsubmit="calculate_balance({{session('salePrice')}})">
<input id="display" type="text" name="display" placeholder="0.00" autofocus>

<input class="button digits" type="button" value="7" onclick="calculator.display.value += '7'">
<input class="button digits" type="button" value="8" onclick="calculator.display.value += '8'">
<input class="button digits" type="button" value="9" onclick="calculator.display.value += '9'">
<input class="button mathButtons" type="button" value="£" onclick="calculate_balance({{session('salePrice')}})">
<br>
<input class="button digits" type="button" value="4" onclick="calculator.display.value += '4'">
<input class="button digits" type="button" value="5" onclick="calculator.display.value += '5'">
<input class="button digits" type="button" value="6" onclick="calculator.display.value += '6'">
<input class="button mathButtons" type="button" value="%" onclick="calculate_balance({{session('salePrice')}})">
<br>
<input class="button digits" type="button" value="1" onclick="calculator.display.value += '1'">
<input class="button digits" type="button" value="2" onclick="calculator.display.value += '2'">
<input class="button digits" type="button" value="3" onclick="calculator.display.value += '3'">
<input class="button mathButtons" type="button" value="$" onclick="calculate_balance({{session('salePrice')}})">
<br>
<input id="clearButton" class="button" type="button" value="C" onclick="calculator.display.value = ''">
<input class="button digits" type="button" value="0" onclick="calculator.display.value += '0'">
<input id="equalsButton" class="button mathButtons" type="button" value="=" onclick="calculate_balance()" >
<input class="button mathButtons" type="button" value="¥" onclick="calculate_balance({{session('salePrice')}})">
<br>
</form>

<input id="PayButton" class="button" type="button" value="Receive money" onclick="calculate_balance({{session('salePrice')}})">


</fieldset>
</div>
