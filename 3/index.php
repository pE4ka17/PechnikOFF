<div style="display:flex;justify-content:center;">
    <div style="width:500px;">
        <div style="margin:10px;display:flex;justify-content:center;">
            <select id="time">
                <option value="6">6 месяцев</option>
                <option value="9">9 месяцев</option>
                <option value="12">12 месяцев</option>
            </select>
        </div>
        <div style="text-align:center">
            <span type="text" id="val" style="">100000</span>
        </div>
            <div id="slider"></div>

        <h3 id="price" style="text-align:center;"></h3>
    </div>
</div>
<script src="jquery-3.7.1.js"></script>
<script src="jquery-ui/jquery-ui.min.js"></script>
<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
<script>
	$('#slider').slider({
		min: 100000,
		max: 2000000,
        value:100000,
        slide: function(event, ui){
			$('#val').text(ui.value+'р.');
            let t = $("#time").val();
            let e = ui.value;
            let eprice = e/100*((11.5/12)*t)+e;
            $("#price").text(eprice);
        }
	});
    $("#time").on("change",function(){
        let val = $('#slider').slider("option", "value");
        $('#val').text(val+'р.');
        let t = $("#time").val();
        let e = val;
        let eprice = e/100*((11.5/12)*t)+e;
        $("#price").text(eprice);
    });

</script>