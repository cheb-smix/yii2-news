<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-3">
        <h3>Рубрики</h3>
        <ul class="nav nav-pills nav-stacked span2">
        <?php recursivePrinter($rubrics); ?>
        </ul>
    </div>
    <div class="col-md-9">
        <div id="news"></div>
        <div id="newslist"></div>
    </div>
</div>
<?php
function recursivePrinter($rubrics)
{
    foreach ($rubrics as $rubric) {
        ?><li><a href="?r=news/rubric&id=<?php echo $rubric["id"];?>"><?php echo $rubric["title"];?></a></li><?php
        if ($rubric["children"]) {
            ?><ul class="nav nav-pills nav-stacked span2"><?php
            recursivePrinter($rubric["children"]);
            ?></ul><?php
        }
    }
}
$JS = <<< JS
$(document).delegate("ul>li>a","click",function(){
    $("ul>li>a").removeClass("active");
    let url = $(this).attr("href");
    let title = $(this).addClass("active").html();

    $("#news").hide("fast");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(response){
            if (url.indexOf("rubric")>0) {
                if (response.length==0) {
                    $("#newslist").html("<i>В данной рубрике новостей не найдено</i>");
                } else {
                    $("#newslist").html('<h3>Новости рубрики "'+title+'"</h3><ul></ul>');
                }
                $("#newslist").show();
                $("#news").html("");
                for (let i in response) {
                    $("#newslist>ul").append('<li data-news-id='+response[i].id+'><a href="?r=news/info&id='+response[i].id+'">'+response[i].title+'</a></li>');
                }
            } else if (url.indexOf("info")>0) {
                $("#newslist").html($("#newslist").html().replace("Новости","Другие новости"));
                $("#news").html('<h3>'+response.title+'</h3><div>'+response.text+'</div>');
                if ($("#newslist li[data-news-id!='"+response.id+"']").length == 0) {
                    $("#newslist").hide();
                } else {
                    $("#newslist, #newslist li").show();
                    $("#newslist li[data-news-id='"+response.id+"']").hide("slow");
                }
            }
            $("#news").show("fast");
        },
        error: function(response){
            console.log(response);
        }
    });
    return false;
});
JS;
$CSS = <<< CSS
ul ul{
    padding-left: +20px !important;
}
li>a.active{
    background: #eee;
}
CSS;
$this->registerJs( $JS );
$this->registerCss( $CSS );