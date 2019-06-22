<?php
function ratingHTML($vote){
?>
    <form class="rating">
        <label>
            <input class="star" type="radio" name="stars" value="1" <?php if($vote==1){ print("checked");} ?>/>
            <span class="icon">★</span>
        </label>
        <label>
            <input class="star" type="radio" name="stars" value="2" <?php if($vote==2){ print("checked");} ?>/>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input class="star" type="radio" name="stars" value="3" <?php if($vote==3){ print("checked");} ?>/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input class="star" type="radio" name="stars" value="4" <?php if($vote==4){ print("checked");} ?>/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input class="star" type="radio" name="stars" value="5" <?php if($vote==5){ print("checked");} ?>/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
    </form>
<?php
}
?>
