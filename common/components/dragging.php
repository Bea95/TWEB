<?php
/**
 * Created by PhpStorm.
 * User: owlita
 * Date: 4/02/19
 * Time: 23:56
 */

function librariesDragging(){
    ?>
    <script src="common/components/js/dragging.js"></script>
    <?php
}
function sectionDiv($tUserDiv, $tDiv, $userDiv, $div, $userElements, $elements, $type)
{
    ?>
    <div class="section">
        <?php
        divDraggable($tUserDiv, $userDiv, $userElements, $type);
        divDraggable($tDiv, $div, $elements, $type);
        ?>
    </div>

    <?php
}

function divDraggable($title, $div, $table, $type)
{
    ?>
    <div class="card panel">
        <div class="card-body center panel">
            <h5 class="card-title"><?php print($title); ?></h5>
            <hr>
            <div id="<?php print($div); ?>" ondrop="drop(event, '<?php print($type); ?>')" ondragover="allowDrop(event)">
                <?php
                for($i=0, $size=count($table); $i<$size; ++$i){
                    imageDraggable($table[$i], $type, $i);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}

function recoverDefine($element, $type){
    if($type == 'language'){
        return recoverLanguage($element);
    }else{
        return recoverTopic($element);
    }
}

function imageDraggable($element, $type)
{
    ?>
    <img
         id="<?php print(recoverDefine($element, $type));?>"
         class="align-self-center mr-3"
         height="40rem"
         width="40rem"
         draggable="true" ondragstart="drag(event, '<?php print($type); ?>')" id="<?php print($element); ?>"
         src=<?php print($element); ?>
         style="border-radius: 50px"
         ondrop="dropImage(event, '<?php print($type); ?>')" ondragover="allowDrop(event)">
    <?php
}

function disjunctionSet($set, $userSet){
    if($set == 0){  //Is a set of languages
        $allSet = array(SPANISH, ITALIAN, GERMAN, FRENCH, ENGLISH_UK, ENGLISH_USA, JAPANESE);
    }else{          //Is a set of topics
        $allSet = array(ANIMALS, ART, COMPUTER, LITERATURE, NATURE, SPORT, TRAVEL);
    }
    return array_values(array_filter(array_diff($allSet, $userSet)));
}
?>