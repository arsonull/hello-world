<?php
function displaySlider($id){

?>
<p>Amount you buy: <span id="productCount<?php echo $id; ?>"></span></p>
<Script>
    var slider = document.getElementById("myRange<?php echo $id;?>");
    var output = document.getElementById("productCount<?php echo $id;?>");
    alert("<?php echo $id;?>");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    } 
</Script>
<div class="slidecontainer">
    <input type="range" min="1" max="800" value="50" class="slider" id="myRange<?php echo $id;?>">
</div>
<?php
}
?>
